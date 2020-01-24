<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
header("Access-Control-Allow-Origin: *");
class Visitors extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Db');
    }
    public function create_visitorsrecord(){
        try{
//            $request = json_decode(json_encode($_POST), FALSE);
//            print_r($_POST);
            extract($_POST);
            $data=array();
            $insert_list=array();
            $insert_record=array();
            $status=true;
            if(isset($isPresent) ){
                if($isPresent==0){
                    if(isset($txtName) && preg_match("/[a-zA-Z ]{2,50}/",$txtName)){
                        $insert_list[0]['visitorname']=$txtName;
                    }else{
                        $status=false;
                        $data['data']="visitor name error";
                    }
                    if(isset($txtAddress) && preg_match("/[a-zA-Z-: ]{3,60}/",$txtAddress)){
                        $insert_list[0]['visitoraddress']=$txtAddress;
                    }else{
                        $status=false;
                        $data['data']="visitor Address error";
                    }
                    if(isset($txtContact) && preg_match("/[6-9]{1}[0-9]{9}/",$txtContact)){
                        $insert_list[0]['visitorcontact']=$txtContact;
                    }else{
                     $status=false;
                        $data['data']="Visitor Contact error";
                    }
                    if(isset($txtEmail) && preg_match("/[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}/",$txtEmail)){
                        $insert_list[0]['visitoremail']=$txtEmail;
                    }
                    if(isset($cboGender) && is_numeric($cboGender)){
                        $insert_list[0]['genderid']=$cboGender;
                    }else{
                        $status=false;
                        $data['data']="visitor gender error";
                    }
                    if(isset($cboCompany) && is_numeric($cboCompany)){
                        $insert_list[0]['companyid']=$cboCompany;
                    }else{
                        $status=false;
                        $data['data']="visitor company error";
                    }
                    if($status){
//                        $insert[0]['entryby']=$this->session->login['userid'];
                        $insert_list[0]['entryby']=2;
                        $insert_list[0]['createdat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->insert(89,$insert_list);
                        if($res!=false){
                            $insert_record[0]['visitorid']=$res;
                            if(isset($cboCompany) && is_numeric($cboCompany)){
                                $insert_record[0]['companyid']=$cboCompany;
                            }else{
                                $status=false;
                                $data['data']="visitor company error";
                            }
                            if(isset($txtVisitdate) && preg_match("/[0-9-]{4}+\-[0-9-]{2}+\-[0-9]{2}/",$txtVisitdate)){
                                $insert_record[0]['visitdate']=$txtVisitdate;
                            }else{
                                $status=false;
                                $data['data']="visitor date error";
                            }
                            if(isset($txtVisittime) && preg_match("/[0-9:]{8}/",$txtVisittime)){
                                $insert_record[0]['visittime']=$txtVisittime;
                            }else{
                                $status=false;
                                $data['data']="visitor time error";
                            }
                            if(isset($cboPurpose) && is_numeric($cboPurpose)){
                                $insert_record[0]['purposeofvisitid']=$cboPurpose;
                            }else{
                                $status=false;
                                $data['data']="visitor purpose error";
                            }
                            if(isset($cboContactperson) && is_numeric($cboContactperson)){
                                $insert_record[0]['contactpersonid']=$cboContactperson;
                            }else{
                                $status=false;
                                $data['data']="visitor contact person error";
                            }
                            if($status) {
//                        $insert[0]['entryby']=$this->session->login['userid'];
                                $insert_record[0]['entryby'] = 2;
                                $insert_record[0]['createdat'] = date("Y-m-d H:i:s");
                                $res = $this->Model_Db->insert(91, $insert_record);
                                if($res!=false){
                                    $data['message']="insert Successful";
                                    $data['data']="Successful";
                                    $data['status']=true;
                                    echo json_encode($data);
                                    exit();
                                }else{
                                    $data['message']="Insufficient/Invalid data.";
                                    $data['status']=false;
                                    echo json_encode($data);
                                    exit();
                                }
                            }else{
                                $data['message']="Insufficient/Invalid data.";
                                $data['status']=false;
                                echo json_encode($data);
                                exit();
                            }
                        }else{
                            $data['message']="Insufficient/Invalid data.";
                            $data['status']=false;
                            echo json_encode($data);
                            exit();
                        }
                    }else{
                        $data['message']="Insufficient/Invalid data.";
                        $data['status']=false;
                        echo json_encode($data);
                        exit();
                    }
                }else if($isPresent==1){
                    $status=true;
                    if(isset($cboName) && is_numeric($cboName)){
                        $insert_record[0]['visitorid']=$cboName;
                    }else{
                        $status=false;
                        $data['data']="visitor company error";
                    }
                    if(isset($cboCompany) && is_numeric($cboCompany)){
                        $insert_record[0]['companyid']=$cboCompany;
                    }else{
                        $status=false;
                        $data['data']="visitor company error";
                    }
                    if(isset($txtVisitdate) && preg_match("/[0-9-]{4}+\-[0-9-]{2}+\-[0-9]{2}/",$txtVisitdate)){
                        $insert_record[0]['visitdate']=$txtVisitdate;
                    }else{
                        $status=false;
                        $data['data']="visitor date error";
                    }
                    if(isset($txtVisittime) && preg_match("/[0-9:]{8}/",$txtVisittime)){
                        $insert_record[0]['visittime']=$txtVisittime;
                    }else{
                        $status=false;
                        $data['data']="visitor time error";
                    }
                    if(isset($cboPurpose) && is_numeric($cboPurpose)){
                        $insert_record[0]['purposeofvisitid']=$cboPurpose;
                    }else{
                        $status=false;
                        $data['data']="visitor purpose error";
                    }
                    if(isset($cboContactperson) && is_numeric($cboContactperson)){
                        $insert_record[0]['contactpersonid']=$cboContactperson;
                    }else{
                        $status=false;
                        $data['data']="visitor contact person error";
                    }
                    if($status) {
//                        $insert[0]['entryby']=$this->session->login['userid'];
                        $insert_record[0]['entryby'] = 2;
                        $insert_record[0]['createdat'] = date("Y-m-d H:i:s");
                        $res = $this->Model_Db->insert(91, $insert_record);
                        if($res!=false){
                            $data['message']="insert Successful";
                            $data['data']="Successful";
                            $data['status']=true;
                            echo json_encode($data);
                            exit();
                        }else{
                            $data['message']="Insufficient/Invalid data.";
                            $data['status']=false;
                            echo json_encode($data);
                            exit();
                        }
                    }else{
                        $data['message']="Insufficient/Invalid data.";
                        $data['status']=false;
                        echo json_encode($data);
                        exit();
                    }
                }else{
                    $data['message']="Bad request";
                    $data['status']=false;
                    echo json_encode($data);
                    exit();
                }
            }else{
                $data['message']="Insufficient/Invalid data";
                $data['data']="Invalid request";
                $data['status']=false;
            }
            if(isset($cboCompany) && is_numeric($cboCompany)){
                $insert_record[0]['companyid']=$cboCompany;
            }else{
                $status=false;
                $data['data']="visitor company error";
            }
            if(isset($txtVisitdate) && preg_match("/[0-9-]{4}+\-[0-9-]{2}+\-[0-9]{2}/",$txtVisitdate)){
                $insert_record[0]['visitdate']=$txtVisitdate;
            }else{
                $status=false;
                $data['data']="visitor date error";
            }
            if(isset($txtVisittime) && preg_match("/[0-9:]{8}/",$txtVisittime)){
                $insert_record[0]['visittime']=$txtVisittime;
            }else{
                $status=false;
                $data['data']="visitor time error";
            }
            if(isset($cboPurpose) && is_numeric($cboPurpose)){
                $insert_record[0]['purposeofvisitid']=$cboPurpose;
            }else{
                $status=false;
                $data['data']="visitor purpose error";
            }
            if(isset($cboContactperson) && is_numeric($cboContactperson)){
                $insert_record[0]['contactpersonid']=$cboContactperson;
            }else{
                $status=false;
                $data['data']="visitor contact person error";
            }
            if($status){
                if(isset($txtid) && is_numeric($txtid)){
                    if($txtid>0){
                        $insert[0]['updatedby']=$this->session->login['userid'];
                        $insert[0]['updatedat']=date("Y-m-d H:i:s");
//                        print_r($insert);
//                        echo "update";
                        $res=$this->Model_Db->update(87,$insert,"id",$txtid);
                        if($res!=false){
                            $data['message']="Update successful";
                            $data['data']="Successful";
                            $data['status']=true;
                        }else{
                            $data['message']="Update failed";
                            $data['data']="failed";
                            $data['status']=false;
                        }
                    }else if($txtid==0){
                        print_r($insert);
//                        exit();
//                        $where="visitorname='$cboName'";
//                        $duplicate_check=$this->Model_Db->select(87,null,$where);
//                        if($duplicate_check!=false){
//                            $data['message']="Duplicate entry";
//                            $data['status']=false;
//                            $data['flag']=0;
//                        }else{
//                            $insert[0]['entryby']=$this->session->login['userid'];
                            $insert[0]['entryby']=2;
                            $insert[0]['createdat']=date("Y-m-d H:i:s");
                            $res=$this->Model_Db->insert(87,$insert);
//                            echo "insert";
                            if($res!=false){
                                $data['message']="Insert successful";
                                $data['data']="Successful";
                                $data['status']=true;
                            }else{
                                $data['message']="failed";
                                $data['data']="Insert failed";
                                $data['status']=false;
                            }
                        }
//                    }else{
//                        $data['message']="Insufficient/Invalid data.";
//                        $data['status']=false;
//                    }
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
    public function load_visitorsname(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(89,null,$where);
            $data['data']="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data['data'] .="<option value='$r->id'>$r->visitorname</option>";
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
    public function load_contactperson(){
        try{
            extract($_POST);
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(29,null,$where);
            $data['data']="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $name="";
                    if($r->mname!=null){
                        $data['data'] .="<option value='$r->id'>".$r->fname." ". $r->mname ." ". $r->lname."</option>";
                    }else{
                        $data['data'] .="<option value='$r->id'>$r->fname " . " $r->lname</option>";
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

    public function visitors_details(){
        try{
            extract($_POST);
            $data=array();
            if(isset($id) && is_numeric($id) && $id>0){
                $where="id=$id";
                $res=$this->Model_Db->select(89,null,$where);
            if($res!=false){
                $response=array(
                    'name'=>$res[0]->visitorname,
                    'company'=>$res[0]->companyid,
                    'address'=>$res[0]->visitoraddress,
                    'contact_no'=>$res[0]->visitorcontact,
                    'email'=>$res[0]->visitoremail,
                    'gender'=>$res[0]->genderid,
                );
            }
            echo json_encode($response);
            }else{
                echo false;
            }
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
    public function report_visitorsrecord_details(){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $current_date=Date("Y-m-d");
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
                $res = $this->Model_Db->select(81, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'visitor_name' => $r->visitorname,
                            'visitor_address' => $r->visitoraddress,
                            'visitor_contact' => $r->visitorcontact,
                            'visitor_email' => $r->visitoremail,
                            'visitor_gender' => $r->genderid,
                            'company' => $r->companyid,
                            'visitor_date' => $r->visitdate,
                            'visitor_time' => $r->visittime,
                            'visitor_purpose' => $r->purposeofvisit,
                            'visitors_contactperson' => $r->contactpersonid,
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
//    public function intimeViewDetails(){
//        extract($_POST);
//        print_r($_POST);
//        $where="id=$id";
//        $data['result']=$this->Model_Db->select(33,null,$where);
//        $this->load->view("Bank/viewDetails",$data);
//    }
    public function create_purpose(){
        try{
//            $request = json_decode(json_encode($_POST), FALSE);
//            $postdata = file_get_contents("php://input");
//            $request = json_decode($postdata);
//            print_r($request);
//            echo json_encode($request);
//            print_r($_POST);
            extract($_POST);
//            exit();
            $data=array();
            $insert=array();
            $status=true;
            if(isset($txtPurpose) && preg_match("/[a-zA-Z ]{3,60}/",$txtPurpose)){
                $insert[0]['purpose']=$txtPurpose;
            }else{
                $status=false;
                $data['data']="purpose error";
            }
//            if(isset($request->isactive) && preg_match("/[0,1]{1}/",$request->isactive)){
//                if($request->isactive==1){
//                    $insert[0]['isactive']=true;
//                }else if($request->isactive==0){
//                    $insert[0]['isactive']=false;
//                }else{
//                    $status=false;
//                    $data['data']="shift type error";
//                }
//            }else{
//                $status=false;
//            }
            if($status){
                if(isset($txtid) && is_numeric($txtid)){
                    if($txtid>0){
                        $insert[0]['updatedby']=$this->session->login['userid'];
                        $insert[0]['updatedat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->update(87,$insert,"id",$txtid);
                        if($res!=false){
                            $data['message']="successful";
                            $data['data']="Data update successful";
                            $data['status']=true;
                        }else{
                            $data['message']="Update failed";
                            $data['status']=false;
                        }
                    }else if($txtid==0){
                        $where="purpose='$txtPurpose'";
                        $duplicate_check=$this->Model_Db->select(87,null,$where);
                        if($duplicate_check!=false){
                            $data['message']="Duplicate entry";
                            $data['data']=$txtPurpose."is already present in database";
                            $data['status']=false;
                            $data['flag']=0;
                        }else{
                            $insert[0]['entryby']=1;
                            $insert[0]['createdat']=date("Y-m-d H:i:s");
                            $res=$this->Model_Db->insert(87,$insert);
                            if($res!=false){
                                $data['message']="successful";
                                $data['data']="Data insert successful";
                                $data['status']=true;
                            }else{
                                $data['message']="Insert failed";
                                $data['data']="Data insert failed";
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
    public function load_purpose(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(87,null,$where);
            $data['data']="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data['data'] .="<option value='$r->id'>$r->purpose</option>";
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
    public function report_purpose_details(){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
            $current_date=Date("Y-m-d");
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
                $res = $this->Model_Db->select(87, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'purpose' => $r->purpose,
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
}


