<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
//header("Access-Control-Allow-Origin: *");
class Attendance extends CI_Controller {
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

    public function create_attendance_type(){
        try{
            $request = json_decode(json_encode($_POST), FALSE);
//            $postdata = file_get_contents("php://input");
//            $request = json_decode($postdata);
            $data=array();
            $insert=array();
            $status=true;
            if(isset($request->attendancetypename) && preg_match("/[a-zA-Z ]{5,60}/",$request->attendancetypename)){
               //echo json_encode($companytypename);
                $insert[0]['typename']=$request->attendancetypename;
            }else{
                $status=false;
                echo $request->attendancetypename;
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
                        $res=$this->Model_Db->update(61,$insert,"id",$request->txtid);
                        if($res!=false){
                            $data['message']="Update successful.";
                            $data['status']=true;
                        }else{
                            $data['message']="Update failed.";
                            $data['status']=false;
                        }
                    }else if($request->txtid==0){
                        $where = "typename = '$request->attendancetypename'";
                        $duplicate_entry=$this->Model_Db->select(11,null,$where);
                        if($duplicate_entry!=false){
                            $data['message']="Duplicate entry";
                            $data['status']=false;
                            $data['flag']=0;
                        }else{
                            $insert[0]['entryby']=$this->session->login['userid'];
                            $insert[0]['createdat']=date("Y-m-d H:i:s");
                            $res=$this->Model_Db->insert(61,$insert);
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
    public function load_attendance_type(){
        try{
            $data=array();
            $where="isactive=true";
            $orderby="typename";
            $res=$this->Model_Db->select(61,null,$where,$orderby);
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
    public function report_attendance_type(){
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
                $res = $this->Model_Db->select(61, null, $where);
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
    public function create_attendance(){
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
    public function load_attendance($status = null){
        try{
            $data=array();
            $request = json_decode(json_encode($_POST), FALSE);
            if(isset($request->onlyactive) && is_numeric($request->onlyactive)){
                $where="isactive=true";
            }else{
                $where="1=1";
            }
            if($status!=null){
                $where="1=1";
            }else{
                if(isset($request->typeid) && is_numeric($request->typeid) && $request->typeid>0){
                    $where.=" and companytypeid=$request->typeid";
                }else{
                    $data['message']="Bad request.";
                    $data['status']=false;
                    echo json_encode($data);
                    exit();
                }
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
    public function report_attendance(){
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
                $res = $this->Model_Db->select(14, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'companytypeid' => $r->companytypeid,
                            'companyname' => $r->companyname,
                            'companyshortname' => $r->companyshortname,
                            'companytypename'=>$r->companytypename,
                            'establishedon' => $r->establishedon,
                            'gstno' => $r->gstno,
                            'address' => $r->address,
                            'pincode' => $r->pincode,
                            'url' => $r->url,
                            'emailid' => $r->emailid,
                            'mobile' => $r->mobile,
                            'isactive' => $r->isactive,
                            'stateid'=>$r->stateid,
                            'statename'=>$r->statename,
                            'distid' => $r->distid,
                            'distname'=>$r->distname
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

	public function employeeAttendanceSheet(){
		try{
			$request = json_decode(json_encode($_POST), FALSE);
			$data=array();
			$insert=array();
			$status=true;
			$current_date = Date('Y-m-d');
			$current_time = Date('H:i:s');
			if(isset($request->empid) && is_numeric($request->empid)){
				$where="isactive=true and isattendance=true and id='$request->empid'";
				$orderby = "fname";
				$res=$this->Model_Db->select(30,null,$where,$orderby);
				if(isset($request->status) && $request->status==0){
					if($res!=false){
						$insert[0]['empid']=$res[0]->id;
						$insert[0]['date']=$current_date;
						$insert[0]['intime']=$current_time;
						$insert[0]['empid']=$res[0]->id;
						$insert[0]['entryby']=$this->session->login['userid'];
						$insert[0]['createdat']=date("Y-m-d H:i:s");
					}
					$res=$this->Model_Db->insert(63,$insert);
				}else{
					$where="1=1 and DATE(date)=DATE('$current_date')";
					$res=$this->Model_Db->select(63,null,$where);
					$rowid = $res[0]->id;
					if($res!=false){
						$insert[0]['outtime']=$current_time;
					}
					$res=$this->Model_Db->update(63,$insert,"id",$rowid);
				}
				if($res!=false){
					$data['message']="Insert successful.";
					$data['status']=true;
				}else{
					$data['message']="Insert failed.";
					$data['status']=false;
				}
			}else{
				$status=false;
			}
			echo json_encode($data);
		}catch (Exception $e){
			$data['message']="Message:".$e->getMessage();
		}
	}
	public function checkInOutTime(){
    	try{
    		extract($_POST);
    		$where="1=1";
			$res=$this->Model_Db->select(63,null,$where);
			if($res!=false){
				$data[]=$res;
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
    public function create_shifttype(){
        try{
            $request = json_decode(json_encode($_POST), FALSE);
            $data=array();
            $insert=array();
            $status=true;
            if(isset($request->txtShifttype) && preg_match("/[a-zA-Z ]{3,15}/",$request->txtShifttype)){
                $insert[0]['shifttypename']=$request->txtShifttype;
            }else{
                $status=false;
                $data['data']="shift type name error";
            }
//            if(isset($request->isactive) && preg_match("/[0,1]{1}/",$request->isactive)){
//                if($request->isactive==1){
//                    $insert[0]['isactive']=true;
//                }else if($request->isactive==0){
//                    $insert[0]['isactive']=false;
//                }else{
//                    $status=false;
//                }
//            }else{
//                $status=false;
//            }
            if($status){
                if(isset($request->txtid) && is_numeric($request->txtid)){
                    if($request->txtid>0){
                        $insert[0]['updatedby']=$this->session->login['userid'];
                        $insert[0]['updatedat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->update(79,$insert,"id",$request->txtid);
                        if($res!=false){
                            $data['message']="Update successful.";
                            $data['status']=true;
                        }else{
                            $data['message']="Update failed.";
                            $data['status']=false;
                        }
                    }else if($request->txtid==0){
                        $where="shifttypename='$request->txtShifttype'";
                        $duplicate_check=$this->Model_Db->select(79,null,$where);
                        if($duplicate_check!=false){
                            $data['message']="Duplicate entry";
                            $data['data']=$request->txtShifttype." is already present in database";
                            $data['status']=false;
                        }else{
//                            $insert[0]['entryby']=$this->session->login['userid'];
                            $insert[0]['entryby']=1;
                            $insert[0]['createdat']=date("Y-m-d H:i:s");
                            $res=$this->Model_Db->insert(79,$insert);
                            if($res!=false){
                                $data['message']="successful";
                                $data['data']=" Data insert successful";
                                $data['status']=true;
                            }else{
                                $data['message']="failed.";
                                $data['data']=" Data insert faild";
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
    public function load_shifttype(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(79,null,$where);
            $data['data']="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data['data'] .="<option value='$r->id'>$r->shifttypename</option>";
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
    public function report_dutytype_details(){
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
                $res = $this->Model_Db->select(79, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'shifttypename' => $r->shifttype,
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
    public function create_shift(){
        try{
            extract($_POST);
            $data=array();
            $insert=array();
            $status=true;
            if(isset($cboCompany) && is_numeric($cboCompany)){
                $insert[0]['companyid']=$cboCompany;
            }else{
                $status=false;
                $data['data']="shift company error";
            }
            if(isset($cboShift) && is_numeric($cboShift)){
                $insert[0]['shifttypeid']=$cboShift;
            }else{
                $status=false;
                $data['data']="shift type error";
            }
            if(isset($txtShiftname) && preg_match("/[a-zA-Z ]{3,60}/",$txtShiftname)){
                $insert[0]['shiftname']=$txtShiftname;
            }else{
                $status=false;
                $data['data']="shift name error";
            }
            if(isset($txtShiftshortname) && preg_match("/[a-zA-Z]{2,7}/",$txtShiftshortname)){
                $insert[0]['shiftsrtname']=$txtShiftshortname;
            }else{
                $status=false;
                $data['data']="shift short name error";
            }
            if(isset($txtIntime) && preg_match("/[0-9:]{8}/",$txtIntime)){
                $insert[0]['shiftintime']=$txtIntime;
            }else{
                $status=false;
                $data['data']="shift intime error";
            }
            if(isset($txtOuttime) && preg_match("/[0-9:]{8}/",$txtOuttime)){
                $insert[0]['shiftouttime']=$txtOuttime;
            }else{
                $status=false;
                $data['data']="shift outtime error";
            }
            if(isset($rdoIsdatechange) && is_numeric($rdoIsdatechange)){
                $insert[0]['isdatechange']=$rdoIsdatechange;
            }else{
                $status=false;
                $data['data']="shift isdatechange error";
            }
            if(isset($txtEffectFrom)){
                $insert[0]['shiftwef']=$txtEffectFrom;
            }else{
                $status=false;
                $data['data']="shift effect form error";
            }
            if($status){
                if(isset($txtid) && is_numeric($txtid)){
                    if($txtid>0){
                        $insert[0]['updatedby']=$this->session->login['userid'];
                        $insert[0]['updatedat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->update(81,$insert,"id",$txtid);
                        if($res!=false){
                            $data['message']="successful.";
                            $data['data']="Data update successful.";
                            $data['status']=true;
                        }else{
                            $data['message']="Update failed.";
                            $data['status']=false;
                        }
                    }else if($txtid==0){
                        $where="shiftname='$txtShiftname'";
                        $duplicate_check=$this->Model_Db->select(81,null,$where);
                        if($duplicate_check!=false){
                            $data['message']="Duplicate entry";
                            $data['data']=$txtShiftname."is already peresent in database";
                            $data['status']=false;
                            $data['flag']=0;
                        }else{
                            $insert[0]['entryby']=1;
                            $insert[0]['createdat']=date("Y-m-d H:i:s");
                            $res=$this->Model_Db->insert(81,$insert);
                            if($res!=false){
                                $data['message']="successful";
                                $data['data']="Data insert successful";
                                $data['status']=true;
                            }else{
                                $data['message']="Insert failed.";
                                $data['data']="Data Insert failed.";
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
    public function load_shift(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(81,null,$where);
            $data[]="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->shifttype</option>";
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
    public function report_shifts(){
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
                            'shifttypeid' => $r->shifttypeid,
                            'shiftname' => $r->shiftname,
                            'companyid' => $r->companyid,
                            'shiftshortname' => $r->shiftsrtname,
                            'shiftintime' => $r->shiftintime,
                            'shiftouttime' => $r->shiftouttime,
                            'shiftwef' => $r->shiftwef,
                            'isdatechange' => $r->isdatechange,
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
    public function report_shift_type(){
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
                $res = $this->Model_Db->select(79, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'shifttypename' => $r->shifttypename,
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
