<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
//        $this->load->helper(array('Auth'));

    }
    public function header(){
        try{
            $this->load->view('include/header');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function footer(){
        try{
            $this->load->view('include/footer');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function sidebar(){
        try{
            $this->load->view('dashboard/sidebar');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function navbar(){
        try{
            $this->load->view('include/navbar');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function index(){
        try{
            if($this->session->login['userid']){
                $this->header();
                $this->navbar();
                $this->load->view('dashboard/dashboard');
                $this->footer();
            }else{
                redirect('welcome/');
//                $this->header();
//                $this->load->view('index');
//                $this->footer();
            }

        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
}
