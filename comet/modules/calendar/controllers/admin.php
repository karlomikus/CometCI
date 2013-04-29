<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	private $folder_path = './uploads/labels/';

	private $template_data = array(
		'title' => 'Labels',
		'create_title' => 'Add label',
		'edit_title' => 'Edit label',
		'add_button' => 'Add label'
	);

	public function __construct() {
		parent::__construct();
		$this->load->model('calendar_m');
	}

	public function index($year = NULL, $month = NULL) {
		$conf = array(
			'show_next_prev' => true,
			'start_day' => 'monday',
			'next_prev_url' => base_url().'admin/calendar/index'
		);
		$conf['template'] = '
			{table_open}<table class="cms-calendar">{/table_open}

			{heading_row_start}<tr>{/heading_row_start}

			{heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
			{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
			{heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

			{heading_row_end}</tr>{/heading_row_end}

			{week_row_start}<tr class="week-row">{/week_row_start}
			{week_day_cell}<td>{week_day}</td>{/week_day_cell}
			{week_row_end}</tr>{/week_row_end}

			{cal_row_start}<tr>{/cal_row_start}
			{cal_cell_start}<td>{/cal_cell_start}

			{cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
			{cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

			{cal_cell_no_content}{day}{/cal_cell_no_content}
			{cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

			{cal_cell_blank}&nbsp;{/cal_cell_blank}

			{cal_cell_end}</td>{/cal_cell_end}
			{cal_row_end}</tr>{/cal_row_end}

			{table_close}</table>{/table_close}
		';

		$this->load->library('calendar', $conf);

		$this->template
			->set('calendar', $this->calendar->generate($year, $month))
			->build('admin/main');
	}

	public function create() {

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->breadcrumb->append_crumb($this->template_data['create_title'], 'admin/labels/create');

		$this->form_validation->set_rules('title', 'Title', 'required');

		if ($this->form_validation->run() == TRUE) {

			$next_id = $this->labels_m->get_next_id();

			if (!empty($_FILES['banner']['name'])) {
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '600';
				$config['max_height']    = '200';
				$config['file_name']     = $next_id;
				$this->upload->initialize($config);

				if ($this->upload->do_upload('banner')) {
					$file_data = $this->upload->data();
				}
				else {
					echo 'file fail';
					//redirect('admin/teams');
				}
			}

			if(isset($file_data) and !empty($file_data['file_name'])) $file = $file_data['file_name'];
			else $file = '0';

			$data = array(
				'name' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'banner' => $file
			);

			$this->labels_m->insert($data);
			redirect('admin/labels');
		}
		else {

			$this->template
				->set('title', $this->template_data['create_title'])
				->build('admin/form');
		}
	}

	public function edit($id = 0) {

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');

		$this->breadcrumb->append_crumb($this->template_data['edit_title'], 'admin/labels/edit');

		$this->form_validation->set_rules('title', 'Title', 'required');

		if ($this->form_validation->run() == TRUE) {

			if (!empty($_FILES['banner']['name'])) {
				$config['upload_path']   = $this->folder_path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '0';
				$config['max_width']     = '600';
				$config['max_height']    = '200';
				$config['file_name']     = $next_id;
				$this->upload->initialize($config);

				if ($this->upload->do_upload('banner')) {
					$file_data = $this->upload->data();
				}
				else {
					echo 'file fail';
					//redirect('admin/teams');
				}
			}
			
			$data = array(
				'name' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'banner' => $file
			);

			$this->labels_m->update($id, $data);
			redirect('admin/labels');
		}
		else {
			$this->template
				->set('title', $this->template_data['edit_title'])
				->set('data', $this->labels_m->as_array()->get($id))
				->build('admin/form');
		}
	}

	public function delete($id = 0) {
		$this->label = $this->labels_m->get($id);
		$filepath_banner = $this->folder_path.$this->label->banner;
		unlink($filepath_banner);
		$this->labels_m->delete($id);
		redirect('admin/labels');
	}
}