 <?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Progress_model extends CI_Model
{

/*progress (  uid INT ,    current_puzzle_serial INT ,    last_correct_answer     TIMESTAMP );*/

        public function generate_ranklist()
        {
            //$start = 1;
            $query = "SELECT uid,current_puzzle_serial ,last_correct_answer  FROM progress ORDER BY current_puzzle_serial DESC, last_correct_answer ASC";
            $res = $this->db->query($query);


            foreach ($res->result_array() as $row)
            {
                $arr[]=$row;
            }
            return $arr;
        }

        public function increment_level($uid)
        {
            $query = "UPDATE progress SET current_puzzle_serial = current_puzzle_serial + 1 WHERE uid = ?";
            $this->db->query($query,$uid);
        }
        public function mark_finished($uid)
        {
            $query = "UPDATE progress SET finished = TRUE WHERE uid=?";
            $this->db->query($query,$uid);
        }
        public function get_current_level($uid)
        {

            $this->db->select('current_puzzle_serial');
            $query = $this->db->get_where('progress', array('uid' => $uid));

            //print_r ($query->row());

            $res = $query->row();
            if($res !=null)
               return $res->current_puzzle_serial;
            else
                return null;

        }

        public function get_finish_state($uid)
        {
             $this->db->select('finished');
            $query = $this->db->get_where('progress', array('uid' => $uid));

            //print_r ($query->row());

            $res = $query->row();
            if($res !=null)
               return $res->finished;
            else
                return false;

        }

}

?>
