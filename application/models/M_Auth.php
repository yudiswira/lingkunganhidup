<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {
    
    private $tblUtlUser = 'tblutluser';
    private $vwutluser  = 'vwutluser';
            
    function __construct() {
        parent::__construct();
    }

    public function CheckUser($username){
        $this->db->where("username", $username);
        $data = $this->db->get($this->tblUtlUser)->row();
        if(count($data) > 0){
            if($data->nonActive == 0){
                return $data;
            }else{
                return "user sudah di Non Activekan!";
            }
        }else{
            return "username tidak terdaftar!";
        }
    }

    public function GetDataAllUser(){
        return $this->db->get($this->vwutluser)->result();
    }

    public function GetDataUser($userID){
        $this->db->where("userID", $userID);
        return $this->db->get($this->tblUtlUser)->row();
    }

    public function SaveMstUser($data){
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);
        //TRANKSASI SIMPAN USER//
        $this->db->insert($this->tblUtlUser, $data);
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

    public function UpdateMstUser($userID, $data){
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);
        //TRANKSASI UPDATED USER//
        $this->db->where("userID", $userID);
        $this->db->update($this->tblUtlUser, $data);
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