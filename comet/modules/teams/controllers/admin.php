<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $folder_path = './uploads/teams/';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('teams_m');
	}

	public function index()
	{
		$this->load->helper('text');
		
		$this->template
			->set('title', 'Teams')
			->set('teams', $this->teams_m->get_all())
			->build('admin/main');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->form_validation->set_rules('name', 'Team name', 'required|trim|htmlspecialchars|min_length[4]|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|htmlspecialchars|xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			if (!empty($_FILES['logo']['name']))
			{
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '500';
				$config['max_height']    = '500';
				$config['file_name']     = $this->teams_m->get_next_id();

				$this->upload->initialize($config);

				if ($this->upload->do_upload('logo'))
				{
					$logo_data = $this->upload->data();
				}
				else
				{
					$this->session->set_flashdata('create_error', 'Logo: '.$this->upload->display_errors('', ''));
                	$logo_data = NULL;
				}
			}

			if (!empty($_FILES['banner']['name']))
			{
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '1000';
				$config['max_height']    = '1000';
				$config['file_name']     = $this->teams_m->get_next_id().'_banner';

				$this->upload->initialize($config);

				if ($this->upload->do_upload('banner'))
				{
					$banner_data = $this->upload->data();
				}
				else
				{
					$this->session->set_flashdata('create_error', 'Banner: '.$this->upload->display_errors('', ''));
                	$banner_data = NULL;
				}
			}

			// Transform games list into comma separated list
			$games_post = $this->input->post('games');
			if(isset($games_post) && !empty($games_post)) $games_picked = implode(',', $games_post);
			else $games_picked = NULL;
			
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'games' => $games_picked,
				'banner' => $banner_data['file_name'],
				'logo' => $logo_data['file_name'],
				'countryID' => $this->input->post('country')
			);    

			$this->teams_m->insert($data);
			redirect('admin/teams');
		}
		else
		{
			$this->load->model('countries/countries_m');
			$this->load->model('games/games_m');

			$this->template
				->set('title', 'Create team')
				->set('countries', $this->countries_m->get_all())
				->set('games', $this->games_m->get_all())
				->build('admin/form');
		}
	}

	public function edit($id = 0) {

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->form_validation->set_rules('name', 'Team name', 'required|trim|htmlspecialchars|min_length[4]|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|htmlspecialchars|xss_clean');

		if ($this->form_validation->run() == TRUE) {

			if (!empty($_FILES['logo']['name'])) {
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '500';
				$config['max_height']    = '500';
				$config['file_name']     = $id;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('logo'))
				{
					$logo_data = $this->upload->data();
				}
				else
				{
					$this->session->set_flashdata('create_error', 'Logo: '.$this->upload->display_errors('', ''));
                	$logo_data = NULL;
				}
			}

			if (!empty($_FILES['banner']['name'])) {
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '1000';
				$config['max_height']    = '1000';
				$config['file_name']     = $id.'_banner';

				$this->upload->initialize($config);

				if ($this->upload->do_upload('banner'))
				{
					$banner_data = $this->upload->data();
				}
				else
				{
					$this->session->set_flashdata('create_error', 'Banner: '.$this->upload->display_errors('', ''));
                	$banner_data = NULL;
				}
			}

			$games_post = $this->input->post('games');
			if(isset($games_post) && !empty($games_post)) $games_picked = implode(',', $games_post);
			else $games_picked = 0;

			$fileLogo = $this->teams_m->get($id)->logo;
			$fileBanner = $this->teams_m->get($id)->banner;
			if(!empty($logo_data))
			{
				if(file_exists($this->folder_path.$fileLogo)) unlink($this->folder_path.$fileLogo);
				$fileLogo = $logo_data['file_name'];
			}
			if(!empty($banner_data))
			{
				if(file_exists($this->folder_path.$fileBanner)) unlink($this->folder_path.$fileBanner);
				$fileBanner = $banner_data['file_name'];
			}
			
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'games' => $games_picked,
				'banner' => $fileBanner,
				'logo' => $fileLogo,
				'countryID' => $this->input->post('country')
			);    

			$this->teams_m->update($id, $data);
			redirect('admin/teams');
		}
		else
		{
			$this->load->model('countries/countries_m');
			$this->load->model('games/games_m');

			$this->template
				->set('title', 'Edit team')
				->set('data', $this->teams_m->as_array()->get($id))
				->set('countries', $this->countries_m->get_all())
				->set('games', $this->games_m->get_all())
				->build('admin/form');
		}
	}

	public function delete($id = 0)
	{
		$team = $this->teams_m->get($id);
		$filepath_logo = $this->folder_path.$team->logo;
		$filepath_banner = $this->folder_path.$team->banner;

		unlink($filepath_logo);
		unlink($filepath_banner);
		$this->teams_m->delete($id);

		redirect('admin/teams');
	}
}