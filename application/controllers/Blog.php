<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {


	public function __construct() {
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent::__construct();
		$this->load->database();
	 }

	public function index($alias)
	{
		$this->load->view('_header');
		$this->load->view('_toolbar');
		$data = $this->db->query("select
									a.*
								from
									blog a
								where
									alias='$alias'");
		$this->load->view('blog',$data->result_array()[0]);
		$this->load->view('_footer');
	}


	public function get(){
		$arr = $this->db->query('select
									a.*
								from
									blog a
								where
									(now()>start_date
									and now() < end_date )
									and active=1
								order by
									is_priority desc,
									start_date');
		$arr = $arr->result_array();
		foreach ($arr as $key => $value) {
			$tags = $this->db->query("select
										a.*
									from
										blog_tag a
									where
										blog_id=".$value['blog_id']);
			$arr[$key]['tags'] =$tags->result_array();
		}

		echo json_encode($arr);
	}

	public function get_all(){
		$arr = $this->db->query('select
									a.*
								from
									blog a
								where
									active=1
								order by
									is_priority desc,
									start_date');

		$arr = $arr->result_array();
		foreach ($arr as $key => $value) {
			$tags = $this->db->query("select
										a.*
									from
										blog_tag a
									where
										blog_id=".$value['blog_id']);
			$arr[$key]['tags'] =$tags->result_array();
		}

		echo json_encode($arr);
	}

	public function save(){
		$arr = $this->input->post();
		$arr_tags = explode(',',$arr['tags']);


		// var_dump($arr);
		// $data = array(
		// 	'enca_id'=>0
		// );
		$date1 = explode(' ',$arr['start_date']);
		$date1_ = explode('/',$date1[0]);
		$date1 = $date1_[2].'/'. $date1_[1].'/'. $date1_[0].' '.$date1[1];

		$date2 = explode(' ',$arr['end_date']);
		$date2_ = explode('/',$date2[0]);
		$date2 = $date2_[2].'/'. $date2_[1].'/'. $date2_[0].' '.$date2[1];

		$arr['start_date']=$date1;
		$arr['end_date']=$date2;

		// echo print_r($_POST,true);
		if (!isset($_POST['uploadimage'])){
			// cover
			$configUpload['upload_path']    = './source/images/blog/';                 #the folder placed in the root of project
		    $configUpload['allowed_types']  = 'gif|jpg|png|bmp|jpeg';       #allowed types description
		    $configUpload['max_size']       = '0';                          #max size
		    $configUpload['max_width']      = '0';                          #max width
		    $configUpload['max_height']     = '0';                          #max height
		    $configUpload['encrypt_name']   = true;                         #encrypt name of the uploaded file
		    $this->load->library('upload', $configUpload);                  #init the upload class
		    if(!$this->upload->do_upload('uploadimage')){
		        $uploadedDetails    = $this->upload->display_errors();
		    }else{
		        $uploadedDetails    = $this->upload->data();
		    }
		    // echo print_r($uploadedDetails,true);

			$config['image_library'] = 'gd2';
			$config['source_image'] = './source/images/blog/'.$uploadedDetails['file_name'];
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = FALSE;
			$config['thumb_marker'] = '_1000';
			$config['width']         = 1000;
			$config['height']       = 1000;

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$arr['cover']=$uploadedDetails['raw_name'];
		}

		unset($arr['uploadimage']);
		unset($arr['tags']);

		// echo print_r($arr,true);
		if (isset($_POST['blog_id'])){
			$this->db->where('blog_id', $arr['blog_id']);
			$this->db->update('blog', $arr);
			$blog_id =$arr['blog_id'];
		}else{
			$this->db->insert('blog',$arr);
			$blog_id = $this->db->insert_id();
		}

		$this->db->delete('blog_tag',array('blog_id'=> $blog_id));
		if (count($arr_tags)>0){
			foreach ($arr_tags as $key => $value) {
				$this->db->insert('blog_tag',array('blog_id' => $blog_id , 'tag'=>$value ));
			}
		}


		echo json_encode(Array('status'=>true));
	}

	public function delete(){
		$arr = $this->input->post();
		$this->db->where('blog_id', $arr['blog_id']);
		$arr= Array('active' => 0);
		$this->db->update('blog', $arr);
		echo json_encode(Array('status'=>true));
	}

}
