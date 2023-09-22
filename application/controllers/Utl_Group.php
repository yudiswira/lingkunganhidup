<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utl_Group extends CI_Controller {

    private $root = 'Utility/Group';

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model(array('M_Group','M_Rth','M_Menu1','M_Menu2'));
        if(!$this->session->userdata('userID')){
	        redirect("Auth");
        }
    }

	public function Index()
	{
		$data["group"] = $this->M_Group->GetAllDataGroup();
		$this->template->display($this->root.'/Index', $data);
	}

    public function Form(){
        $Form   = $this->uri->segment(3);
        switch ($Form) {
            case 'Input':
                $data["url"]    = "SaveGroup";
                $data["rth"]    = $this->M_Rth->GetAllDataRth();
                $data["menu1"] = $this->M_Menu1->GetAllDataMenu1();
                $data["menu2"] = $this->M_Menu2->GetAllDataMenu2();
                $this->template->display($this->root."/Form", $data);
            break;
            case 'Update':
                $groupID = $this->uri->segment(4);
                $data["url"]    = "UpdateGroup";
                $data["group"]  = $this->M_Group->GetDataGroup($groupID);
                $data["rth"]    = $this->M_Rth->GetAllDataAksesRTH($groupID);
                $data["menu1"]  = $this->M_Group->GetAllDataAksesMenu1($groupID);
                $data["menu2"]  = $this->M_Group->GetAllDataAksesMenu2($groupID);
                $this->template->display($this->root."/Form", $data);
            break;
            default:
                redirect("Error");
            break;
        }
    }

    public function SaveGroup(){
        $groupName  = $this->input->post("groupName");
        $tamanID    = $this->input->post("tamanID");
        $menuID1    = $this->input->post("menuID1");
        $menuID2    = $this->input->post("menuID2");

        //TRANSAKSI ARRAY GROUP//
        $group = array(
            "groupName"     => $groupName,
            "status"        => 0,
            "createdBy"     => $this->session->userdata("username"),
            "createdDate"   => date("Y-m-d H:s:m")
        );
        //--------------------------------------//
        $result = $this->M_Group->SaveGroup($tamanID, $menuID1, $menuID2, $group);
        if($result == 1){
            $this->session->set_flashdata('message',"<div class='alert alert-info'><i class='mdi mdi-check'>&nbsp;</i><strong>Berhasil simpan!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_Group");
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='mdi mdi-close'>&nbsp;</i><strong>Gagal simpan!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_Group");            
        }
    }

    public function UpdateGroup(){
        $groupName  = $this->input->post("groupName");
        $groupID    = $this->input->post("groupID");
        $tamanID    = $this->input->post("tamanID");
        $menuID1    = $this->input->post("menuID1");
        $menuID2    = $this->input->post("menuID2");

        //TRANSAKSI ARRAY GROUP//
        $group = array(
            "groupName"     => $groupName,
            "updatedBy"     => $this->session->userdata("username"),
            "updatedDate"   => date("Y-m-d H:s:m")
        );
        //--------------------------------------//
        $result = $this->M_Group->UpdateGroup($groupID, $tamanID, $menuID1, $menuID2, $group);
        if($result == 1){
            $this->session->set_flashdata('message',"<div class='alert alert-info'><i class='mdi mdi-check'>&nbsp;</i><strong>Berhasil updated!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_Group");
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='mdi mdi-close'>&nbsp;</i><strong>Gagal updated!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_Group");            
        }
    }

    public function DeleteGroup(){
        $result = $this->M_Group->DeleteGroup($this->uri->segment(3));
        if($result == 1){
            $this->session->set_flashdata('message',"<div class='alert alert-info'><i class='mdi mdi-check'>&nbsp;</i><strong>Berhasil dihapus!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_Group");
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='mdi mdi-close'>&nbsp;</i><strong>Gagal dihapus!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Utl_Group");            
        }
    }

}
