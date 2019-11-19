<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Resource extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function create_periodtype()
    {
        try {
            $data = array();
            $insert = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status = true;
            if (isset($request->periodtypename) && preg_match("/^[a-zA-Z ]{1,20}$/", $request->periodtypename)) {
                $insert[0]['periodtype'] = $request->periodtypename;
            } else {
                $status = false;
            }
            if (isset($request->isactive) && preg_match("/[0,1]{1}/", $request->isactive)) {
                if ($request->isactive == 1) {
                    $insert[0]['isactive'] = true;
                } else if ($request->isactive == 0) {
                    $insert[0]['isactive'] = false;
                } else {
                    $status = false;
                }
            } else {
                $status = false;
            }
            if ($status) {
                if (isset($request->txtid) && is_numeric($request->txtid)) {
                    if ($request->txtid > 0) {
                        $insert[0]['updatedby'] = $this->session->login['userid'];
                        $insert[0]['updatedat'] = date("Y-m-d H:i:s");
                        $res = $this->Model_Db->update(67, $insert, "id", $request->txtid);
                        if ($res != false) {
                            $data['message'] = "Update successful.";
                            $data['status'] = true;
                        } else {
                            $data['message'] = "Update failed.";
                            $data['status'] = false;
                        }
                    } else if ($request->txtid == 0) {
                        $where = "periodtype='$request->periodtypename'";
                        $duplicate_entry = $this->Model_Db->select(67, null, $where);
                        if ($duplicate_entry != false) {
                            $data['message'] = 'Duplicate entry';
                            $data['status'] = false;
                            $data['flag'] = 0;
                        } else {
                            $insert[0]['entryby'] = $this->session->login['userid'];
                            $insert[0]['createdat'] = date("Y-m-d H:i:s");
                            $res = $this->Model_Db->insert(67, $insert);
                            if ($res != false) {
                                $data['message'] = "Insert successful.";
                                $data['status'] = true;
                            } else {
                                $data['message'] = "Insert failed.";
                                $data['status'] = false;
                            }
                        }
                    } else {
                        $data['message'] = "Insufficient/Invalid data.";
                        $data['status'] = false;
                    }
                } else {
                    $data['message'] = "Insufficient/Invalid data.";
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
    public function load_periodtype()
    {
        try {
            $data = array();
            $where = "isactive=true";
            $res = $this->Model_Db->select(67, null, $where);
            $data[] = "<option value=''>Select</option>";
            if ($res != false) {
                foreach ($res as $r) {
                    $data[] = "<option value='$r->id'>$r->periodtype</option>";
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
    public function report_periodtype()
    {
        try {
            $data = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date = date("Y-m-d");
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
                $res = $this->Model_Db->select(67, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'periodtype' => $r->periodtype,
                            'creationdate' => $r->createdat,
                            'lastmodifiedon' => $r->updatedat,
                            'isactive' => $r->isactive
                        );
                    }
                }
                echo json_encode($data);
            }
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }
    }

    public function create_assurance()
    {
        try {
            $data = array();
            $insert = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status = true;
            if (isset($request->assurancename) && preg_match("/^[a-zA-Z ]{1,20}$/", $request->assurancename)) {
                $insert[0]['assurance'] = $request->assurancename;
            } else {
                $status = false;
            }
            if (isset($request->isactive) && preg_match("/[0,1]{1}/", $request->isactive)) {
                if ($request->isactive == 1) {
                    $insert[0]['isactive'] = true;
                } else if ($request->isactive == 0) {
                    $insert[0]['isactive'] = false;
                } else {
                    $status = false;
                }
            } else {
                $status = false;
            }
            if ($status) {
                if (isset($request->txtid) && is_numeric($request->txtid)) {
                    if ($request->txtid > 0) {
                        $insert[0]['updatedby'] = $this->session->login['userid'];
                        $insert[0]['updatedat'] = date("Y-m-d H:i:s");
                        $res = $this->Model_Db->update(65, $insert, "id", $request->txtid);
                        if ($res != false) {
                            $data['message'] = "Update successful.";
                            $data['status'] = true;
                        } else {
                            $data['message'] = "Update failed.";
                            $data['status'] = false;
                        }
                    } else if ($request->txtid == 0) {
                        $where = "assurance='$request->assurancename'";
                        $duplicate_entry = $this->Model_Db->select(65, null, $where);
                        if ($duplicate_entry != false) {
                            $data['message'] = 'Duplicate entry';
                            $data['status'] = false;
                            $data['flag'] = 0;
                        } else {
                            $insert[0]['entryby'] = $this->session->login['userid'];
                            $insert[0]['createdat'] = date("Y-m-d H:i:s");
                            $res = $this->Model_Db->insert(65, $insert);
                            if ($res != false) {
                                $data['message'] = "Insert successful.";
                                $data['status'] = true;
                            } else {
                                $data['message'] = "Insert failed.";
                                $data['status'] = false;
                            }
                        }
                    } else {
                        $data['message'] = "Insufficient/Invalid data.";
                        $data['status'] = false;
                    }
                } else {
                    $data['message'] = "Insufficient/Invalid data.";
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
    public function load_assurance()
    {
        try {
            $data = array();
            $where = "isactive=true";
            $res = $this->Model_Db->select(65, null, $where);
            $data[] = "<option value=''>Select</option>";
            if ($res != false) {
                foreach ($res as $r) {
                    $data[] = "<option value='$r->id'>$r->assurance</option>";
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
    public function report_assurance()
    {
        try {
            $data = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date = date("Y-m-d");
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
                $res = $this->Model_Db->select(65, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'assurance' => $r->assurance,
                            'creationdate' => $r->createdat,
                            'lastmodifiedon' => $r->updatedat,
                            'isactive' => $r->isactive
                        );
                    }
                }
                echo json_encode($data);
            }
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }
    }

    public function create_resourcetype()
    {
        try {
            $data = array();
            $insert = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status = true;
            if (isset($request->resourcetype) && preg_match("/^[a-zA-Z ]{1,20}$/", $request->resourcetype)) {
                $insert[0]['typename'] = $request->resourcetype;
            } else {
                $status = false;
            }
            if (isset($request->resourceTypeShortname) && preg_match("/^[a-zA-Z ]{1,5}$/", $request->resourceTypeShortname)) {
                $insert[0]['typeshortname'] = $request->resourceTypeShortname;
            } else {
                $status = false;
            }
            if (isset($request->isactive) && preg_match("/[0,1]{1}/", $request->isactive)) {
                if ($request->isactive == 1) {
                    $insert[0]['isactive'] = true;
                } else if ($request->isactive == 0) {
                    $insert[0]['isactive'] = false;
                } else {
                    $status = false;
                }
            } else {
                $status = false;
            }
            if ($status) {
                if (isset($request->txtid) && is_numeric($request->txtid)) {
                    if ($request->txtid > 0) {
                        $insert[0]['updatedby'] = $this->session->login['userid'];
                        $insert[0]['updatedat'] = date("Y-m-d H:i:s");
                        $res = $this->Model_Db->update(69, $insert, "id", $request->txtid);
                        if ($res != false) {
                            $data['message'] = "Update successful.";
                            $data['status'] = true;
                        } else {
                            $data['message'] = "Update failed.";
                            $data['status'] = false;
                        }
                    } else if ($request->txtid == 0) {
                        $where = "typename='$request->resourcetype'";
                        $duplicate_entry = $this->Model_Db->select(69, null, $where);
                        if ($duplicate_entry != false) {
                            $data['message'] = 'Duplicate entry';
                            $data['status'] = false;
                            $data['flag'] = 0;
                        } else {
                            $insert[0]['entryby'] = $this->session->login['userid'];
                            $insert[0]['createdat'] = date("Y-m-d H:i:s");
                            $res = $this->Model_Db->insert(69, $insert);
                            if ($res != false) {
                                $data['message'] = "Insert successful.";
                                $data['status'] = true;
                            } else {
                                $data['message'] = "Insert failed.";
                                $data['status'] = false;
                            }
                        }
                    } else {
                        $data['message'] = "Insufficient/Invalid data.";
                        $data['status'] = false;
                    }
                } else {
                    $data['message'] = "Insufficient/Invalid data.";
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
    public function load_resourcetype()
    {
        try {
            $data = array();
            $where = "isactive=true";
            $res = $this->Model_Db->select(69, null, $where);
            $data[] = "<option value=''>Select</option>";
            if ($res != false) {
                foreach ($res as $r) {
                    $data[] = "<option value='$r->id'>$r->typename</option>";
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
    public function report_resourcetype()
    {
        try {
            $data = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date = date("Y-m-d");
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
                $res = $this->Model_Db->select(69, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'typename' => $r->typename,
                            'typeshortname' => $r->typeshortname,
                            'creationdate' => $r->createdat,
                            'lastmodifiedon' => $r->updatedat,
                            'isactive' => $r->isactive
                        );
                    }
                }
                echo json_encode($data);
            }
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }
    }

    public function create_resourcecompany()
    {
        try {
            $data = array();
            $insert = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status = true;
            if (isset($request->resourcecompanyname) && preg_match("/^[a-zA-Z ]{1,20}$/", $request->resourcecompanyname)) {
                $insert[0]['companyname'] = $request->resourcecompanyname;
            } else {
                $status = false;
            }
            if (isset($request->resourcecompanyshortname) && preg_match("/^[a-zA-Z ]{1,20}$/", $request->resourcecompanyshortname)) {
                $insert[0]['comapnyshortname'] = $request->resourcecompanyshortname;
            } else {
                $status = false;
            }
            if (isset($request->isactive) && preg_match("/[0,1]{1}/", $request->isactive)) {
                if ($request->isactive == 1) {
                    $insert[0]['isactive'] = true;
                } else if ($request->isactive == 0) {
                    $insert[0]['isactive'] = false;
                } else {
                    $status = false;
                }
            } else {
                $status = false;
            }
            if ($status) {
                if (isset($request->txtid) && is_numeric($request->txtid)) {
                    if ($request->txtid > 0) {
                        $insert[0]['updatedby'] = $this->session->login['userid'];
                        $insert[0]['updatedat'] = date("Y-m-d H:i:s");
                        $res = $this->Model_Db->update(71, $insert, "id", $request->txtid);
                        if ($res != false) {
                            $data['message'] = "Update successful.";
                            $data['status'] = true;
                        } else {
                            $data['message'] = "Update failed.";
                            $data['status'] = false;
                        }
                    } else if ($request->txtid == 0) {
                        $where = "companyname='$request->resourcecompanyname'";
                        $duplicate_entry = $this->Model_Db->select(71, null, $where);
                        if ($duplicate_entry != false) {
                            $data['message'] = 'Duplicate entry';
                            $data['status'] = false;
                            $data['flag'] = 0;
                        } else {
                            $insert[0]['entryby'] = $this->session->login['userid'];
                            $insert[0]['createdat'] = date("Y-m-d H:i:s");
                            $res = $this->Model_Db->insert(71, $insert);
                            if ($res != false) {
                                $data['message'] = "Insert successful.";
                                $data['status'] = true;
                            } else {
                                $data['message'] = "Insert failed.";
                                $data['status'] = false;
                            }
                        }
                    } else {
                        $data['message'] = "Insufficient/Invalid data.";
                        $data['status'] = false;
                    }
                } else {
                    $data['message'] = "Insufficient/Invalid data.";
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
    public function load_resourcecompany()
    {
        try {
            $data = array();
            $where = "isactive=true";
            $res = $this->Model_Db->select(71, null, $where);
            $data[] = "<option value=''>Select</option>";
            if ($res != false) {
                foreach ($res as $r) {
                    $data[] = "<option value='$r->id'>$r->companyname</option>";
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
    public function report_resourcecompany()
    {
        try {
            $data = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date = date("Y-m-d");
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
                $res = $this->Model_Db->select(71, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'companyname' => $r->companyname,
                            'companyshortname' => $r->comapnyshortname,
                            'creationdate' => $r->createdat,
                            'lastmodifiedon' => $r->updatedat,
                            'isactive' => $r->isactive
                        );
                    }
                }
                echo json_encode($data);
            }
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }
    }

    public function create_resource()
    {
        try {
            $data = array();
            $insert = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $status = true;
            if (isset($request->resourcetype) && preg_match("/^[0-9]{1,20}$/", $request->resourcetype)) {
                $insert[0]['resourcetypeid'] = $request->resourcetype;
            } else {
                $status = false;
                echo $request->resourcetype;
            }
            if (isset($request->resourcecompany) && preg_match("/^[0-9]{1,20}$/", $request->resourcecompany)) {
                $insert[0]['companyid'] = $request->resourcecompany;
            } else {
                $status = false;
                echo $request->resourcecompany;
            }
            if (isset($request->modelnumber) && preg_match("/^[a-zA-Z0-9]{1,20}$/", $request->modelnumber)) {
                $insert[0]['modelnumber'] = $request->modelnumber;
            } else {
                $status = false;
                echo $request->modelnumber;
            }
            if (isset($request->serialnumber) && preg_match("/^[a-zA-Z0-9]{1,20}$/", $request->serialnumber)) {
                $insert[0]['serialnumber'] = $request->serialnumber;
            } else {
                $status = false;
                echo $request->serialnumber;
            }

            if (isset($request->purchasingdate) && preg_match("/^[0-9-]{10}$/", $request->purchasingdate)) {
                $pdate = date("Y-m-d",strtotime($request->purchasingdate));
                $insert[0]['purchagingdate'] = $pdate;
            } else {
                $status = false;
                echo $request->purchasingdate;
            }
            if (isset($request->servicecenteraddress) && preg_match("/^[a-zA-Z0-9 ]{1,50}$/", $request->servicecenteraddress)) {
                $insert[0]['servicecenteraddress'] = $request->servicecenteraddress;
            } else {
                $status = false;
                echo $request->servicecenteraddress;
            }
            if (isset($request->servicecenternumber) && preg_match("/^[6-9]{1}[0-9]{9}$/", $request->servicecenternumber)) {
                $insert[0]['servicecentermobile'] = $request->servicecenternumber;
            } else {
                $status = false;
                echo $request->servicecenternumber;
            }
            if (isset($request->assurancetype) && preg_match("/^[0-9]{1}$/", $request->assurancetype)) {
                $insert[0]['assurancetypeid'] = $request->assurancetype;
            } else {
                $status = false;
                echo $request->assurancetype;
            }
            if (isset($request->assuranceperiod) && preg_match("/^[0-9]{1}$/", $request->assuranceperiod)) {
                $insert[0]['assuranceperiod'] = $request->assuranceperiod;
            } else {
                $status = false;
                echo $request->assuranceperiod;
            }
            if (isset($request->assuranceperiodtype) && preg_match("/^[0-9]{1}$/", $request->assuranceperiodtype)) {
                $insert[0]['periodtypeid'] = $request->assuranceperiodtype;
            } else {
                $status = false;
                echo $request->assuranceperiodtype;
            }
            if (isset($request->expiringdate) && preg_match("/^[0-9-]{10}$/", $request->expiringdate)) {
                $edate = date("Y-m-d",strtotime($request->purchasingdate));
                $insert[0]['assuranceexpired'] = $edate;
            } else {
                $status = false;
                echo $request->purchasingdate;
            }
            if (isset($request->isactive) && preg_match("/[0,1]{1}/", $request->isactive)) {
                if ($request->isactive == 1) {
                    $insert[0]['isactive'] = true;
                } else if ($request->isactive == 0) {
                    $insert[0]['isactive'] = false;
                } else {
                    $status = false;
                }
            } else {
                $status = false;
            }
            if ($status) {
                if (isset($request->txtid) && is_numeric($request->txtid)) {
                    if ($request->txtid > 0) {
                        $insert[0]['updatedby'] = $this->session->login['userid'];
                        $insert[0]['updatedat'] = date("Y-m-d H:i:s");
                        $res = $this->Model_Db->update(73, $insert, "id", $request->txtid);
                        if ($res != false) {
                            $data['message'] = "Update successful.";
                            $data['status'] = true;
                        } else {
                            $data['message'] = "Update failed.";
                            $data['status'] = false;
                        }
                    } else if ($request->txtid == 0) {
                        $where = "serialnumber='$request->serialnumber'";
                        $duplicate_entry = $this->Model_Db->select(73, null, $where);
                        if ($duplicate_entry != false) {
                            $data['message'] = 'Duplicate entry';
                            $data['status'] = false;
                            $data['flag'] = 0;
                        } else {
                            $insert[0]['entryby'] = $this->session->login['userid'];
                            $insert[0]['createdat'] = date("Y-m-d H:i:s");
                            $res = $this->Model_Db->insert(73, $insert);
                            if ($res != false) {
                                $data['message'] = "Insert successful.";
                                $data['status'] = true;
                            } else {
                                $data['message'] = "Insert failed.";
                                $data['status'] = false;
                            }
                        }
                    } else {
                        $data['message'] = "Insufficient/Invalid data.";
                        $data['status'] = false;
                    }
                } else {
                    $data['message'] = "Insufficient/Invalid data.";
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
    public function load_resource()
    {
        try {
            $data = array();
            $where = "isactive=true";
            $res = $this->Model_Db->select(73, null, $where);
            $data[] = "<option value=''>Select</option>";
            if ($res != false) {
                foreach ($res as $r) {
                    $data[] = "<option value='$r->id'>$r->companyname</option>";
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
    public function report_resource()
    {
        try {
            $data = array();
            $request = json_decode(json_encode($_POST), FALSE);
            $postdata = file_get_contents("php://input");
//			$request = json_decode($postdata);
            $current_date = date("Y-m-d");
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
                $res = $this->Model_Db->select(73, null, $where);
                if ($res != false) {
                    foreach ($res as $r) {
                        $data[] = array(
                            'id' => $r->id,
                            'resourcetypeid' => $r->resourcetypeid,
                            'companyid' => $r->companyid,
                            'modelnumber' => $r->modelnumber,
                            'serialnumber' => $r->serialnumber,
                            'purchangingdate' => $r->purchagingdate,
                            'scenteraddress' => $r->servicecenteraddress,
                            'scenternumber' => $r->servicecentermobile,
                            'assurancetype' => $r->assurancetypeid,
                            'assuranceperiod' => $r->assuranceperiod,
                            'assuranceperiodtype' => $r->periodtypeid,
                            'assuranceexpired' => $r->assuranceexpired,
                            'creationdate' => $r->createdat,
                            'lastmodifiedon' => $r->updatedat,
                            'isactive' => $r->isactive
                        );
                    }
                }
                echo json_encode($data);
            }
        } catch (Exception $e) {
            $data['message'] = "Message:" . $e->getMessage();
            $data['status'] = false;
            $data['error'] = true;
            echo json_encode($data);
            exit();
        }
    }

    public function resourceViewDetails(){
        extract($_POST);
//        print_r($_POST);
        $where="id=$id";
        $data['result']=$this->Model_Db->select(54,null,$where);
        $this->load->view("Recruitment/viewDetails",$data);
    }
}
