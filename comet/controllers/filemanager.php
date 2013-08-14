<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Filemanager extends Backend_Controller {

	private $uploadsFolder = './uploads/';

	public function index() 
	{
		$map = array();
		foreach(glob($this->uploadsFolder.'*.{jpg,png,bmp,jpeg}', GLOB_BRACE) as $filename)
		{
			$map[] = basename($filename);
		}

		$this->template
			->set_layout(null)
			->set('data', $map)
			->build('filemanager.twig');
	}

}