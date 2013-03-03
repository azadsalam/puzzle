<?php

class Authentication_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    function validate_admin()
    {
        $this->db->where('email',$this->input->post('email'));
        $this->db->where('password',  md5($this->input->post('password')));
        $query=$this->db->get('admin_login');

        if($query->num_rows==1)
        {

            return true;
        }
    }



    

}

?>
