<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanager extends Backend_Controller {

	private $uploadsFolder = '/uploads/';

	public function index() 
	{
		$this->load->helper('form');

		$funcNum = (int)$_GET['CKEditorFuncNum'];

		$map = array();
		foreach(glob('.'.$this->uploadsFolder.'*.{jpg,png,bmp,jpeg}', GLOB_BRACE) as $filename)
		{
			$map[] = basename($filename);
		}

		$this->template
			->set_layout(null)
			->set('data', $map)
			->set('funcNum', htmlspecialchars($funcNum))
			->build('filemanager.twig');
	}

	public function uploadImage()
	{
		$this->load->library('upload');

		$funcNum = $this->input->post('funcNum', true);

		$config['upload_path']   = '.'.$this->uploadsFolder;
		$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		$config['max_size']      = '0';
		$config['max_width']     = '0';
		$config['max_height']    = '0';
		$this->upload->initialize($config);

		$msg = null;
		$fileData = null;
		$url = null;
		if($this->upload->do_upload('imagefile'))
		{
			$fileData = $this->upload->data();
		}
		else
		{
			$msg = $this->upload->display_errors('', '');
		}

		$url = base_url() . $this->uploadsFolder . $fileData['file_name'];

		echo "<script type='text/javascript'>window.opener.CKEDITOR.tools.callFunction($funcNum, '$url', '$msg'); window.close();</script>";
	}
}