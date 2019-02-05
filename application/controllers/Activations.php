<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activations extends CI_Controller {

	public function index()
	{
		$this->load->view('_header');
		$this->load->view('_toolbar');
		$this->load->view('activations');
		$this->load->view('_footer');
	}

}
