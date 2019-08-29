<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Auth
{
	protected $CI;
	public function __construct()
	{
		$this->CI=& get_instance();
		$this->CI->load->model(
			'Model_Db'
		);

	}

	public function check_session(){
	    try{

            if($this->CI->session->login){

               redirect('Welcome/');
                return false;
            }else{
                $data=$this->CI->session->login;
                //print_r($data);
               return $data;
            }
        }catch (Exception $e){
	        return $e->getMessage();
        }
    }

}
