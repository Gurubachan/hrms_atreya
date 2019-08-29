<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class MaritalStatus extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function create_marital_status(){
        try{
            $data=array();
            $insert=array();
//			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $request= json_decode(json_encode($_POST), false);
            $status=true;
            if(isset($request->statusname) && preg_match("/^[a-zA-Z]{3,20}$/",$request->statusname)){
                $insert[0]['statusname']=$request->statusname;
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
                        $res=$this->Model_Db->update(19,$insert,"id",$request->txtid);
                        if($res!=false){
                            $data['message']="Update successful.";
                            $data['status']=true;
                        }else{
                            $data['message']="Update failed.";
                            $data['status']=false;
                        }
                    }else if($request->txtid==0){
                        $insert[0]['entryby']=$this->session->login['userid'];
                        $insert[0]['createdat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->insert(19,$insert);
                        if($res!=false){
                            $data['message']="Insert successful.";
                            $data['status']=true;
                        }else{
                            $data['message']="Insert failed.";
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
            }else{
                $data['message']="Insufficient/Invalid data.";
                $data['status']=false;
            }
            echo json_encode($data);

            exit();
        }catch (Exception $e){
            $data['message']= "Message:".$e->getCode();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
    public function load_marital_status(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(19,null,$where);
            $data[]="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->statusname</option>";
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
    public function report_marital_status(){
        try{
            $data=array();
//			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $request= json_decode(json_encode($_POST), false);
            $current_date=Date('Y-m-d');
//			if(isset($request->onlyactive) && is_numeric($request->onlyactive)){
//				$where="isactive=true";
//			}elseif(isset($request->onlyinactive) && is_numeric($request->onlyinactive)){
//				$where="isactive=false";
//			}elseif(isset($request->onlyrecent) && is_numeric($request->onlyrecent)){
//				$where="DATE(createdat)=DATE('$current_date')";
//			}else{
//				$where="1=1";
//			}
            if(isset($request->checkparams) && is_numeric($request->checkparams)){
                switch ($request->checkparams){
                    case 1:
                        $where="DATE(createdat)=DATE('$current_date')";
                        break;
                    case 2:
                        $where="1=1";
                        break;
                    case 3:
                        $where="isactive=true";
                        break;
                    case 4:
                        $where="isactive=false";
                        break;
                }
            }
            $res=$this->Model_Db->select(19,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]=array(
                        'id'=>$r->id,
                        'statusname'=>$r->statusname,
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
}
