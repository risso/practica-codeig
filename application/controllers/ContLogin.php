<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContLogin extends CI_Controller {
	

	public function index()
	{
		$data = array();
		$this->load->view('templates/header',$data);
		$this->load->view('pages/vista_login');
		$this->load->view('templates/footer');
		
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


	
	public function loginUsuari(){
		
		 $this->load->library('session');
		$this->load->helper("form");
		$this->load->library('form_validation');		
		$this->load->model("LoginRegistreModel");		

		//$data = array();
		$data['mail'] = $this->input->post("inputEmail");
		$data['pas'] = $this->input->post ("inputPassword");
		

		$usuari = $this->LoginRegistreModel->login ($data['mail'], $data['pas']);	
		

		if ($usuari == null) {
				$data['errores'] = 2; // = 2 per indicar error al fer login				
				$this->load->view('templates/header',$data);
				$this->load->view('pages/vista_login');
				$this->load->view('templates/footer');
			
	   } else {
			/*
			foreach($usuari as $key => $value){				
				echo($key . " = " . $value."<br/>");
			}*/
			//echo($usuari['mail']);
			
			$newusuari_en_sesio = array(
                   'mail_usu' => $usuari['mail'],
                   'nick_usu' => $usuari['nick'],
                   'avatar_usu' => $usuari['avatar'],
				   'rol_usu' => $usuari['rol'] 
               );

			$this->session->set_userdata($newusuari_en_sesio);
			
			
		   
			
			//Mostrar tota informacio guardada en la sessio
			
			foreach($this->session->all_userdata() as $key => $value){				
				echo($key . " = " . $value."<br/>");
			}
			
			
			$pagina = $this->session->userdata ('ultima_pagina');
			/*
		   if ($pagina == "") {
			   $this->index();
		   } else {
				redirect ($pagina);
		   }
			*/
			
		}
	

		
	}
}

