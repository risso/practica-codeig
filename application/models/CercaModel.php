<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CercaModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function afegir_cerca_bd($data)
    {
        $valors = array();
        $valors["id_user"] = $data[0];
        $valors["type_im"] = $data[1];
        $valors["provincia"] = $data[2];
        $valors["poblacio"] = $data[3];
        $valors["operacio"] = $data[4];
        $valors["m2"] = $data[5];
        $valors["num_espais"] = $data[6];
        $valors["num_banys"] = $data[7];
        $valors["m2_exterior"] = $data[8];
        $valors["planta"] = $data[9];
        $valors["orientacio"] = $data[10];
        $valors["estat_conservacio"] = $data[11];
        $valors["preu"] = $data[12];
        $valors["accepta_com"] = $data[13];// no estic segura d'aquest ja q és bolean
        // uttim seria la data q es timestamp

        $this->db->insert('cerques', $valors); // -> els camps dels valor s'han de dir igual q els camps de la base de dades

    }

    public function getCerques($mail_usu)
    {
        $values = array();
        $values["id_user"] = $mail_usu;
        $query = $this->db->get_where('cerques', $values);

        $a = array();
        foreach ($query->result_array() as $arr) {
            $a[] = $arr;
        }
        return $a;

    }


}

  
  