<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContComentarisCerques extends CI_Controller
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



            $ref = $this->input->get('ref');



            if ($ref == null) {
                //echo "Referencia es NULL ";
                //$data['referencia'] =  $this->session->userdata('ref_cerca');

            } else {
                //echo "Referencia: " . $ref;
                $data['comentaris'] = $this->ComentarisCerquesModel->getComentarisByRef($ref);
            }

            $this->load->view('templates/header2', $data);
            $this->load->view('pages/view_comentaris_cerques');
            $this->load->view('templates/footer');

        } else {
            $this->session->set_userdata('ultima_pagina', 'ContComentarisCerques/index');

            //echo $this->session->userdata('ultima_pagina');
            redirect('contIndex/index');
        }
    }



}

