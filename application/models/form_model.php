<?php

class Form_model extends CI_Model {

    function insert($data)
    {
        $this->db->set('serial', $data['serial']);
        $this->db->set('photo', $data['photo']);
        $this->db->set('hint', $data['hint']);
        $this->db->set('ans', $data['ans']);
        $this->db->set('logic', $data['logic']);
        $this->db->insert('puzzle');
    }

}

