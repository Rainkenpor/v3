<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appvoicesurvey extends CI_Controller {

	public function __construct() {
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent::__construct();
		$this->load->database();
	 }


	public function index()
	{
		$this->load->view('_header');
		$this->load->view('_toolbar');
		$this->load->view('voicesurvey/index');
		$this->load->view('_footer');

	}

	public function get_questions($alias){
		$arr = $this->db->query("select
									a.*,
									b.question_id,
									b.question,
									b.question_type_id,
									c.sub_question_id,
									c.sub_question
								from
									app_voicesurvey_enterprise a
								inner join app_voicesurvey_question b on
									a.enterprise_id = b.enterprise_id
								left join app_voicesurvey_question_sub c on
									b.question_id = c.question_id
								where
								a.alias = '$alias'
								order by b.order_question");
							// ->get();

		$arr_ = array();
		$temp_enterprise = 0;
		$temp_question = 0;

		foreach ($arr->result_array() as $key => $value) {
			if ($temp_enterprise!= $value['enterprise_id']){
				$arr_[]=array(
					'enterprise_id'=>$value['enterprise_id'],
					'enterprise_name'=>$value['name'],
					'enterprise_logo'=>$value['logo'],
					'enterprise_description'=>$value['description'],
					'questions'=>array()
				);
			}
			if ($temp_question!= $value['question_id']){
				$arr_[count($arr_)-1]['questions'][]=array(
					'question_id'=>$value['question_id'],
					'question'=>$value['question'],
					'question_type_id'=>$value['question_type_id'],
					'subquestions'=>array()
				);
			}
			if ($value['sub_question_id']>0){
				$arr_[count($arr_)-1]['questions'][count($arr_[count($arr_)-1]['questions'])-1]['subquestions'][]=array(
					'sub_question_id'=>$value['sub_question_id'],
					'sub_question'=>$value['sub_question'],
				);
			}

			$temp_enterprise= $value['enterprise_id'];
			$temp_question= $value['question_id'];
		}

		// $this->load->view('_header');
		// $this->load->view('_toolbar');
		$this->load->view('voicesurvey/index',array('list'=>json_encode($arr_)));
		$this->load->view('_footer');
	}

	public function save(){
		if (isset($_FILES['audio_data'])){
			$configUpload['file_name']='abc.wav';
			$configUpload['upload_path']    = './source/_apps/voicesurvey/voices/';                 #the folder placed in the root of project
			$configUpload['allowed_types']  = '*';       #allowed types description
			$configUpload['max_size']       = '0';                          #max size
			$configUpload['max_width']      = '0';                          #max width
			$configUpload['max_height']     = '0';                          #max height
			$configUpload['encrypt_name']   = true;                         #encrypt name of the uploaded file
			$this->load->library('upload', $configUpload);                  #init the upload class
			if(!$this->upload->do_upload('audio_data')){
				$uploadedDetails    = $this->upload->display_errors();
			}else{
				$uploadedDetails    = $this->upload->data();
			}
			echo json_encode(array('file'=>$uploadedDetails['file_name']));
		}else{
			$arr = $this->input->post();

			$this->db->insert('app_voicesurvey_response_enca',array(
				'enterprise_id'=>$arr['enterprise']['enterprise_id']
			));
			$response_id = $this->db->insert_id();


			foreach ($arr['data'] as $key => $value) {
				$this->db->insert('app_voicesurvey_response_detail',array(
					'response_id'=>$response_id,
					'question_id'=>$value['question_id'],
					'value'=>$value['value'],
				));
			}

			//
			// if (count($arr_tags)>0){
			// foreach ($arr_tags as $key => $value) {
			// 	$this->db->insert('blog_tag',array('blog_id' => $blog_id , 'tag'=>$value ));

			echo json_encode(array('status'=>true));
		}


		//move the file from temp name to local folder using $output name
		// move_uploaded_file($input, $output);

	}
}
