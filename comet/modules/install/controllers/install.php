<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends MX_Controller {

	public $passIcon = '<i class="icon-ok-circle pass"></i>';
	public $failIcon = '<i class="icon-remove-circle fail"></i>';

	private $sessionData = array();

	public function __construct()
	{
		parent::__construct();

		$this->template
			->set_layout('installer');
	}

	public function index()
	{
		$this->sessionData['step1'] = true;
		$this->sessionData['step2'] = false;
		$this->sessionData['step3'] = false;
		$this->session->set_userdata($this->sessionData);

		$stepLink = 'step2';
		$this->template
			->set('stepLink', $stepLink)
			->build('step1');
	}

	public function step2()
	{
		$step1Passed = $this->session->userdata('step1');
		if(!$step1Passed) redirect('install');

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

		$databaseFile = './_install/database.php.inc';
		$uploadsDirectory = './uploads';

		$data->phpVersion = $this->failIcon;
		$data->sqlInstalled = $this->failIcon;
		$data->gdInstalled = $this->failIcon;

		$data->dirs = $this->change_chmod($writableDirectories);

		if(version_compare(phpversion(),  '5.3', '>=')) 		  $data->phpVersion = $this->passIcon;
		if(function_exists('mysql_connect')) 					  $data->sqlInstalled = $this->passIcon;
		if (extension_loaded('gd') && function_exists('gd_info')) $data->gdInstalled = $this->passIcon;

		if(version_compare(phpversion(),  '5.3', '>=') && function_exists('mysql_connect'))
		{
			$this->sessionData['step1'] = true;
			$this->sessionData['step2'] = true;
			$this->sessionData['step3'] = false;
			$this->session->set_userdata($this->sessionData);
		}

		$stepLink = 'step3';
		$this->template
			->set('data', $data)
			->set('stepLink', $stepLink)
			->build('step2');
	}

	public function step3()
	{
		$stepPassed = $this->session->userdata('step2');
		if(!$stepPassed) redirect('install/step2');

		$this->load->helper('form');

		$this->sessionData['step1'] = true;
		$this->sessionData['step2'] = true;
		$this->sessionData['step3'] = true;
		$this->session->set_userdata($this->sessionData);

		$stepLink = 'step4';
		$this->template
			->set('stepLink', $stepLink)
			->build('step3');
	}

	public function step4()
	{
		$stepPassed = $this->session->userdata('step3');
		if(!$stepPassed) redirect('install/step3');

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

			$hashPass = $this->ion_auth->hash_password($apassword);
			$time = time();

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
			$queryCommands = array();
			if(file_exists('./_install/comet-schema.sql'))
			{
				$sqlFile = read_file('./_install/comet-schema.sql');
				$queryCommands = explode(';', $sqlFile);
			}
			else $this->session->set_flashdata('errors', 'Missing .sql install file!');

			// Open MySQL Connection
			$link = @mysql_connect($hostname, $username, $password);
			@mysql_select_db($database, $link);

			// Execute .sql file queries
			foreach ($queryCommands as $query)
			{
				@mysql_query($query);
			}

			$userQuery = "INSERT INTO users (username, password, email, created_on, last_login, active) VALUES ('$ausername', '$hashPass', '$amail', '$time', '$time', '1')";
			$userGroupQuery = "INSERT INTO users_groups (user_id, group_id) VALUES (1, 1)";

			// Finish MySQL queries
			@mysql_query($userQuery);
			@mysql_query($userGroupQuery);
			mysql_close($link);

			// Show final page
			$stepLink = 'finish';
			$this->template
				->set('stepLink', $stepLink)
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