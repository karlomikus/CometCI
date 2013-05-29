<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	/**
	 * Not really important in production enviroment.
	 * Used when modules where first time added to the database.
	 * Scans the module folder and creates table row for
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
					'enabled' => '1',
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
		$this->load->library('form_validation');

		$this->form_validation->set_rules('layout', 'Layout', 'required');

		if ($this->form_validation->run())
		{
			$layout = $this->input->post('layout');
			$layoutName = preg_replace("/\\.[^.\\s]{3,4}$/", "", $layout);

			$data = array(
				'description' => $this->input->post('description'),
				'enabled' => $this->input->post('enabled'),
				'layout' => $layoutName
			);

			$this->modules_m->update($id, $data);
			redirect('admin/modules');
		}
		else
		{
			$this->template
				->set('title', 'Edit module')
				->set('data', $this->modules_m->get($id))
				->set('layouts', $this->template->get_theme_layouts('default'))
				->build('admin/form');
		}		
	}

	public function disable($id = 0)
	{
		$this->modules_m->set_module_status($id, 0);
		redirect('admin/modules');
	}

	public function enable($id = 0)
	{
		$this->modules_m->set_module_status($id, 1);
		redirect('admin/modules');
	}
}