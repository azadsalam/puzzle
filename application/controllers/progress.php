<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Progress extends CI_Controller {

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
		$this->is_logged_in();
	}
        function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
                    echo "PLEASE LOGIN IN!!";
                    redirect('auth', 'refresh');
		}
                else
                {
                    //$uname = $this->session->userdata('uname');
                    //$mail = $this->session->userdata('mail');
                    //echo "$uname -> $mail";
                }
	}

     
	public function index()
	{

                $this->load->model('progress_model');
                $this->load->model('puzzle_model');

                $uid = $this->session->userdata('uid');
                $currentLevel = $this->progress_model->get_current_level($uid);
                $total_levels = $this->puzzle_model->count_levels();


                for($i=1;$i<=$currentLevel;$i++)
                {
                    $urls[$i]= $this->puzzle_model->get_photo_url($i);
                }
               // print_r($urls);
                $data['total']= $total_levels;
                $data['current']=$currentLevel;
                $data['urls'] = $urls;
                //echo $total_levels;
                     //       $this->load->library('table');
		$this->load->view('progress_view',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */