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

    public function create_employee_basic_details()
    {
        try {
            extract($_POST);
            $data = array();
            $insert = array();
            $status = true;
            if (isset($txtSlno) && preg_match("/[0-9a-zA-Z]{2,11}/", $txtSlno)) {
                $insert[0]['empslno'] = strtoupper($txtSlno);
            } else {
                $status = false;
                $data['data'] = "Seriel no error";
            }
            if (isset($txtFname) && preg_match("/[a-zA-Z ]{2,80}/", $txtFname)) {
                $insert[0]['empfirstname'] = strtoupper($txtFname);
            } else {
                $status = false;
                $data['data'] = "First name error";
            }
            if (isset($txtMname) && preg_match("/[a-zA-Z ]{2,80}/", $txtMname)) {
                $insert[0]['empmiddlename'] = strtoupper($txtMname);
            } else {
                $insert[0]['empmiddlename'] = "";
            }
            if (isset($txtLname) && preg_match("/[a-zA-Z ]{2,80}/", $txtLname)) {
                $insert[0]['emplastname'] = strtoupper($txtLname);
            } else {
                $status = false;
                $data['data'] = "Last name error";
            }
            if (isset($cboGenderid) && is_numeric($cboGenderid)) {
                $insert[0]['empgenderid'] = $cboGenderid;
            } else {
                $status = false;
                $data['data'] = "Gender error";
            }
            if (isset($txtDob) && preg_match("/[0-9]{2}+\-[0-9]{2}+\-[0-9]{4}/", $txtDob)) {
                $dob = date("Y-m-d", strtotime($txtDob));
                $insert[0]['empdob'] = $dob;
            } else {
                $status = false;
                $data['data'] = "Employee date of birth error";
            }
            if (isset($txtDoj) && preg_match("/[0-9]{2}+\-[0-9]{2}+\-[0-9]{4}/", $txtDoj)) {
                $doj = date("Y-m-d", strtotime($txtDoj));
                $insert[0]['empdoj'] = $doj;
            } else {
                $status = false;
                $data['data'] = "Employee date of joining error";
            }
            if (isset($cboMaritalstatusid) && is_numeric($cboMaritalstatusid)) {
                $insert[0]['empmaritalstatusid'] = $cboMaritalstatusid;
            } else {
                $status = false;
                $data['data'] = "Marital status error";
            }
            if (isset($cboreligionid) && is_numeric($cboreligionid)) {
                $insert[0]['religionid'] = $cboreligionid;
            } else {
                $status = false;
                $data['data'] = "Religion status error";
            }
            if (isset($txtFathername) && preg_match("/[a-zA-Z ]{2,80}/", $txtFathername)) {
                $insert[0]['empfathername'] = strtoupper($txtFathername);
            } else {
                $status = false;
                $data['data'] = "Father name error";
            }
            if (isset($txtMothername) && preg_match("/[a-zA-Z ]{2,80}/", $txtMothername)) {
                $insert[0]['empmothername'] = strtoupper($txtMothername) ;
            } else {
                $status = false;
                $data['data'] = "Mother name error";
            }
            if (isset($txtSpousename) && preg_match("/[a-zA-Z ]{2,80}/", $txtSpousename)) {
                $insert[0]['empspousename'] = strtoupper($txtSpousename) ;
            } else {
                $insert[0]['empspousename'] = '';
            }
            if (isset($cboDepartmentmappingid) && is_numeric($cboDepartmentmappingid)) {
                $insert[0]['empdepmappingid'] =  $cboDepartmentmappingid;
            } else {
                $status = false;
                $data['message'] = "Error!!";
                $data['data'] = "Department error";
            }
            if (isset($cboDesignationid) && is_numeric($cboDesignationid)) {
                $insert[0]['empdesid'] = $cboDesignationid;
            } else {
                $status = false;
                $data['data'] = "Designation error";
            }
            if ($status) {
                if (isset($txtid) && is_numeric($txtid)) {
                    $insert[0]['updatedby'] = $this->session->login['userid'];
                    $insert[0]['updatedat'] = date("Y-m-d H:i:s");
                    $res = $this->Model_Db->update(93, $insert, "id", $txtid);
                    if ($res != false) {
                        $data['message'] = "successful";
                        $data['data'] = "Update successful.";
                        $data['status'] = true;
                        $data['empid'] = $txtid;
                    } else {
                        $data['message'] = "Update failed.";
                        $data['status'] = false;
                    }
                }else{
                        $insert[0]['entryby'] = $this->session->login['userid'];
                        $insert[0]['createdat'] = date("Y-m-d H:i:s");
                        $res = $this->Model_Db->insert(93, $insert);
                        if ($res != false) {
                            $data['message'] = "successful";
                            $data['data'] = "Data insert successful";
                            $data['status'] = true;
                            $data['empid'] = $res;
                        } else {
                            $data['message'] = "Insert failed.";
                            $data['data'] = "Data Insert failed.";
                            $data['status'] = false;
                        }
                }
                } else {
                    $data['message'] = "Error!";
                    $data['status'] = false;
                }
            echo json_encode($data);
            exit();
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }
    }

    public function create_employee_communication()
    {
        try {
            extract($_POST);
            $data = array();
            $insert = array();
            $status = true;
            if (isset($txtid) && $txtid != null) {
                $insert[0]['empid'] = $txtid;
            } else {
                $status = false;
                $data['data']='id not found';
            }

            if (isset($txtMobile) && preg_match("/[6-9]{1}[0-9]{9}/", $txtMobile)) {
                $insert[0]['empcontact'] = $txtMobile;
            } else {
                $status = false;
                $data['data'] = "Employee contact error";
//                $insert[0]['empcontact'] ="";
            }
            if (isset($txtAltermobile) && preg_match("/[6-9]{1}[0-9]{9}/", $txtAltermobile)) {
                $insert[0]['empaltcontact'] = $txtAltermobile;
            } else {
                $insert[0]['empaltcontact'] = 0;
            }
            if (isset($txtEmailid) && preg_match("/[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}/", $txtEmailid)) {
                $insert[0]['empemail'] = $txtEmailid;
            }
            if (isset($permanent_address)) { //permanent address
                $insert[0]['empaddress'] = strtoupper($permanent_address) ;
            } else {
                $status = false;
                $data['data'] = "Employee address error";
            }
            if (isset($present_address)) {
                $insert[0]['emppresentaddress'] = strtoupper($present_address) ;
            } else {
                $status = false;
                $data['data'] = "Employee address error";
            }
            if ($status) {
                $insert[0]['entryby'] = $this->session->login['userid'];
                $insert[0]['createdat'] = date("Y-m-d H:i:s");
                $res = $this->Model_Db->insert(95, $insert);
                if ($res != false) {
                    $data['message'] = "Successful";
                    $data['data'] = "Data insert successful";
                    $data['status'] = true;
                } else {
                    $data['message'] = "Insert failed.";
                    $data['data'] = "Data Insert failed.";
                    $data['status'] = false;
                }
            } else {
                $data['message'] = "Insufficient/Invalid data.";
                $data['status'] = false;
            }
            echo json_encode($data);
            exit();
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }
    }
    public function create_employee_experience()
    {
        try {
            extract($_POST);
            $data = array();
            $insert = array();
            $status = true;
            if (isset($txtid) && is_numeric($txtid)) {
                if (isset($cboCompanyname) && is_array($cboCompanyname)) {
                    $i = 0;
                    foreach ($cboCompanyname as $cmpname) {
                        $frmDate = date("Y-m-d",strtotime($txtFromdate[$i]));
                        if(isset($txtTodate[$i]) && $txtTodate[$i]!=null){
                            $toDate = date("Y-m-d",strtotime($txtTodate[$i]));
//                            $toDate = date("Y-m-d");
                        }else{
                            $toDate = date("Y-m-d");
                        }
                        $insert [] = array(
                            'empid' => $txtid,
                            'companyname' => strtoupper($cmpname),
                            'jobdesid' => $cboJobdesignation[$i],
//                            'fromdate' => $txtFromdate[$i],
                            'fromdate' => $frmDate,
//                            'todate' => $txtTodate[$i],
                            'todate' => $toDate,
                            'jobrole' => strtoupper($txtJobrole[$i]) ,
                            'entryby' => $this->session->login['userid'],
                            'createdat' => date("Y-m-d H:i:s")
                        );
                        $i++;
                    }
                } else {
                    $status = false;
                    $data['data'] = "Employee education id error";
                }
            } else {
                $status = false;
                $data['data'] = "Employee id not found";
            }
            if ($status) {
                $insert[0]['entryby'] = $this->session->login['userid'];
                $insert[0]['createdat'] = date("Y-m-d H:i:s");
                $res = $this->Model_Db->insert(99, $insert);
                if ($res != false) {
                    $data['message'] = "Successful";
                    $data['data'] = "Data insert successful";
                    $data['status'] = true;
//                    $data['empid'] = $txtid;
                } else {
                    $data['message'] = "Insert failed.";
                    $data['data'] = "Data Insert failed.";
                    $data['status'] = false;
                }
            } else {
                $data['message'] = "error!";
                $data['date'] = "Insufficient/Invalid data.";
                $data['status'] = false;
            }
            echo json_encode($data);
            exit();
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }
    }

    public function create_employee_qualification()
    {
        try {
            extract($_POST);
            $data = array();
            $insert = array();
            $status = true;
            if (isset($txtid) && is_numeric($txtid)) {
                if (isset($cboEducationid) && is_array($cboEducationid)) {
                    $i = 0;
                    // print_r($_POST);
                    $this->load->library('upload');
                    foreach ($cboEducationid as $cboedu) {
                        $config['upload_path'] = './assets/empqualification_doc/';
                        $config['allowed_types'] = 'pdf';
                        $config['max_size'] = 1024;
                        $config['max_width'] = 5048;
                        $config['max_height'] = 5048;
                        $config['file_name'] = "doc" . date("Y-m-d@H-i-s");
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('fileCertificate' . $i)) {
                            echo $this->upload->display_errors();
                            exit();
                        } else {
                            $upload_doc = $this->upload->data();
                        }
                        $insert [] = array(
                            'empid' => $txtid,
                            'empeduid' => $cboedu,
                            'empedustream' => strtoupper($txtEducationstream[$i]),
                            'empeduboard' => strtoupper($txtBoard[$i]),
                            'empregdno' => strtoupper($txtRegdno[$i]),
                            'emppercentage' => $txtPercentage[$i],
                            'documentupload' => $upload_doc['file_name'],
                            'entryby' => $this->session->login['userid'],
                            'createdat' => date("Y-m-d H:i:s")
                        );
                        $i++;
                    }
                } else {
                    $status = false;
                    $data['data'] = "Employee education id error";
                }
            } else {
                $status = false;
                $data['data'] = "Employee id not found";
            }
            if ($status) {
                $res = $this->Model_Db->insert(97, $insert);
                if ($res != false) {
                    $data['message'] = "Successful";
                    $data['data'] = "Data insert successful";
                    $data['status'] = true;
                } else {
                    $data['message'] = "Insert failed.";
                    $data['data'] = "Data Insert failed.";
                    $data['status'] = false;
                }
            } else {
                $data['message'] = "Error!!";
                $data['data'] = "Insufficient/Invalid data.";
                $data['status'] = false;
            }
            echo json_encode($data);
            exit();
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }
    }

    public function create_employee_upload_documnet_details()
    {
        try {
            extract($_POST);
            $data = array();
            $insert = array();
            $status = true;
            if (isset($txtid) && is_numeric($txtid)) {
                if (isset($cboDocumentType) && is_array($cboDocumentType)) {
                    $i = 0;
                    $this->load->library('upload');
                    foreach ($cboDocumentType as $cbodt) {
                        $config['upload_path'] = './assets/empidentification_doc/';
                        $config['allowed_types'] = 'pdf';
                        $config['max_size'] = 1024;
                        $config['max_width'] = 2048;
                        $config['max_height'] = 2048;
                        $config['file_name'] = "docs" . date("Y-m-d@H-i-s");
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('fileUploadIdentification' . $i)) {
                            echo $this->upload->display_errors();
                            exit();
                        } else {
                            $upload_docs = $this->upload->data();
                        }
                        $insert [] = array(
                            'empid' => $txtid,
                            'documenttypeid' => $cbodt,
                            'documentnumber' => strtoupper($txtDocIdentificationNumber[$i]),
                            'documentupload' => $upload_docs['file_name'],
                            'entryby' => $this->session->login['userid'],
                            'createdat' => date("Y-m-d H:i:s")
                        );
                        $i++;
                    }
                } else {
                    $status = false;
                    $data['data'] = "Employee documents id error";
                }
            } else {
                $status = false;
                $data['data'] = "Employee id not found";
            }
            if ($status) {
                $res = $this->Model_Db->insert(103, $insert);
                if ($res != false) {
                    $data['message'] = "Successful";
                    $data['data'] = "Data insert successful";
                    $data['status'] = true;
                } else {
                    $data['message'] = "Insert failed.";
                    $data['data'] = "Data Insert failed.";
                    $data['status'] = false;
                }
            } else {
                $data['message'] = "Error!!";
                $data['data'] = "Insufficient/Invalid data.";
                $data['status'] = false;
            }
            echo json_encode($data);
            exit();
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }
    }

    public function create_employee_bank_details()
    {
        try {
            extract($_POST);
            $data = array();
            $insert = array();
            $status = true;
            if (isset($txtid) && is_numeric($txtid)) {
                if (isset($cboUploadBankid) && is_numeric($cboUploadBankid)) {
                    // print_r($_POST);
                    $config['upload_path'] = './assets/empbankupload_doc/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = 1024;
                    $config['max_width'] = 6048;
                    $config['max_height'] = 6048;
                    $config['file_name'] = "bdoc" . date("Y-m-d@H-i-s");
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('fileUploadBank')) {
                        echo $this->upload->display_errors();
                        exit();
                    } else {
                        $upload_doc = $this->upload->data();
                    }
                    $insert [] = array(
                        'empid' => $txtid,
                        'bankid' => $cboUploadBankid,
                        'acno' => $txtAcNumber,
                        'ifsccode' => strtoupper($txtIFSCCode),
                        'documentupload' => $upload_doc['file_name'],
                        'entryby' => $this->session->login['userid'],
                        'createdat' => date("Y-m-d H:i:s")
                    );
                } else {
                    $status = false;
                    $data['data'] = "Employee education id error";
                }
            } else {
                $status = false;
                $data['data'] = "Employee id not found";
            }

            if ($status) {
                $res = $this->Model_Db->insert(35, $insert);
                if ($res != false) {
                    $data['message'] = "Successful";
                    $data['data'] = "Data insert successful";
                    $data['status'] = true;
                } else {
                    $data['message'] = "Insert failed.";
                    $data['data'] = "Data Insert failed.";
                    $data['status'] = false;
                }
            } else {
                $data['message'] = "Error!!";
                $data['data'] = "Insufficient/Invalid data.";
                $data['status'] = false;
            }
            echo json_encode($data);
            exit();
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }
    }

//    public function employee_report($checkparams=null){
//    $data=array();
////    $request = json_decode(json_encode($_POST), FALSE);
////    $postdata = file_get_contents("php://input");
//    extract($_POST);
//    $current_date= Date('Y-m-d');
//    if(isset($checkparams) && is_numeric($checkparams)) {
//        switch ($checkparams) {
//            case 1:
//                $where = "DATE(createdat)=DATE('$current_date')";
//                break;
//            case 2:
//                $where = "1=1";
//                break;
//            case 3:
//                $where = "isactive=true";
//                break;
//            case 4:
//                $where = "isactive=false";
//                break;
//            default:
//                $data['message']="ID not found";
//                $data['status']=false;
//                $data['error']=true;
//                exit();
//        }
//        $res = $this->Model_Db->select(93, null, $where);
//        echo"<pre>";
//        print_r($res);
//        if ($res != false) {
//            $where="isactive=true";
//            $maritalstatus=$this->Model_Db->select(19, null, $where);
//            $gender=$this->Model_Db->select(17, null, $where);
//            $designation=$this->Model_Db->select(25, null, $where);
//            $department=$this->Model_Db->select(28, null, $where);
//            $i=0;
//            $arr=array();
//            foreach ($res as $r) {
//                $arr[]=$r->id;
//                $data[$i] = array(
//                    'id' => $r->id,
//                    'slno' => $r->empslno,
//                    'firstname' => $r->empfirstname,
//                    'middlename' => $r->empmiddlename,
//                    'lastname' => $r->emplastname,
//                    'doj' => $r->empdoj,
//                    'dob' => $r->empdob,
//                    'fathername' => $r->empfathername,
//                    'mothername' => $r->empmothername,
//                    'spousename' => $r->empspousename
//                );
//                foreach ($maritalstatus as $mrs) {
//                    if($r->empmaritalstatusid==$mrs->id){
//                        $data[$i]['maritalstatusid']=$mrs->id;
//                        $data[$i]['maritalstatusname']=$mrs->statusname;
//                    }
//                }
//                foreach ($gender as $gnd) {
//                    if($r->empgenderid==$gnd->id){
//                        $data[$i]['genderid']=$gnd->id;
//                        $data[$i]['gendername']=$gnd->gendername;
//                    }
//                }
//                foreach ($designation as $desgn) {
//                    if($r->empdesid==$desgn->id){
//                        $data[$i]['designationid']=$desgn->id;
//                        $data[$i]['designationname']=$desgn->designationname;
//                    }
//
//                }
//                foreach ($department as $dept) {
//                    if($r->empdesid==$dept->id){
//                        $data[$i]['departmentid']=$dept->id;
//                        $data[$i]['departmentname']=$dept->departmentname;
//                    }
//
//                }
//            }
//            $ids=implode(",",$arr);
//            $where_ids="empid in ($ids) and isactive=true";
//        }
//    }
// }
//    }

    public function report_employee_basic_details()
    {
        try {
            $data = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
//            $datanow = date("Y-m-d H:i:s");
            $current_date = Date("Y-m-d");
            if (isset($request->checkparams) && is_numeric($request->checkparams)) {
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
                $orderby = "empfirstname asc";
                $res = $this->Model_Db->select(93, null, $where,$orderby);
                if ($res != false) {
                    $where = "isactive=true";
                    $maritalstatus=$this->Model_Db->select(19, null, $where);
                    $gender=$this->Model_Db->select(17, null, $where);
                    $designation=$this->Model_Db->select(25, null, $where);
                    $department=$this->Model_Db->select(28, null, $where);
                    $i=0;
                    foreach ($res as $r) {
                        $data[$i] = array(
                            'id' => $r->id,
                            'empfname' => $r->empfirstname,
                            'empmname' => $r->empmiddlename,
                            'emplname' => $r->emplastname,
                            'empfathername' => $r->empfathername,
                            'empmothername' => $r->empmothername,
                            'empspousename' => $r->empspousename,
                            'empdob' => "",
                            'empdoj' => "",
                            'empslno' => $r->empslno,
                            'creationdate' => $r->createdat,
                            'lastmodifiedon' => $r->updatedat,
                            'religionid'=> $r->religionid,
                            'isactive' => $r->isactive
                        );
                        if($r->empdob!=null){
                            $data[$i]['empdob']= date("d-m-Y",strtotime($r->empdob));
                        }
                        if($r->empdoj!=null){
                            $data[$i]['empdoj']= date("d-m-Y",strtotime($r->empdoj));
                        }
                        foreach ($maritalstatus as $mrs) {
                            if($r->empmaritalstatusid == $mrs->id){
                                $data[$i]['maritalstatusid'] = $mrs->id;
                                $data[$i]['maritalstatusname'] = $mrs->statusname;
                            }
                        }
                        foreach ($gender as $gnd){
                            if($r->empgenderid == $gnd->id){
                                $data[$i]['genderid'] = $gnd->id;
                                $data[$i]['gendername'] = $gnd->gendername;
                            }
                        }
                        foreach ($designation as $des){
                            if($r->empdesid == $des->id){
                                $data[$i]['designationid'] = $des->id;
                                $data[$i]['designationname'] = $des->designationname;
                            }
                        }
                        foreach ($department as $dept){
                            if($r->empdepmappingid == $dept->id){
                                $data[$i]['departmentid'] = $dept->id;
                                $data[$i]['deptname'] = $dept->departmentname;
                                $data[$i]['deptcompanyname'] = $dept->companyname;
                            }
                        }
                        $i++;
                    }

                }
            }
            echo json_encode($data);
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }

    }
    public function report_employee_communication_details()
    {
        try {
            $data = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
//            $datanow = date("Y-m-d H:i:s");
            $current_date = Date("Y-m-d");
            if (isset($request->checkparams) && is_numeric($request->checkparams)) {
                $where = "empid=$request->checkparams";
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
                $res = $this->Model_Db->select(95, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'empcontact' => $r->empcontact,
                            'empemail' => $r->empemail,
                            'empaddress' => $r->empaddress,
                            'empaltcontact' => $r->empaltcontact,
                            'emppresentaddress' => $r->emppresentaddress,
                            'creationdate' => $r->createdat,
                            'lastmodifiedon' => $r->updatedat,
                            'isactive' => $r->isactive
                        );
                    }

                }
            }
            echo json_encode($data);
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }

    }
    public function report_employee_experience_details()
    {
        try {
            $data = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
//            $datanow = date("Y-m-d H:i:s");
            $current_date = Date("Y-m-d");
            if (isset($request->checkparams) && is_numeric($request->checkparams)) {
                $where = "empid=$request->checkparams";
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
                $res = $this->Model_Db->select(99, null, $where);
                if ($res != false) {
                    $where="isactive=true";
                    $designation = $this->Model_Db->select(25,null,$where);
                    $i=0;
                    foreach ($res as $r) {
                        $data[$i] = array(
                            'id' => $r->id,
                            'companyname' => $r->companyname,
                            'jobrole' => $r->jobrole,
                            'fromdate' => $r->fromdate,
                            'todate' => $r->todate,
                            'creationdate' => $r->createdat,
                            'lastmodifiedon' => $r->updatedat,
                            'isactive' => $r->isactive
                        );
                        foreach ($designation as $des){
                            if($r->jobdesid == $des->id){
                                $data[$i]['desginationid'] = $des->id;
                                $data[$i]['designationname'] =$des->designationname;
                            }
                        }
                        $i++;
                    }

                }
            }
            echo json_encode($data);
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }

    }
//    public function report_employee_experience_details()
//    {
//        try {
//            $data = array();
//            $request = json_decode(json_encode($_POST), FALSE);
//            $postdata = file_get_contents("php://input");
////			$request = json_decode($postdata);
////            $datanow = date("Y-m-d H:i:s");
//            $current_date = Date("Y-m-d");
//            if (isset($request->checkparams) && is_numeric($request->checkparams)) {
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
//                $res = $this->Model_Db->select(99, null, $where);
//                if ($res != false) {
//                    $where="isactive=true";
//                    $designation = $this->Model_Db->select(25,null,$where);
//                    $i=0;
//                    $j=0;
//                    foreach ($res as $r) {
//                        $data[$i] = array(
//                            'empid' => $r->empid,
//                        );
//                        if($r->empid >0){
//                            $data[$i][$j]=array(
//                                'companyname' => $r->companyname,
//                                'jobrole' => $r->jobrole,
//                                'fromdate' => $r->fromdate,
//                                'todate' => $r->todate,
//                                'creationdate' => $r->createdat,
//                                'lastmodifiedon' => $r->updatedat,
//                                'isactive' => $r->isactive
//                            );
//                        }else{
//                            $data[$i]=array(
//                                'companyname' => $r->companyname,
//                                'jobrole' => $r->jobrole,
//                                'fromdate' => $r->fromdate,
//                                'todate' => $r->todate,
//                                'creationdate' => $r->createdat,
//                                'lastmodifiedon' => $r->updatedat,
//                                'isactive' => $r->isactive
//                            );
//                        }
//                        foreach ($designation as $des){
//                            if($r->jobdesid == $des->id){
//                                $data[$i]['desginationid'] = $des->id;
//                                $data[$i]['designationname'] =$des->designationname;
//                            }
//                        }
//                        $i++;
//                    }
//
//                }
//            }
//            echo json_encode($data);
//        } catch (Exception $e) {
//            $data['message'] = "Message:" . $e->getMessage();
//            $data['status'] = false;
//            $data['error'] = true;
//            echo json_encode($data);
//            exit();
//        }
//
//    }
    public function report_employee_qualification_details()
    {
        try {
            $data = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
//            $datanow = date("Y-m-d H:i:s");
            $current_date = Date("Y-m-d");
            if (isset($request->checkparams) && is_numeric($request->checkparams)) {
                $where = "empid=$request->checkparams";
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
                $res = $this->Model_Db->select(97, null, $where);
                if ($res != false) {
                    $where = "isactive=true";
                    $education = $this->Model_Db->select(21,null,$where);
                    $i=0;
                    foreach ($res as $r) {
                        $data[$i] = array(
                            'id' => $r->id,
                            'empedustream' => $r->empedustream,
                            'empeduboard' => $r->empeduboard,
                            'empregdno' => $r->empregdno,
                            'emppercentage' => $r->emppercentage,
                            'documentupload' => $r->documentupload,
                            'creationdate' => $r->createdat,
                            'lastmodifiedon' => $r->updatedat,
                            'isactive' => $r->isactive
                        );
                        foreach ($education as $edu){
                            if($r->empeduid == $edu->id){
                                $data[$i]['educationid'] = $edu->id;
                                $data[$i]['educationname'] = $edu->educationname;
                            }
                        }
                        $i++;
                    }

                }
            }
            echo json_encode($data);
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }

    }
    public function report_employee_documents_upload_details()
    {
        try {
            $data = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
//            $datanow = date("Y-m-d H:i:s");
            $current_date = Date("Y-m-d");
            if (isset($request->checkparams) && is_numeric($request->checkparams)) {
                $where = "empid=$request->checkparams";
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
                $res = $this->Model_Db->select(103, null, $where);
                if ($res != false) {
                    $where = "isactive=true";
                    $documenttype = $this->Model_Db->select(101,null,$where);
                    $i=0;
                    foreach ($res as $r) {
                        $data[$i] = array(
                            'id' => $r->id,
                            'documentnumber' => $r->documentnumber,
                            'documentupload' => $r->documentupload,
                            'creationdate' => $r->createdat,
                            'lastmodifiedon' => $r->updatedat,
                            'isactive' => $r->isactive
                        );
                        foreach ($documenttype as $doctype){
                            if($r->documenttypeid == $doctype->id){
                                $data[$i]['documenttypeid'] = $doctype->id;
                                $data[$i]['documenttypename'] = $doctype->documenttypename;
                            }
                        }
                        $i++;
                    }

                }
            }
            echo json_encode($data);
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }

    }
    public function report_employee_bank_details()
    {
        try {
            $data = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
//            $datanow = date("Y-m-d H:i:s");
            $current_date = Date("Y-m-d");
            if (isset($request->checkparams) && is_numeric($request->checkparams)) {
                $where = "empid=$request->checkparams";
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
                $res = $this->Model_Db->select(35, null, $where);
                if ($res != false) {
                    $where ="isactive=true";
                    $bank = $this->Model_Db->select(33,null,$where);
                    $i=0;
                    foreach ($res as $r) {
                        $data[$i] = array(
                            'id' => $r->id,
                            'acno' => $r->acno,
                            'ifsccode' => $r->ifsccode,
                            'creationdate' => $r->createdat,
                            'documentupload'=> $r->documentupload,
                            'lastmodifiedon' => $r->updatedat,
                            'isactive' => $r->isactive
                        );
                        foreach ($bank as $b){
                            if($r->bankid == $b->id){
                                $data[$i]['bankid'] = $b->id;
                                $data[$i]['bankname'] = $b->bankname;
                            }
                        }
                        $i++;
                    }

                }
            }
            echo json_encode($data);
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }

    }
}

