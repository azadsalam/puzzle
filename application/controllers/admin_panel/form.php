<?php

class Form extends CI_Controller {

    function index() {

                $is_logged_in=$this->session->userdata('is_logged_in_admin');
            if(!isset($is_logged_in)|| $is_logged_in!=TRUE)
            {
                echo 'You do not have permission to access this
                    page pls..<a href="'.base_url().'index.php/admin_panel/authentication/login">Login</a>';
            }

        else  $this->load->view('admin_panel/form_view');
    }

    function input() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('serial', 'serial', 'required');
        $this->form_validation->set_rules('hint', 'hint', 'required');
        $this->form_validation->set_rules('ans', 'ans', 'required');
        $this->form_validation->set_rules('logic', 'logic', 'required');


        $data['serial'] = $this->input->post('serial');
        $data['hint'] = $this->input->post('hint');
        $data['ans'] = $this->input->post('ans');
        $data['logic'] = $this->input->post('logic');

        if (($this->form_validation->run() == False) || empty($_FILES['photo']['name'])) {

            $data['msg'] = "fill all the field";

            $is_logged_in=$this->session->userdata('is_logged_in_admin');
            if(!isset($is_logged_in)|| $is_logged_in!=TRUE)
            {
                echo 'You do not have permission to access this
                    page pls..<a href="'.base_url().'index.php/admin_panel/authentication/login">Login</a>';
            }



            else $this->load->view('admin_panel/form_view', $data);



        } else {
            if (isset($_POST['submit'])) {


                $this->load->library('upload');

                if (!empty($_FILES['photo']['name'])) {

                    $config = array(
                        'allowed_types' => 'jpg|jpeg|png|gif',
                        'overwrite' => true,
                        'upload_path' => realpath(APPPATH . '../resources/images')
                    );


                    // Initialize config for File 1
                    $this->upload->initialize($config);

                    $data['photo'] = "resources/images/" . $_FILES['photo']['name'];

                    // Upload file 1
                    if ($this->upload->do_upload('photo')) {
                        $data1 = $this->upload->data();

                        $this->load->model('form_model');
                        $this->form_model->insert($data);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
            }
        }

        print_r($data);
    }

}