<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoincidenciesModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function afegir_coincidencia_bd($data)
    {

        $this->db->insert('coincidencies', $data); // -> els camps dels valor s'han de dir igual q els camps de la base de dades

    }

    public function getCoincidenciesByUser($mail_usu)
    {
        $values = array();
        $values["user_noti"] = $mail_usu;
        $query = $this->db->get_where('coincidencies', $values);

        $a = array();
        foreach ($query->result_array() as $key => $val) {
            $a[$key] = $val;

        }
        return $a;

    }


}

  
  