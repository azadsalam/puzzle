<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $is_logged_in = $this->session->userdata('is_logged_in_admin');
        if (!isset($is_logged_in) || $is_logged_in != TRUE) {
            redirect('admin_panel/authentication/login');
            //   echo 'You do not have permission to access this
            //    page pls..<a href="' . base_url() . 'index.php/admin_panel/authentication/login">Login</a>';
        }
    }

    public function index()
    {
        $this->load->view('admin_panel/admin_page');
    }


}
?>
