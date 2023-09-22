<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('M_Auth');
        if($this->session->userdata('userID')){
	        redirect("Dashboard");
        }
    }

	public function Index()
	{
		$this->load->view('Login');
	}

	public function ProsesLogin(){
		$username 	= $this->input->post("Username");
		$password 	= $this->input->post("Password");
		$cekUser	= $this->M_Auth->CheckUser($username);
		if(isset($cekUser->userID)){
			if (password_verify($password, $cekUser->password)) {
		        $this->session->set_userdata('userID', $cekUser->userID);
		        $this->session->set_userdata('username', $cekUser->username);
		        $this->session->set_userdata('password', $cekUser->password);
		        $this->session->set_userdata('namaLengkap', $cekUser->namaLengkap);
		        $this->session->set_userdata('groupID', $cekUser->groupID);
		        redirect("Dashboard");
			}else{
		    	$this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='fa fa-warning'>&nbsp;</i><strong>Password yang anda masukkan salah!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            	redirect("Auth");
			}
		}else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='fa fa-warning'>&nbsp;</i><strong>$cekUser</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Auth");
		}
	}

}

//USERNAME : yawaliyul yudiswira
//PASSWORD : vgBRba6D Mwxhb3OE