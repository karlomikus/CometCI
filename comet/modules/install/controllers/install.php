<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends MX_Controller {

	private $installDir = '_install';

	public function __construct()
	{
		parent::__construct();

		$this->template
			->set_layout('installer');
	}

	public function index()
	{
		$this->template
			->build('step1');
	}

	public function step2()
	{
		$data = new stdClass();

		$databaseFile = './'.$this->installDir.'/database.php.inc';
		$uploadsDirectory = './uploads';

		$data->phpVersion = phpVersion();
		$data->sqlInstalled = 'Missing!';
		$data->gdInstalled = 'Missing!';

		$data->dirUploads = 'Unwritable!';
		$data->dbFile = 'Unwritable!';

		$data->settingChmod = '';

		if(function_exists('mysql_connect'))
		{
			$data->sqlInstalled = 'Installed!';
		}

		if (extension_loaded('gd') && function_exists('gd_info'))
		{
			$data->gdInstalled = 'Installed!';
		}

		if(is_writable($uploadsDirectory))
		{
			$data->dirUploads = 'Writable!';
		}

		if(is_writable($databaseFile))
		{
			$data->dbFile = 'Writable!';
		}

		if(!is_writable($uploadsDirectory) || !is_writable($databaseFile))
		{
			$this->set_writable($uploadsDirectory);
			$this->set_writable($databaseFile);
			$data->settingChmod = 'Automatic CHMOD setup completed!';
		}

		$this->template
			->set('data', $data)
			->build('step2');
	}

	private function set_writable($filename)
	{
		if (!is_writable($filename))
		{
            if (chmod($filename, 0777)) return true;
            else return false;
        }
	}

}