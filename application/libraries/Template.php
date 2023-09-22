<?php
class Template{
    protected $_CI;
    function __construct(){
        $this->_CI=&get_instance();
    }
    
    function display($template,$data=null){
        $this->_CI->load->model('M_Group');
        
        $data['_getMenu1'] = $this->_CI->M_Group->GetAllDataAksesMenu1($this->_CI->session->userdata('groupID'));
        $data['_getMenu2'] = $this->_CI->M_Group->GetAllDataAksesMenu2($this->_CI->session->userdata('groupID'));
        $data['_content'] = $this->_CI->load->view($template,$data,true);

        $this->_CI->load->view('/Template.php',$data);
    }
    
}