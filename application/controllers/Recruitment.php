<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Recruitment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function create_new_recruitment(){
        try{
            extract($_POST);
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            if(isset($request->fname) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->fname)){
                $insert[0]['fname']=$request->fname;
            }else{
//                $status=false;
                echo $insert[0]['fname']="";
            }
            if(isset($request->mname) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->mname)){
                $insert[0]['mname']=$request->mname;
            }else{
//                $status=false;
                echo $insert[0]['mname']="";
            }
            if(isset($request->lname) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->lname)){
                $insert[0]['lname']=$request->lname;
            }else{
//                $status=false;
                echo $insert[0]['lname']="";
            }
            if(isset($request->dob) && preg_match("/^[0-9-]{10}$/",$request->dob)){
                $dob=date("Y-m-d",strtotime($request->dob));
                $insert[0]['dob']=$dob;
            }else{
//                $status=false;
                echo $insert[0]['dob']="";
            }
            if(isset($request->fathername) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->fathername)){
                $insert[0]['fathername']=$request->fathername;
            }else{
//                $status=false;
                echo $insert[0]['fathername']="";
            }
            if(isset($request->mothername) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->mothername)){
                $insert[0]['mothername']=$request->mothername;
            }else{
//                $status=false;
                echo $insert[0]['mothername']="";
            }
            if(isset($request->spousename) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->spousename)){
                $insert[0]['spousename']=$request->spousename;
            }else{
//                $status=false;
                echo $insert[0]['spousename']="";
            }
            if(isset($request->genderid) && is_numeric($request->genderid)){
                $insert[0]['genderid']=$request->genderid;
            }else{
//                $status=false;
                echo $insert[0]['genderid']="";
            }
            if(isset($request->maritalstatusid) && is_numeric($request->maritalstatusid)){
                $insert[0]['maritalstatusid']=$request->maritalstatusid;
            }else{
//                $status=false;
                echo $insert[0]['maritalstatusid']="";
            }
            if(isset($request->religionid) && is_numeric($request->religionid)){
                $insert[0]['religionid']=$request->religionid;
            }else{
//                $status=false;
                echo $insert[0]['religionid']="";
            }
            if(isset($request->mobile) && preg_match("/[6,7,8,9]{1}+[0-9]{9}/",$request->mobile)){
                $insert[0]['contact']=$request->mobile;
            }else{
                $status=false;
            }
            if(isset($request->altmobile) && preg_match("/[6,7,8,9]{1}+[0-9]{9}/",$request->altmobile)){
                $insert[0]['altcontact']=$request->altmobile;
            }else{
                $status=false;
            }
            if(isset($request->whatsappnumber) && preg_match("/[6,7,8,9]{1}+[0-9]{9}/",$request->whatsappnumber)){
                $insert[0]['whatsapp']=$request->whatsappnumber;
            }else{
                $status=false;
            }
            if(isset($request->emailid) && preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$request->emailid)){
                $insert[0]['email']=$request->emailid;
            }else{
                echo $insert[0]['email']="";
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
                        $res=$this->Model_Db->update(53,$insert,"id",$request->txtid);
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
                        $res=$this->Model_Db->insert(53,$insert);
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
    public function load_recruitment(){
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
    public function report_recruitment(){
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
}
