<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{

	
	public function index()
	{
		$this->load->view('auth_view');
	}


        function validate_credentials()
	{

             $this->load->library('form_validation');


             $this->form_validation->set_rules('mail', 'User Mail','trim|required');
             $this->form_validation->set_rules('pass', 'Password','trim|required');
             if ($this->form_validation->run() == FALSE)
            {
                     $this->index();
             }

             else
             {
                 $this->load->model('user_model');

                 $mail = $this->input->post('mail');
                 $pass = $this->input->post('pass');


                  $success = $this->user_model->validate($mail,$pass);

					if($success != FALSE) // if the user's credentials validated...
					{
						$data = array(
						        'uid' => $success['uid'],
							'mail' => $mail,
							'uname' =>  $success['uname'],
							'is_logged_in' => true
						);

						$this->session->set_userdata($data);
									//print_r($data);


						redirect('');
					}
					else // incorrect id or password
					{
						$this->index();
					}

             }

	}

        function logout()
	{
		$this->session->sess_destroy();
                redirect('');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */