 <?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Puzzle_model extends CI_Model
{

/*puzzle(serial,photo,hint,ans,logic)*/

	public function get_photo_url($serial)
        {

            $this->db->select('photo');
            $query = $this->db->get_where('puzzle', array('serial' => $serial));

            //print_r ($query->row());

            $res = $query->row();
            if($res !=null)
               return "resources/images/".$res->photo;
            else
                return null;

        }

        public function get_puzzle_info($serial)
        {

            $this->db->select('photo,hint');
            $query = $this->db->get_where('puzzle', array('serial' => $serial));

            //print_r ($query->row());

            $res = $query->row();
            if($res !=null)
            {
                $res->photo = "resources/images/".$res->photo;
                return $res;
               //echo $res->photo ." ".$res->hint;
              // echo $res;
              // print_r($res);
            }
            else
                return null;

        }

         public function get_ans($serial)
        {

            $this->db->select('ans');
            $query = $this->db->get_where('puzzle', array('serial' => $serial));

            //print_r ($query->row());

            $res = $query->row();
            if($res !=null)
            {
                return $res->ans;
               //echo $res->photo ." ".$res->hint;
              // echo $res;
              // print_r($res);
            }
            else
                return null;

        }

        public function get_ans_logic($serial)
        {

            $this->db->select('ans,logic');
            $query = $this->db->get_where('puzzle', array('serial' => $serial));

            //print_r ($query->row());

            $res = $query->row();
            if($res !=null)
            {
                return $res;
               //echo $res->photo ." ".$res->hint;
              // echo $res;
              // print_r($res);
            }
            else
                return null;

        }


        public function more_levels_left($level)
        {
             $query = "SELECT * FROM puzzle WHERE serial > ?";
             $res =  $this->db->query($query,$level);

             if ($res->num_rows() > 0)
             {
                 return true;
             }
             else
             {
                 return false;
             }
        }

        public function count_levels()
        {
             $query = "SELECT count(*) AS a FROM puzzle";
             $res =  $this->db->query($query,$level);

             if ($res->num_rows() > 0)
             {
                 return $res->row()->a;
             }
             else
             {
                 return false;
             }
        }

}

?>
