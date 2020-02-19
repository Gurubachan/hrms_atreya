<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Education extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function create_education(){
        try{
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            if(isset($request->educationname) && preg_match("/^[a-zA-Z0-9 ]{3,60}$/",$request->educationname)){
                $insert[0]['educationname']=strtoupper($request->educationname);
            }else{
                $status=false;
            }
            if(isset($request->educationShortname) && preg_match("/^[a-zA-Z0-9]{2,5}$/",$request->educationShortname)){
                $insert[0]['educationshortname']=strtoupper($request->educationShortname);
            }else{
                $status=false;
            }
            if(isset($request->isactive) && preg_match("/[0,1]{1}/",$request->isactive)){
                if($request->isactive==1){
                    $insert[0]['isactive']=true;
                }else if($request->isactive==0){
                    $insert[0]['isactive']=false;
                }else{
                    $status=false;
                }
            }else{
                $status=false;
            }
            if($status){
                if(isset($request->txtid) && is_numeric($request->txtid)){
                    if($request->txtid>0){
                        $insert[0]['updatedby']=$this->session->login['userid'];
                        $insert[0]['updatedat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->update(21,$insert,"id",$request->txtid);
                        if($res!=false){
                            $data['message']="Update successful.";
                            $data['status']=true;
                        }else{
                            $data['message']="Update failed.";
                            $data['status']=false;
                        }
                    }else if($request->txtid==0){
                       $where="educationname='$request->educationname'";
                       $duplicate_check=$this->Model_Db->select(21,null,$where);
                       if($duplicate_check!=false){
                           $data['message']="Duplicate entry.";
                           $data['status']=false;
                           $data['flag']=0;
                       }else{
                           $insert[0]['entryby']=$this->session->login['userid'];
                           $insert[0]['createdat']=date("Y-m-d H:i:s");
                           $res=$this->Model_Db->insert(21,$insert);
                           if($res!=false){
                               $data['message']="Insert successful.";
                               $data['status']=true;
                           }else{
                               $data['message']="Insert failed.";
                               $data['status']=false;
                           }
                       }
                    }else{
                        $data['message']="Insufficient/Invalid data.";
                        $data['status']=false;
                    }
                }else{
                    $data['message']="Insufficient/Invalid data.";
                    $data['status']=false;
                }
            }else{
                $data['message']="Insufficient/Invalid data.";
                $data['status']=false;
            }
            echo json_encode($data);
            exit();
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
    public function load_education(){
        try{
            $data=array();
            $where="isactive=true";
            $orderby="educationname asc";
            $res=$this->Model_Db->select(21,null,$where,$orderby);
            $data[]="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->educationname</option>";
                }
            }
            echo json_encode($data);
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
    public function report_education(){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date=Date('Y-m-d');
            if(isset($request->checkparams) && is_numeric($request->checkparams)) {
                switch ($request->checkparams) {
                    case 1:
                        $where = "DATE(createdat)=DATE('$current_date')";
                        break;
                    case 2:
                        $where = "1=1";
                        break;
                    case 3:
                        $where = "isactive=true";
                        break;
                    case 4:
                        $where = "isactive=false";
                        break;
                    default:
                        $data['message'] = "ID not found";
                        $data['status'] = false;
                        $data['error'] = true;
                        exit();
                }
                $orderby="educationname asc";
                $res = $this->Model_Db->select(21, null, $where,$orderby);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'educationname' => $r->educationname,
                            'educationshortname' => $r->educationshortname,
                            'creationdate' => $r->createdat,
                            'lastmodifiedon' => $r->updatedat,
                            'isactive' => $r->isactive
                        );
                    }
                }
                echo json_encode($data);
            }
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
//    public function educationViewDetails(){
//        try {
//            extract($_POST);
//            $data=array();
////            $status=true;
//            if(isset($id) && $id!=""){
//                $where="id=$id";
//                $edu=$this->Model_Db->select(21,null,$where);
//                $user=$this->Model_Db->select(3,null,$where);
//                if($user!=null){
//                    foreach ($edu as $e){
//                        $data[]= array(
//                            'educationname' => $e->educationname,
//                            'createdat' => $e->createdat,
//                            'updatedby' => $e->updatedby,
//                            'updatedat' => $e->isactive,
//                            'educationshortname' => $e->educationshortname
//                        );
//                        if($e->entryby!=""){
//                           foreach ($user as $u){
//                               if($e->entryby == $u->id){
//                                   $data[]=array(
//                                       'entryby' => $u->entryby,
//                                       'fname' => $u->fname
//                                   );
//                               }
//                           }
//                        }else{
//                            $data['message'] = "user id not found";
//                            $data['status'] = false;
//                        }
//                    }
//                }else{
//                    $data['message']="ID not found";
//                    $data['status']=false;
//
//                }
////                $this->load->view("Education/viewDetails",$data);
//
//
//            }else{
//                $data['message']= "ID not found";
//                $data['status']=false;
//                $data['error']=true;
//            }
//            echo json_encode($data);
//        }catch(Exception $e){
//            $data['message']= "Message:".$e->getMessage();
//            $data['status']=false;
//            $data['error']=true;
//            echo json_encode($data);
//            exit();
//        }
//    }
    public function educationViewDetails(){
        extract($_POST);
        $where="id=$id";
        $data['result']=$this->Model_Db->select(21,null,$where);
        $data['user']=$this->Model_Db->select(3,null,$where);
        $this->load->view("Education/viewDetails",$data);
    }
}
