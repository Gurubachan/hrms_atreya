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
            $this->load->view('Recruitment/recruitmentSidebar');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function attendanceSidebar(){
        try{
            $this->load->view('Attendance/attendanceSidebar');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function resourceSidebar(){
        try{
            $this->load->view('Resource/resourceSidebar');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function employeeDashboardMenu(){
        try{
            $this->load->view('Employee/employeeDashboardMenu');
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
                $this->load->view('dashboard/dashboard-script');
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
            $this->load->view('Year/year-script');
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
    public function formRecruitmentDashboard(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->recruitmentSidebar();
                $this->load->view('dashboard/recruitmentDashboard');
                $this->footer();
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formReligion(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->sidebar();
                $this->load->view('Religion/formReligion');
                $this->footer();
                $this->load->view('Religion/religion-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }

    }
    public function formSkill(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->recruitmentSidebar();
                $this->load->view('Skill/formSkill');
                $this->footer();
                $this->load->view('Skill/skill-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formCommunicationType(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->recruitmentSidebar();
                $this->load->view('Communication/formCommunicationType');
                $this->footer();
                $this->load->view('Communication/communicationtype-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formExperienceType(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->recruitmentSidebar();
                $this->load->view('Experience/formExperienceType');
                $this->footer();
                $this->load->view('Experience/experiencetype-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function jobPostingSidebar(){
        try{
            $this->load->view('Jobposting/jobPostingSidebar');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formJobPosting(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->jobPostingSidebar();
                $this->load->view('Jobposting/formJobPosting');
                $this->footer();
                $this->load->view('Jobposting/jobposting-script');
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

    public function loadAttendanceDashboard(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->attendanceSidebar();
                $this->load->view('Attendance/attendanceDashboard');
                $this->footer();
                $this->load->view('Attendance/attendance-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formAttendance(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->attendanceSidebar();
                $this->load->view('Attendance/formAttencance');
                $this->footer();
                $this->load->view('Attendance/attendance-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formAttendanceType(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->attendanceSidebar();
                $this->load->view('Attendance/formAttendanceType');
                $this->footer();
                $this->load->view('Attendance/formAttendancetype-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formAttendanceSheet(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->attendanceSidebar();
                $this->load->view('Attendance/formAttendanceSheet');
                $this->footer();
                $this->load->view('Attendance/formAttendanceSheet-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function loadResourceDashboard(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->resourceSidebar();
                $this->load->view('Resource/resourceDashboard');
                $this->footer();
                $this->load->view('Resource/Resource/formResource-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formResourceType(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->resourceSidebar();
                $this->load->view('Resource/Resourcetype/formResourceType');
                $this->footer();
                $this->load->view('Resource/Resourcetype/formResourcetype-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formCompanies(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->resourceSidebar();
                $this->load->view('Resource/Company/formCompanies');
                $this->footer();
                $this->load->view('Resource/Company/formCompanies-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formAssurance(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->resourceSidebar();
                $this->load->view('Resource/Assurance/formAssurance');
                $this->footer();
                $this->load->view('Resource/Assurance/formAssurance-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formResource(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->resourceSidebar();
                $this->load->view('Resource/Resource/formResource');
                $this->footer();
                $this->load->view('Resource/Resource/formResource-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formPeriodtype(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->resourceSidebar();
                $this->load->view('Resource/Periodtype/formPeriodtype');
                $this->footer();
                $this->load->view('Resource/Periodtype/formPeriodtype-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function iCardSidebar(){
        try{
            $this->load->view('Idcard/idcardSidebar');
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formIdCardDashboard(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->iCardSidebar();
                $this->load->view('Idcard/IdCardDashboard/idcardDashboard');
                $this->footer();
                $this->load->view('Idcard/IdCardDashboard/idcarddashboard-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formIdCardGenerate(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->iCardSidebar();
                $this->load->view('Idcard/IdCardGenerate/formIdcardGenerate');
                $this->footer();
                $this->load->view('Idcard/IdCardGenerate/idcardgenerate-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formIdCardIssued(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->iCardSidebar();
                $this->load->view('Idcard/IdCardIssued/formIdcardIssued');
                $this->footer();
                $this->load->view('Idcard/IdCardIssued/idcardissued-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function formIdCardFormate(){
        try{
            if($this->session->login['userid']) {
                $this->header();
                $this->navbar();
                $this->iCardSidebar();
                $this->load->view('Idcard/IdCardFormat/formIdcardFormat');
                $this->footer();
                $this->load->view('Idcard/IdCardFormat/idcardformat-script');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function load_dashboard_forms(){
        try{
            if($this->session->login['userid']){
                $this->load->view('dashboard/dashBoardForms');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
    public function load_dashboard_reports(){
        try{
            if($this->session->login['userid']){
                $this->load->view('dashboard/dashBoardReports');
            }else{
                redirect('welcome/');
            }
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
    }
}
