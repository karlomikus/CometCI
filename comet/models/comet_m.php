<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comet_m extends MY_Model {

	public function get_visits_stats()
	{
		$this->db->where('MONTH(date)', 5);
		$this->db->group_by('DAY(date)');
		$this->db->select('date, COUNT(*) AS total');

		return $this->db->get('site_views')->result();
	}

	public function update_site_views($userID = NULL)
	{
		// Set MY_Model table
		$this->_table = 'site_views';
		// Get IP and convert it to int
		$ip = ip2long($_SERVER['REMOTE_ADDR']);
		// Set date
		$date = date('Y-m-d H:i:m');

		// Check for unique view
		if(!$this->has_viewed($ip, $userID))
		{
			$data = array(
				'ip' => $ip, 
				'user' => $userID, 
				'date' => $date
			);
			parent::insert($data);
		}
	}

	private function has_viewed($ip, $userID = NULL)
	{
		$this->_table = 'site_views';
		if(!isset($userID)) $query = parent::count_by('ip', $ip);
		else $query = parent::count_by('user', $userID);

		if($query > 0) return TRUE;
		return FALSE;
	}

}

/* End of file admin_m.php */
/* Location: comet/models/admin_m.php */