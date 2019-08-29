<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
//header("Access-Control-Allow-Origin: *");
class Company extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function header(){
        try{

            $this->load->view('include/header');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function footer(){
        try{
            $this->load->view('include/footer');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function sidebar(){
        try{
            $this->load->view('dashboard/sidebar');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function navbar(){
        try{
            $this->load->view('include/navbar');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }

    public function create_company_type(){
        try{
            $request = json_decode(json_encode($_POST), FALSE);
//            $postdata = file_get_contents("php://input");
//            $request = json_decode($postdata);
            $data=array();
            $insert=array();
            $status=true;
            if(isset($request->companytypename) && preg_match("/[a-zA-Z ]{5,60}/",$request->companytypename)){
               //echo json_encode($companytypename);
                $insert[0]['typename']=$request->companytypename;
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
                        $insert[0]['updatedby']=1;
                        $insert[0]['updatedat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->update(11,$insert,"id",$request->txtid);
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
                        $res=$this->Model_Db->insert(11,$insert);
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
    public function create_company(){
        try{
            $data=array();
            $insert=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status=true;
            if(isset($request->companytype) && is_numeric($request->companytype)){
                $insert[0]['companytypeid']=$request->companytype;
            }else{
                $status=false;
                echo $request->companytype;
            }
            if(isset($request->companyname) && preg_match("/[a-zA-Z ]{5,60}/",$request->companyname)){
                $insert[0]['companyname']=$request->companyname;
            }else{
                $status=false;
                echo $request->companyname;
            }
            if(isset($request->companyshortname) && preg_match("/[a-zA-Z]{2,5}/",$request->companyshortname)){
                $insert[0]['companyshortname']=$request->companyshortname;
            }else{
                $status=false;
                echo $request->companyshortname;
            }
            if(isset($request->establishedon) && preg_match("/^[0-9 -]{10}$/",$request->establishedon)){
                $doe=date("Y-m-d",strtotime($request->establishedon));
                $insert[0]['establishedon']=$doe;
            }else{
                $status=false;
                echo $request->establishedon;
            }
            $gst = strtoupper($request->gstno);
            if(isset($gst) && preg_match("/^[0-9]{2}[A-Z0-9]{13}$/",$gst)){
                $insert[0]['gstno']=$gst;
            }else{
                $status=false;
                echo $gst;
            }
            if(isset($request->address) && preg_match("/[a-zA-Z ()]{5,60}/",$request->address)){
                $insert[0]['address']=$request->address;
            }else{
                $status=false;
                echo $request->address;
            }
            if(isset($request->distid) && preg_match("/[0-9]{1,2}/",$request->distid)){
                $insert[0]['distid']=$request->distid;
            }else{
                $status=false;
                echo $request->distid;
            }
            if(isset($request->pincode) && preg_match("/[0-9]{6}/",$request->pincode)){
                $insert[0]['pincode']=$request->pincode;
            }else{
                $status=false;
                echo $request->pincode;
            }
//            if(isset($request->logo) && preg_match("/[0-9]{6}/",$request->logo)){
//                $insert[0]['logo']=$request->logo;
//            }
            if(isset($request->url) && preg_match("/^[a-zA-Z0-9._-]+\.[a-zA-Z.]{2,5}$/",$request->url)){
                $insert[0]['url']=$request->url;
            }
            if(isset($request->companyemail) && preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$request->companyemail)){
                $insert[0]['emailid']=$request->companyemail;
            }else{
                $status=false;
            }
            if(isset($request->mobile) && preg_match("/[6,7,8,9]{1}+[0-9]{9}/",$request->mobile)){
                $insert[0]['mobile']=$request->mobile;
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
//                    echo $request->isactive;
                }
            }else{
                $status=false;
            }
//            print_r($request);
            if($status){
                if(isset($request->txtid) && is_numeric($request->txtid)){
                    if($request->txtid>0){
                        $insert[0]['updatedby']=1;
                        $insert[0]['updatedat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->update(13,$insert,"id",$request->txtid);
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
                        $res=$this->Model_Db->insert(13,$insert);
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
    public function load_company_type(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(11,null,$where);
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
    public function report_company_type(){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date = Date("Y-m-d");
//            print_r($datanow);
//            SELECT * FROM tbl_company_type where DATE(createdat) = DATE('2019-08-14');
//            $from=date("Y-m-d H:i:s",strtotime($from_date));
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
                $res = $this->Model_Db->select(11, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'typename' => $r->typename,
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
    public function load_company(){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
//			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            if(isset($request->onlyactive) && is_numeric($request->onlyactive)){
                $where="isactive=true";
            }else{
                $where="1=1";
            }
            if(isset($request->typeid) && is_numeric($request->typeid) && $request->typeid>0){
                $where.=" and companytypeid=$request->typeid";
            }else{
                $data['message']="Bad request.";
                $data['status']=false;
                echo json_encode($data);
                exit();
            }
            $res=$this->Model_Db->select(13,null,$where);
            $data[]="<option value=''>Select</option>";
            if($res!=false){
                    foreach ($res as $r){
                        $data[]="<option value='$r->id'>$r->companyname</option>";
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
    public function report_company(){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            //print_r($request);
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
                if (isset($request->typeid) && is_numeric($request->typeid) && $request->typeid > 0) {
                    $where .= " and companytypeid=$request->typeid";
                } else {
                    $data['message'] = "Bad request.";
                    $data['status'] = false;
                    echo json_encode($data);
                    exit();
                }
                $res = $this->Model_Db->select(13, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'companytypeid' => $r->companytypeid,
                            'companyname' => $r->companyname,
                            'companyshortname' => $r->companyshortname,
                            'establishedon' => $r->establishedon,
                            'gstno' => $r->gstno,
                            'address' => $r->address,
                            'distid' => $r->distid,
                            'pincode' => $r->pincode,
                            'logo' => $r->logo,
                            'url' => $r->url,
                            'emailid' => $r->emailid,
                            'mobile' => $r->mobile,
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

//    public function getRecentEntries(){
//        try{
//
//        }catch (Exception $exception){
//            echo "Message:".$exception->getMessage();
//        }
//    }
}
