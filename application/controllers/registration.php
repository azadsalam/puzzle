<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
        function __construct()
	{
		parent::__construct();
		$this->is_not_logged_in();
	}
        function is_not_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{

		}
                else
                {
                    echo "already registered";
                    redirect('welcome', 'refresh');
                    //$uname = $this->session->userdata('uname');
                    //$mail = $this->session->userdata('mail');
                    //echo "$uname -> $mail";
                }
	}

	public function index()
	{
            $this->load();
	}

        function load($error=NULL)
        {
            $data['error'] = $error;
            $this->load->view('registration_view',$data);
        }

        public function submit()
        {
            $this->load->library('form_validation');

             $this->form_validation->set_rules('uname', 'Name','trim|required|xss_clean');
             $this->form_validation->set_rules('student_id', 'Student ID','trim|required|xss_clean|integer');
             $this->form_validation->set_rules('ulevel', 'Level','trim|required|xss_clean|integer');
             $this->form_validation->set_rules('uterm', 'Term','trim|required|xss_clean|integer');
             $this->form_validation->set_rules('mail', 'User Mail','trim|required|valid_email|xss_clean');
             $this->form_validation->set_rules('pass', 'Password','trim|required|matches[confirm_pass]|xss_clean|min_length[6]');
             $this->form_validation->set_rules('confirm_pass', 'Confirm Password','trim|required|xss_clean');


             if ($this->form_validation->run() == FALSE)
            {
                 $this->load();
            }
            else
            {
                 $uname = $this->input->post('uname');
                 $student_id = $this->input->post('student_id');
                 $ulevel = $this->input->post('ulevel');
                 $uterm = $this->input->post('uterm');
                 $mail = $this->input->post('mail');
                 $pass = $this->input->post('pass');

                 $this->load->model('user_model');
                 $uid = $this->user_model->insertUser($uname, $student_id, $ulevel, $uterm, $mail, $pass);

                 //echo "UID  D D $uid";
                 if($uid == null)
                 {
                     $this->load("Mail, Student ID must be unique!! Provide all valid information!!");
                 }
                 else
                 {
                     $this->set_session($uid,$mail,$uname);
                     $this->land_on_logged_in_page();
                }
                    //$this->load->view('formsuccess');
            }
        }

        private function land_on_logged_in_page()
        {
           redirect('');
        }


        private function set_session($uid,$mail,$uname)
        {
            $data = array(
                    'uid' => $uid,
                    'mail' => $mail,
                    'uname' => $uname,
                    'is_logged_in' => true
            );

            $this->session->set_userdata($data);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */