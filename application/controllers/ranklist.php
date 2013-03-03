<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ranklist extends CI_Controller {

    public function index() {
        $this->load->model('progress_model');
        $this->load->model('user_model');
        $ranklist = $this->progress_model->generate_ranklist();
        //print_r($ranklist);

        $start = 1;

        foreach ($ranklist as $row) {

            $info = $this->user_model->get_info($row['uid']);

            $row = array_merge($row, $info);

            $new_row['rank'] = $start;
            $start++;
            $new_row['student_id'] = $row['student_id'];
            $new_row['uname'] = $row['uname'];
            $new_row['current_level'] = $row['current_puzzle_serial'];
            $new_row['uname'] = $row['uname'];
            // $new_row['last_correct_answer'] = $row['last_correct_answer'] ;

            $complete_ranklist[] = $new_row; //array_merge($row,$info);

            /*
            for ($i = 0; $i < 9; $i++)
            {
                $complete_ranklist[] = $new_row; //array_merge($row,$info);
            }
             
             */
        }



        $data['ranklist'] = $complete_ranklist;



        //print_r($complete_ranklist);
        //temporarily comment out

        $this->load->library('table');
        $this->load->view('ranklist_view', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */