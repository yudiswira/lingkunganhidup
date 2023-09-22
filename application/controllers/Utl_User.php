<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utl_User extends CI_Controller {

    private $root = 'Utility/User';

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model(array('M_Auth', 'M_Group'));
        if(!$this->session->userdata('userID')){
	        redirect("Auth");
        }
    }

	public function Index()
	{
		$data["user"] = $this->M_Auth->GetDataAllUser();
		$this->template->display($this->root.'/Index', $data);
	}

    public function Form(){
        $Form   = $this->uri->segment(3);
        switch ($Form) {
            case 'Input':
                $data["url"]    = "SaveMstUser";
                $data["group"] = $this->M_Group->GetAllDataGroup();
                $this->template->display($this->root."/Form", $data);
            break;
            case 'Update':
                $userID = $this->uri->segment(4);
                $data["url"]    = "UpdateMstUser";
                $data["user"] = $this->M_Auth->GetDataUser($userID);
                $data["group"] = $this->M_Group->GetAllDataGroup();
                $this->template->display($this->root."/Form", $data);
            break;
            default:
                redirect("Error");
            break;
        }        
    }

    public function SaveMstUser(){
        $data   = array(
            "username"      => $this->input->post("username"),
            "password"      => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
            "namaLengkap"   => $this->input->post("namaLengkap"),
            "groupID"       => $this->input->post("groupID"),
            "createdBy"     => $this->session->userdata("username"),
            "createdDate"   => date("Y-m-d H:s:m")
        );
        $result = $this->M_Auth->SaveMstUser($data);
        if($result == 1){
            $this->session->set_flashdata('message',"<div class='alert alert-info'><i class='mdi mdi-check'>&nbsp;</i><strong>Berhasil simpan!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_User");
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='mdi mdi-close'>&nbsp;</i><strong>Gagal simpan!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_User");            
        }
    }

    public function UpdateMstUser(){
        $data   = array(
            "namaLengkap"   => $this->input->post("namaLengkap"),
            "groupID"       => $this->input->post("groupID"),
            "updatedBy"     => $this->session->userdata("username"),
            "updatedDate"   => date("Y-m-d H:s:m")
        );
        $result = $this->M_Auth->UpdateMstUser($this->input->post("userID"), $data);
        if($result == 1){
            $this->session->set_flashdata('message',"<div class='alert alert-info'><i class='mdi mdi-check'>&nbsp;</i><strong>Berhasil updated!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_User");
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='mdi mdi-close'>&nbsp;</i><strong>Gagal updated!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_User");            
        }
    }

    public function UpdateStatus(){
        $data   = array(
            "nonActive"     => $this->uri->segment(4),
            "updatedBy"     => $this->session->userdata("username"),
            "updatedDate"   => date("Y-m-d H:s:m")
        );
        $result = $this->M_Auth->UpdateMstUser($this->uri->segment(3), $data);
        if($this->uri->segment(4) == 0){
            $flag = "Activekan";
        }else{
            $flag = "Non Activekan";
        }
        if($result == 1){
            $this->session->set_flashdata('message',"<div class='alert alert-info'><i class='mdi mdi-check'>&nbsp;</i><strong>User berhasil di $flag!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_User");
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='mdi mdi-close'>&nbsp;</i><strong>User gagal di $flag!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_User");            
        }
    }

    public function ResetPassword(){
        $password = random_string();
        $data   = array(
            "password"      => password_hash($password, PASSWORD_DEFAULT),
            "updatedBy"     => $this->session->userdata("username"),
            "updatedDate"   => date("Y-m-d H:s:m")
        );
        $result = $this->M_Auth->UpdateMstUser($this->uri->segment(3), $data);
        if($result == 1){
            $this->session->set_flashdata('message',"<div class='alert alert-info'><i class='mdi mdi-check'>&nbsp;</i><strong>Password berhasil di reset menjadi <b>$password</b>!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_User");
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='mdi mdi-close'>&nbsp;</i><strong>Gagal reset password!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_User");            
        }
    }

}
