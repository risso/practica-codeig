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
        <br/><p>Per activar el seu compte fes click en el seguent enllaç <a href="http://localhost/practica-codeig/index.php/contRegistre/compte_activat?mail=' . $mail . '&codi=' . $codi . '">Activar Compte InfoImmobles.com</a></p>
        ');
        $this->email->send();
        //con esto podemos ver el resultado
        // var_dump($this->email->print_debugger());


    }

    //FUNCIO PER ENVIAR EMAIL A LES CERQUES QUE COINCIDEIXEN AMB EL FILTRES DE NOTIFICACIONS

    public function enviar_email_notificacio($mail, $data)
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
        $this->email->subject('Laura Pérez: Notificacio InfoImmobles.com');
        $this->email->message('<h2>Nova Notificacio de Cerca:</h2><hr><br>
        <br/>
        <h3>Li informem que s\'han trobat noves notificacions pels seus filtres:</h3>
        <p>Referència Cerca:'.$data[13].'</p>
        <p>Tipus Immoble: '.$data[1].'</p>
        <p>Provincia: '.$data[2].'</p>
        <p>Poblacio: '.$data[3].'</p>
        <p>Opereacio: '.$data[4].'</p>
        <p>Metres Quadrats: '.$data[5].'</p>
        <p>Numero d\'Espais: '.$data[6].'</p>
        <p>Numero de Banys: '.$data[7].'</p>
        <p>Planta '.$data[9].'</p>
        <p>Orientacio: '.$data[10].'</p>
        <p>Conservacio: '.$data[11].'</p>
        <p>Preu: '.$data[12].'</p>
        <a href="http://localhost/practica-codeig/index.php/contNotificacions/">Visualitzar Notificacions</a></p>
        ');
        $this->email->send();
        //con esto podemos ver el resultado
        // var_dump($this->email->print_debugger());


    }


}

  
  