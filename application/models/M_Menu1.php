<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Menu1 extends CI_Model {
    
    private $tblutlmenu1 = 'tblutlmenu1';
            
    function __construct() {
        parent::__construct();
    }

    public function GetAllDataMenu1(){
        $this->db->select("*, 0 AS flag");
        return $this->db->get($this->tblutlmenu1)->result();    	
    }

    public function GetDataMenu1($menuID){
        $this->db->where("menuID", $menuID);
        return $this->db->get($this->tblutlmenu1)->row();        
    }

    public function SaveUtlMenu1($data){
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);
        //TRANKSASI SIMPAN MENU 1//
        $this->db->insert($this->tblutlmenu1, $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } 
        else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function UpdateUtlMenu1($menuID, $data){
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);
        //TRANKSASI UPDATED USER//
        $this->db->where("menuID", $menuID);
        $this->db->update($this->tblutlmenu1, $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } 
        else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

}