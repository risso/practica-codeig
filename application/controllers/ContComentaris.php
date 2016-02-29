<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContComentaris extends CI_Controller
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

            /*foreach ($data['cerques2'] as $pos_array) {
                foreach ($pos_array as $key => $val) {
                    echo $key . " = " . $val . "<br/>";
                }

            }*/
            //si no a omplert totes les dades del formulari tornarà aqui amb get error = 1
            $error = $this->input->get('error');

            if ($error != null) {
                $data['form_incomplert'] = true;
            }


            //agafar referencia cerca per get i si no existeix es que no ve del boto comentari i no hauria de dexar entrar aqui, però no es controla això

            $ref = $this->input->get('ref');

            if ($ref == null) {
                //echo "Referencia es NULL ";
                //significa que no ve per primera vegada i la ref ja està guardada en sessió
                $data['referencia'] =  $this->session->userdata('ref_cerca');

            } else {
                //arriba aqui per primera vegada
               // echo "Referencia: " . $ref;
                $this->session->set_userdata('ref_cerca', $ref);
                $data['referencia'] =  $this->session->userdata('ref_cerca');
            }



            $this->load->view('templates/header2', $data);
            $this->load->view('pages/view_comentaris');
            $this->load->view('templates/footer');

        } else {
            $this->session->set_userdata('ultima_pagina', 'ContComentaris/index');

            //echo $this->session->userdata('ultima_pagina');
            redirect('contIndex/index');
        }
    }



    public function afegir_comentari()
    {

        if ($this->usuariEnSessio()) {

            $data = array();
            //agafar dades del formulari i guardar,, en total 13 camps per guardar
            $this->load->helper("form");
            $this->load->library('form_validation');

            $this->form_validation->set_rules('input_comment', 'Aqui No importa', 'trim|required');

           /* $ref = $this->input->post("inputRef");
            $text = $this->input->post("input_comment");
            echo "Valor de Referencia: ".$ref ."<br/>";
            echo "Valor de Comentari: ".$text ."<br/>";

            $input_preu = $this->input->post("input_preu");
            echo "Valor de Preu: ".$input_preu ."<br/>";*/

            $text = $this->input->post("input_comment");
            echo "Valor de Comentari: ".$text ."<br/>";


            if ($this->form_validation->run() == FALSE) { // si algun camp es erroni torna al formulari (de registre), omplint els camps

                //error = 1 significa q no ha validat el formulari
                redirect('ContComentaris/index?error=1');

            } else {

                $data['ref_cerca'] = $this->session->userdata('ref_cerca');
                $data['user_not'] = $this->session->userdata('mail');
                $data['text'] = $text;

               /* echo "Valor de text:". $text."<br/>";
                echo "Valor de data text:". $data['text']."<br/>";
                //exit;*/

                $this->ComentarisModel->afegir_comentari_bd($data);

                //exit;
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
            redirect('ContComentaris/index');

        }

    }


}

