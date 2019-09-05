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
            $this->load->view('include/sidebar');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function recruitmentSidebar(){
        try{
            $this->load->view('include/recruitmentSidebar');
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
                $this->load->view('User/formUserType');
                $this->load->view('User/usertype-script');
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
                $this->load->view('User/formUser');
                $this->load->view('User/user-script');
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
                $this->load->view('Company/formCompanyType');
                $this->load->view('Company/companytype-script');
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
                $this->load->view('Company/formNewCompany');
                $this->load->view('Company/newCompany-script');
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
			$this->load->view('Company/formCompanyType');
			$this->footer();
//            $this->load->view('Company/companytype-script');
		}else{
			redirect('welcome/');
		}
	}catch (Exception $e){
		echo "Message:" . $e->getMessage();
	}

}
    public function loadDesignation(){
        try{
            if($this->session->login['userid']) {
                extract($_POST);
                $this->load->view('Designation/formDesignation');
                $this->load->view('Designation/designation-script');
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
            $this->load->view('Department/formDepartment');
            $this->load->view('Department/department-script');

            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" .$e->getMessage();
        }
    }

    public function formDistrict(){
        try{
            if($this->session->login['userid']) {
            $this->header();
            $this->navbar();
            $this->sidebar();
            $this->load->view('District/formDistrict');
            $this->footer();
            $this->load->view('District/district-script');
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
            $this->load->view('State/formState');
            $this->footer();
            $this->load->view('State/state-script');
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
            $this->load->view('Year/formYear');
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
            $this->load->view('Education/formEducation');
            $this->footer();
            $this->load->view('Education/education-script');
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
            $this->load->view('Employee/formEmployeeType');
            $this->load->view('Employee/employeetype-script');
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
            $this->load->view('Employee/formNewEmployee');
            $this->load->view('Employee/newemployee-script');
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
            $this->load->view('Employee/formEmployeeBankDetails');
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
            $this->load->view('Employee/employeeAttendance');
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
            $this->header();
            $this->navbar();
            $this->sidebar();
            $this->load->view('Bank/formBankDetails');
            $this->footer();
            $this->load->view('Bank/bank-script');
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
            $this->load->view('MaritalStatus/formMaritalStatus');
            $this->footer();
            $this->load->view('MaritalStatus/maritalstatus-script');
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
            $this->load->view('Gender/formGender');
            $this->footer();
            $this->load->view('Gender/gender-script');
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
            $this->load->view('Company/formMappingCompanyDepartment');

            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formRecruitment(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->recruitmentSidebar();
                $this->load->view('Recruitment/formRecruitment');
                $this->footer();
                $this->load->view('Recruitment/recruitment-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
}
