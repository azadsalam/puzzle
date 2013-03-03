<?php
class Authentication extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('authentication_model');

    }

        public function login() {

                   $this->load->library('form_validation');
                   $this->form_validation->set_rules('email','','trim|required|valid_email');
                   $this->form_validation->set_rules('password','','trim|required');
                           if ($this->form_validation->run() == FALSE) {

                                $this->load->view('admin_panel/login_form');
                           }

                           else
                           {
                                   $query=$this->authentication_model->validate_admin();
                                   if($query)
                                   {
                                       $data = array(
                                           'email' =>$this->input->post('email'),
                                           'is_logged_in_admin' =>true
                                       );

                                     $this->load->library('session');
                                     $this->session->set_userdata($data);

                                     $this->load->view('admin_panel/admin_page');
                                   }

                                   else $this->load->view('admin_panel/login_form');

                           }



        }

        function logout()
        {
                    $this->load->library('session');
                    $this->session->sess_destroy();
                    $this->load->view('admin_panel/login_form');
        }

    

}


?>