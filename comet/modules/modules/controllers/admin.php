<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	/**
	 * Not really important in production enviroment.
	 * Used when modules where first time added to the database.
	 * Scans the modlue folder and creates table rows for
	 * every found.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('modules_m');

		// No records in the database, lets change that
		if($this->modules_m->count_all() == 0)
		{
			// Get all modules from directory
			$modules = $this->modules_m->list_modules();
			foreach ($modules as $module)
			{
				// Fill the data
				$data = array(
					'name' => ucfirst($module->name),
					'description' => 'TODO',
					'link' => $module->name,
					'enable' => '1',
					'layout' => NULL
				);
				// DO IT!
				$this->modules_m->insert($data);
			}
		}
	}

	public function index()
	{
		$this->template
			->set('title', 'Modules')
			->set('modules', $this->modules_m->get_all())
			->build('admin/main');
	}

	public function edit($id = 0)
	{
		$this->template
			->set('title', 'Edit module')
			->set('data', $this->modules_m->get($id))
			->set('layouts', $this->template->get_theme_layouts('default'))
			->build('admin/form');
	}
}