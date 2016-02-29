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

    public function index()
    {
        //comprovar si esta en sessio si no no deixar anar, guardar pagina anterior i anar a login
        if ($this->usuariEnSessio()) {
            $data = array();

            //agafar dades bd per mostrar totes les cerques de l'usuari loginat
            $data['cerques'] = $this->obternir_cerques_x_usuari();

            /*foreach ($data['cerques2'] as $pos_array) {
                foreach ($pos_array as $key => $val) {
                    echo $key . " = " . $val . "<br/>";
                }

            }*/

            $this->load->view('templates/header2', $data);
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


    // public function mostrar_form($mostrar_form)
    public function mostrar_form()
    {
        if ($this->usuariEnSessio()) {
            $data = array();
            //$data["mostrar_form"] = $mostrar_form; //$mostrar_form si existeix te valor true per mostrar el formulari,, es pot veure al enlla de view_cerques
            $data["mostrar_form"] = true;

            //si ha enviat el formulari però no ha validar, tornarà aqui amb dades get avisant.
            $error = $this->input->get('error');

            if ($error != null) {
                $data['form_incomplert'] = true;
            }

            //comprovar si vé del boto "Mostrar Poblacions" i mostra les poblacions segons provincia seleccionada

            $prov_seleccionada = $this->input->get('prov');

            if ($prov_seleccionada != null) {
                $prov_selec = $prov_seleccionada;
            } else {
                $prov_selec = 1;
            }

            // omplir el desplegables de provincia

            $provincies = $this->obtenir_Provincies();

            $atrib = array('id' => 'input_prov', 'class' => 'form-control', 'onchange' => 'obtenir_codi_prov()');
            $data["dropdown_prov"] = form_dropdown('input_prov', $provincies, $prov_selec, $atrib);


            //omplir desplegable de Poblacions

            $poblacions = $this->obtenir_PoblacionsSegonsProvincia($prov_selec);

            $atrib2 = array('id' => 'input_pob', 'class' => 'form-control');
            $data["dropdown_pob"] = form_dropdown('input_pob', $poblacions, '1', $atrib2);

            $data['cerques'] = $this->obternir_cerques_x_usuari();

            $this->load->view('templates/header2', $data);
            $this->load->view('pages/view_cerques');
            $this->load->view('templates/footer');


        }/* else {

            redirect('ContCerques/index');
        }*/
    }

    public function obtenir_Provincies()
    {

        $res_prov = $this->CercaModel->get_Provincies();

        //var_dump($res_prov);

        $provincies = array();

        foreach ($res_prov as $pos) {
            $provincia_id = null;//inicialitzem a null
            $provincia_nom = null;

            foreach ($pos as $key => $val) {
                //echo($key . " = " . $val . "<br/>");
                if ($key == 'id_provincia') {
                    $provincia_id = $val;
                } else {
                    $provincia_nom = $val;
                }
            }
            $provincies[$provincia_id] = $provincia_nom;
        }

        return $provincies;
    }

    public function obtenir_PoblacionsSegonsProvincia($prov)
    {

        $res_poblacions = $this->CercaModel->get_PoblacionsByProv($prov);

        //var_dump($res_prov);

        $poblacions = array();

        foreach ($res_poblacions as $pos) {
            $poblacio_id = null;//inicialitzem a null
            $poblacio_nom = null;

            foreach ($pos as $key => $val) {
                //echo($key . " = " . $val . "<br/>");
                if ($key == 'id_municipio') {
                    $poblacio_id = $val;
                } else {
                    $poblacio_nom = $val;
                }
            }
            $poblacions[$poblacio_id] = $poblacio_nom;
        }

        return $poblacions;

    }


    public function afegir_cerca()
    {

        if ($this->usuariEnSessio()) {

            $data = array();
            //agafar dades del formulari i guardar,, en total 13 camps per guardar
            $this->load->helper("form");
            $this->load->library('form_validation');

            $this->form_validation->set_rules('input_imm', 'Aqui No importa', 'trim|required');
            $this->form_validation->set_rules('input_prov', 'Aqui No importa', 'trim|required');
            $this->form_validation->set_rules('input_pob', 'Aqui No importa', 'trim|required');
            $this->form_validation->set_rules('input_oper', 'Aqui No importa', 'trim|required');
            $this->form_validation->set_rules('input_m2', 'Aqui No importa', 'trim|required');
            $this->form_validation->set_rules('input_num_espais', 'Aqui No importa', 'trim|required');
            $this->form_validation->set_rules('input_num_banys', 'Aqui No importa', 'trim|required');
            $this->form_validation->set_rules('input_m2_exterior', 'Aqui No importa', 'trim|required');
            $this->form_validation->set_rules('input_planta', 'Aqui No importa', 'trim|required');
            $this->form_validation->set_rules('input_radio_orientacio', 'Aqui No importa', 'trim|required');
            $this->form_validation->set_rules('input_conservacio', 'Aqui No importa', 'trim|required');
            $this->form_validation->set_rules('input_preu', 'Aqui No importa', 'trim|required');
            $this->form_validation->set_rules('input_accept_comentari', 'Aqui No importa', 'trim|required');

            //$imm = $this->input->post("input_imm");
            //echo "Valor de immoble: ".$imm ."<br/>";
            //exit;

            if ($this->form_validation->run() == FALSE) { // si algun camp es erroni torna al formulari (de registre), omplint els camps

                //error = 1 significa q no ha validat el formulari
                redirect('ContCerques/mostrar_form?error=1');

            } else {
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
                 * intentarà fer el insert a la bd.
                */

            }//fi control form valid


        } else {
            redirect('ContCerques/index');

        }

    }


}

