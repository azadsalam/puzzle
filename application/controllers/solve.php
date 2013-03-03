<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Solve extends CI_Controller {

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
            /*
		//$this->load->view('solve_view');
                $str1 = " answer ";
                $str2 = " Answer  ";
              //  $this->match_strings($str1, $str2);
               // $this->match_strings("kutub  ", "katub");
               // $this->match_strings("kutub ", "kutub");
                $this->match_strings("kutub  ", "kutub");
                $this->match_strings("kutub  ", "Kutub");
                $this->match_strings("kutub  ", "k ut u b");
                */
                $this->load_level();

                
	}

        public function load_level()
        {
            //Getting User ID
                $uid = $this->get_uid();

            $this->load->model('progress_model');
            $finished =   $this->progress_model->get_finish_state($uid);

            if($finished==TRUE)
            {
                echo "FINISHED";
                return;
            }
            else
            {
                  //echo "picture abhi baki hain";
            }


                //Getting which level he is in : level-> serial num
                $currentLevel = $this->get_current_level($uid);


            if($currentLevel == NULL)
            {
                echo "Level = Null !! Contact Administration Asap !!!";
                return;
            }




            $puzzle_info = $this->get_puzzle_info($currentLevel);

            $data['url'] = $puzzle_info->photo;
            $data['hint'] = $puzzle_info->hint;
            $this->load->view('solve_view',$data);

        }

        /* TAKE VALUE FROM SESSION  */
        public function get_uid()
        {
            return $this->session->userdata('uid');
        }

        //get_current_level
        public function get_current_level($uid)
        {
            $this->load->model('progress_model');
            $currentLevel = $this->progress_model->get_current_level($uid);

            return $currentLevel;
        }


        public function get_puzzle_info($currentLevel)
        {
                $this->load->model('puzzle_model');
                $puzzle_info = $this->puzzle_model->get_puzzle_info($currentLevel);
                return $puzzle_info;
        }


        //returns levenstein distance
        public function match_strings($original, $guess)
        {

            $original = $this->prepare($original);
            $guess = $this->prepare($guess);



            $dis = levenshtein($guess, $original);
            return $dis;

            /*

            if($dis ==  0)
            {
                echo "$guess matched $original<br/>";
            }
            else
            {
                  echo "$guess did not matched $original<br/>";
            }
            */
            //echo $guess,"=".$original;
            //print_r($arr1);
            //print_r($arr2);


        }

        private function prepare($str)
        {
            $str = trim($str);
            $str = strtolower($str);
            return $str;
            /*
            $str = strtolower($str);
            $token = " \t\n";
            
            $tok = strtok($str,$token );

            while($tok != false)
            {
                $data[]=$tok;
                $tok = strtok($token);
            }

            return $data;
             
             */
        }



        public function  submit_answer_by_post()
        {
            $guess = $this->input->post('ans_textbox');
          //  echo "here : $guess";
            $this->check_ans($guess);
        }

        public function get_ans_logic_of_level($level)
        {
            $this->load->model('puzzle_model');

            return $this->puzzle_model->get_ans_logic($level);
        }
        private function get_ans_of_level($level)
        {
            $this->load->model('puzzle_model');

            return $this->puzzle_model->get_ans($level);
        }


        public function test()
        {
            $uid=1;
           
        }


        private function more_levels_left($level)
        {
            $this->load->model('puzzle_model');

            return $this->puzzle_model->more_levels_left($level);

        }

        private function mark_finished($uid)
        {
                    $this->load->model('progress_model');
                    $this->progress_model->mark_finished($uid);

        }

        //check ans and progresses if right answer
        public function check_ans($guess)
        {

            $uid = $this->get_uid();
            $current_level = $this->get_current_level($uid);

            $guess = trim($guess);

            //Store in temp for alphanumeric check
            $temp = $guess;

            //STORE LOG
            $guess = mysql_real_escape_string($guess);


            $this->load->model('log_model');
            $this->log_model->insert_log($uid,$current_level,$guess);
            ///store log ends
            
            if(ctype_alnum($temp)==false)
            {
                $data['error']=true;
                print_r(json_encode($data,JSON_FORCE_OBJECT));
                return;
            }
            

            
            $ans_logic =  $this->get_ans_logic_of_level($current_level);


            //echo "$ans_logic->ans : $ans_logic->logic";


            $original  = $ans_logic->ans;
            $logic = $ans_logic->logic;



            $distance = $this->match_strings($original, $guess);

            
            //echo "$distance";
            //correct answer



            if($distance ==  0)
            {


                $more_levels_left=$this->more_levels_left($current_level);

                if($more_levels_left == true)
                {
                         $this->increment_progress($uid);
                }
                else
                 {
                        $this->mark_finished($uid);
                 }


                $data['success']=true;
                $data['logic'] = $logic;
                
                
                //echo "HOISE";
            }
            else
            {
                 $data['success']=false;
                 $data['distance']=$distance;
                //echo "HOYNAI";
            }

            print_r(json_encode($data,JSON_FORCE_OBJECT));
        }

        private function increment_progress($uid)
        {
                $this->load->model('progress_model');
              
                $this->progress_model->increment_level($uid);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */