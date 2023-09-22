<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rth extends CI_Model {
    
    private $tblmstrth 		= 'tblmstrth';
    private $vwUtlAksesRth  = 'vwutlaksesrth';
    private $tblutlaksesrth = 'tblutlaksesrth';
            
    function __construct() {
        parent::__construct();
    }

    public function GetAllDataRth(){
        $this->db->select("*, 0 AS flag");
        return $this->db->get($this->tblmstrth)->result();    	
    }

    public function GetDataRth($tamanID){
        $this->db->where("tamanID", $tamanID);
        return $this->db->get($this->tblmstrth)->row();      
    }

    public function GetDataAksesRTH($groupID){
        $this->db->where("groupID", $groupID);
        return $this->db->get($this->vwUtlAksesRth)->result_array();
    }

    public function GetAllDataAksesRTH($groupID){
    	$this->db->select("*, (CASE WHEN (SELECT tamanID FROM ".$this->tblutlaksesrth." WHERE groupID=".$groupID." AND tamanID=tblmstrth.tamanID) IS NULL THEN 0 ELSE 1 END) AS flag");
        return $this->db->get($this->tblmstrth)->result();
    }

    public function SaveMstRth($data){
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);
        //TRANKSASI SIMPAN RTH//
        $this->db->insert($this->tblmstrth, $data);
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

    public function UpdateMstRth($tamanID, $data){
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);
        //TRANKSASI UPDATED RTH//
        $this->db->where("tamanID", $tamanID);
        $this->db->update($this->tblmstrth, $data);
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

    public function DeleteMstRth($tamanID){
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);
        //TRANKSASI DELETE RTH//
        $this->db->where("tamanID", $tamanID);
        $this->db->delete($this->tblmstrth);

        //TRANKSASI DELETE AKSES RTH//        
        $this->db->where("tamanID", $tamanID);
        $this->db->delete($this->tblutlaksesrth);
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