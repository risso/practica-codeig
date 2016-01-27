<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class emailModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function enviar_email_valid_reg($mail, $codi)
    {
        //cargamos la libreria email de ci
        $this->load->library("email");

        //configuracion para gmail
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'w2.lperez@infomila.info',
            'smtp_pass' => 'Security1974',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );

        //cargamos la configuración para enviar con gmail
        $this->email->initialize($configGmail);

        $this->email->from('w2.lperez@infomila.info');
        $this->email->to($mail);
        $this->email->subject('Benvingt/a a InfoImmobles.com');
        $this->email->message('<h2>Email per activar compte a InfoImmobles.com</h2><hr><br>
        <br/><p>Per activar el seu compte fes click en el seguent enllaç <a href="http://localhost/practica-codeig/index.php/contRegistre/compte_activat?mail='.$mail.'&codi=' . $codi . '">Activar Compte InfoImmobles.com</a></p>
        ');
        $this->email->send();
        //con esto podemos ver el resultado
        // var_dump($this->email->print_debugger());


    }


}

  
  