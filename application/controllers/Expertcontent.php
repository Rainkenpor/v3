<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expertcontent extends CI_Controller {

	public function index()
	{
		$this->load->view('_header');
		$this->load->view('_toolbar');
		$this->load->view('expert_content');
		$this->load->view('_footer');
	}

}
