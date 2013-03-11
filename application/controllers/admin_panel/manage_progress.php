<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage_progress extends CI_Controller {

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
    }

    function index() {

        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('progress');
            $crud->set_subject('Progress');
            //$crud->required_fields('serial,photo,hint,ans,logic');
            $crud->columns('uid','current_puzzle_serial','last_correct_answer','finished');

            //$crud->set_field_upload('photo', 'resources/images');

$crud->unset_add();
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

}