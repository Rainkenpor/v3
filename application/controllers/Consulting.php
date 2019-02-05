<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulting extends CI_Controller {


	public function __construct() {
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent::__construct();
		$this->load->database();
	 }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->database();
		// $query = $this->db->query('SELECT * FROM consult_enca');

		// foreach ($query->result() as $row)
		// {
		// 		echo $row->email;
		// }

		// echo 'Total Results: ' . $query->num_rows();

		$this->load->view('_header');
		$this->load->view('_toolbar');
		$this->load->view('consulting');
		$this->load->view('_footer');
	}

	public function get_questions(){
		$arr = $this->db->query('select
										a.*,
										b.sub_id,
										b.sub,
										b.icon,
										b.icon_color,
										b.image,
										b.question_link,
										c.question question2,
										c.type_question type_question2,
										d.sub_id sub_id2,
										d.sub sub2,
										d.icon icon2,
										d.icon_color icon_color2,
										d.image image2
									from
										consult_question a
									left join consult_question_sub b on
										a.question_id = b.question_id
									left join consult_question c on
										b.question_link = c.question_id
									left join consult_question_sub d on
										c.question_id = d.question_id
									where a.show_question=1
									order by a.order_question');
							// ->get();

		$arr_ = array();
		$temp_question=0;
		$temp_question_sub=0;
		$temp_question_sub_question=0;
		$temp_question_sub_question_sub=0;

		foreach ($arr->result_array() as $key => $value) {
			if ($temp_question!=$value['question_id']){
				$arr_[]= array(
					'question_id'=>$value['question_id'],
					'question'=>$value['question'],
					'type_question'=>$value['type_question'],
					'value'=>'',
					'sub_options'=>array()
				);
				$temp_question_sub=0;
			}
			if ($temp_question_sub!=$value['sub_id']){
				$arr_[count($arr_)-1]['sub_options'][]= array(
					'sub_id'=>$value['sub_id'],
					'sub'=>$value['sub'],
					'icon'=>$value['icon'],
					'icon_color'=>$value['icon_color'],
					'image'=>$value['image'],
					'value'=>'',
					'sub_question'=>array()
				);
				$temp_question_sub_question=0;
			}
			if ($temp_question_sub_question!=$value['question_link'] && $value['question_link']!=''){
				$arr_[count($arr_)-1]['sub_options'][count($arr_[count($arr_)-1]['sub_options'])-1]['sub_question'][]= array(
					'question_id'=>$value['question_link'],
					'question'=>$value['question2'],
					'type_question'=>$value['type_question2'],
					'value'=>'',
					'sub_options'=>array()
				);
				$temp_question_sub_question_sub=0;
			}
			if ($temp_question_sub_question_sub!=$value['sub_id2'] && $value['sub_id2']!=null){
				$arr_[count($arr_)-1]
					['sub_options']
					[count($arr_[count($arr_)-1]['sub_options'])-1]
					['sub_question']
					[count($arr_[count($arr_)-1]['sub_options'][count($arr_[count($arr_)-1]['sub_options'])-1]['sub_question'])-1]
					['sub_options'][]= array(
					'sub_id'=>$value['sub_id2'],
					'sub'=>$value['sub2'],
					'icon'=>$value['icon2'],
					'icon_color'=>$value['icon_color2'],
					'image'=>$value['image'],
					'value'=>''
				);
			}

			$temp_question=$value['question_id'];
			$temp_question_sub=$value['sub_id'];
			$temp_question_sub_question=$value['question_link'];
			$temp_question_sub_question_sub=$value['sub_id2'];
		}
		echo json_encode($arr_);
	}

	public function save(){
		$id = 0;
		$arr = $this->input->post('data');

		$data = array(
			'enca_id'=>0
		);
		$this->db->insert('consult_enca',$data);
		$enca = $this->db->insert_id() ;

		$arr_ = array();
		foreach ($arr as $key => $value) {
			$arr_[$key]=array();
			$arr_[$key]['question_id']=$value['question_id'];
			$arr_[$key]['value']=$value['value'];
			$arr_[$key]['type_question']=$value['type_question'];

			$question_value =  '';
			$question_array = array();

			if (isset($value['sub_options'])){
				foreach ($value['sub_options'] as $key_sub => $value_sub) {
					if ($value_sub['sub_id']==$value['value']){
						// echo print_r($value_sub,true);
						// subquestion
						$question_value = (($question_value =='')?$value_sub['value']:$question_value);
						if (isset($value_sub['sub_question'])){
							if (!isset($value_sub['sub_question'][0]['sub_options'])){
								$question_value = (($question_value =='')?$value_sub['sub_question'][0]['value']:$question_value);
								}else{
								// redes sociales
								$question_array = array_filter($value_sub['sub_question'][0]['sub_options'],function($data){return $data['value']!='';});
							}
						}
					}
				}
				$arr_[$key]['text']=$question_value;
				$arr_[$key]['subs'] =$question_array;
			}


			// if ($value['id']!=''){
			// 	var_dump($value);
			// 	$data=array(
			// 		'enca_id'=>$enca,
			// 		'question_id'=>$value['id'],
			// 		'sub_id'=>((isset($value['options']))?$value['options'][0]['option_id']:null),
			// 		'value'=> ((isset($value['options'][0]['subquestions']))?(($value['options'][0]['subquestions']['type']=='text')?$value['options'][0]['subquestions']['value']:$value['text_value']) :$value['text_value'])
			// 	);
			// 	$this->db->insert('consult_detail',$data);
			// }
		}


			// guardando
			foreach ($arr_ as $key => $value) {
				$data=array(
					'enca_id'=>$enca,
					'question_id'=>$value['question_id'],
					'sub_id'=>$value['value'],
					'text'=>(($value['type_question']=='text')?$value['value'] : ((isset($value['text']))?$value['text']:''))
				);
				$this->db->insert('consult_detail',$data);
				$detail = $this->db->insert_id() ;

				if((isset($value['subs'])))
					foreach ($value['subs'] as $key => $value) {
						$data=array(
							'detail_id'=>$detail,
							'sub_id'=>$value['sub_id'],
							'text'=> $value['value']
						);
						echo print_r($data,true);
						$this->db->insert('consult_detail_sub',$data);
					}

			}

		// echo print_r($arr_,true);

		$arr = $this->db->query('select
									c.question,
									d.sub,
									b.text,
									f.sub option_question,
									e.text sub_text
								from
									consult_enca a
								inner join consult_detail b on
									a.enca_id = b.enca_id
								inner join consult_question c on
									b.question_id= c.question_id
								left join consult_question_sub d on
									b.sub_id = d.sub_id
								left join consult_detail_sub e on
									b.detail_id = e.detail_id
								left join consult_question_sub f on
									e.sub_id=f.sub_id
								where
								a.enca_id='.$enca);


		$txt='';
		foreach ($arr->result_array() as $key => $value) {
			$txt.='Pregunta: '.$value['question'].'<br>';
			$txt.='Seleccion: '.$value['sub'].'<br>';
			if ($value['text']!='') $txt.='Texto: '.$value['text'].'<br>';
			if ($value['option_question']!='') {
				$txt.='- Opciones: '.$value['option_question'].'<br>';
				$txt.='- Texto: '.$value['sub_text'].'<br>';
			}
			$txt.='<hr>';
		}

		$this->load->library('email');

		// $config['protocol'] = 'sendmail';
		// $config['mailpath'] = '/usr/sbin/sendmail';
		// $config['charset'] = 'iso-8859-1';
		// $config['wordwrap'] = TRUE;

		// $this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->from('diegoedeleon@digitalage.es', 'Digital Age');
		$this->email->to('diegodeleon@abiguate.com');
		$this->email->cc('cjmorales@abiguate.com');
		// $this->email->bcc('them@their-example.com');

		$this->email->subject('Email Test');
		$this->email->message($txt);

		$this->email->send();



		// foreach ($arr[6]['options'] as $key => $value) {
		// 	var_dump($value);
		// }

      echo 'Added successfully.';
	}
}
