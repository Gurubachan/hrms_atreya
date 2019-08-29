<?php
defined('BASEPATH') OR exit('no direct access');
function check_report_params()
{
    if(empty($_SESSION['login'])){
        redirect(base_url('Welcome/'));
    }else{
        $current_date=Date('Y-m-d');
        if(isset($request->checkparams) && is_numeric($request->checkparams)){
            switch ($request->checkparams){
                case 1:
                    $where="DATE(createdat)=DATE('$current_date')";
                    break;
                case 2:
                    $where="1=1";
                    break;
                case 3:
                    $where="isactive=true";
                    break;
                case 4:
                    $where="isactive=false";
                    break;
            }
        }
    }
}
