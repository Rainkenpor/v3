<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transformaciondigital extends CI_Controller {

	public function index(){
		$this->load->view('_header');
		$this->load->view('_toolbar');
		$this->load->view('transformacion_digital');
		$this->load->view('_events-footer');
	}

	public function send_mail(){
		$name = $this->input->post('name');
		$company = $this->input->post('company');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		//Load email library
        $this->load->library('email');
        $this->email->from('admin@digitalage.es', 'Conferencia de Transformación Digital');
        $this->email->to($email);
        $this->email->subject('Gracias por inscribirte a la conferencia de Transformación Digital');
				$data = array(
					'name'=> $name,
					'company'=> $company,
					'email'=> $email,
					'phone'=> $phone
				);
				$body = $this->load->view('email/template',$data,TRUE);
				$this->email->message($body);
        /*$this->email->message(
					'Nombre: '.$name.'<br>'.'Empresa: '.$company.'<br>'.'Email: '.$email.'<br>'.'Teléfono: '.$phone
				);*/
        //Send mail
        if($this->email->send()){
					$this->load->view('_header');
					$this->load->view('_toolbar');
					$this->load->view('email/success-message');
					$this->load->view('_events-footer');
				}
        else{
					$this->load->view('_header');
					$this->load->view('_toolbar');
					$this->load->view('email/unsuccess-message');
					$this->load->view('_events-footer');
				}

	}

}
