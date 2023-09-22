<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utl_Menu2 extends CI_Controller {

    private $root = 'Utility/Menu2';

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model(
            array(
                'M_Menu1',
                'M_Menu2',
            )
        );
        if(!$this->session->userdata('userID')){
	        redirect("Auth");
        }
    }

	public function Index()
	{
		$data["menu2"] = $this->M_Menu2->GetAllDataMenu2();
		$this->template->display($this->root.'/Index', $data);
	}

    public function Form(){        
        $Form   = $this->uri->segment(3);
        switch ($Form) {
            case 'Input':
                $data["url"]    = "SaveUtlMenu2";
                $data["menu1"] = $this->M_Menu1->GetAllDataMenu1();
                $this->template->display($this->root."/Form", $data);
            break;
            case 'Update':
                $menuID = $this->uri->segment(4);
                $data["url"]    = "UpdateUtlMenu2";
                $data["menu1"]  = $this->M_Menu1->GetAllDataMenu1();
                $data["menu2"]  = $this->M_Menu2->GetDataMenu2($menuID);
                $this->template->display($this->root."/Form", $data);
            break;
            default:
                redirect("Error");
            break;
        }     
    }

    public function SaveUtlMenu2(){
        $data   = array(
            "menuHeader"    => $this->input->post("menuHeader"),
            "menuID"        => $this->input->post("menuID1")."".$this->input->post("menuID2")."".$this->input->post("menuID3"),
            "menuName"      => $this->input->post("menuName"),
            "menuIcon"      => $this->input->post("menuIcon"),
            "menuLink"      => $this->input->post("menuLink"),
            "createdBy"     => $this->session->userdata("username"),
            "createdDate"   => date("Y-m-d H:s:m")
        );
        $result = $this->M_Menu2->SaveUtlMenu2($data);
        if($result == 1){
            $this->session->set_flashdata('message',"<div class='alert alert-info'><i class='mdi mdi-check'>&nbsp;</i><strong>Berhasil simpan!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_Menu2");
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='mdi mdi-close'>&nbsp;</i><strong>Gagal simpan!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_Menu2");            
        }
    }

    public function UpdateUtlMenu2(){
        $menuID = $this->input->post("menuID1")."".$this->input->post("menuID2")."".$this->input->post("menuID3");
        $data   = array(
            "menuHeader"    => $this->input->post("menuHeader"),
            "menuID"        => $menuID,
            "menuName"      => $this->input->post("menuName"),
            "menuIcon"      => $this->input->post("menuIcon"),
            "menuLink"      => $this->input->post("menuLink"),
            "updatedBy"     => $this->session->userdata("username"),
            "updatedDate"   => date("Y-m-d H:s:m")
        );
        $result = $this->M_Menu2->UpdateUtlMenu2($menuID, $data);
        if($result == 1){
            $this->session->set_flashdata('message',"<div class='alert alert-info'><i class='mdi mdi-check'>&nbsp;</i><strong>Berhasil updated!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_Menu2");
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='mdi mdi-close'>&nbsp;</i><strong>Gagal updated!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_Menu2");            
        }
    }

}
