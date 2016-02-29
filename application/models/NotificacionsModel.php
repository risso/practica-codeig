<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotificacionsModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    function insert_id() {
       return $this->db->insert_id();
    }


    public function get_Provincies()
    {
        $query = $this->db->get('provincias');

        $a = array();
        foreach ($query->result_array() as $arr) {
            $a[] = $arr;
        }
        return $a;
    }

    public function get_PoblacionsByProv($prov)
    {
        $values = array();
        $values["id_provincia"] = $prov;
        $query = $this->db->get_where('municipios', $values);

        $a = array();
        foreach ($query->result_array() as $key => $val) {
            $a[$key] = $val;
        }
        return $a;

    }


    public function afegir_notificacio_bd($data)
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
        // uttim seria la data q es timestamp

        if($this->db->insert('notificacions', $valors)){

            return $this->db->insert_id();
        }else{

            return false;
        }



    }

    public function getNotificacions($mail_usu)
    {
        $values = array();
        $values["id_user"] = $mail_usu;
        $query = $this->db->get_where('notificacions', $values);

        $a = array();
        foreach ($query->result_array() as $key => $val) {
            $a[$key] = $val;

        }
        return $a;

    }

    public function get_Nom_Provincia($val)
    {
        $values = array();
        $values["id_provincia"] = $val;
        $query = $this->db->get_where('provincias', $values);


        foreach ($query->result_array() as $pos) {

            foreach ($pos as $key => $val) {
                if ($key == 'provincia') return $val;
            }

        }
    }


}

  
  