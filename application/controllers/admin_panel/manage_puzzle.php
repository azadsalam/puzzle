<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_puzzle extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');	
	}
	
	function _example_output($output = null)
	{
		$this->load->view('admin_panel/manage_puzzle_view.php',$output);
	}
	
	
	function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}	

    function puzzle_management()
	{
	
	       $is_logged_in=$this->session->userdata('is_logged_in_admin');
            if(!isset($is_logged_in)|| $is_logged_in!=TRUE)
            {
                echo 'You do not have permission to access this
                    page pls..<a href="'.base_url().'index.php/admin_panel/authentication/login">Login</a>';
            }
	else
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('puzzle');
			$crud->set_subject('Puzzle');
			$crud->required_fields('serial,photo,hint,ans,logic');
			$crud->columns('serial','photo','hint','ans','logic');
                        
                        $crud->set_field_upload('photo','resources/images');

                        
			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		
	}
		
		
		
	}

        

}