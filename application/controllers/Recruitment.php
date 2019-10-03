<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Recruitment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public $apid;
    public $txtid;
    public function createBasicDetails(){
        try{
            global $apid;
            global $txtid;
            extract($_POST);
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
//            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            $token=array();
            if(isset($request->fname) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->fname)){
                $insert[0]['fname']=$request->fname;
            }else{
                $status=false;
//                echo $insert[0]['fname']="";
                $token[0]=1;
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
                $status=false;
//                echo $insert[0]['lname']="";
                $token[0]=2;
            }
            if(isset($request->dob) && preg_match("/^[0-9-]{10}$/",$request->dob)){
                $dob=date("Y-m-d",strtotime($request->dob));
                $insert[0]['dob']=$dob;
            }else{
                $status=false;
//                echo $insert[0]['dob']="";
                $token[0]=3;
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
                $status=false;
//                echo $insert[0]['genderid']="";
                $token[0]=4;
            }
            if(isset($request->maritalstatusid) && is_numeric($request->maritalstatusid)){
                $insert[0]['maritalstatusid']=$request->maritalstatusid;
            }else{
                $status=false;
//                echo $insert[0]['maritalstatusid']="";
                $token[0]=5;
            }
            if(isset($request->religionid) && is_numeric($request->religionid)){
                $insert[0]['religionid']=$request->religionid;
            }else{
                $status=false;
//                echo $insert[0]['religionid']="";
                $token[0]=6;
            }
            if(isset($request->mobile) && preg_match("/[6,7,8,9]{1}+[0-9]{9}/",$request->mobile)){
                $insert[0]['contact']=$request->mobile;
            }else{
                $status=false;
                $token[0]=7;
            }
            if(isset($request->altmobile) && preg_match("/[6,7,8,9]{1}+[0-9]{9}/",$request->altmobile)){
                $insert[0]['altcontact']=$request->altmobile;
            }else{
//                $status=false;
                $insert[0]['altcontact']="";
            }
            if(isset($request->whatsappnumber) && preg_match("/[6,7,8,9]{1}+[0-9]{9}/",$request->whatsappnumber)){
                $insert[0]['whatsapp']=$request->whatsappnumber;
            }else{
                $status=false;
                $token[0]=8;
            }
            if(isset($request->emailid) && preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$request->emailid)){
                $insert[0]['email']=$request->emailid;
            }else{
//                echo $insert[0]['email']="";
                $status=false;
                $token[0]=9;
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
                            $data['apid']=$request->txtid;
                            $data['txtid']=1;
                        }else{
                            $data['message']="Update failed.";
                            $data['status']=false;
                        }
                    }else if($request->txtid==0){
                        $insert[0]['entryby']=$this->session->login['userid'];
                        $insert[0]['createdat']=date("Y-m-d H:i:s");
                        $apid = $this->Model_Db->insert(53,$insert);
                        if($apid!=false){
                            $data['message']="Insert successful.";
                            $data['status']=true;
                            $data['apid']=$apid;
                            $data['txtid']=0;
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
                $data['token']=$token[0];
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
    public function createAddressDetails($apid){
        try{
            extract($_POST);
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            $token=array();
            if(isset($request->applicantAt) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->applicantAt)){
                $insert[0]['at']=$request->applicantAt;
            }else{
                $status=false;
//                echo $insert[0]['at']=$request->applicantAt;
                $token[0]=10;
            }
            if(isset($request->applicantPo) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->applicantPo)){
                $insert[0]['po']=$request->applicantPo;
            }else{
                $status=false;
//                echo $insert[0]['po']=$request->applicantPo;
                $token[0]=11;
            }
            if(isset($request->applicantPs) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->applicantPs)){
                $insert[0]['ps']=$request->applicantPs;
            }else{
                $status=false;
//                echo $insert[0]['ps']=$request->applicantPs;
                $token[0]=12;
            }
            if(isset($request->applicantLandmark) && preg_match("/^[a-zA-Z0-9- ]{0,25}$/",$request->applicantLandmark)){
                $insert[0]['landmark']=$request->applicantLandmark;
            }else{
//                $status=false;
                echo $insert[0]['landmark']=$request->applicantLandmark;
            }
            if(isset($request->stateid) && preg_match("/^[0-9]{0,20}$/",$request->stateid)){
                $insert[0]['state']=$request->stateid;
            }else{
                $status=false;
//                echo $insert[0]['state']=$request->stateid;
            }
            if(isset($request->distid) && preg_match("/^[0-9]{0,20}$/",$request->distid)){
                $insert[0]['dist']=$request->distid;
            }else{
                $status=false;
//                echo $insert[0]['dist']=$request->distid;
            }
            if(isset($request->applicantPincode) && preg_match("/^[0-9]{6}$/",$request->applicantPincode)){
                $insert[0]['pincode']=$request->applicantPincode;
            }else{
                $status=false;
//                echo $insert[0]['pincode']=$request->applicantPincode;
                $token[0]=13;
            }
            if(isset($request->communicationtypeid) && is_numeric($request->communicationtypeid)){
                $insert[0]['commtid']=$request->communicationtypeid;
            }else{
                $status=false;
//                echo $insert[0]['commtid']=$request->communicationtypeid;
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
                        $res=$this->Model_Db->update(55,$insert,"apid",$apid);
//                        $id = $this->Model_Db->select(55,"apid",$where);
                        if($res!=false){
                            $data['message']="Update successful.";
                            $data['status']=true;
                            $data['txtid']=1;
//                            $data['apid']=$id;
                        }else{
                            $data['message']="Update failed.";
                            $data['status']=false;
                        }
                    }else if($request->txtid==0){
                        $insert[0]['apid']=$apid;
                        $insert[0]['entryby']=$this->session->login['userid'];
                        $insert[0]['createdat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->insert(55,$insert);
                        if($res!=false){
                            $data['message']="Insert successful.";
                            $data['status']=true;
                            $data['txtid']=0;
                        }else{
                            $data['message']="Insert failed.";
                            $data['status']=false;
                        }
                    }else{
                        $data['message']="Insufficient/^Invalid data.";
                        $data['status']=false;
                    }
                }else{
                    $data['message']="Insufficient/&Invalid data.";
                    $data['status']=false;
                }
            }else{
                $data['message']="Insufficient/*Invalid data.";
                $data['status']=false;
                $data['token']=$token[0];
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
    public function createEducationalDetails($apid){
        try{
            extract($_POST);
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            $token=array();
            if(isset($request->applicantInstitue) && preg_match("/^[a-zA-Z ]{0,60}$/",$request->applicantInstitue)){
                $insert[0]['orgname']=$request->applicantInstitue;
            }else{
                $status=false;
//                echo $insert[0]['orgname']=$request->applicantInstitue;
                $token[0]=14;
            }
            if(isset($request->applicantBoard) && preg_match("/^[a-zA-Z ]{0,30}$/",$request->applicantBoard)){
                $insert[0]['board']=$request->applicantBoard;
            }else{
                $status=false;
//                echo $insert[0]['board']=$request->applicantBoard;
                $token[0]=15;
            }
            if(isset($request->applicantExam) && preg_match("/^[a-zA-Z ]{0,20}$/",$request->applicantExam)){
                $insert[0]['examname']=$request->applicantExam;
            }else{
                $status=false;
//                echo $insert[0]['examname']=$request->applicantExam;
                $token[0]=16;
            }
            if(isset($request->applicantPassingYear) && preg_match("/^[0-9]{0,4}$/",$request->applicantPassingYear)){
                $insert[0]['yop']=$request->applicantPassingYear;
            }else{
                $status=false;
//                echo $insert[0]['yop']=$request->applicantPassingYear;
                $token[0]=17;
            }
            if(isset($request->applicantTotalMark) && preg_match("/^[0-9]{0,4}$/",$request->applicantTotalMark)){
                $insert[0]['totalmark']=$request->applicantTotalMark;
            }else{
                $status=false;
//                echo $insert[0]['totalmark']=$request->applicantTotalMark;
                $token[0]=18;
            }
            if(isset($request->applicantSecuredMark) && preg_match("/^[0-9]{0,4}$/",$request->applicantSecuredMark)){
                $insert[0]['securedmark']=$request->applicantSecuredMark;
            }else{
                $status=false;
//                echo $insert[0]['securedmark']=$request->applicantSecuredMark;
                $token[0]=19;
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
                        $res=$this->Model_Db->update(57,$insert,"apid",$apid);
                        if($res!=false){
                            $data['message']="Update successful.";
                            $data['status']=true;
                            $data['txtid']=1;
//                            $data['apid']=$apid;
                        }else{
                            $data['message']="Update failed.";
                            $data['status']=false;
                        }
                    }else if($request->txtid==0){
                        $insert[0]['apid']=$apid;
                        $insert[0]['entryby']=$this->session->login['userid'];
                        $insert[0]['createdat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->insert(57,$insert);
                        if($res!=false){
                            $data['message']="Insert successful.";
                            $data['status']=true;
                            $data['txtid']=0;
                        }else{
                            $data['message']="Insert failed.";
                            $data['status']=false;
                        }
                    }else{
                        $data['message']="Insufficient/^Invalid data.";
                        $data['status']=false;
                    }
                }else{
                    $data['message']="Insufficient/&Invalid data.";
                    $data['status']=false;
                }
            }else{
                $data['message']="Insufficient/*Invalid data.";
                $data['status']=false;
                $data['token']=$token[0];
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
    public function createWorkExperienceDetails($apid){
        try{
            extract($_POST);
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            $token=array();
            if(isset($request->experiencetypeid) && is_numeric($request->experiencetypeid)){
                $insert[0]['etid']=$request->experiencetypeid;
            }else{
                $status=false;
//                echo $insert[0]['etid']=$request->experiencetypeid;
//                $token[0]=20;
            }
            if(isset($request->companyname) && preg_match("/^[a-zA-Z ]{0,60}$/",$request->companyname)){
                $insert[0]['providedby']=$request->companyname;
            }else{
                $status=false;
//                echo $insert[0]['providedby']=$request->companyname;
                $token[0]=21;
            }
            if(isset($request->role) && preg_match("/^[a-zA-Z0-9 ]{0,20}$/",$request->role)){
                $insert[0]['role']=$request->role;
            }else{
                $status=false;
//                echo $insert[0]['role']=$request->role;
                $token[0]=22;
            }
            if(isset($request->doj) && preg_match("/^[0-9-]{10}$/",$request->doj)){
                $doj = date("Y-m-d",strtotime($request->doj));
                $insert[0]['startdate']=$doj;
            }else{
//                $status=false;
                $doj = date("Y-m-d",strtotime($request->doj));
                echo $insert[0]['startdate']=$doj;
            }
            if(isset($request->dol) && preg_match("/^[0-9-]{10}$/",$request->dol)){
//                $insert[0]['enddate']=$request->dol;
                $dol = date("Y-m-d",strtotime($request->dol));
                $insert[0]['enddate']=$dol;
            }else{
//                $status=false;
                $dol = date("Y-m-d",strtotime($request->dol));
                echo $insert[0]['enddate']=$dol;
            }
            if(isset($request->remark) && preg_match("/^[a-zA-Z0-9 ]{0,255}$/",$request->remark)){
                $insert[0]['remark']=$request->remark;
            }else{
//                $status=false;
                echo $insert[0]['remark']=$request->remark;
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
                        $res=$this->Model_Db->update(59,$insert,"apid",$apid);
                        if($res!=false){
                            $data['message']="Update successful.";
                            $data['status']=true;
                            $data['txtid']=1;
//                            $data['apid']=$apid;
                        }else{
                            $data['message']="Update failed.";
                            $data['status']=false;
                        }
                    }else if($request->txtid==0){
                        $insert[0]['apid']=$apid;
                        $insert[0]['entryby']=$this->session->login['userid'];
                        $insert[0]['createdat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->insert(59,$insert);
                        if($res!=false){
                            $data['message']="Insert successful.";
                            $data['status']=true;
                            $data['txtid']=0;
                        }else{
                            $data['message']="Insert failed.";
                            $data['status']=false;
                        }
                    }else{
                        $data['message']="Insufficient/^Invalid data.";
                        $data['status']=false;
                    }
                }else{
                    $data['message']="Insufficient/&Invalid data.";
                    $data['status']=false;
                }
            }else{
                $data['message']="Insufficient/*Invalid data.";
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
            $request= json_decode(json_encode($_POST), false);
//			$postdata = file_get_contents("php://input");
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
                $res = $this->Model_Db->select(54, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'fname' => $r->fname,
                            'mname' => $r->mname,
                            'lname' => $r->lname,
                            'fathername' => $r->fathername,
                            'mothername' => $r->mothername,
                            'spousename'=>$r->spousename,
                            'dob' => $r->dob,
                            'maritalstatus' => $r->maritalstatusid,
                            'statusname'=>$r->statusname,
                            'genderid' => $r->genderid,
                            'gendername'=>$r->gendername,
                            'religionid'=>$r->religionid,
                            'religionname'=>$r->religion,
                            'contact' => $r->contact,
                            'altcontact' => $r->altcontact,
                            'whatsapp' => $r->whatsapp,
                            'email' => $r->email,
                            'at'=>$r->at,
                            'po'=>$r->po,
                            'ps'=>$r->ps,
                            'pincode'=>$r->pincode,
                            'commitid'=>$r->commitid,
                            'ctype'=>$r->ctype,
                            'stateid'=>$r->stateid,
                            'statename'=>$r->statename,
                            'distid'=>$r->distid,
                            'distname'=>$r->distname,
                            'orgname'=>$r->orgname,
                            'boad'=>$r->boad,
                            'examname'=>$r->examname,
                            'yop'=>$r->yop,
                            'totalmark'=>$r->totalmark,
                            'securedmark'=>$r->securedmark,
                            'exetypeid'=>$r->exetypeid,
                            'exetypename'=>$r->exetypename,
                            'companyname'=>$r->companyname,
                            'doj'=>$r->doj,
                            'dol'=>$r->dol,
                            'role'=>$r->role,
                            'remark'=>$r->remark,
                            'entryby'=>$r->entryby,
                            'creationdate'=>$r->createdat,
                            'updatedby' => $r->updatedby,
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
}
