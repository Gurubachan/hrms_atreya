<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
header("Access-Control-Allow-Origin: *");
class Document extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
//        $this->load->model("Model_Db");

    }

    public function create_document_type(){
        try{
            extract($_POST);
            $data=array();
            $insert=array();
            $status=true;
            if(isset($txtDocumentname) && preg_match("/[a-zA-Z ]{3,60}/",$txtDocumentname)){
                $insert[0]['documenttypename']=$txtDocumentname;
            }else{
                $status=false;
                $data['data']="Document type name error";
            }
            if($status){
                if(isset($txtid) && is_numeric($txtid)){
                    if($txtid>0){
                        $insert[0]['updatedby']=$this->session->login['userid'];
                        $insert[0]['updatedat']=date("Y-m-d H:i:s");
                    }else if($txtid==0){
                        $where="documenttypename='$txtDocumentname'";
                        $duplicate_check=$this->Model_Db->select(101,null,$where);
                        if($duplicate_check!=false){
                            $data['message']="Duplicate entry";
                            $data['data']=$txtDocumentname."is already present in database";
                            $data['status']=false;
                            $data['flag']=0;
                        }else{
                            $insert[0]['entryby']=$this->session->login['userid'];
                            $insert[0]['createdat']=date("Y-m-d H:i:s");
                            $res=$this->Model_Db->insert(101,$insert);
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
//    public function load_documenttype(){
//        try{
//            $data=array();
//            $where="isactive=true";
//            $status =  true;
//            $res=$this->Model_Db->select(101,null,$where);
////            $data['data']="<option value=''>Select</option>";
//            if($res!=false){
//                foreach ($res as $r){
//                    $data[]="<option value=\"$r->id\">$r->documenttypename</option>";
//                }
//            }
//            echo json_encode($data);
//        }catch (Exception $e){
//            $data['message']= "Message:".$e->getMessage();
//            $data['status']=false;
//            $data['error']=true;
//            echo json_encode($data);
//            exit();
//        }
//    }
    public function load_documenttype(){
        try{
            extract($_POST);
            $data=array();
            $where="isactive=true";
            $res=$this->Model_Db->select(101,null,$where);
            $data[]="<option value=''>Select</option>";
            if($res!=false){
                foreach ($res as $r){
                    $data[]="<option value='$r->id'>$r->documenttypename</option>";
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
//    public function report_purpose_details(){
//        try{
//            $data=array();
//            $request = json_decode(json_encode($_POST), FALSE);
//            $current_date=Date("Y-m-d");
//            if(isset($request->checkparams) && is_numeric($request->checkparams)) {
//                switch ($request->checkparams) {
//                    case 1:
//                        $where = "DATE(createdat)=DATE('$current_date')";
//                        break;
//                    case 2:
//                        $where = "1=1";
//                        break;
//                    case 3:
//                        $where = "isactive=true";
//                        break;
//                    case 4:
//                        $where = "isactive=false";
//                        break;
//                    default:
//                        $data['message'] = "ID not found";
//                        $data['status'] = false;
//                        $data['error'] = true;
//                        exit();
//                }
//                $res = $this->Model_Db->select(79, null, $where);
//                if ($res != false) {
//                    foreach ($res as $r) {
//                        $data[] = array(
//                            'id' => $r->id,
//                            'purpose' => $r->purpose,
//                            'creationdate' => $r->createdat,
//                            'lastmodifiedon' => $r->updatedat,
//                            'isactive' => $r->isactive
//                        );
//                    }
//                }
//            }
//            echo json_encode($data);
//        }catch (Exception $e){
//            $data['message']= "Message:".$e->getMessage();
//            $data['status']=false;
//            $data['error']=true;
//            echo json_encode($data);
//            exit();
//        }
//    }
//    public function intimeViewDetails(){
//        extract($_POST);
//        print_r($_POST);
//        $where="id=$id";
//        $data['result']=$this->Model_Db->select(33,null,$where);
//        $this->load->view("Bank/viewDetails",$data);
//    }
}
