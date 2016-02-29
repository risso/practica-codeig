<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComentarisCerquesModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getComentarisByRef($ref)
    {
        $values = array();
        $values["ref_cerca"] = $ref;
        $query = $this->db->get_where('comentaris', $values);

        $a = array();
        foreach ($query->result_array() as $key => $val) {
            $a[$key] = $val;

        }
        return $a;

    }


}

  
  