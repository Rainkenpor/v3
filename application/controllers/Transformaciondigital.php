<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transformaciondigital extends CI_Controller {

	public function index()
	{
		$this->load->view('_header');
		$this->load->view('_toolbar');
		$this->load->view('transformacion_digital');
		$this->load->view('_events-footer');
	}

}
