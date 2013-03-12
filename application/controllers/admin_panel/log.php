<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log extends CI_Controller {

    function __construct() {
        parent::__construct();

         $is_logged_in = $this->session->userdata('is_logged_in_admin');
        if (!isset($is_logged_in) || $is_logged_in != TRUE)
        {
            redirect('admin_panel/authentication/login');
         //   echo 'You do not have permission to access this
                //    page pls..<a href="' . base_url() . 'index.php/admin_panel/authentication/login">Login</a>';
        }

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    function _example_output($output = null) {
        $this->load->view('admin_panel/manage_puzzle_view.php', $output);
        //log_view
    }

    function index() {

        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table($this->db->dbprefix('log'));
            $crud->set_subject('Log');



            $crud->set_relation('uid', 'user', 'mail');
            $crud->display_as('uid', 'User Mail');

         //   $crud->unset_delete();
            $crud->unset_add();
            $crud->unset_edit();

            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

}