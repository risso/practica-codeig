<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContRegistre extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    /**
     *
     */
    public function index()
    {
        $this->load->helper("form");
        $this->load->library('form_validation');
        $this->load->model("LoginRegistreModel");
        $this->load->model("EmailModel");

        $data = array();

        // Displaying Errors In Div
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('inputEmail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('inputNick', 'Username', 'trim|required|min_length[5]|max_length[12]'); // si posava |xxs_clean no donava valid mai
        $this->form_validation->set_rules('inputPassword', 'Password', 'trim|required|matches[inputPasswordConfirm]');
        $this->form_validation->set_rules('inputPasswordConfirm', 'Password Confirmation', 'trim|required');


        if ($this->form_validation->run() == FALSE) { // si algun camp es erroni torna al formulari (de registre), omplint els camps
            $data['actiu'] = 2;
            $this->load->view('templates/header', $data);
            $this->load->view('pages/index');
            $this->load->view('templates/footer');
        } else {        //agafar totes les dades del formulari
            $data[0] = $this->input->post("inputEmail");
            $data[1] = $this->input->post("inputNick");
            $data[2] = $this->input->post("inputPassword");

            //$usu_existeix es un boolean, true existeix, false no
            $usu_existeix = $this->LoginRegistreModel->existeix($data[0]);

            if ($usu_existeix == true) {
                // indica q usuari ja existeix a la bd , tornar al formulari de registre i avisar de l'errror
                $data['errores'] = 1; // = 1 per avisar q l'usuari ja existeix
                $this->load->view('templates/header', $data);
                $this->load->view('pages/index');
                $this->load->view('templates/footer');

            } else {
                //usuari no existeix a la bd, guardar usuari.
                //crear carpeta usuari dins de avatars,
                $this->load->helper('path');
                //para dentro de application //set_realpath('./application/uploads/peliculas/'.$idp."/");
                $dir = set_realpath('./application/avatars/' . $data[0] . "/");

                if (!is_dir($dir)) {
                    mkdir($dir, 777);
                }

                //generar aleatori, q sera el codi d'activacio
                $data[3] = rand(1000, 9999);

                $this->LoginRegistreModel->fer_registre($data);

                //enviar email
                $this->EmailModel->enviar_email_valid_reg($data[0], $data[3]);

                //tornar al form indicant q s'ha registrat correctament i per entrar a de validar per email
                $data['reg_correcte'] = true;//variable per mostrar missatge de registre correcte i avisar q ha de validar
                $this->load->view('templates/header', $data);
                $this->load->view('pages/index');
                $this->load->view('templates/footer');
            }

        }
    }

    public function compte_activat()
    {
        //No cal pq esta definit al autoload.php
        //$this->load->model("LoginRegistreModel");

        $mail = $this->input->get('mail');
        $codi = $this->input->get('codi');
        /*echo($mail);
        echo("<br/>");
        echo($codi);*/

        $data = array();

        $res = $this->LoginRegistreModel->fer_activacio($mail, $codi);

        if ($res == true) {
            //activacio correcte
            $data['activacio_correcte'] = true;//variable per mostrar missatge de validacio correcte
            $this->load->view('templates/header', $data);
            $this->load->view('pages/index');
            $this->load->view('templates/footer');

        }
    }

    //per provar lo del email
    public function enviar_emailami()
    {
        $this->load->model("EmailModel");
        $this->EmailModel->enviar_email_valid_reg('laura5.7@hotmail.com', '4554');
    }

    public function loginarse()
    {
        $data = array();

        $data[0] = $this->input->post("inputEmail");
        $data[1] = $this->input->post("inputPassword");

        //echo "Valor de email:".$data[0];
        //echo " Valor de passwd:".$data[1];

        $data["usuari"] = $this->LoginRegistreModel->fer_login($data);

        if ($data["usuari"] != null) {
            // login correcte, carregar dades en sessió i anar a area personal o a la ultima pag visitada si existeix
            $this->SessioModel->carregar_sessio($data["usuari"]);

            if ($this->session->has_userdata('ultima_pagina')) {

                redirect($this->session->userdata('ultima_pagina'));

            } else {
                $this->load->view('templates/header2', $data);
                $this->load->view('pages/view_cerques');
                $this->load->view('templates/footer');
            }
        } else {
            //tornar al index avisant q les dades són Incorrectes
            $data["login_incorrecte"] = true;
            $this->load->view('templates/header', $data);
            $this->load->view('pages/index');
            $this->load->view('templates/footer');
        }
    }

    public
    function eliminar_sessio()
    {

        $this->SessioModel->suprimir_sessio();
        redirect('ContIndex/index');
    }


}

