<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $folder_path = './uploads/opponents/';
	private $perPage = 15;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('opponents_m');
	}

	public function index($sortBy = 'name', $sortOrder = 'asc', $page = 0)
	{
		$this->load->library('pagination');
		$count = $this->opponents_m->count_all();

		$this->load->helper('text');

		if(isset($sortBy) && isset($sortOrder)) $this->opponents_m->order_by($sortBy, $sortOrder);
		else $this->opponents_m->order_by('name', 'desc');

		$config = $this->config->item('pagination_backend');
		$config['base_url'] = base_url()."admin/opponents/index/$sortBy/$sortOrder/";
		$config['total_rows'] = $count;
		$config['per_page'] = $this->perPage;
		$config['uri_segment'] = 6;

		$this->pagination->initialize($config);
		$this->opponents_m->limit($this->perPage, $page);

		$linkData = new stdClass();
		$linkData->page = $page;
		$linkData->sortOrderLink = ($sortOrder == 'asc') ? 'desc' : 'asc';
		$linkData->currentOrder = $sortBy;

		$this->template
			->set('title', 'Opponents')
			->set('opponents', $this->opponents_m->get_all())
			->set('linkdata', $linkData)
			->set('pagination', $this->pagination->create_links())
			->build('admin/main');

	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Opponent name', 'required|min_length[4]|trim|htmlspecialchars|xss_clean');

		$config['upload_path']   = $this->folder_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '0';
		$config['max_width']     = '500';
		$config['max_height']    = '500';

		if ($this->form_validation->run() == TRUE)
		{
			$config['file_name'] = $this->opponents_m->get_next_id();
			$this->load->library('upload', $config);

			if (!empty($_FILES['logo']['name']))
			{
				if ($this->upload->do_upload('logo')) $logo_data = $this->upload->data();
				else $logo_data = NULL;
			}
			else $logo_data = NULL;

			$data = array(
				'name' => $this->input->post('name'),
				'info' => $this->input->post('description', TRUE),
				'gameID' => $this->input->post('game'),
				'logo' => $logo_data['file_name']
			);
			
			$this->opponents_m->insert($data);
			redirect('admin/opponents');
		}
		else
		{
			$this->load->model('games/games_m');
			$this->games_m->order_by('name');

			$this->template
				->set('title', 'Create opponent')
				->set('games', $this->games_m->get_all())
				->build('admin/form');
		}
	}

	public function edit($id = 0)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Opponent name', 'required|min_length[4]|trim|htmlspecialchars|xss_clean');

		$config['upload_path']   = $this->folder_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '0';
		$config['max_width']     = '500';
		$config['max_height']    = '500';

		if ($this->form_validation->run() == TRUE) {

			$config['file_name'] = $id;
			$this->load->library('upload', $config);

			if (!empty($_FILES['logo']['name']))
			{
				if ($this->upload->do_upload('logo')) $file_data = $this->upload->data();
				else $file_data = NULL;
			}
			else $file_data = NULL;

			// Found new file delete the old one
			$fileLogo = $this->opponents_m->get($id)->logo;
			if(!empty($file_data))
			{
				unlink($this->folder_path.$fileLogo);
				$fileLogo = $file_data['file_name'];
			}

			$data = array(
				'name' => $this->input->post('name'),
				'info' => $this->input->post('description', TRUE),
				'gameID' => $this->input->post('game'),
				'logo' => $fileLogo
			);

			$this->opponents_m->update($id, $data);
			redirect('admin/opponents');
		}
		else
		{
			$this->load->model('games/games_m');
			$this->games_m->order_by('name');

			$this->template
			->set('title', 'Edit opponent')
			->set('games', $this->games_m->get_all())
			->set('data', $this->opponents_m->as_array()->get($id))
			->build('admin/form');
		}
	}

	public function delete($id = 0)
	{
		$opponent = $this->opponents_m->get($id);
		$filepath = $this->folder_path.$opponent->logo;

		unlink($filepath);
		$this->opponents_m->delete($id);

		redirect('admin/opponents');
	}

}