<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Forms extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function menu(){

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
    public function employeeDashboardMenu(){
        try{
            $this->load->view('dashboard/employeeDashboardMenu');
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
                $this->load->view('dashboard/formDashboard');
                $this->footer();
        }else{
            redirect('welcome/');
        }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formUserType(){
        try{
            if($this->session->login['userid']){
                $this->load->view('forms/formUserType');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" .$e->getMessage();
        }
    }
    public function formUser(){
        try{
            if($this->session->login['userid']){
                $this->load->view('forms/formUser');
            }else{
                redirect('welcome/');
            }

        }catch (Exception $e){
            echo "Message:" .$e->getMessage();
        }
    }
    public function userDashboard(){
        try{
            if($this->session->login['userid']){
                $this->header();
                $this->navbar();
                $this->load->view('dashboard/userDashboard');
                $this->footer();
            }else{
                redirect('welcome/');
            }

        }catch (Exception $e){
            echo "Message:" .$e->getMessage();
        }
    }
    public function companyDashboard(){
    try{
        if($this->session->login['userid']){
            $this->header();
            $this->navbar();
            $this->load->view('dashboard/companyDashboard');
            $this->footer();
        }else{
            redirect('welcome/');
        }

    }catch (Exception $e){
        echo "Message:" .$e->getMessage();
    }
}
    public function loadCompanyType(){
        try{
            if($this->session->login['userid']){
                extract($_POST);
                $this->load->view('forms/formCompanyType');
            }else{
                redirect("Welcome/");
            }

        }catch (Exception $e){
            echo "Message:" .$e->getMessage();
        }
    }
    public function loadNewCompany(){
        try{
            if($this->session->login['userid']) {
                extract($_POST);
                $this->load->view('forms/formNewCompany');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" .$e->getMessage();
        }
    }
    public function loadDesignation(){
        try{
            if($this->session->login['userid']) {
                extract($_POST);
                $this->load->view('forms/formDesignation');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" .$e->getMessage();
        }
    }
    public function loadDepartment(){
        try{
            if($this->session->login['userid']) {
            extract($_POST);
            $this->load->view('forms/formDepartment');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" .$e->getMessage();
        }
    }
    public function formCompanyType(){
        try{
            if($this->session->login['userid']) {
            $this->header();
            $this->navbar();
            $this->load->view('forms/formCompanyType');
            $this->footer();
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function formDistrict(){
        try{
            if($this->session->login['userid']) {
            $this->header();
            $this->navbar();
            $this->sidebar();
            $this->load->view('forms/formDistrict');
            $this->footer();
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function formState(){
        try{
            if($this->session->login['userid']) {
            $this->header();
            $this->navbar();
            $this->sidebar();
            $this->load->view('forms/formState');
            $this->footer();
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function formYear(){
        try{
            if($this->session->login['userid']) {
            $this->header();
            $this->navbar();
            $this->sidebar();
            $this->load->view('forms/formYear');
            $this->footer();
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function formEducation(){
        try{
            if($this->session->login['userid']) {
            $this->header();
            $this->navbar();
            $this->sidebar();
            $this->load->view('forms/formEducation');
            $this->footer();
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function employeeDashboard(){
        try{
            if($this->session->login['userid']) {
            $this->header();
            $this->navbar();
            $this->employeeDashboardMenu();
            $this->load->view('dashboard/employeeDashboard');
            $this->footer();
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" .$e->getMessage();
        }
    }
    public function formEmployeeType(){
        try{
            if($this->session->login['userid']) {
            extract($_POST);
            $this->load->view('forms/formEmployeeType');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function formNewEmployee(){
        try{
            if($this->session->login['userid']) {
            extract($_POST);
            $this->load->view('forms/formNewEmployee');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formEmployeeBankDetails(){
        try{
            if($this->session->login['userid']) {
            extract($_POST);
            $this->load->view('forms/formEmployeeBankDetails');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function employeeAttendance(){
        try{
            if($this->session->login['userid']) {
            extract($_POST);
            $this->load->view('forms/employeeAttendance');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formBankDetails(){
        try{
            if($this->session->login['userid']) {
//            extract($_POST);
            $this->header();
//            $this->sidebar();
            $this->navbar();
            $this->sidebar();
            $this->load->view('forms/formBankDetails');
            $this->footer();
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formMaritalStatus(){
        try{
            if($this->session->login['userid']) {
            $this->header();
            $this->navbar();
            $this->sidebar();
            $this->load->view('forms/formMaritalStatus');
            $this->footer();
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formGender(){
        try{
            if($this->session->login['userid']) {
            $this->header();
            $this->navbar();
            $this->sidebar();
            $this->load->view('forms/formGender');
            $this->footer();
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function mapping_company_department(){
        try{
            if($this->session->login['userid']) {
            extract($_POST);
            $this->load->view('forms/formMappingCompanyDepartment');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
}
