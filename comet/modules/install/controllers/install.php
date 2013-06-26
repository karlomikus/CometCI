<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends MX_Controller {

	private $installDir = '_install';
	public $passIcon = '<i class="icon-ok-circle pass"></i>';
	public $failIcon = '<i class="icon-remove-circle fail"></i>';

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

		$writableDirectories = array(
			'./uploads/',
			'./uploads/screenshots/',
			'./uploads/opponents/',
			'./uploads/banners/',
			'./uploads/events/',
			'./uploads/labels/',			
			'./uploads/teams/',
			'./uploads/users/',
			'./comet/config/'
		);

		$databaseFile = './'.$this->installDir.'/database.php.inc';
		$uploadsDirectory = './uploads';

		$data->phpVersion = $this->failIcon;
		$data->sqlInstalled = $this->failIcon;
		$data->gdInstalled = $this->failIcon;

		$data->dirs = $this->change_chmod($writableDirectories);

		if(version_compare(phpversion(),  '5.3', '>=')) 		  $data->phpVersion = $this->passIcon;
		if(function_exists('mysql_connect')) 					  $data->sqlInstalled = $this->passIcon;
		if (extension_loaded('gd') && function_exists('gd_info')) $data->gdInstalled = $this->passIcon;

		$this->template
			->set('data', $data)
			->build('step2');
	}

	public function step3()
	{
		$this->load->helper('form');

		$this->template
			->build('step3');
	}

	public function step4()
	{
		$this->load->helper('file');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'DB Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'DB Password', 'trim|xss_clean');
		$this->form_validation->set_rules('hostname', 'DB Hostname', 'trim|required|xss_clean');
		$this->form_validation->set_rules('database', 'DB Database', 'trim|required|xss_clean');

		$this->form_validation->set_rules('ausername', 'Admin username', 'trim|required|min_length[4]|max_length[20]|strtolower|xss_clean');
		$this->form_validation->set_rules('apassword', 'Admin password', 'trim|required|min_length[4]|max_length[25]|xss_clean');
		$this->form_validation->set_rules('amail', 'Admin Email', 'trim|required|valid_email|xss_clean');

		if($this->form_validation->run())
		{
			$database = $this->input->post('database');
			$hostname = $this->input->post('hostname');
			$password = $this->input->post('password');
			$username = $this->input->post('username');

			$ausername = $this->input->post('ausername');
			$apassword = $this->input->post('apassword');
			$amail = $this->input->post('amail');

			// Let's create database config file first!
			$cfgLocation = './_install/database.php.inc';
			$cfgContent = read_file($cfgLocation);

			$search  = array('{{dbhostname}}', '{{dbusername}}', '{{dbpassword}}', '{{dbdatabase}}');
			$replace = array($hostname, $username, $password, $database);
			$cfgFinal = str_replace($search, $replace, $cfgContent);
			
			// Test the database connection
			if(!$this->test_mysql($hostname, $username, $password, $database))
			{
				$this->session->set_flashdata('errors', 'Cant connect to MySQL Server');
				redirect('install/step3');
			}

			// Write db config file
			write_file('./comet/config/database.php', $cfgFinal);

			// Insert SQL File
			$this->load->database();
			
			$sqlFile = read_file('./_install/install.sql');
			$queryCommands = explode(';', $sqlFile);

			foreach ($queryCommands as $query)
			{
				$this->db->simple_query($query);
			}

			// Add default user
			$this->ion_auth->register($ausername, $apassword, $amail);
			$this->ion_auth->activate('1');

			// Show final page
			$this->template
				->build('step4');
		}
		else
		{
			$this->session->set_flashdata('errors', validation_errors('<div class="error">', '</div>'));
			redirect('install/step3');
		}
	}

	private function test_mysql($hostname, $username, $password, $database)
	{
		$mysqlConnection = @mysql_connect($hostname, $username, $password);
		if(!$mysqlConnection)
		{
			return false;
		}
		else
		{
			$dbConnection = @mysql_select_db($database, $mysqlConnection);
			if(!$dbConnection)
			{
				return false;
			}
		}

		return true;
	}

	private function change_chmod(array $files)
	{
		$checkDirs = array();

		foreach ($files as $file)
		{
			if (!is_writable($file))
			{
				if(chmod($file, 0777)) $checkDirs[$file] = 'pass';
				else $checkDirs[$file] = 'fail';
			}
			else
			{
				$checkDirs[$file] = 'pass';
			}
		}

		return $checkDirs;
	}

}