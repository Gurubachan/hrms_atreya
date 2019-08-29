<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
//header("Access-Control-Allow-Origin: *");
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function header(){
        try{
            $this->load->view('include/header');
        }catch (Exception $e) {
            echo "Message:" . $e->getMessage();
        }

    }
    public function footer(){
        try {
            $this->load->view('include/footer');
        } catch (Exception $e) {
            echo "Message:" . $e->getMessage();
        }
    }
    public function sidebar(){
        try {
            $this->load->view('dashboard/sidebar');
        } catch (Exception $e) {
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
//    public function dashboard(){
//        try {
//            $this->load->view('include/dashboard');
//        } catch (Exception $e) {
//            echo "Message:" . $e->getMessage();
//        }
//    }
    public function action(){
        try {
            extract($_POST);
            $this->header();
            $this->sidebar();
            $this->navbar();
            $this->load->view('dashboard/dashboard');
            $this->footer();

        } catch (Exception $e) {
            echo "Message:" . $e->getMessage();
        }
    }
}

