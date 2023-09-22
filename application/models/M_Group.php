<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Group extends CI_Model {
    
    private $tblutlgroupuser 	= 'tblutlgroupuser';
    private $tblutlaksesrth     = 'tblutlaksesrth';
    private $tblutlaksesmenu1   = 'tblutlaksesmenu1';
    private $tblutlmenu1        = 'tblutlmenu1';
    private $tblutlaksesmenu2   = 'tblutlaksesmenu2';
    private $tblutlmenu2        = 'tblutlmenu2';
            
    function __construct() {
        parent::__construct();
    }

    public function GetAllDataGroup(){
        return $this->db->get($this->tblutlgroupuser)->result();      
    }

    public function GetDataGroup($groupID){
        $this->db->where("groupID", $groupID);
        $this->db->where("status", 0);
        return $this->db->get($this->tblutlgroupuser)->row();      
    }

    public function GetAllDataAksesMenu1($groupID){
        $this->db->select("*, (CASE WHEN (SELECT groupID FROM ".$this->tblutlaksesmenu1." WHERE groupID=".$groupID." AND menuID=tblutlmenu1.menuID) IS NULL THEN 0 ELSE 1 END) AS flag");
        $this->db->order_by("menuID","DESC");
        return $this->db->get($this->tblutlmenu1)->result();
    }

    public function GetAllDataAksesMenu2($groupID){
        $this->db->select("*, (CASE WHEN (SELECT groupID FROM ".$this->tblutlaksesmenu2." WHERE groupID=".$groupID." AND menuID=tblutlmenu2.menuID) IS NULL THEN 0 ELSE 1 END) AS flag");
        return $this->db->get($this->tblutlmenu2)->result();
    }

    public function SaveGroup($tamanID, $menuID1, $menuID2, $group){

        $this->db->trans_start();
        $this->db->trans_strict(FALSE);
        //TRANKSASI SIMPAN GROUP//
        $this->db->insert($this->tblutlgroupuser, $group);
        $groupID = $this->db->insert_id();

        //TRANSAKSI AKSES RTH//
        if(!empty($tamanID)){
            $rth = array();
            for($i=0;$i<count($tamanID);$i++){
                $data = array(
                    "groupID" => $groupID,
                    "tamanID" => $tamanID[$i],
                    "createdBy" => $this->session->userdata("username"),
                    "createdDate" => date("Y-m-d H:s:m")
                );
                array_push($rth, $data);
            }

            $this->db->insert_batch($this->tblutlaksesrth, $rth);
        }

        //TRANSAKSI AKSES MENU LEVEL 1//
        if(!empty($menuID1)){
            $menu1 = array();
            for($i=0;$i<count($menuID1);$i++){
                $data = array(
                    "menuID" => $menuID1[$i],
                    "groupID" => $groupID,
                    "createdBy" => $this->session->userdata("username"),
                    "createdDate" => date("Y-m-d H:s:m")
                );
                array_push($menu1, $data);
            }

            $this->db->insert_batch($this->tblutlaksesmenu1, $menu1);
        }

        //TRANSAKSI AKSES MENU LEVEL 2//
        if(!empty($menuID2)){
            $menu2 = array();
            for($i=0;$i<count($menuID2);$i++){
                $data = array(
                    "menuID" => $menuID2[$i],
                    "groupID" => $groupID,
                    "createdBy" => $this->session->userdata("username"),
                    "createdDate" => date("Y-m-d H:s:m")
                );
                array_push($menu2, $data);
            }

            $this->db->insert_batch($this->tblutlaksesmenu2, $menu2);
        }

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

    public function UpdateGroup($groupID, $tamanID, $menuID1, $menuID2, $group){
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);

        //TRANKSASI UPDATE GROUP//
        $this->db->where("groupID", $groupID);
        $this->db->update($this->tblutlgroupuser, $group);

        $this->db->where("groupID", $groupID);
        $this->db->delete($this->tblutlaksesrth);

        $this->db->where("groupID", $groupID);
        $this->db->delete($this->tblutlaksesmenu1);

        $this->db->where("groupID", $groupID);
        $this->db->delete($this->tblutlaksesmenu2);

        //TRANSAKSI ARRAY AKSES RTH//        
        if(!empty($tamanID)){

            $rth = array();
            for($i=0;$i<count($tamanID);$i++){
                $data = array(
                    "groupID" => $groupID,
                    "tamanID" => $tamanID[$i],
                    "createdBy" => $this->session->userdata("username"),
                    "createdDate" => date("Y-m-d H:s:m")
                );
                array_push($rth, $data);
            }

            //TRANSAKSI AKSES RTH//
            $this->db->insert_batch($this->tblutlaksesrth, $rth);
        }

        //TRANSAKSI AKSES MENU LEVEL 1//
        if(!empty($menuID1)){
            $menu1 = array();
            for($i=0;$i<count($menuID1);$i++){
                $dataMenu1 = array(
                    "menuID" => $menuID1[$i],
                    "groupID" => $groupID,
                    "createdBy" => $this->session->userdata("username"),
                    "createdDate" => date("Y-m-d H:s:m")
                );
                array_push($menu1, $dataMenu1);
            }

            $this->db->insert_batch($this->tblutlaksesmenu1, $menu1);
        }

        //TRANSAKSI AKSES MENU LEVEL 2//
        if(!empty($menuID2)){
            $menu2 = array();
            for($i=0;$i<count($menuID2);$i++){
                $dataMenu2 = array(
                    "menuID" => $menuID2[$i],
                    "groupID" => $groupID,
                    "createdBy" => $this->session->userdata("username"),
                    "createdDate" => date("Y-m-d H:s:m")
                );
                array_push($menu2, $dataMenu2);
            }

            $this->db->insert_batch($this->tblutlaksesmenu2, $menu2);
        }

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

    public function DeleteGroup($groupID){
        $this->db->trans_start();
        $this->db->trans_strict(FALSE);
        //TRANKSASI DELETE GROUP//
        $this->db->where("groupID", $groupID);
        $this->db->delete($this->tblutlgroupuser);

        //TRANKSASI DELETE AKSES RTH//        
        $this->db->where("groupID", $groupID);
        $this->db->delete($this->tblutlaksesrth);

        $this->db->where("groupID", $groupID);
        $this->db->delete($this->tblutlaksesmenu1);

        $this->db->where("groupID", $groupID);
        $this->db->delete($this->tblutlaksesmenu2);
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