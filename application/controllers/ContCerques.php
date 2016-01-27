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
            $this->load->view('templates/header', $data);
            $this->load->view('pages/view_cerques');
            $this->load->view('templates/footer');

        } else {
            $this->session->set_userdata('ultima_pagina', 'contCerques/index');

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


    // public function mostrar_form($mostrar_form)
    public function mostrar_form()
    {
        if ($this->usuariEnSessio()) {
            $data = array();
            //$data["mostrar_form"] = $mostrar_form; //$mostrar_form si existeix te valor true per mostrar el formulari,, es pot veure al enlla de view_cerques
            $data["mostrar_form"] = true;

            // omplir el desplegables de provincia i poblacio
            $prov_array = array();
            $prov_array[0]="Barcelona";
            $atrib = array('id' => 'input_prov', 'class' => 'form-control');
            $data["dropdown_prov"] = form_dropdown('input_prov',$prov_array,'1',$atrib);

            $pob_array = array();
            $pob_array[0]="Igualada";
            $pob_array[1]="Capellades";
            $pob_array[2]="Vilanova del Camí";
            $pob_array[3]="La Torre de Claramunt";
            $atrib2 = array('id' => 'input_pob', 'class' => 'form-control');
            $data["dropdown_pob"] = form_dropdown('input_pob',$pob_array,'1',$atrib2);

            $this->load->view('templates/header', $data);
            $this->load->view('pages/view_cerques');
            $this->load->view('templates/footer');

        } else {

            redirect('ContCerques/index');
        }
    }


    public function afegir_cerca(){

        $data=array();
        //agafar dades del formulari i guardar,, en total 9 camps per guardar

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

        $res = $this->CercaModel->afegir_cerca_bd($data);

    }



}

