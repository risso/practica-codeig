<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContIndex extends CI_Controller {

	public function index()
    {
        //$this->load->helper("url"); // --> no cal pq em posat al fitxer autoload.php q es carregui automaticament
        $this->load->helper("form");
		$this->load->library('form_validation');	
        //$this->load->model("EmpleatModel");		
        //$this->load->model("DepartamentModel");
		$data = array();

		$data['index_si']=true;
        $this->load->view('templates/header',$data);
		$this->load->view('pages/index');
		$this->load->view('templates/footer');
    }
}

