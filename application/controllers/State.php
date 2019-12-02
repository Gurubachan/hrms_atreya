<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class State extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function create_state(){
        try{
            extract($_POST);
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            if(isset($request->statename) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->statename)){
                $insert[0]['statename']=$request->statename;
            }else{
                $status=false;
            }
            if(isset($request->stateShortname) && preg_match("/^[a-zA-Z]{2,5}$/",$request->stateShortname)){
                $insert[0]['stateshortname']=$request->stateShortname;
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
                        $res=$this->Model_Db->update(7,$insert,"id",$request->txtid);
                        if($res!=false){
                            $data['message']="Update successful.";
                            $data['status']=true;
                        }else{
                            $data['message']="Update failed.";
                            $data['status']=false;
                        }
                    }else if($request->txtid==0){
                       $where="statename='$request->statename'";
                       $duplicate_check=$this->Model_Db->select(7,null,$where);
                       if($duplicate_check!=false){
                           $data['message']="Duplicate Entry";
                           $data['status']=false;
                           $data['flag']=0;
                       }else{
                           $insert[0]['entryby']=$this->session->login['userid'];
                           $insert[0]['createdat']=date("Y-m-d H:i:s");
                           $res=$this->Model_Db->insert(7,$insert);
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
    public function load_state(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(7,null,$where);
            $data[]="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->statename</option>";
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
    public function report_state(){
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
                        $data['message']="ID not found";
                        $data['status']=false;
                        $data['error']=true;
                        exit();
                }
            }
            $res=$this->Model_Db->select(7,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]=array(
                        'id'=>$r->id,
                        'statename'=>$r->statename,
                        'stateshortname'=>$r->stateshortname,
                        'creationdate'=>$r->createdat,
                        'lastmodifiedon'=>$r->updatedat,
                        'isactive'=>$r->isactive
                    );
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
    public function load_districtwise_state(){
        try{
            $data=array();
            $where="isactive=true";
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            if(isset($request->distid) && is_numeric($request->distid) && $request->distid>0){
                $where.=" and id=$request->distid";
            }else{
                $data['message']="Bad request.";
                $data['status']=false;
                echo json_encode($data);
                exit();
            }
            $res=$this->Model_Db->select(9,null,$where);
//            $data[]="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->stateid</option>";
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
    public function stateViewDetails(){
        extract($_POST);
//        print_r($_POST);
        $where="id=$id";
        $data['result']=$this->Model_Db->select(7,null,$where);
        $this->load->view("State/viewDetails",$data);
    }
}
