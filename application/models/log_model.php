 <?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Log_model extends CI_Model
{

//log(`uid``puzzle_serial``given_answer` time)
    function insert_log($uid,$serial,$string)
    {
            $data = array(
               'uid' => $uid ,
               'puzzle_serial' => $serial ,
               'given_answer' => $string
            );

$this->db->insert('log', $data);
        
    }
}

?>
