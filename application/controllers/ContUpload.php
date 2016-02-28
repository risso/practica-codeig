<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContUpload extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function do_upload()
    {

        $path = './application/avatars/' . $this->session->userdata("mail") . "/";
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('templates/header2', $error);
            $this->load->view('pages/editarPerfil');
            $this->load->view('templates/footer');

        } else {
            $data = array('upload_data' => $this->upload->data());
            $file_info = $this->upload->data();
            $src_img = $file_info['file_name'];

            $res1 = $this->LoginRegistreModel->canviar_imatge_perfil($src_img);
            $res2 = $this->SessioModel->canviar_avatar_sessio($src_img);

            $data["canvis_perfil_correcte"]=true;
            $this->load->view('templates/header2', $data);
            $this->load->view('pages/editarPerfil');
            $this->load->view('templates/footer');
        }
	
	}

}

