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
            if(isset($request->postname) && preg_match("/^[a-zA-Z]{3,20}$/",$request->postname)){
                $insert[0]['postname']=$request->postname;
            }else{
                $status=false;
                echo $request->postname;
            }
            if(isset($request->companyid) && is_numeric($request->companyid)){
                $insert[0]['companyid']=$request->companyid;
            }else{
                $status=false;
                echo $request->companyid;
            }
            if(isset($request->designationid) && is_numeric($request->designationid)){
                $insert[0]['designationid']=$request->designationid;
            }else{
                $status=false;
                echo $request->designationid;
            }
            if(isset($request->vacancy) && is_numeric($request->vacancy)){
                $insert[0]['nov']=$request->vacancy;
            }else{
                $status=false;
                echo $request->vacancy;
            }
            if(isset($request->location) && preg_match("/^[a-zA-Z]{3,20}$/",$request->location)){
                $insert[0]['localtion']=$request->location;
            }else{
                $status=false;
                echo $request->location;
            }
            if(isset($request->jobdescription) && preg_match("/^[a-zA-Z]{3,20}$/",$request->jobdescription)){
                $insert[0]['jobdescriptiom']=$request->jobdescription;
            }else{
                $status=false;
                echo $request->jobdescription;
            }
            if(isset($request->experience) && preg_match("/^[a-zA-Z]{3,20}$/",$request->experience)){
                $insert[0]['experiance']=$request->experience;
            }else{
                $status=false;
                echo $request->experience;
            }
            if(isset($request->responsibility) && preg_match("/^[a-zA-Z]{3,20}$/",$request->responsibility)){
                $insert[0]['responsibility']=$request->responsibility;
            }else{
                $status=false;
                echo $request->responsibility;
            }
            if(isset($request->jobpoststartingdate) && preg_match("/^[a-zA-Z]{3,20}$/",$request->jobpoststartingdate)){
                $insert[0]['startdate']=$request->jobpoststartingdate;
            }else{
                $status=false;
                echo $request->jobpoststartingdate;
            }
            if(isset($request->jobpostendingdate) && preg_match("/^[a-zA-Z]{3,20}$/",$request->jobpostendingdate)){
                $insert[0]['enddate']=$request->jobpostendingdate;
            }else{
                $status=false;
                echo $request->jobpostendingdate;
            }
            if(isset($request->skill) && preg_match("/^[a-zA-Z]{3,20}$/",$request->skill)){
                $insert_skill[0]['enddate']=$request->skill;
            }else{
                $status=false;
                echo $request->jobpostendingdate;
            }
            if(isset($request->location) && preg_match("/^[a-zA-Z]{3,20}$/",$request->location)){
                $insert_qualification[0]['enddate']=$request->location;
            }else{
                $status=false;
                echo $request->jobpostendingdate;
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
                        $res=$this->Model_Db->update(47,$insert,"id",$request->txtid);
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
                        $res=$this->Model_Db->insert(47,$insert);
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
                $res = $this->Model_Db->select(17, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'gendername' => $r->gendername,
                            'gendernshortame' => $r->gendernshortame,
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
