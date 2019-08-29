<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_Db'));
//        $this->load->library('session');
    }
	public function check_user(){
        try{
            $data=array();
//			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $request = json_decode(json_encode($_POST), FALSE);
            if(isset($request->username) && $request->username!=null){
                $isemail=false;
                $ismobile=false;
                $isuserid=false;
                if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$request->username)){
                    $data['message']="Its an email id.";
                    $isemail=true;
                }else if(preg_match("/[6,7,8,9]{1}+[0-9]{9}/",$request->username)){
                    $data['message']="Its a mobile number.";
                    $ismobile=true;
                }else if(preg_match("/^[a-zA-Z0-9_@#*]{0,32}/",$request->username)){
                    $data['message']="Its an user id.";
                    $isuserid=true;
                }else{
                    $data['message']="Provided User id is not Valid.";
                    $data['status']=false;
                    echo json_encode($data);
                    exit();
                }
                if($isemail){
                    $where="emailid='$request->username' ";
                }else if($ismobile){
                    $where="mobile=$request->username ";
                }else if($isuserid){
                    $where="username='$request->username' ";
                }
                $where.=" and isactive=true and typeisactive=true and authisactive=true";
                $res=$this->Model_Db->select(4,null,$where);
                if($res!=false){
                    if(count($res)>1){
                        $data['message']="Duplicate userid exiests.";
                        $data['status']=false;
                    }else{
                        $data['message']="Userid found.";
                        $data['userid']=$res[0]->id;
                        $data['username']=$res[0]->username;
                        $data['usermobile']=$res[0]->mobile;
                        $data['userlogo']=$res[0]->logo;
                        $data['status']=true;
                        $this->session->set_userdata('tempuser',$data);
                    }
                }else{
                    $data['message']="No user found.";
                    $data['status']=false;
                }
                echo json_encode($data);
                exit();
            }else{
                $data['message']="No user name provided.";
                $data['status']=false;
                echo json_encode($data);
                exit();
            }
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            echo json_encode($data);
            exit();
        }
    }
    //To authenticate the password for the user.
    public function check_password(){
        try{
            $data=array();
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $request = json_decode(json_encode($_POST), FALSE);
            if(isset($request->userid) && is_numeric($request->userid)){
                if($request->userid==$this->session->tempuser['userid']){
                    if(isset($request->password) && $request->password!=null){
                        if(preg_match("/^[a-zA-Z0-9_@#*]{0,32}/",$request->password)){
                            $where="userid=$request->userid and password='$request->password' and isactive=true";
                            $res=$this->Model_Db->select(5,null,$where);
                            if($res!=false){
                                if(count($res)>1){
                                    $data['message']="Duplicate entries.";
                                    $data['status']=false;
                                    echo json_encode($data);
                                    exit();
                                }else{
                                    $data['message']="Password matched. Otp sent.";
                                    $data['status']=true;
                                    $data['userid']=$request->userid;
                                    $otp=rand(324653,876532);
//                                    $otp=123456;
                                    $mobile=$this->session->tempuser['usermobile'];
                                    $message="Your login otp is - ".$otp.". Please do not share this with any one.";
                                    $this->load->library("Sms");
                                    $this->sms->send($mobile,$message);
                                    echo json_encode($data);
                                    $data['otp']=$otp;
                                    $this->session->set_userdata('loginAtempt',$data);
                                    exit();
                                }
                            }else{
                                $data['message']="Wrong Password.";
                                $data['status']=false;
                                echo json_encode($data);
                                exit();
                            }
                        }else{
                            $data['message']="Wrong Password.";
                            $data['status']=false;
                            echo json_encode($data);
                            exit();
                        }
                    }else{
                        $data['message']="Bad request.";
                        $data['status']=false;
                        echo json_encode($data);
                        exit();
                    }
                }else{
                    $data['message']="Bad request.";
                    $data['status']=false;
                    echo json_encode($data);
                    exit();
                }
            }else{
                $data['message']="Wrong userid Provided.";
                $data['status']=false;
                echo json_encode($data);
                exit();
            }
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
    public function verify_otp(){
	    try{
	        $data=array();
			$postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $request = json_decode(json_encode($_POST), FALSE);
            /*echo $this->session->tempuser['userid'] ."<br>";
            echo $request->userid."<br>";
            echo $this->session->loginAtempt['userid']."<br>";
            echo $this->session->loginAtempt['otp']."<br>";
            echo $request->otp."<br>";*/
	        if(isset($request->otp) && is_numeric($request->otp) && isset($request->userid) && is_numeric($request->userid)){

	            if($this->session->tempuser['userid']==$request->userid && $this->session->tempuser['userid']==$this->session->loginAtempt['userid'] && $this->session->loginAtempt['otp']==$request->otp){
                    $data['message']="Login successful.";
                    $data['status']=true;
	                $data['userid']=null;
	                $data['usertypeid']=null;
	                $data['usertype']=null;
	                $data['username']=null;
	                $data['uname']=null;
	                $data['umobile']=null;
	                $data['umail']=null;
	                $data['udob']=null;
	                $data['ulogo']=null;
                    $this->session->unset_userdata(
                        array(
                            'tempuser',
                            'loginAtempt'
                        )
                    );
	                $where="id=$request->userid and isactive=true and authisactive=true";
	                $res=$this->Model_Db->select(4,null,$where);
	                if($res!=false){
	                    $data['userid']=$res[0]->id;
	                    $data['usertypeid']=$res[0]->usertypeid;
	                    $data['usertype']=$res[0]->typename;
	                    $data['username']=$res[0]->name;
	                    $data['uname']=$res[0]->username;
	                    $data['umobile']=$res[0]->mobile;
	                    $data['umail']=$res[0]->emailid;
	                    $data['udob']=$res[0]->dob;
	                    $data['ulogo']=$res[0]->logo;
                    }

                    $this->session->set_userdata('login',$data);
                }else{
                    $data['message']="Bad request.";
                    $data['status']=false;
                    echo json_encode($data);
                    exit();
                }
            }else{
                $data['message']="Wrong otp Provided.";
                $data['status']=false;
                echo json_encode($data);
                exit();
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
    public function logout(){
	    try{
	        $data=array();
            $this->session->sess_destroy();
            $data['message']="Logout successful.";
            $data['status']=true;
            echo json_encode($data);
            redirect("Welcome/");
            exit();
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            redirect("Welcome/");
            echo json_encode($data);
            exit();
        }
    }
    public function create_user(){
        try{
            $data=array();
            $insert=array();
            $password=array();
            $status=true;
            $request= json_decode(json_encode($_POST), false);
            if(isset($request->usertypeid) && is_numeric($request->usertypeid)){
                $insert[0]['usertypeid']=$request->usertypeid;
            }else{
                $status=false;
                echo $request->usertypeid;
            }
            if(isset($request->username) && preg_match("/[a-zA-Z _@.]{5,15}/",$request->username)){
                $insert[0]['username']=$request->username;
            }else{
                $status=false;
                echo $request->username;
            }
            if(isset($request->fname) && preg_match("/[a-zA-Z]{2,60}/",$request->fname)){
                $insert[0]['fname']=$request->fname;
            }else{
                $status=false;
                echo $request->fname;
            }
            if(isset($request->mname) && preg_match("/[a-zA-Z]{2,60}/",$request->mname)){
                $insert[0]['mname']=$request->mname;
            }else{
                $insert[0]['mname']="";
            }
            if(isset($request->lname) && preg_match("/[a-zA-Z]{2,60}/",$request->lname)){
                $insert[0]['lname']=$request->lname;
            }else{
                $insert[0]['lname']="";
            }

            if(isset($request->emailid) && preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$request->emailid)){
                $insert[0]['emailid']=$request->emailid;
            }else{
                $status=false;
                echo $request->emailid;
            }
            if(isset($request->mobile) && preg_match("/^[6,7,8,9]{1}+[0-9]{9}$/",$request->mobile)){
                $insert[0]['mobile']=$request->mobile;
            }else{
                $status=false;
                echo $request->mobile;
            }
            if(isset($request->dob) && preg_match("/^[0-9-]{10}$/",$request->dob)){
                $dob=date("Y-m-d",strtotime($request->dob));
                $insert[0]['dob']=$dob;
            }else{
                $status=false;
               echo $request->dob;
            }
//            if(isset($request->userpassword) && preg_match("/^[a-zA-Z0-9-_@.]{6,18}$/",$request->userpassword) && isset($request->reenteruserpassword) && preg_match("/^[a-zA-Z0-9-_@.]{6,18}$/",$request->reenteruserpassword)){
//                if($request->userpassword == $request->reenteruserpassword){
//                    $password[0]['password']=$request->mobile;
//                }else{
//                    $status=false;
//                }
//            }else{
//                $status=false;
//                echo $request->userpassword;
//            }
            $password[0]['password']=$request->mobile;
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
                            //note:-data insertion from tbl_user_authentication
                            $password[0]['userid']=$res;
                            $password[0]['entryby']=$this->session->login['userid'];
                            $password[0]['createdat']=date("Y-m-d H:i:s");
                            $result=$this->Model_Db->insert(5,$password);
                            if($result!=false){
                                $mobile=$request->mobile;
                                $userid=$request->username;
                                $message="Your userid is - ".$userid.". And Password is ".$mobile.".";
                                $this->load->library("Sms");
                                $this->sms->send($mobile,$message);
                                $data['message']="Insert successful.";
                                $data['status']=true;
                            }else{
                                $data['message']="Insertion faild .";
                                $data['status']=false;
                            }
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
            $request= json_decode(json_encode($_POST), false);
            $current_date=Date('Y-m-d');
            if(isset($request->checkparams) && is_numeric($request->checkparams)) {
                switch ($request->checkparams) {
                    case 1:
                        $where = "DATE(createdat)=DATE('$current_date')";
                        break;
                    case 2:
                        $where ="1=1";
                        break;
                    case 3:
                        $where ="isactive=true";
                        break;
                    case 4:
                        $where ="isactive=false";
                        break;
                    default:
                        $data['message'] = "ID not found";
                        $data['status'] = false;
                        $data['error'] = true;
                        exit();
                }
                $res = $this->Model_Db->select(3, null, $where);
                $result = $this->Model_Db->select(5,null,$where);

                if ($res != false) {
                    foreach ($res as $r) {
//                        if($result != false){
//                            foreach ($result as $rs) {
                                $data[] = array(
                                    'id' => $r->id,
                                    'usertypeid' => $r->usertypeid,
                                    'fname' => $r->fname,
                                    'mname' => $r->mname,
                                    'lname' => $r->lname,
                                    'username' => $r->username,
                                    'emailid' => $r->emailid,
                                    'mobile' => $r->mobile,
                                    'dob' => $r->dob,
                                    'creationdate' => $r->createdat,
                                    'lastmodifiedon' => $r->updatedat,
                                    'isactive' => $r->isactive
                                );
//                            }
//                        };
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
    public function create_user_type(){
        try{
            $data=array();
            $insert=array();
            $request= json_decode(json_encode($_POST), false);
            $status=true;
            if(isset($request->usertypename) && preg_match("/^[a-zA-Z ]{3,20}$/",$request->usertypename)){
                $insert[0]['typename']=$request->usertypename;
            }else{
                $status=false;
                echo $request->usertypename;
            }
            if(isset($request->usertypeshortname) && preg_match("/^[a-zA-Z]{2,5}$/",$request->usertypeshortname)){
                $insert[0]['usertypeshortname']=$request->usertypeshortname;
            }else{
                $status=false;
                echo $request->usertypeshortname;
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
                        $res=$this->Model_Db->update(1,$insert,"id",$request->txtid);
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
                        $res=$this->Model_Db->insert(1,$insert);
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
    public function load_user_type(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(1,null,$where);
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
    public function report_user_type(){
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
                $res = $this->Model_Db->select(1, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'usertypename' => $r->typename,
                            'usertypeshortname' => $r->usertypeshortname,
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
}
