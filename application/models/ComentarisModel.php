<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComentarisModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function afegir_comentari_bd($data)
    {
        $this->db->insert('comentaris', $data);

    }


}

  
  