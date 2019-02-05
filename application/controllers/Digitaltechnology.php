<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Digitaltechnology extends CI_Controller {

	public function index()
	{
		$this->load->view('_header');
		$this->load->view('_toolbar');
		$this->load->view('digital_technology');
		$this->load->view('_footer');
	}

}
