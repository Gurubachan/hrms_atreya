<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class JobPosting extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function create_jobposting(){
        try{
            $data=array();
            $insert=array();
            $insert_skill=array();
            $insert_qualification=array();
            $request= json_decode(json_encode($_POST), false);
            $status=true;
            if(isset($request->postname) && preg_match("/^[a-zA-Z ]{0,50}$/",$request->postname)){
                $insert[0]['postname']=$request->postname;
            }else{
                $status=false;
//                echo $insert[0]['postname']="";
            }
            if(isset($request->companyid) && is_numeric($request->companyid)){
                $insert[0]['companyid']=$request->companyid;
            }else{
                $status=false;
//                echo $insert[0]['companyid']="";
            }
            if(isset($request->designationid) && is_numeric($request->designationid)){
                $insert[0]['designationid']=$request->designationid;
            }else{
                $status=false;
//                echo $insert[0]['designationid']="";
            }
            if(isset($request->vacancy) && is_numeric($request->vacancy)){
                $insert[0]['nov']=$request->vacancy;
            }else{
                $status=false;
                echo $insert[0]['nov']=$request->vacancy;
            }
            if(isset($request->location) && preg_match("/^[a-zA-Z ]{0,20}$/",$request->location)){
                $insert[0]['localtion']=$request->location;
            }else{
                $status=false;
//                echo $insert[0]['localtion']="";
            }
            if(isset($request->jobdescription) && preg_match("/^[a-zA-Z ]{0,120}$/",$request->jobdescription)){
                $insert[0]['jobdescription']=$request->jobdescription;
            }else{
                $status=false;
//                echo $insert[0]['jobdescription']="";
            }
            if(isset($request->experience) && preg_match("/^[a-zA-Z0-9, ]{0,120}$/",$request->experience)){
                $insert[0]['experience']=$request->experience;
            }else{
                $status=false;
//                echo $insert[0]['experience']="";
            }
            if(isset($request->responsibility) && preg_match("/^[a-zA-Z0-9 ]{0,120}$/",$request->responsibility)){
                $insert[0]['responsibility']=$request->responsibility;
            }else{
                $status=false;
//                echo $request->responsibility;
            }
            if(isset($request->jobpoststartingdate) && preg_match("/^[0-9-]{3,20}$/",$request->jobpoststartingdate)){
                $jpsd=date("Y-m-d",strtotime($request->jobpoststartingdate));
                $insert[0]['startdate']=$jpsd;
            }else{
                $status=false;
//                echo $insert[0]['startdate']="";
            }
            if(isset($request->jobpostendingdate) && preg_match("/^[0-9-]{3,20}$/",$request->jobpostendingdate)){
                $jped=date("Y-m-d",strtotime($request->jobpostendingdate));
                $insert[0]['enddate']=$jped;
            }else{
                $status=false;
//                echo $insert[0]['enddate']="";
            }
            if(isset($request->skillid) && is_numeric($request->skillid)){
                $insert_skill[0]['skillid']=$request->skillid;
            }else{
                $status=false;
//                echo $insert_skill[0]['skillid']="";
            }
            if(isset($request->educationid) && is_numeric($request->educationid)){
                    $insert_qualification[0]['qualificationid']=$request->educationid;
            }else{
                $status=false;
//                echo $insert_qualification[0]['qualificationid']="";
            }
            if(isset($request->isactive) && preg_match("/[0,1]{1}/",$request->isactive)){
                if($request->isactive==1){
                    $insert[0]['isactive']=true;
                    $insert_qualification[0]['isactive']=true;
                    $insert_skill[0]['isactive']=true;
                }else if($request->isactive==0){
                    $insert[0]['isactive']=false;
                    $insert_qualification[0]['isactive']=false;
                    $insert_skill[0]['isactive']=false;
                }else{
                    $status=false;
                }
            }else{
                $status=false;
            }
            if($status){ //multiple table insert
                if(isset($request->txtid) && is_numeric($request->txtid)){
                    if($request->txtid>0){
                        $insert[0]['updatedby']=$this->session->login['userid'];
                        $insert[0]['updatedat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->update(47,$insert,"id",$request->txtid);
                        $insert_qualification[0]['updatedby']=$this->session->login['userid'];
                        $insert_qualification[0]['updatedat']=date("Y-m-d H:i:s");
                        $insert_skill[0]['updatedby']=$this->session->login['userid'];
                        $insert_skill[0]['updatedat']=date("Y-m-d H:i:s");
                        $res_qualification=$this->Model_Db->update(49,$insert_qualification,"id",$request->txtid);
                        $res_skill=$this->Model_Db->update(51,$insert_skill,"id",$request->txtid);
                        if($res!=false or $res_qualification!=false or $res_skill!=false){
                            $data['message']="Update successful.";
                            $data['status']=true;
                        }else{
                            $data['message']="Update failed.";
                            $data['status']=false;
                        }
                    }else if($request->txtid==0){
                        $insert[0]['entryby']=$this->session->login['userid'];
                        $insert[0]['createdat']=date("Y-m-d H:i:s");
                        $res=$this->Model_Db->insert(47,$insert);
                        $insert_qualification[0]['entryby']=$this->session->login['userid'];
                        $insert_qualification[0]['createdat']=date("Y-m-d H:i:s");
                        $insert_qualification[0]['jpid']=$res;
                        $insert_skill[0]['entryby']=$this->session->login['userid'];
                        $insert_skill[0]['createdat']=date("Y-m-d H:i:s");
                        $insert_skill[0]['jpid']=$res;
                        $res_qualification=$this->Model_Db->insert(49,$insert_qualification);
                        $res_skill=$this->Model_Db->insert(51,$insert_skill);
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
                $data['message']="Insufficient Or Invalid data.";
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
    public function load_jobposting(){
        try{
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(17,null,$where);
            $data[]="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->gendername</option>";
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
    public function report_jobposting(){
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
                $res = $this->Model_Db->select(48, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'companyid' => $r->companyid,
                            'companyname' => $r->companyname,
                            'postname' => $r->postname,
                            'designationid' => $r->designationid,
                            'designationname' => $r->designationname,
                            'nov' => $r->nov,
                            'location' => $r->localtion,
                            'jobdescription' => $r->jobdescription,
                            'experience' => $r->experiancename,
                            'reponsibility' => $r->responsibility,
                            'startdate' => $r->startdate,
                            'enddate' => $r->enddate,
                            'educationname'=>$r->educationname,
                            'educationid'=>$r->qualificationid,
                            'skillid'=>$r->skillid,
                            'skill'=>$r->skill,
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
    public function loadJopPostingReport(){
        try{
            $data=array();
            $last_id = "SELECT MAX(id) FROM tbl_job_posting";
            $a = $this->Model_Db->query($last_id);
            $b = $a[0]->max;
//            $result = "select max(id) from tbl_job_posting";
            $where ="id=$b";
//            $lastId=$this->Model_Db->select(47, null,$where);
//           $lastinserted_id = " SELECT * FROM tbl_job_posting WHERE id = @last_id";
//            SELECT * FROM `table_name` WHERE id=(SELECT MAX(id) FROM `table_name`);
//            $where="$maxid and isactive=true";
            $res=$this->Model_Db->select(48,null,$where);
//            print_r($res);
            echo json_encode($res);
        }catch (Exception $e){
            $data['message']= "Message:".$e->getMessage();
            $data['status']=false;
            $data['error']=true;
            echo json_encode($data);
            exit();
        }
    }
}
