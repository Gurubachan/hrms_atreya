<?php
defined("BASEPATH") or exit('No direct script access allowed.');
date_default_timezone_set("Asia/Kolkata");
class Report
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();

    }
    public function various_report_type(){
        try{
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
                    $data['message']="ID not found";
                    $data['status']=false;
                    $data['error']=true;
                    exit();
            }

        }catch (Exception $e){
            $data['message']="Message".$e->getMessage();
        }

    }
}
