<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('modules_m');

		// No records in the database, lets change that
		if($this->modules_m->count_all() == 0)
		{
			$this->refresh();
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
			$layout = $this->input->post('layout', TRUE);
			$layoutName = preg_replace("/\\.[^.\\s]{3,4}$/", "", $layout);

			$data = array(
				'description' => $this->input->post('description', TRUE),
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

	public function refresh()
	{
		$modulesDir = $this->modules_m->list_modules();
		$modulesDb = $this->modules_m->list_db_modules();

		foreach ($modulesDir as $module)
		{
			if(!in_array($module, $modulesDb))
			{
				$data = array(
					'name' => ucfirst($module),
					'description' => 'TODO',
					'link' => $module,
					'enabled' => '1',
					'layout' => NULL
				);

				$this->modules_m->insert($data);
			}
		}

		redirect('admin/modules');
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