<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Rth');
        date_default_timezone_set("Asia/Jakarta");
        if(!$this->session->userdata('userID')){
	        redirect("Auth");
        }
    }

	public function Index()
	{
		$groupID = $this->session->userdata('groupID');
		$data = $this->M_Rth->GetDataAksesRTH($groupID);
		$rth["rth"] = array();
		for($i=1;$i<round(count($data)/2)+1;$i++){
			$array = array();
			for($j=($i*2-1)-1;$j<=($i*2-1);$j++){
				if($j == count($data)){
					break;
				}
				array_push($array, $data[$j]);
			}
			array_push($rth["rth"], $array);
		}
		$this->template->display('Dashboard', $rth);
	}

	public function Logout(){		
        $this->session->sess_destroy();
        redirect("Auth");
	}
}
