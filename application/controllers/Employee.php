<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Employee extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function create_employee_type(){
        try{
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            if(isset($request->typename) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->typename)){
                $insert[0]['typename']=$request->typename;
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
                        $res=$this->Model_Db->update(15,$insert,"id",$request->txtid);
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
                        $res=$this->Model_Db->insert(15,$insert);
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
    public function load_employee_type(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(15,null,$where);
            $data[]="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->typename</option>";
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
    public function report_employee_type(){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date = Date('Y-m-d');
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
            $res=$this->Model_Db->select(15,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]=array(
                        'id'=>$r->id,
                        'typename'=>$r->typename,
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
    public function create_employee(){
        try{
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
//            print_r($request);
//            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            if(isset($request->slno) && preg_match("/^[0-9]{0,20}$/",$request->slno)){
                $insert[0]['slno']=$request->slno;
            }else{
                $status=false;
            }
            if(isset($request->departmentmappingid) && is_numeric($request->departmentmappingid)){
                $insert[0]['departmentmappingid']=$request->departmentmappingid;
            }else{
                $status=false;
            }
            if(isset($request->designationid) && is_numeric($request->designationid)){
                $insert[0]['designationid']=$request->designationid;
            }else{
                $status=false;
            }
            if(isset($request->doj) && preg_match("/[0-9-]{10}/",$request->doj)){
                $insert[0]['doj']=$request->doj;
            }else{
                $status=false;
            }
            if(isset($request->dol) && preg_match("/[0-9-]{10}/",$request->dol)){
                $insert[0]['dol']=$request->dol;
            }else{
                $insert[0]['dol']=null;
            }
            if(isset($request->empid) && preg_match("/^[a-zA-Z0-9]{0,20}$/",$request->empid)){
                $insert[0]['empid']=$request->empid;
            }else{
                $insert[0]['empid']="";
            }
            if(isset($request->fname) && preg_match("/^[a-zA-Z ]{0,20}$/",$request->fname)){
                $insert[0]['fname']=$request->fname;
            }else{
                $status=false;
            }
            if(isset($request->mname) && preg_match("/^[a-zA-Z ]{0,20}$/",$request->mname)){
                $insert[0]['mname']=$request->mname;
            }else{
                $insert[0]['mname']="";
            }
            if(isset($request->genderid) && is_numeric($request->genderid)){
                $insert[0]['genderid']=$request->genderid;
            }else{
                $status=false;
            }
            if(isset($request->lname) && preg_match("/^[a-zA-Z ]{0,20}$/",$request->lname)){
                $insert[0]['lname']=$request->lname;
            }else{
                $insert[0]['lname']="";
            }
            if(isset($request->mobile) && preg_match("/[6,7,8,9]{1}+[0-9]{9}/",$request->mobile)){
                $insert[0]['mobile']=$request->mobile;
            }else{
                $status=false;
            }
            if(isset($request->emailid) && preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$request->emailid)){
                $insert[0]['emailid']=$request->emailid;
            }else{
                $insert[0]['emailid']="";
            }
            if(isset($request->fathername) && preg_match("/[a-zA-Z ]{0,60}/",$request->fathername)){
                $insert[0]['fathername']=$request->fathername;
            }else{
                $insert[0]['fathername']="";
            }
            if(isset($request->mothername) && preg_match("/[a-zA-Z ]{0,60}/",$request->mothername)){
                $insert[0]['mothername']=$request->mothername;
            }else{
                $insert[0]['mothername']="";
            }
            if(isset($request->maritalstatusid) && is_numeric($request->maritalstatusid)){
                $insert[0]['maritalstatusid']=$request->maritalstatusid;
            }else{
                $insert[0]['maritalstatusid']=null;
            }
            if(isset($request->spousename) && preg_match("/[a-zA-Z ]{0,60}/",$request->spousename)){
                $insert[0]['spousename']=$request->spousename;
            }else{
                $insert[0]['spousename']="";
            }
            if(isset($request->educationid) && is_numeric($request->educationid)){
                $insert[0]['educationid']=$request->educationid;
            }else{
                $status=false;
            }
            if(isset($request->address) && preg_match("/[a-zA-Z ()-:,]{5,60}/",$request->address)){
                $insert[0]['address']=$request->address;
            }else{
                $status=false;
            }
            if(isset($request->distid) && is_numeric($request->distid)){
                $insert[0]['districtid']=$request->distid;
            }else{
                $status=false;
            }
            if(isset($request->dob) && preg_match("/[0-9-]{10}/",$request->dob)){
                $insert[0]['dob']=$request->dob;
            }else{
                $status=false;
            }
            if(isset($request->epfno) && is_numeric($request->epfno)){
                $insert[0]['epfno']=$request->epfno;
            }else{
                $insert[0]['epfno']="";
            }
            if(isset($request->esifno) && is_numeric($request->esifno)){
                $insert[0]['esifno']=$request->esifno;
            }else{
                $insert[0]['esifno']="";
            }
            if(isset($request->panno) && preg_match("/[A-Z0-9]{0,60}/",$request->panno)){
                $insert[0]['panno']=$request->panno;
            }else{
                $insert[0]['panno']="";
            }
            if(isset($request->aadharno) && is_numeric($request->aadharno)){
                $insert[0]['aadharno']=$request->aadharno;
            }else{
                $insert[0]['aadharno']='';
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
//            print_r($status);
            if($status){
                if(isset($request->txtid) && is_numeric($request->txtid)){
                    if($request->txtid>0){
                        $insert[0]['updatedby']=$this->session->login['userid'];
                        $insert[0]['updatedat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->update(29,$insert,"id",$request->txtid);
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
                        $res=$this->Model_Db->insert(29,$insert);
                        if($res!=false){
                            $data['message']="Insert successful.";
                            $data['status']=true;
                        }else{
                            $data['message']="Insert failed.";
                            $data['status']=false;
                        }
                    }else{
                        $data['message']="Insufficient/*Invalid data.";
                        $data['status']=false;
                    }
                }else{
                    $data['message']="Insufficient/&Invalid data.";
                    $data['status']=false;
                }
            }else{
                $data['message']="Insufficient/^Invalid data.";
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
    public function load_employee(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(31,null,$where);
            $data[]="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->fname"."&nbsp;"."$r->mname"."&nbsp;"."$r->lname</option>";
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
    public function report_employee(){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date= Date('Y-m-d');
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
                $res = $this->Model_Db->select(29, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'slno' => $r->slno,
                            'departmentmappingid' => $r->departmentmappingid,
                            'designationid' => $r->designationid,
                            'doj' => $r->doj,
                            'dol' => $r->dol,
                            'empid' => $r->empid,
                            'fname' => $r->fname,
                            'mname' => $r->mname,
                            'lname' => $r->lname,
                            'genderid' => $r->genderid,
                            'mobile' => $r->mobile,
                            'emailid' => $r->emailid,
                            'fathername' => $r->fathername,
                            'mothername' => $r->mothername,
                            'maritalstatusid' => $r->maritalstatusid,
                            'spousename' => $r->spousename,
                            'educationid' => $r->educationid,
                            'address' => $r->address,
                            'districtid' => $r->districtid,
                            'dob' => $r->dob,
                            'epfno' => $r->epfno,
                            'esifno' => $r->esifno,
                            'panno' => $r->panno,
                            'aadharno' => $r->aadharno,
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
    public function report_temp_employee(){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date= Date('Y-m-d');
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
                $res = $this->Model_Db->select(30, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'slno' => $r->slno,
                            'departmentmappingid' => $r->departmentmappingid,
                            'designationid' => $r->designationid,
                            'doj' => $r->doj,
                            'dol' => $r->dol,
                            'empid' => $r->empid,
                            'fname' => $r->fname,
                            'mname' => $r->mname,
                            'lname' => $r->lname,
                            'genderid' => $r->genderid,
                            'mobile' => $r->mobile,
                            'emailid' => $r->emailid,
                            'fathername' => $r->fathername,
                            'mothername' => $r->mothername,
                            'maritalstatusid' => $r->maritalstatusid,
                            'spousename' => $r->spousename,
                            'educationid' => $r->educationid,
                            'address' => $r->address,
                            'districtid' => $r->districtid,
                            'dob' => $r->dob,
                            'epfno' => $r->epfno,
                            'esifno' => $r->esifno,
                            'panno' => $r->panno,
                            'aadharno' => $r->aadharno,
                            'creationdate' => $r->createdat,
                            'lastmodifiedon' => $r->updatedat,
                            'isactive' => $r->isactive,
                            'departmentname' => $r->departmentname,
                            'designationname' =>$r->designationname,
                            'gendername'=>$r->gendername,
                            'maritalstatusname' =>$r->statusname,
                            'distname'=>$r->distname,
                            'educationname'=>$r->educationname
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
    public function employee_bank_details(){
        try{
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            if(isset($request->employeename) && is_numeric($request->employeename)){
                $insert[0]['empid']=$request->employeename;
            }else{
                $status=false;
            }
            if(isset($request->employeebankname) && is_numeric($request->employeebankname)){
                $insert[0]['bankid']=$request->employeebankname;
            }else{
                $status=false;
            }
            if(isset($request->bankaccountnumber) && is_numeric($request->bankaccountnumber)){
                $insert[0]['acno']=$request->bankaccountnumber;
            }else{
                $status=false;
            }
            if(isset($request->bankifscnumber) && preg_match("/^[A-Z0-9]{12}$/",$request->bankifscnumber)){
                $insert[0]['ifsccode']=$request->bankifscnumber;
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
                        $res=$this->Model_Db->update(35,$insert,"id",$request->txtid);
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
                        $res=$this->Model_Db->insert(35,$insert);
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
    public function report_employee_bank_details(){
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
            $res=$this->Model_Db->select(35,null,$where);
            if($res!=false){
                foreach ($res as $r){
                    $data[]=array(
                        'id'=>$r->id,
                        'empid'=>$r->empid,
                        'bankid'=>$r->bankid,
                        'acno'=>$r->acno,
                        'ifsccode'=>$r->ifsccode,
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
    public function insert_into_tbl_employee_form_tbl_temp_employee(){
        try{


        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
}
