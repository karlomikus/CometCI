<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('calendar_m');
	}

	public function index($year = NULL, $month = NULL)
	{
		// Calendar configuration
		$conf = array(
			'show_next_prev' => true,
			'start_day' => 'monday',
			'next_prev_url' => base_url().'admin/calendar/index'
		);
		$conf['template'] = '
			{table_open}<table class="cms-calendar">{/table_open}

			{heading_row_start}<tr>{/heading_row_start}

			{heading_previous_cell}<th><a href="{previous_url}"><i class="icon-chevron-left"></i></a></th>{/heading_previous_cell}
			{heading_title_cell}<th colspan="{colspan}"><span class="ajax-load"><img src="'.base_url().'assets/admin/img/loading.gif" alt="Loading..." /></span>{heading}</th>{/heading_title_cell}
			{heading_next_cell}<th><a href="{next_url}"><i class="icon-chevron-right"></i></a></th>{/heading_next_cell}

			{heading_row_end}</tr>{/heading_row_end}

			{week_row_start}<tr class="week-row">{/week_row_start}
			{week_day_cell}<td width="14%">{week_day}</td>{/week_day_cell}
			{week_row_end}</tr>{/week_row_end}

			{cal_row_start}<tr>{/cal_row_start}
			{cal_cell_start}<td>{/cal_cell_start}

			{cal_cell_content}{day}<br />{content}{/cal_cell_content}
			{cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

			{cal_cell_no_content}{day}{/cal_cell_no_content}
			{cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

			{cal_cell_blank}&nbsp;{/cal_cell_blank}

			{cal_cell_end}</td>{/cal_cell_end}
			{cal_row_end}</tr>{/cal_row_end}

			{table_close}</table>{/table_close}
		';

		$this->load->library('calendar', $conf);
		$this->load->model('matches/matches_m', 'matches');

		$matches = $this->matches->get_matches_in_month($month, $year);
		$data = array();

		foreach ($matches as $match)
		{
			$matchDate = strtotime($match->date);
			$day = date("j", $matchDate);
			$data[$day] = '<a class="js_tooltip" href="#'.$matchDate.'" title="Match"><i class="icon-circle"></i></a>';
		}

		$this->template
			->set('title', 'Fixtures')
			->set('calendar', $this->calendar->generate($year, $month, $data))
			->build('admin/main');
	}

	public function fetch_event()
	{
		if (!$this->input->is_ajax_request()) redirect('admin/calendar');

		$this->load->model('matches/matches_m');

		if(isset($_POST) && isset($_POST['date']))
		{
			$timeStamp 	= (int)$_POST['date'];
			$date 		= date("Y-m-d", $timeStamp);

			echo $this->template
					->set('data', $this->matches_m->get_matches_on_date($timeStamp))
					->load_view('admin/events');
		}
		else
		{
			redirect('admin/calendar');
		}
	}

}