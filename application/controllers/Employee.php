<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
header("Access-Control-Allow-Origin: *");
class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create_employee_basic_details(){
        try{
            extract($_POST);
            print_r($_POST);
            $data=array();
            $insert=array();
            $status=true;
            if(isset($txtSlno) && is_numeric($txtSlno)){
                $insert[0]['empslno']=$txtSlno;
            }else{
                $status=false;
                $data['data']="Seriel no error";
            }
            if(isset($txtFname) && preg_match("/[a-zA-Z ]{2,80}/",$txtFname)){
                $insert[0]['empfirstname']=$txtFname;
            }else{
                $status=false;
                $data['data']="First name error";
            }
            if(isset($txtMname) && preg_match("/[a-zA-Z ]{2,80}/",$txtMname)){
                $insert[0]['empmiddlename']=$txtMname;
            }else{
                $status=false;
                $data['data']="Middle name error";
            }
            if(isset($txtLname) && preg_match("/[a-zA-Z ]{2,80}/",$txtLname)){
                $insert[0]['emplastname']=$txtLname;
            }else{
                $status=false;
                $data['data']="Last name error";
            }
            if(isset($cboGenderid) && is_numeric($cboGenderid)){
                $insert[0]['empgenderid']=$cboGenderid;
            }else{
                $status=false;
                $data['data']="Gender error";
            }
            if(isset($txtDob) && preg_match("/[0-9]{2}+\-[0-9]{2}+\-[0-9]{4}/",$txtDob)){
                $dob=date("Y-m-d",strtotime($txtDob));
                $insert[0]['empdob']=$dob;
            }else{
                $status=false;
                $data['data']="Employee date of birth error";
            }
//            if(isset($txtDoj) && preg_match("/[0-9-]{4}+\-[0-9-]{2}+\-[0-9]{2}/",$txtDoj)){
            if(isset($txtDoj) && preg_match("/[0-9]{2}+\-[0-9]{2}+\-[0-9]{4}/",$txtDoj)){
                $doj=date("Y-m-d",strtotime($txtDoj));
                $insert_record[0]['empdoj']=$doj;
            }else{
                echo $insert_record[0]['empdoj']=$txtDoj;
                $status=false;
                $data['data']="Employee date of joining error";
            }
            if(isset($cboMaritalstatusid) && is_numeric($cboMaritalstatusid)){
                $insert[0]['empmaritalstatusid']=$cboMaritalstatusid;
            }else{
                $status=false;
                $data['data']="Marital status error";
            }
            if(isset($txtFathername) && preg_match("/[a-zA-Z ]{2,80}/",$txtFathername)){
                $insert[0]['empfathername']=$txtFathername;
            }else{
                $status=false;
                $data['data']="Father name error";
            }
            if(isset($txtMothername) && preg_match("/[a-zA-Z ]{2,80}/",$txtMothername)){
                $insert[0]['empmothername']=$txtMothername;
            }else{
                $status=false;
                $data['data']="Mother name error";
            }
            if(isset($txtSpousename) && preg_match("/[a-zA-Z ]{2,80}/",$txtSpousename)){
                $insert[0]['empspousename']=$txtSpousename;
            }else{
                $status=false;
                $data['data']="Spouse name error";
            }
            if(isset($cboDepartmentmappingid) && is_numeric($cboDepartmentmappingid)){
                $insert[0]['empdepmappingid']=$cboDepartmentmappingid;
            }else{
                $status=false;
                $data['data']="Department error";
            }
            if(isset($cboDesignationid) && is_numeric($cboDesignationid)){
                $insert[0]['empdesid']=$cboDesignationid;
            }else{
                $status=false;
                $data['data']="Designation error";
            }
            if($status){
                $insert[0]['entryby']=$this->session->login['userid'];
                $insert[0]['createdat']=date("Y-m-d H:i:s");
                $res=$this->Model_Db->insert(93,$insert);
                if($res!=false){
                    $data['message']="successful";
                    $data['data']="Data insert successful";
                    $data['status']=true;
                    $this->create_employee_communication($res);
                }else{
                    $data['message']="Insert failed.";
                    $data['data']="Data Insert failed.";
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
    public function create_employee_communication($empid){
        try{
            extract($_POST);
            $data=array();
            $insert=array();
            $status=true;
            if(isset($empid)&& $empid!=null){
                $insert[0]['empid']=$empid;
            }else{
                $status=false;
                $data['data']="Employee id not found";
            }

            if(isset($txtMobile) && preg_match("/[6-9]{1}[0-9]{9}/",$txtMobile)){
                $insert[0]['empcontact']=$txtMobile;
            }else{
                $status=false;
                $data['data']="Employee contact error";
            }
            if(isset($txtEmailid) && preg_match("/[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}/",$txtEmailid)){
                $insert[0]['empemail']=$txtEmailid;
            }
            if(isset($paddress)){
                $insert[0]['empaddress']=$paddress;
            }else{
                $status=false;
                $data['data']="Employee address error";
            }
            if($status){
                $insert[0]['entryby']=$this->session->login['userid'];
                $insert[0]['createdat']=date("Y-m-d H:i:s");
                $res=$this->Model_Db->insert(95,$insert);
                if($res!=false){
                    $data['message']="Successful";
                    $data['data']="Data insert successful";
                    $data['status']=true;
                    $this->create_employee_experience($empid);
                }else{
                    $data['message']="Insert failed.";
                    $data['data']="Data Insert failed.";
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
    public function create_employee_experience($empid){
        try{
            extract($_POST);
            $data=array();
            $insert=array();
            $status=true;
            if(isset($empid) && is_numeric($empid)){
                $insert[0]['empid']=$empid;
            }else{
                $status=false;
                $data['data']="Employee id not found";
            }
            if(isset($cboCompanyname) && preg_match("/[a-zA-Z ]{2,80}/",$cboCompanyname)){
                $insert[0]['companyname']=$cboCompanyname;
            }else{
                $status=false;
                $data['data']="Company name error";
            }
            if(isset($txtFromdate) && preg_match("/[0-9-]{10}/",$txtFromdate)){
                $fromdate=date("Y-m-d",strtotime($txtFromdate));
                $insert[0]['fromdate']=$fromdate;
            }else{
                $status=false;
                $data['data']="Employee from-date error";
            }
            if(isset($txtTodate) && preg_match("/[0-9-]{10}/",$txtTodate)){
                $todate=date("Y-m-d",strtotime($txtTodate));
                $insert[0]['todate']=$todate;
            }else{
                $status=false;
                $data['data']="Employee to-date error";
            }
            if(isset($cboJobdesignation) && is_numeric($cboJobdesignation)){
                $insert[0]['jobdesid']=$cboJobdesignation;
            }else{
                $status=false;
                $data['data']="Employee job designation error";
            }
            if(isset($txtJobrole) && preg_match("/[a-zA-Z ]{2,80}/",$txtJobrole)){
                $insert[0]['jobrole']=$txtJobrole;
            }else{
                $status=false;
                $data['data']="Employee job role error";
            }
            if($status){
                $insert[0]['entryby']=$this->session->login['userid'];
                $insert[0]['createdat']=date("Y-m-d H:i:s");
                $res=$this->Model_Db->insert(99,$insert);
                if($res!=false){
                    $data['message']="Successful";
                    $data['data']="Data insert successful";
                    $data['status']=true;
                    $this->create_employee_qualification($empid);
                }else{
                    $data['message']="Insert failed.";
                    $data['data']="Data Insert failed.";
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
    public function create_employee_qualification($empid){
        try{
            extract($_POST);
            $data=array();
            $insert=array();
            $status=true;
            if(isset($empid) && is_numeric($empid)){
                if(isset($cboEducationid) && is_array($cboEducationid)){
                    $i=0;
                   foreach ($cboEducationid as $cboedu){
                       $insert []= array(
                           'empid'=>$empid,
                           'empeduid'=>$cboedu,
                           'empedustream'=>$txtEducationstream[$i],
                           'empeduboard'=>$txtBoard[$i],
                           'empregdno'=>$txtRegdno[$i],
                           'emppercentage'=>$txtPercentage[$i],
                           'entryby'=>$this->session->login['userid'],
                           'createdat'=>date("Y-m-d H:i:s")
                       );
                       $i++;
                   }
            }else{
                    $status=false;
                    $data['data']="Employee education id error";
                }
            }else{
                $status=false;
                $data['data']="Employee id not found";
            }

            if($status){
//                $insert[0]['createdat']=date("Y-m-d H:i:s");
                $res=$this->Model_Db->insert(97,$insert);
                if($res!=false){
                    $data['message']="Successful";
                    $data['data']="Data insert successful";
                    $data['status']=true;
                }else{
                    $data['message']="Insert failed.";
                    $data['data']="Data Insert failed.";
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

public function employee_report($checkparams=null){
    $data=array();
//    $request = json_decode(json_encode($_POST), FALSE);
//    $postdata = file_get_contents("php://input");
    extract($_POST);
    $current_date= Date('Y-m-d');
    if(isset($checkparams) && is_numeric($checkparams)) {
        switch ($checkparams) {
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
        $res = $this->Model_Db->select(93, null, $where);
        echo"<pre>";
        print_r($res);
        if ($res != false) {
            $where="isactive=true";
            $maritalstatus=$this->Model_Db->select(19, null, $where);
            $gender=$this->Model_Db->select(17, null, $where);
            $designation=$this->Model_Db->select(25, null, $where);
            $department=$this->Model_Db->select(28, null, $where);
            $i=0;
            $arr=array();
            foreach ($res as $r) {
                $arr[]=$r->id;
                $data[$i] = array(
                    'id' => $r->id,
                    'slno' => $r->empslno,
                    'firstname' => $r->empfirstname,
                    'middlename' => $r->empmiddlename,
                    'lastname' => $r->emplastname,
                    'doj' => $r->empdoj,
                    'dob' => $r->empdob,
                    'fathername' => $r->empfathername,
                    'mothername' => $r->empmothername,
                    'spousename' => $r->empspousename
                );
                foreach ($maritalstatus as $mrs) {
                    if($r->empmaritalstatusid==$mrs->id){
                        $data[$i]['maritalstatusid']=$mrs->id;
                        $data[$i]['maritalstatusname']=$mrs->statusname;
                    }
                }
                foreach ($gender as $gnd) {
                    if($r->empgenderid==$gnd->id){
                        $data[$i]['genderid']=$gnd->id;
                        $data[$i]['gendername']=$gnd->gendername;
                    }
                }
                foreach ($designation as $desgn) {
                    if($r->empdesid==$desgn->id){
                        $data[$i]['designationid']=$desgn->id;
                        $data[$i]['designationname']=$desgn->designationname;
                    }

                }
                foreach ($department as $dept) {
                    if($r->empdesid==$dept->id){
                        $data[$i]['departmentid']=$dept->id;
                        $data[$i]['departmentname']=$dept->departmentname;
                    }

                }
            }
            $ids=implode(",",$arr);
            $where_ids="empid in ($ids) and isactive=true";
        }
    }
 }
}

