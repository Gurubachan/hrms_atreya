<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Welcome extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
            $this->header();
            $this->load->view('index');
            $this->footer();
        }catch (Exception $e){
            echo "Message:" . $e->getMessage();
        }
	}
}
