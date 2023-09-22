<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mst_Rth extends CI_Controller {

    private $root = 'Master/Rth';

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('M_Rth');
        if(!$this->session->userdata('userID')){
	        redirect("Auth");
        }
    }

	public function Index()
	{
		$data["rth"] = $this->M_Rth->GetAllDataRth();
		$this->template->display($this->root.'/Index', $data);
	}

    public function Form(){        
        $Form   = $this->uri->segment(3);
        switch ($Form) {
            case 'Input':
                $data["url"]    = "SaveMstRth";
                $this->template->display($this->root."/Form", $data);
            break;
            case 'Update':
                $tamanID = $this->uri->segment(4);
                $data["url"]    = "UpdateMstRth";
                $data["rth"]   = $this->M_Rth->GetDataRth($tamanID);
                $this->template->display($this->root."/Form", $data);
            break;
            default:
                redirect("Error");
            break;
        }     
    }

    public function SaveMstRth(){
        $data   = array(
            "title"         => $this->input->post("title"),
            "link"          => $this->input->post("link"),
            "img"           => $this->_uploadImage($this->input->post("title")),
            "keterangan"    => $this->input->post("Descripsi"),
            "createdBy"     => $this->session->userdata("username"),
            "createdDate"   => date("Y-m-d H:s:m")
        );
        $result = $this->M_Rth->SaveMstRth($data);
        if($result == 1){
            $this->session->set_flashdata('message',"<div class='alert alert-info'><i class='mdi mdi-check'>&nbsp;</i><strong>Berhasil simpan!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Mst_Rth");
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='mdi mdi-close'>&nbsp;</i><strong>Gagal simpan!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Mst_Rth");            
        }
    }

    public function UpdateMstRth(){
        $config['upload_path']          = './assets/img/rth/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']            = str_replace(" ", "_", $this->input->post("title"));
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $filename = explode(".", $this->input->post("imgName"))[0];
            if($filename != "default.png"){
                array_map('unlink', glob(FCPATH."assets/img/rth/$filename.*"));
            }
            $this->upload->data("file_name");
            $gambar = str_replace(" ", "_", $this->input->post("title")).".png";
        }else{
            $gambar = explode(".", $this->input->post("imgName"))[0].".png";
        }
        $data   = array(
            "title"         => $this->input->post("title"),
            "link"          => $this->input->post("link"),
            "img"           => $gambar,
            "keterangan"    => $this->input->post("Descripsi"),
            "updatedBy"     => $this->session->userdata("username"),
            "updatedDate"   => date("Y-m-d H:s:m")
        );
        $result = $this->M_Rth->UpdateMstRth($this->input->post("tamanID"), $data);
        if($result == 1){
            $this->session->set_flashdata('message',"<div class='alert alert-info'><i class='mdi mdi-check'>&nbsp;</i><strong>Berhasil updated!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Mst_Rth");
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='mdi mdi-close'>&nbsp;</i><strong>Gagal updated!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Mst_Rth");            
        }
    }

    public function DeleteMstRth(){
        $filename = explode(".", $this->uri->segment(4))[0];
        if($filename != "default"){
            array_map('unlink', glob(FCPATH."assets/img/rth/$filename.*"));            
        }
        $result = $this->M_Rth->DeleteMstRth($this->uri->segment(3));
        if($result == 1){
            $this->session->set_flashdata('message',"<div class='alert alert-info'><i class='mdi mdi-check'>&nbsp;</i><strong>Berhasil dihapus!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Mst_Rth");
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger'><i class='mdi mdi-close'>&nbsp;</i><strong>Gagal dihapus!!!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>");
            redirect("Mst_Rth");            
        }
    }

    private function _uploadImage($filename)
    {
        $config['upload_path']          = './assets/img/rth/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']            = str_replace(" ", "_", $filename);
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "default.png";
    }

}
