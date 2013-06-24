<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Events_m extends MY_Model {

	public function get_date_events($date = 0)
	{
		if(empty($date)) $date = time();

		$dateDay = date('d', strtotime($date));
		$dateMonth = date('m', strtotime($date));
		$dateYear = date('Y', strtotime($date));

		$this->db->order_by('startdate', 'desc');
		$this->db->where('DAY(startdate)', $dateDay);
		$this->db->where('MONTH(startdate)', $dateMonth);
		$this->db->where('YEAR(startdate)', $dateYear);
		$query = $this->db->get('events')->result();

		return $query;
	}

}