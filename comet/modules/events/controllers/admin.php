<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $folder_path = './uploads/events/';

	public function __construct()
	{
		parent::__construct();

		$this->template->append_metadata(Assets::adminJs('picker', 'js/pickdate'));
		$this->template->append_metadata(Assets::adminJs('picker.time', 'js/pickdate'));
		$this->template->append_metadata(Assets::adminJs('picker.date', 'js/pickdate'));
		$this->template->append_metadata(Assets::adminJs('legacy', 'js/pickdate'));

		$this->load->model('events_m');
	}

	public function index() {
		
		$this->template
			->set('title', 'Events')
			->set('events', $this->events_m->get_all())
			->build('admin/main');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->helper('htmlpurifier');

		$this->form_validation->set_rules('name', 'Name', 'required|trim|htmlspecialchars|min_length[5]|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('link', 'Link', 'prep_url|trim|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('startdate', 'Starting date', 'required|xss_clean');
		$this->form_validation->set_rules('starttime', 'Starting time', 'required|xss_clean');
		$this->form_validation->set_rules('enddate', 'Ending date', 'required|xss_clean');
		$this->form_validation->set_rules('endtime', 'Ending time', 'required|xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			if (!empty($_FILES['image']['name']))
			{
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '1000';
				$config['max_height']    = '1000';
				$config['file_name']     = $this->events_m->get_next_id();
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image'))
				{
					$file_data = $this->upload->data();
				}
				else
				{
					$this->session->set_flashdata('create_error', $this->upload->display_errors('', ''));
                	$file_data = NULL;
				}
			}

			$startDate = $this->input->post('startdate').' '.$this->input->post('starttime');
			$endDate = $this->input->post('enddate').' '.$this->input->post('endtime');

			$data = array(
				'name' => $this->input->post('name'),
				'description' => html_purify($this->input->post('description'), 'description'),
				'startdate' => $startDate,
				'enddate' => $endDate,
				'link' => $this->input->post('link'),
				'image' => $file_data['file_name']
			);

			$this->events_m->insert($data);
			redirect('admin/events');
		}
		else
		{
			$this->template
				->set('title', 'Create event')
				->build('admin/form');
		}
	}

	public function edit($id = 0)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->helper('htmlpurifier');

		$this->form_validation->set_rules('name', 'Name', 'required|trim|htmlspecialchars|min_length[5]|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('link', 'Link', 'prep_url|trim|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('startdate', 'Starting date', 'required|xss_clean');
		$this->form_validation->set_rules('starttime', 'Starting time', 'required|xss_clean');
		$this->form_validation->set_rules('enddate', 'Ending date', 'required|xss_clean');
		$this->form_validation->set_rules('endtime', 'Ending time', 'required|xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			if (!empty($_FILES['image']['name']))
			{
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '1000';
				$config['max_height']    = '1000';
				$config['file_name']     = $this->events_m->get_next_id();
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image'))
				{
					$file_data = $this->upload->data();
				}
				else
				{
					$this->session->set_flashdata('create_error', $this->upload->display_errors('', ''));
                	$file_data = NULL;
				}
			}

			$fileImage = $this->events_m->get($id)->image;
			if(!empty($file_data))
			{
				unlink($this->folder_path.$fileImage);
				$fileImage = $file_data['file_name'];
			}

			$startDate = $this->input->post('startdate').' '.$this->input->post('starttime');
			$endDate = $this->input->post('enddate').' '.$this->input->post('endtime');
			
			$data = array(
				'name' => $this->input->post('name'),
				'description' => html_purify($this->input->post('description'), 'description'),
				'startdate' => $startDate,
				'enddate' => $endDate,
				'link' => $this->input->post('link'),
				'image' => $fileImage
			);

			$this->events_m->update($id, $data);
			redirect('admin/events');
		}
		else
		{
			$this->template
				->set('title', 'Edit label')
				->set('data', $this->events_m->as_array()->get($id))
				->build('admin/form');
		}
	}

	public function delete($id = 0)
	{
		$event = $this->events_m->get($id);
		$file = $this->folder_path.$event->image;
		unlink($file);
		$this->events_m->delete($id);
		redirect('admin/events');
	}
}