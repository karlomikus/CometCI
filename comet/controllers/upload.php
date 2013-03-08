<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function do_upload() {
	
		$upload_path_url = './uploads/';
		$config['upload_path'] = $upload_path_url;
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = '1024';
		
	  	$this->load->library('upload', $config);

	  	if ( ! $this->upload->do_upload()) {
	  		$error = array('error' => $this->upload->display_errors());
	  		$this->load->view('upload', $error);
	  	}
	  	else {
			$data = $this->upload->data();	

			$info->name = $data['file_name'];
			$info->size = $data['file_size'];
			$info->type = $data['file_type'];
			$info->url = $upload_path_url .$data['file_name'];
			$info->thumbnail_url = base_url().'uploads/'.$data['file_name'];
			$info->delete_url = base_url().'upload/deleteImage/'.$data['file_name'];
			$info->delete_type = 'DELETE';

			$arrayed = array($info);
			$info2->files = $arrayed;

			if ($this->input->is_ajax_request()) {
				echo json_encode($info2);
			}
			else {
				$file_data['upload_data'] = $this->upload->data();
				$this->load->view('upload_success', $file_data);
			}
	 	}
	}
	

	public function deleteImage($file) {
		$success = unlink(FCPATH.'uploads/' .$file);
		$info->sucess = $success;
		$info->path = base_url().'uploads/' .$file;
		$info->file = is_file(FCPATH.'uploads/' .$file);

		if ($this->input->is_ajax_request()) {
			echo json_encode(array($info));}
		else {
			$file_data['delete_data'] = $file;
			$this->load->view('delete_success', $file_data); 
		}
	}
}