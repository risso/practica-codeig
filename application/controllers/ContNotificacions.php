<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContNotificacions extends CI_Controller
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
            $data['notificacions'] = $this->obternir_notificacions_x_usuari();

            /*foreach ($data['cerques2'] as $pos_array) {
                foreach ($pos_array as $key => $val) {
                    echo $key . " = " . $val . "<br/>";
                }

            }*/
            //agafar totes les coincidencies de l'usuari per mostrar-les
            $data['coincidencies'] = $this->CoincidenciesModel->getCoincidenciesByUser($this->session->userdata('mail'));


            $this->load->view('templates/header2', $data);
            $this->load->view('pages/view_notificacions');
            $this->load->view('templates/footer');

        } else {
            $this->session->set_userdata('ultima_pagina', 'ContNotificacions/index');

            //echo $this->session->userdata('ultima_pagina');
            redirect('contIndex/index');
        }
    }

    public function obternir_notificacions_x_usuari()
    {
        return $this->NotificacionsModel->getNotificacions($this->session->userdata('mail'));
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

            $atrib = array('id' => 'input_prov', 'class' => 'form-control', 'onchange' => 'obtenir_codi_prov2()');
            $data["dropdown_prov"] = form_dropdown('input_prov', $provincies, $prov_selec, $atrib);


            //omplir desplegable de Poblacions

            $poblacions = $this->obtenir_PoblacionsSegonsProvincia($prov_selec);

            $atrib2 = array('id' => 'input_pob', 'class' => 'form-control');
            $data["dropdown_pob"] = form_dropdown('input_pob', $poblacions, '1', $atrib2);

            $data['notificacions'] = $this->obternir_notificacions_x_usuari();

            $this->load->view('templates/header2', $data);
            $this->load->view('pages/view_notificacions');
            $this->load->view('templates/footer');


        }/* else {

            redirect('ContCerques/index');
        }*/
    }

    public function obtenir_Provincies()
    {

        $res_prov = $this->NotificacionsModel->get_Provincies();

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

        $res_poblacions = $this->NotificacionsModel->get_PoblacionsByProv($prov);

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


    public function afegir_notificacio()
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


            if ($this->form_validation->run() == FALSE) { // si algun camp es erroni torna al formulari (de registre), omplint els camps

                //error = 1 significa q no ha validat el formulari
                redirect('ContNotificacions/mostrar_form?error=1');

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

                //retorna el ultim id (ref_notificacio) acabat de introduir
                $ref_noti = $this->NotificacionsModel->afegir_notificacio_bd($data);

                //obtener el utimo id (referencia de notificacion) insertada para guardar-la en coincidencias en el caso q haiga

                /*if($ref_noti==false){
                    echo "Id Notificacion es NULL " . $ref_noti . "<br/>";

                }else {
                    echo "Id Referencia Ultima Noti: " . $ref_noti . "<br/>";
                }*/


                $this->buscar_coincidencies($ref_noti,$data);

                redirect('ContNotificacions/index');

                /*
                 * els dos redirects semblen redundatns, perque tant com si entre en la primera
                 * condicio com si entra en la segona va al mateix lloc (ContCerques/index), però no és així,
                 * la diferencia es q si no està logina no entrarà al primer if i no intentarà fer el insert,
                 * si no posem la condicio si un usu no loginat intenta accedir a ContCerques/afegir_cerca
                 * intentarà fer el insert a la bd.
                */

            }//fi control form valid


        } else {
            redirect('ContNotificacions/index');

        }

    }


    public function buscar_coincidencies($ref_noti,$data)
    {

        /*var_dump($data);
        echo "<br/>";
        echo "<br/>";*/


        //obtenir totes les cerques de tots els usuaris i fer un bucle
        $TotesLesCerques = $this->CercaModel->getTotesLesCerques();

        //m2_exterior no compta

        foreach ($TotesLesCerques as $array_pos) {
            //per cada registre de cerca
            $punts = 0;
            foreach ($array_pos as $key => $val) {
                echo($key . " = " . $val . "<br/>");
                switch($key){
                    case 'type_im';
                        if($val == $data[1]) $punts++;
                        break;
                    case 'provincia';
                        if($val == $data[2]) $punts++;
                        break;
                    case 'poblacio';
                        if($val == $data[3]) $punts++;
                        break;
                    case 'operacio';
                        if($val == $data[4]) $punts++;
                        break;
                    case 'm2';
                    if($val == $data[5]) $punts++;
                    break;
                    case 'num_espais';
                        if($val == $data[6]) $punts++;
                        break;
                    case 'num_banys';
                        if($val == $data[7]) $punts++;
                        break;
                    case 'planta';
                        if($val == $data[9]) $punts++;
                        break;
                    case 'orientacio';
                        if($val == $data[10]) $punts++;
                        break;
                    case 'estat_conservacio';
                        if($val == $data[11]) $punts++;
                        break;
                    case 'preu';
                        if($val == $data[12]) $punts++;
                        break;
                    case 'ref';
                        $data[13] = $val;
                        break;
                    case 'id_user';
                        $data[14] = $val; //usuari de la cerca q coincideix
                        break;
                    case 'accepta_com';
                        $data[15] = $val; //usuari de la cerca q coincideix
                        break;
                }

            }
            //echo "Punts: ". $punts."<br/>";
            //en total hi poden haver 11 punts
            if($punts=7){
                //indica totes les coincidencies i enviar email
                $this->EmailModel->enviar_email_notificacio($data[0],$data);
                //guardar a la bd;
                $camps_guardar = array();
                $camps_guardar['ref_cerca'] = $data[13];
                $camps_guardar['ref_noti'] = $ref_noti;
                $camps_guardar['user_cerca'] = $data[14];
                $camps_guardar['user_noti'] = $data[0];
                $camps_guardar["type_im"] = $data[1];
                $camps_guardar["provincia"] = $data[2];
                $camps_guardar["poblacio"] = $data[3];
                $camps_guardar["operacio"] = $data[4];
                $camps_guardar["m2"] = $data[5];
                $camps_guardar["accepta_comentari"] = $data[15];

                $this->CoincidenciesModel->afegir_coincidencia_bd($camps_guardar);

            }
        }


    }


}

