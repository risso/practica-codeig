<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContCerques extends CI_Controller
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
        //comprovar si esta en sessio si no no deixar anar, guardar pagina anterior i anar a login
        if ($this->usuariEnSessio()) {
            $data = array();

            //agafar dades bd per mostrar totes les cerques de l'usuari loginat
            $data['cerques'] = $this->obternir_cerques_x_usuari();

            $this->load->view('templates/header', $data);
            $this->load->view('pages/view_cerques');
            $this->load->view('templates/footer');

        } else {
            $this->session->set_userdata('ultima_pagina', 'contCerques/index');

            //echo $this->session->userdata('ultima_pagina');
            redirect('contIndex/index');
        }
    }

    public function obternir_cerques_x_usuari()
    {
        return $this->CercaModel->getCerques($this->session->userdata('mail'));
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


    // public function mostrar_form($mostrar_form)
    public function mostrar_form()
    {
        if ($this->usuariEnSessio()) {
            $data = array();
            //$data["mostrar_form"] = $mostrar_form; //$mostrar_form si existeix te valor true per mostrar el formulari,, es pot veure al enlla de view_cerques
            $data["mostrar_form"] = true;

            // omplir el desplegables de provincia i poblacio
            $prov_array = array();
            $prov_array[0] = "Barcelona";
            $atrib = array('id' => 'input_prov', 'class' => 'form-control');
            $data["dropdown_prov"] = form_dropdown('input_prov', $prov_array, '1', $atrib);

            $pob_array = array();
            $pob_array[0] = "Igualada";
            $pob_array[1] = "Capellades";
            $pob_array[2] = "Vilanova del Camí";
            $pob_array[3] = "La Torre de Claramunt";
            $atrib2 = array('id' => 'input_pob', 'class' => 'form-control');
            $data["dropdown_pob"] = form_dropdown('input_pob', $pob_array, '1', $atrib2);

            $data['cerques'] = $this->obternir_cerques_x_usuari();

            $this->load->view('templates/header', $data);
            $this->load->view('pages/view_cerques');
            $this->load->view('templates/footer');


        } else {

            redirect('ContCerques/index');
        }
    }

    public function afegir_cerca()
    {
        if ($this->usuariEnSessio()) {

            $data = array();
            //agafar dades del formulari i guardar,, en total 13 camps per guardar

            $data[0] = $this->session->userdata('mail'); //agafem valor mail de la session
            $data[1] = $this->input->post("input_imm");
            $data[2] = $this->input->post("input_prov");
            $data[3] = $this->input->post("input_pob");
            $data[4] = $this->input->post("input_oper");
            $data[5] = $this->input->post("input_m2");
            $data[6] = $this->input->post("input_num_espais");
            $data[7] = $this->input->post("input_num_banys");
            $data[8] = $this->input->post("input_m2_exterior");
            $data[9] = $this->input->post("input_planta");
            $data[10] = $this->input->post("input_radio_orientacio");
            $data[11] = $this->input->post("input_conservacio");
            $data[12] = $this->input->post("input_preu");
            $data[13] = $this->input->post("input_accept_comentari");

            $res = $this->CercaModel->afegir_cerca_bd($data);

            redirect('ContCerques/index');
            /*
             * els dos redirects semblen redundatns, perque tant com si entre en la primera
             * condicio com si entra en la segona va al mateix lloc (ContCerques/index), però no és així,
             * la diferencia es q si no està logina no entrarà al primer if i no intentarà fer el insert,
             * si no posem la condicio si un usu no loginat intenta accedir a ContCerques/afegir_cerca
             * intentarà fer el insert a la bd, i aixó seria un forat de seguretat.
            */
        } else {
            redirect('ContCerques/index');

        }

    }


}

