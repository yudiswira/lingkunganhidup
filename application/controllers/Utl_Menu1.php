<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utl_Menu1 extends CI_Controller {

    private $root = 'Utility/Menu1';

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('M_Menu1');
        if(!$this->session->userdata('userID')){
	        redirect("Auth");
        }
    }

	public function Index()
	{
		$data["menu1"] = $this->M_Menu1->GetAllDataMenu1();
		$this->template->display($this->root.'/Index', $data);
	}

    public function Form(){        
        $Form   = $this->uri->segment(3);
        switch ($Form) {
            case 'Input':
                $data["url"]    = "SaveUtlMenu1";
                $this->template->display($this->root."/Form", $data);
            break;
            case 'Update':
                $menuID = $this->uri->segment(4);
                $data["url"]    = "UpdateUtlMenu1";
                $data["menu1"]   = $this->M_Menu1->GetDataMenu1($menuID);
                $this->template->display($this->root."/Form", $data);
            break;
            default:
                redirect("Error");
            break;
        }     
    }

    public function SaveUtlMenu1(){
        $data   = array(
            "menuName"      => $this->input->post("menuName"),
            "menuIcon"      => $this->input->post("menuIcon"),
            "menuLink"      => $this->input->post("menuLink"),
            "createdBy"     => $this->session->userdata("username"),
            "createdDate"   => date("Y-m-d H:s:m")
        );
        $result = $this->M_Menu1->SaveUtlMenu1($data);
        if($result == 1){
            $this->session->set_flashdata('message',"<div class='alert alert-info'><i class='mdi mdi-check'>&nbsp;</i><strong>Berhasil simpan!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_Menu1");
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='mdi mdi-close'>&nbsp;</i><strong>Gagal simpan!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_Menu1");            
        }
    }

    public function UpdateUtlMenu1(){
        $data   = array(
            "menuName"      => $this->input->post("menuName"),
            "menuIcon"      => $this->input->post("menuIcon"),
            "menuLink"      => $this->input->post("menuLink"),
            "updatedBy"     => $this->session->userdata("username"),
            "updatedDate"   => date("Y-m-d H:s:m")
        );
        $result = $this->M_Menu1->UpdateUtlMenu1($this->input->post("menuID"), $data);
        if($result == 1){
            $this->session->set_flashdata('message',"<div class='alert alert-info'><i class='mdi mdi-check'>&nbsp;</i><strong>Berhasil updated!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_Menu1");
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='mdi mdi-close'>&nbsp;</i><strong>Gagal updated!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_Menu1");            
        }
    }

}
