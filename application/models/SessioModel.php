<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SessioModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function carregar_sessio($usuari)
    {
        //al fitxer autoload.php ja esta carretat la llibreria session!!
        $newdata = array(
            'nick' => $usuari['nick'],//nom dels camps de la taula
            'mail' => $usuari['mail'],
            'avatar' => $usuari['avatar']
        );

        $this->session->set_userdata($newdata);
    }

    public function suprimir_sessio()
    {
        $this->session->sess_destroy();

    }

    public function canviar_nick_sessio($nick)
    {
        //aquesta funci s'utilitza quan l'usuari canvia el nick al perfil canviar també el valor a la sessió
        //$this->session->set_userdata('some_name', 'some_value');
        $this->session->set_userdata('nick', $nick);
    }

    public function canviar_avatar_sessio($avatar)
    {
        //funcio x anviar avatar a la sessió
        $this->session->set_userdata('avatar', $avatar);
    }

}

  
  