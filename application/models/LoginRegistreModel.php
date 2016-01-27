<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginRegistreModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function fer_login($data)
    {
        $values = array();
        $values["mail"] = $data[0];
        $values["passwd"] = $data[1];
        $values["activat"] = true;

        // No diferencia entre majúscules i minúscules
        // $query = $this->db->get_where('empleats', array('nom' => $nom, 'pas' => $pas));
        //$query = $this->db->query("select * from users where binary mail = '$mail' and binary passwd = '$pas'");
        $query = $this->db->get_where('users', $values);
        //$query = $this->db->get_where('users', array('mail' => $values["mail"],'passwd'=> $values["passwd"]));

        $a = array();
        foreach ($query->result_array() as $arr) {
            $a[] = $arr;
        }

        if (count($a) == 1) {
            return $a[0];
        }
        return null;
    }

    public function fer_registre($data)
    {
        $valors = array();
        $valors["mail"] = $data[0];
        $valors["nick"] = $data[1];
        $valors["passwd"] = $data[2];
        $valors["avatar"] = null;
        $valors["activation_key"] = $data[3];
        $valors["activat"] = null;

        $this->db->insert('users', $valors); // -> els camps dels valor s'han de dir igual q els camps de la base de dades
    }

    public function existeix($mail)
    {

        $query = $this->db->get_where('users', array('mail' => $mail));

        $a = array();
        foreach ($query->result_array() as $arr) {
            $a[] = $arr;
        }
        if (count($a) == 1) {
            return true;
        }
        return false;
    }

    public function fer_activacio($mail, $codi)
    {
        $valors = array();
        $valors["activat"] = true;

        $array = array('mail' => $mail, 'activation_key' => $codi);
        $this->db->where($array);
        $this->db->update('users', $valors);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function fer_canvis_al_perfil($data)
    { //nomes es pot canviar el nick i el passwd aqui

        $valors = array();
        $valors["nick"] = $data[0];
        $valors["passwd"] = $data[1];

        $array = array('mail' => $this->session->userdata("mail"));
        $this->db->where($array);
        $this->db->update('users', $valors);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;
    }

    public function canviar_imatge_perfil($src_img)
    {
        $valors = array();
        $valors['avatar'] = $src_img;
        $array = array('mail' => $this->session->userdata('mail'));

        $this->db->where($array);
        $this->db->update('users', $valors);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        return false;

    }
}

  
  