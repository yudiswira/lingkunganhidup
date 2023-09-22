<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Menu2 extends CI_Model {
    
    private $tblutlmenu1 = 'tblutlmenu1';
    private $tblutlmenu2 = 'tblutlmenu2';
            
    function __construct() {
        parent::__construct();
    }

    public function GetAllDataMenu2(){
        $this->db->select("A.*, B.menuName AS menuHeaderName, 0 AS flag");
        $this->db->join($this->tblutlmenu1." AS B", 'A.menuHeader = B.menuID', 'left');
        return $this->db->get($this->tblutlmenu2." AS A")->result();    	
    }

    public function GetDataMenu2($menuID){
        $this->db->where("menuID", $menuID);
        return $this->db->get($this->tblutlmenu2)->row(); 
    }

    public function SaveUtlMenu2($data){
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);
        //TRANKSASI SIMPAN MENU 1//
        $this->db->insert($this->tblutlmenu2, $data);
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

    public function UpdateUtlMenu2($menuID, $data){
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);
        //TRANKSASI UPDATED USER//
        $this->db->where("menuID", $menuID);
        $this->db->update($this->tblutlmenu2, $data);
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