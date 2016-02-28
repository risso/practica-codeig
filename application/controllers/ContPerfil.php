<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContPerfil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    /**
     *
     */
    public function index()
    {
        //$this->load->helper("url"); // --> no cal pq em posat al fitxer autoload.php q es carregui automaticament
        //$this->load->helper("form");
        //$this->load->library('form_validation');

        //comprovar si esta en sessio si no no deixar anar, guardar pagina anterior i anar a login
        if ($this->usuariEnSessio()) {
            $data = array();
            $this->load->view('templates/header2', $data);
            $this->load->view('pages/editarPerfil');
            $this->load->view('templates/footer');

        } else {
            $this->session->set_userdata('ultima_pagina', 'contPerfil/index');

            //echo $this->session->userdata('ultima_pagina');
            redirect('contIndex/index');

        }


    }

    public function usuariEnSessio()
    {
        if (!$this->session->has_userdata('nick')) {
            return false;
        }
        // if ($this->session->userdata ('rol') != $rol) {
        //     return false;
        // }
        return true;
    }

    public function modificar_perfil()
    {
        $data = array();

        // Displaying Errors In Div
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('inputNick', 'Username', 'trim|required|min_length[5]|max_length[12]'); // si posava |xxs_clean no donava valid mai
        $this->form_validation->set_rules('inputPassword', 'Password', 'trim|required|matches[inputPasswordConfirm]');
        $this->form_validation->set_rules('inputPasswordConfirm', 'Password Confirmation', 'trim|required');

        if ($this->form_validation->run() == FALSE) { // si algun camp es erroni torna al formulari (de registre), omplint els camps

            $this->load->view('templates/header2', $data);
            $this->load->view('pages/editarPerfil');
            $this->load->view('templates/footer');

        } else {//agafar totes les dades del formulari
            $data[0] = $this->input->post("inputNick");
            $data[1] = $this->input->post("inputPassword");

            //per l'update i tornar al editarPerfil avisant amb alert de canvis fets
            $res_bolean = $this->LoginRegistreModel->fer_canvis_al_perfil($data);
            //$res_bolean no s'utilitza per res pero obté un bolen q indica si s'ha actualitzat algo o no (control-error)

            //canviar valors de la sessio
            $this->SessioModel->canviar_nick_sessio($data[0]);

            $data["canvis_perfil_correcte"] = true;
            $this->load->view('templates/header2', $data);
            $this->load->view('pages/editarPerfil');
            $this->load->view('templates/footer');

        }


    }


}

