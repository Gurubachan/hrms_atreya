<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Create extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function create_user(){
        try{
//            extract($_POST);
            $data=array();
            $insert=array();
			$postdata = file_get_contents("php://input");
			$request = json_decode($postdata);
			print_r($request);
            $status=true;
            if(isset($request->usertype) && is_numeric($request->usertype)){
                $insert[0]['usertypeid']=$request->usertype;
            }else{
                $status=false;
            }
            if(isset($request->name) && preg_match("/[a-zA-Z ]{5,60}/",$request->name)){
                $insert[0]['name']=$request->name;
            }else{
                $status=false;
            }
            if(isset($request->username) && preg_match("/[a-zA-Z _@.]{5,15}/",$request->username)){
                $insert[0]['name']=$request->username;
            }else{
                $status=false;
            }
            if(isset($request->usermail) && preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$request->usermail)){
                $insert[0]['emailid']=$request->usermail;
            }else{
                $status=false;
            }
            if(isset($request->usermobile) && preg_match("/^[6,7,8,9]{1}+[0-9]{9}$/",$request->usermobile)){
                $insert[0]['mobile']=$request->usermobile;
            }else{
                $status=false;
            }
            if(isset($request->userdob) && preg_match("/^[0-9/]{10}$/",$request->userdob)){
                $dob=date("Y-m-d",strtotime($request->userdob));
                $insert[0]['dob']=$dob;
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
						$res=$this->Model_Db->update(3,$insert,"id",$request->txtid);
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
						$res=$this->Model_Db->insert(3,$insert);
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
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
    public function load_user(){
        try{
            $data=array();
			$postdata = file_get_contents("php://input");
			$request = json_decode($postdata);
            $where="isactive=true";
            if(isset($request->typeid) && is_numeric($request->typeid) && $request->typeid>0){
                $where.=" and usertypeid=$request->typeid";
            }else{
                $data['message']="Bad request.";
                $data['status']=false;
                echo json_encode($data);
                exit();
            }
            $res=$this->Model_Db->select(3,null,$where);
            $data[]="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->name</option>";
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
    public function report_user(){
        try{
            $data=array();
			$postdata = file_get_contents("php://input");
			$request = json_decode($postdata);
			if(isset($request->onlyactive) && is_numeric($request->onlyactive)){
				$where="isactive=true";
			}else{
				$where="1=1";
			}
            $res=$this->Model_Db->select(3,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]=array(
                        'id'=>$r->id,
                        'usertypeid'=>$r->usertypeid,
                        'name'=>$r->name,
                        'emailid'=>$r->emailid,
                        'mobile'=>$r->mobile,
                        'dob'=>$r->dob,
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
