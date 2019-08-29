<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
//header("Access-Control-Allow-Origin: *");
class Common extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function record_active_deactive(){
        try{
            $data=array();
            $update=array();
            $status=true;
            $tableid='';
            $request=json_decode(json_encode($_POST), FALSE);
            if(isset($request->txtid) && is_numeric($request->txtid)){
                $update[0]['id']=$request->txtid;
            }
            if(isset($request->tableid) && $request->tableid !=''){
                if($request->tableid == 'formYear'){
                    $tableid=37;
                }else if($request->tableid == 'formMaritalStatus'){
                    $tableid=19;
                }else if($request->tableid == 'formNewEmployee'){
                    $tableid=29;
                }else if($request->tableid == 'formEmployeeType'){
                    $tableid=15;
                }else if($request->tableid == 'formEmployeeBankDetails'){
                    $tableid=35;
                }else if($request->tableid == 'mapping_company_department'){
                    $tableid=27;
                }else if($request->tableid == 'formState'){
                    $tableid=7;
                }else if($request->tableid == 'formDistrict'){
                    $tableid=9;
                }else if($request->tableid == 'formEducation'){
                    $tableid=21;
                }else if($request->tableid == 'formBankDetails'){
                    $tableid=33;
                }else if($request->tableid == 'formGender'){
                    $tableid=17;
                }else if($request->tableid == 'loadCompanyType') {
                    $tableid = 11;
                }else if($request->tableid == 'loadNewCompany'){
                    $tableid=13;
                }else if($request->tableid == 'loadDepartment'){
                    $tableid=23;
                }else if($request->tableid == 'loadDesignation'){
                    $tableid=25;
                }else if($request->tableid == 'formUsertype'){
                    $tableid=1;
                }else if($request->tableid == 'formUser'){
                    $tableid=3;
                };
            }
            if(isset($request->isactive) && is_numeric($request->isactive)){
                if($request->isactive==1){
                    $request->isactive=false;
                }else{
                    $request->isactive=true;
                }
                $update[0]['isactive']=$request->isactive;
                $update[0]['updatedby']=$this->session->login['userid'];
                $update[0]['updatedat']=date("Y-m-d H:i:s");
            }
            $res=$this->Model_Db->update($tableid,$update,"id",$request->txtid);
            if($res!=false){
                $data['message']="Update successful.";
                $data['status']=true;
            }else{
                $data['message']="Update failed.";
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
}
