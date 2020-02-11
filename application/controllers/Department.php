<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Department extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function create_department(){
        try{
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            if(isset($request->departmentname) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->departmentname)){
                $insert[0]['departmentname']=$request->departmentname;
            }else{
                $status=false;
            }
            if(isset($request->departmentShortname) && preg_match("/^[a-zA-Z ]{2,5}$/",$request->departmentShortname)){
                $insert[0]['departmentshortname']=$request->departmentShortname;
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
                        $res=$this->Model_Db->update(23,$insert,"id",$request->txtid);
                        if($res!=false){
                            $data['message']="Update successful.";
                            $data['status']=true;
                        }else{
                            $data['message']="Update failed.";
                            $data['status']=false;
                        }
                    }else if($request->txtid==0){
                        $where = "departmentname='$request->departmentname'";
                        $duplicate_entry=$this->Model_Db->select(23,null,$where);
                        if($duplicate_entry!=false){
                            $data['message']='Duplicate entry';
                            $data['status']=false;
                            $data['flag']=0;
                        }else{
                            $insert[0]['entryby']=$this->session->login['userid'];
                            $insert[0]['createdat']=date("Y-m-d H:i:s");
                            $res=$this->Model_Db->insert(23,$insert);
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
    public function load_department(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(23,null,$where);
            $data[]="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->departmentname</option>";
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
    public function report_department(){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date=date("Y-m-d");
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
                $res = $this->Model_Db->select(23, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'departmentname' => $r->departmentname,
                            'departmentshortname' => $r->departmentshortname,
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
    public function create_department_mapping(){
        try{
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
//            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            if(isset($request->departmentid) && is_numeric($request->departmentid)){
                $insert[0]['departmentid']=$request->departmentid;
            }else{
                $status=false;
            }
            if(isset($request->companyid) && is_numeric($request->companyid)){
                $insert[0]['companyid']=$request->companyid;
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
                        $where="departmentid=$request->departmentid and companyid=$request->companyid";
                        $duplicate_entry=$this->Model_Db->select(27,null,$where);
                        if($duplicate_entry!=false){
                            $data['message']="Duplicate entry.";
                            $data['status']=false;
                            $data['flag']=0;
                        }else {
                            $insert[0]['updatedby'] = $this->session->login['userid'];
                            $insert[0]['updatedat'] = date("Y-m-d H:i:s");
                            $res = $this->Model_Db->update(27, $insert, "id", $request->txtid);
                            if ($res != false) {
                                $data['message'] = "Update successful.";
                                $data['status'] = true;
                            } else {
                                $data['message'] = "Update failed.";
                                $data['status'] = false;
                            }
                        }
                    }else if($request->txtid==0){
                        $where="departmentid=$request->departmentid and companyid=$request->companyid";
                        $duplicate_entry=$this->Model_Db->select(27,null,$where);
                        if($duplicate_entry!=false){
                            $data['message']="Duplicate entry.";
                            $data['status']=false;
                            $data['flag']=0;
                        }else{
                            $insert[0]['entryby']=$this->session->login['userid'];
                            $insert[0]['createdat']=date("Y-m-d H:i:s");
                            $res=$this->Model_Db->insert(27,$insert);
                            if($res!=false){
                                $data['message']="Insert successful.";
                                $data['status']=true;
                            }else{
                                $data['message']="Insert failed.";
                                $data['status']=false;
                            }
                        }

                    }else{
                        $data['message']="Insufficient//Invalid data.";
                        $data['status']=false;
                    }
                }else{
                    $data['message']="Insufficient*/Invalid data.";
                    $data['status']=false;
                }
            }else{
                $data['message']="Insufficient&/Invalid data.";
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
    public function report_department_mapping(){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date=date("Y-m-d");
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
                $orderby="departmentname asc";
                $res = $this->Model_Db->select(28, null, $where,$orderby);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'companyid' => $r->companyid,
                            'companyname'=>$r->companyname,
                            'departmentid' => $r->departmentid,
                            'departmentname'=>$r->departmentname,
                            'creationdate' => $r->createdat,
                            'lastmodifiedon' => $r->updatedat,
                            'isactive' => $r->isactive
                        );
                    }
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
    public function load_department_mapping(){
        try{
            $data=array();
            $where="isactive=true";
            $orderby="departmentname asc";
            $res=$this->Model_Db->select(28,null,$where,$orderby);
            $data[]="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->companyname - $r->departmentname</option>";
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
}
