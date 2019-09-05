<?php

/**
 * Created by PhpStorm.
 * User: Gurubachan Singh
 * Date: 11-06-2017
 * Time: 14:43
 */

defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
        	'Model_Customer',
			'Model_User',
			'Model_Stock',
			'Model_Delivery',
			'Model_Reject',
			'Model_Item'));
        $this->load->library(array('Email'));
       //  $this->load->library('bcrypt');
    }
    public $mail="admin@anikawater.com";

	public function header()
	{
		$data['title']="Anika Chilled Water";
		$data['login']=$this->session->customer_login;
		//$this->load->view($uri.'/header',$data);
		print_r($this->session->customer_login);

		if($this->session->customer_login['role']!="Customer"){
			//$this->logout();
		}else{
			$this->load->view('include/header',$data);
		}
	}
	public function footer()
	{
		//$this->load->view($uri.'/footer');
		$this->load->view('include/footer');
	}
    public function index()
    {
        $this->header();
        //Data Fetchi area
        //Check Pending jars
		$this->dashboard();
       $this->footer();

    }
    public function dashboard()
	{
		try{
			$where=array('id'=>$this->session->customer_login['id']);
			$result=$this->Model_Customer->pendig_details($where);
			if($result!=false)
			{
				$data['pending']=$result;
			}else{
				$data['pending']=false;
			}
			//Checking End

			//Fetching Customer Receiving
			$where=array('ddate'=>date('Y-m-d'),'cid'=>$this->session->customer_login['id']);
			$delivery=$this->Model_Delivery->select($where);
			if($delivery!=false)
			{
				$data['delivery']=$delivery;
			}else{
				$data['delivery']=false;
			}
			//Order rejection Check
			$where=array('cid'=>$this->session->customer_login['id']);
			$reject=$this->Model_Reject->select($where);
			if($result!=false)
			{
				$data['reject']=$reject;
			}else{
				$data['reject']=false;
			}
			//Order rejection Check End
			//Data Fetching end
			$this->load->view('Customer/index',$data);
		}catch (Exception $exception){
			echo "Message :".$exception->getMessage();
		}
	}
    public function request()
    {
        if($this->input->post('btnSubmit'))
        {
            $data=array(
                'fname'=>strtoupper($this->input->post('txtfname')),
                'mname'=>strtoupper($this->input->post('txtmname')),
                'lname'=>strtoupper($this->input->post('txtlname')),
                'orgname'=>strtoupper($this->input->post('txtorgname')),
                'email'=>$this->input->post('txtemail'),
                'contact'=>$this->input->post('txtContact'),
                'pin'=>$this->input->post('txtPin'),
                'address'=>strtoupper($this->input->post('txtAddress')),
                'dist'=>strtoupper($this->input->post('txtDistrict')),
                'state'=>strtoupper($this->input->post('txtState')),
                'ctype'=>$this->input->post('optctype'),
                'rtype'=>$this->input->post('optrtype'),
                'iteam'=>$this->input->post('optcapacity'),
                'pices'=>$this->input->post('optqty'),
                'sdate'=>$this->input->post('txtsdate'),
                'rtime'=>$this->input->post('opttime'),
                'role'=>2
            );
                $result=$this->Model_Customer->insert($data);
                if($result){
                    $message="Your request received successfully<br>";
                    $message.="We contact you soon through your contact no./email<br>";
                    $message.="Thank you for giving interest on <b>Anika Chilled Water</b>";
                    $this->session->set_flashdata('message',"$message");
                    $from=$this->mail();
                    $to=$this->input->post('txtemail');
                    $subject="Approval Message.";
                    $this->email($from,$to,$subject,$message);
                    echo "<script language='JavaScript'>alert('$message');</script>";
                }else{
                    $message="Due to some unknown reason we are unable to save your request.";
                    $this->session->set_flashdata('message',"$message");
                }
                redirect('Welcome/Customer');
        }
    }

    public function update_request()
    {
        try{

            if($this->input->post('btnUpdate'))
            {
                $data_update=array(
                    'fname'=>strtoupper($this->input->post('txtfname')),
                    'mname'=>strtoupper($this->input->post('txtmname')),
                    'lname'=>strtoupper($this->input->post('txtlname')),
                    'orgname'=>strtoupper($this->input->post('txtorgname')),
                    'email'=>$this->input->post('txtemail'),
                    'contact'=>$this->input->post('txtContact'),
                    'pin'=>$this->input->post('txtPin'),
                    'address'=>strtoupper($this->input->post('txtAddress')),
                    'dist'=>strtoupper($this->input->post('txtDistrict')),
                    'state'=>strtoupper($this->input->post('txtState')),
                    'ctype'=>$this->input->post('optctype'),
                    'rtype'=>$this->input->post('optrtype'),
                    'iteam'=>$this->input->post('optcapacity'),
                    'pices'=>$this->input->post('optqty'),
                    'sdate'=>$this->input->post('txtsdate'),
                    'rtime'=>$this->input->post('opttime'),
                    'ddate'=>$this->input->post('txtsdate'),
                    'location'=>strtoupper($this->input->post('txtLocation')),
                    'sequence'=>strtoupper($this->input->post('txtSequenceNo')),
                    'role'=>2
                );
                $customer_id=array('id'=>$this->input->post('txtCID'));
                $result=$this->Model_Customer->update($data_update,$customer_id);
                if($result){
                    $message="Your data updated<br>";
                    $message.="We contact you soon through your contact no./email<br>";
                    $message.="Thank you for giving interest on <b>Anika Chilled Water</b>";
                    $this->session->set_flashdata('message',"$message");
                    /*$from="admin@anikawater.com";
                    $to=$this->input->post('txtemail');
                    $subject="Approval Message.";
                    $this->email($from,$to,$subject,$message);*/
                    echo "<script language='JavaScript'>alert('$message');</script>";
                }else{
                    $message="Due to some unknown reason we are unable to save your request.";
                    $this->session->set_flashdata('message',"$message");
                }
                redirect('Admin/');
            }
        }catch (Exception $e)
        {
            echo "Message :" .$e->getMessage();
        }
    }

    public function view_new_registration()
    {
        $where=array('approve'=>0,
            'active'=>0,
            'reject'=>0,
            );
        $result=$this->Model_Customer->select($where);
        $data['new']=$result;
        $this->load->view('Customer/view_new_registration_details',$data);
    }
    public function approve(){

            $active=$this->input->post('active');
            $cid=$this->input->post('cid');
            $Contact=$this->input->post('Contact');
            $password=password_hash($Contact,PASSWORD_ARGON2I);
            $Email=$this->input->post('Email');
            $date=$this->input->post('date');
            $Name=$this->input->post('Name');
            if($date<=date("Y-m-d")){
                $today=date('Y-m-d');
                $date=date("Y-m-d", strtotime("$today +1 day"));
            }
            //approve customer and send link for activate.
            $data=array(
                'approve'=>$active,
                'sdate'=>$date,
                'pwd'=>$password,
                'ddate'=>$date
                );
            $where=array(
              'id'=>$cid
            );
            if($this->Model_Customer->update($data,$where)){
                $from="admin@anikawater.com";
                $to=$Email;
                $subject="Approval Message.";
                    //Fetching tbl_user last inserted id
                    $result=base64_encode($cid);
                    $link= base_url("Customer/activate/".$result);
                    $msg="<h3>Regards From,<b>Anika</b>,</h3>";
                    $msg.="<p>Congratulation, $Name</p>";
                    $msg.="<p>On date: $date onward you are start receiving our service.</p>";
                    $msg.="<p>Click below link to activate your account.</p>";
                    $msg.="<a href=".$link.">Login</a>";
                    $msg.="<p>Your Login ID: $Email</p>";
                    $msg.="<p>Password: $Contact</p>";
                    $this->email($from,$to,$subject,$msg);
                    echo "Customer Approve and mail sent.";
                }
                else{
                    echo "Unabel to approve. Contact DBA.";
                }
    }

    public function login()
    {
        $lid=$this->input->post('txtusername');
        $pas=$this->input->post('txtpassword');
        $role=$this->uri->segment('1');
        /*$pass=password_hash($pas,PASSWORD_ARGON2I);
        echo $pass;
exit();*/
        $result=$this->Model_Customer->check_login($lid,$pas,$role);

        if(!empty($result)){

            if($result['active']==0){
                $message="Account not activated, Before login activate account.<br>";
                $this->session->set_flashdata('message',$message);
                redirect('Welcome/Customer');
            }elseif ($result['reject']==1)
            {
                $message="Your account under rejection list.<br> Kindly contact with admin.";
                $this->session->set_flashdata('message',$message);
                redirect('Welcome/Customer');
            }else
            {
                redirect('Customer/');
            }
        }else{
            $message="Authentication Failed.<br>";
            $message.="Check User ID or Password.";
            $this->session->set_flashdata('message',$message);
            redirect('Welcome/Customer');
        }

    }
    public function logout()
    {
        $this->session->unset_userdata('customer_login');
        redirect('Welcome/Customer');
    }
    public function signup($id=null)
    {
        $data['title']="Anika Chilled Water";


        if($id!=null || is_int($id)) {
            $where = array('id' => $id);
            $result = $this->Model_Customer->select($where);
        }else{
            $this->load->view('signup_header',$data);
            $result=false;
        }
            if ($result != false) {
                $data['customer'] = $result;
            } else {
                $data['customer'] = false;
            }
            $customer_type = $this->Model_Customer->customer_type();
            if ($customer_type != false) {
                $data['ctype'] = $customer_type;
            } else {
                $data['ctype'] = false;
            }
            $where = array('status'=>1);
            $iteam_response=$this->Model_Item->select($where);
            if($iteam_response != false){
            	$data['item']= $iteam_response;
			}else{
				$data['item']=false;
			}


        $this->load->view('view_signup',$data);
    }
    public function forget()
    {

        $this->load->view('view_forget');
    }
    public function send_link()
    {
        if($this->input->post('Submit')){
            $where=array(
                'email'=>$this->input->post('txtemail'),
                'contact'=>$this->input->post('txtContact'),
                'role'=>$this->uri->segment('1'),
                'active'=>1
            );
//fetch user id
            $result=$this->Model_Customer->select($where);
            if($result!=false)
            {
               foreach ($result as $r){
                   $id=$r->id;
                   $email=$r->email;
               }
               //Preparing mail for send

                $from="admin@anikawater.com";
                $to=$email;
                $subject="Password reset link";
                $link=base_url('Customer/activate/'.$id);
                $msg="<p>Click Below to reset your password.</p>";
                $msg.="<a href=".$link.">Reset Password</a>" ;
                $this->email($from,$to,$subject,$msg);

            }
        }
    }
    public function activate(){
        $id=$this->uri->segment('3');
        $id=base64_decode($id);
       // echo $id;
        $where=array('id'=>$id);
        $data=array('active'=>1);
        $result=$this->Model_Customer->update($data,$where);
        if($result){
            $msg="Your account successfully activate.<br>Use your user id and password for login. ";
            $this->session->set_flashdata('message',$msg);
        }else{
            $msg="Unable to activate your account<br>Contact admin about your problem. ";
            $this->session->set_flashdata('message',$msg);
        }
        redirect('Customer/');
    }
    public function reject()
    {
        try{

            if($cid=$this->input->post('cid'))
            {
                $data=array('reject'=>1);
                $where=array('id'=>$cid);
                $result=$this->Model_Customer->update($data,$where);
                if($result){
                    $msg="Account $cid put on rejected list.";
                }else{
                    $msg="Unable to reject account $cid<br>Contact admin about your problem. ";
                }

            }else{
                $msg="Invalid id $cid post. check again.";
            }
            echo $msg;

        }catch (Exception $e){
            echo "Message :" .$e->getMessage();
        }
    }
    public function order()
    {
        $where=array('ddate'=>date("Y-m-d"));
        $result=$this->Model_Customer->select($where);
        if($result!=false){
            $data['order']=$result;
        }else{
            $data['order']=false;
        }

        $this->load->view('Customer/view_order',$data);

    }
    //Show register user
    public function registered()
    {
        $where=array('active'=>1,
            'approve'=>1,
            'reject'=>0);
        $result=$this->Model_Customer->select($where);
        if($result!=false)
        {
            $data['registered']=$result;
        }else{
            $data['registered']=false;
        }
        $this->load->view('Customer/view_register_user',$data);
    }

   /* //Edit Register User
    public function edit_registered()
    {
        try{
            if($this->uri->segment(3)){
                $where=array('id'=>$this->uri->segment(3));
                $result=$this->Model_Customer->select($where);
                if($result!=false)
                {
                    $data['customer']=$result;
                }else{
                    $data['customer']=false;
                }
                $customer_type=$this->Model_Customer->customer_type();
                if($customer_type!=false){
                    $data['ctype']=$customer_type;
                }else{
                    $data['ctype']=false;
                }
                $this->load->view('view_signup',$data);
            }else{
                redirect($this->index());
            }

        }catch (Exception $e)
        {
            echo "Message :".$e->getMessage();
        }
    }*/
    //Showing form for delivery order

    public function delivery()
    {
        $cid=$this->uri->segment(3);
        $where=array('id'=>$cid);

       $result= $this->Model_Customer->select($where);
       if($result!=false)
       {
           $data['client']=$result;
       }else{
           $data['client']=false;
       }
       $result=$this->Model_Stock->select();
       if($result!=false)
       {
           $data['stock']=$result;
       }else{
           $data['stock']=false;
       }
       $result=$this->Model_Customer->pendig_details($where);
       if($result!=false)
       {
           $data['pending']=$result;
       }else{
           $data['pending']=false;
       }
       $this->load->view('Delivery/view_delivery',$data);
    }

    public function delivery_cancel()
    {
        $msg="";
        $cid=$this->uri->segment(3);
        $where=array('id'=>$cid);
        $this->load->view('Delivery/cancel_delivery');
        if($this->input->post('btnSubmit'))
        {
            $data=array(
                'cid'=>$cid,
                'rdate'=>date('Y-m-d'),
                'reason'=>$this->input->post('txtReason')
            );
           $result= $this->Model_Reject->insert($data);
           if($result){
               $ndate=$this->input->post('txtDate');
               $data=array(
                    'ddate'=>$ndate
               );
               $where=array('id'=>$cid);
               $result=$this->Model_Customer->update($data,$where);
               if($result){
                   $msg="Next Delivery date assigned.";
               }else{
                   $msg.="Error on new date assigned.";
               }
               $msg.="Record added to rejection list";
           }else{
               $msg.="Error in adding rejection list";
           }
           echo $msg;
        }
    }

    //Email Sending function
    public function email($from, $to, $subject,$msg){
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $this->email->initialize($config);
        $this->email->to($to);
        $this->email->from($from,'Admin');
        $this->email->subject($subject);
        $this->email->message($msg);
        $this->email->send();
    }
}
