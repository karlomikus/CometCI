<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('messages_m', 'msg');
		$this->template
			->set_layout(get_layout(__CLASS__));
	}

	public function index($category = 'received')
	{
		$this->load->helper('text');

		$currentID = $this->user->id;
		$this->msg->order_by('date', 'desc');

		$this->msg->update_view_status($currentID);

		if($category == 'received') $data = $this->msg->get_many_by('to', $currentID);
		elseif($category == 'sent') $data = $this->msg->get_many_by('from', $currentID);
		else 						$data = $this->msg->get_many_by('to', $currentID);

		$this->template
			->set('data', $data)
			->build('main.twig');
	}

	public function create($sendtoID = 0)
	{
		$this->load->helper('form');
		$this->load->helper('htmlpurifier');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required|min_length[4]|htmlspecialchars|xss_clean');
		$this->form_validation->set_rules('content', 'Content', 'required|min_length[4]');
		$this->form_validation->set_rules('sendto', 'Send to', 'required|htmlspecialchars|xss_clean');
		// TODO: Check username validation

		if ($this->form_validation->run() == TRUE)
		{
			if(empty($sendtoID)) $sendtoID = get_user_id($this->input->post('sendto'));

			$data = array(
				'title' => $this->input->post('title'),
				'content' => html_purify($this->input->post('content'), 'description'),
				'to' => $sendtoID,
				'from' => $this->user->id,
				'date' => date('Y-m-d H:i:s')
			);

			$this->msg->insert($data);
			redirect('messages');
		}
		else
		{
			$this->template
				->build('form.twig');
		}
	}

	public function edit($id = 0)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->form_validation->set_rules('title', 'Title', 'required|min_length[4]|xss_clean');

		if ($this->form_validation->run() == TRUE)
		{
			if (!empty($_FILES['banner']['name']))
			{
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '1000';
				$config['max_height']    = '1000';
				$config['file_name']     = $id;
				$this->upload->initialize($config);

				if ($this->upload->do_upload('banner'))
				{
					$file_data = $this->upload->data();
				}
				else {
					$this->session->set_flashdata('create_error', $this->upload->display_errors('', ''));
                	$file_data = NULL;
				}
			}

			// Found new file delete the old one
			$fileBanner = $this->labels_m->get($id)->banner;
			if(!empty($file_data))
			{
				unlink($this->folder_path.$fileBanner);
				$fileBanner = $file_data['file_name'];
			}
			
			$data = array(
				'name' => $this->input->post('title'),
				'description' => $this->input->post('description', TRUE),
				'banner' => $fileBanner
			);

			$this->labels_m->update($id, $data);
			redirect('admin/labels');
		}
		else
		{
			$this->template
				->set('title', 'Edit label')
				->set('data', $this->labels_m->as_array()->get($id))
				->build('admin/form');
		}
	}

	public function delete($id = 0)
	{
		$label = $this->labels_m->get($id);
		$filepath_banner = $this->folder_path.$label->banner;

		unlink($filepath_banner);
		$this->labels_m->delete($id);

		redirect('admin/labels');
	}
}