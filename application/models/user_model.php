 <?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User_model extends CI_Model
{


/*uid	mail	student_id	uname	ulevel	uterm	password*/
    private function process($str)
    {
         return sha1($str.$this->config->item('encryption_key'));
    }

    public function get_info($uid)
    {
         $query = "SELECT mail,student_id,uname  FROM user WHERE uid=?";
            $query = $this->db->query($query,$uid);

        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
                    return $row;
            }
            return $row;
    }

    function validate($mail,$pass)
    {
                $this->db->select('uid, uname');
                $this->db->where('mail', $mail);
		$this->db->where('password',  $this->process($pass));
		$query = $this->db->get('user');

		if($query->num_rows == 1)
		{
                       $row = $query->row();
                       return array('uid' => $row->uid, 'uname' => $row->uname);


		}
                return FALSE;
                //echo "False";
    }

        public function insertUser($uname, $student_id, $ulevel, $uterm, $mail, $pass)
        {
            $pass = $this->process($pass);
            $data = array(
               'uname' => "$uname" ,
               'student_id' => "$student_id" ,
               'ulevel' => "$ulevel",
                'uterm' => "$uterm",
                'mail' => "$mail",
                'password' => "$pass"
            );

            
                $this->db->insert('user', $data);

                if($this->db->affected_rows() == 1)
                {
                        $this->db->select('uid');
                        $query = $this->db->get_where('user', array('mail' => $mail));

                        //print_r ($query->row());

                        // INSERT INTO PROGRESS
                        $res = $query->row();
                        if($res !=null)
                        {
                            $uid = $res->uid;
                            $data = array(
                                'uid' => $uid
                            );
                            $this->db->insert('progress', $data);
                             if($this->db->affected_rows() == 1)
                            {
                                return $uid;
                            }
                            else
                                return null;
                        }
                        else
                            return null;

                }
                else
                {
                        return null;
                }
                     //$data['error'] = $this->db->_error_message();

                
        }

}

?>
