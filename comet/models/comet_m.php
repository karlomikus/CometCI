<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comet_m extends MY_Model {

	public function get_visits_stats($month)
	{
		$this->db->where('MONTH(date)', $month);
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

	public function count_comments()
	{
		$query = $this->db->get('comments');
		return $query->num_rows(); 
	}

	public function comment_stats()
	{
		$weekAgo = date("Y-m-d", strtotime("-1 week"));
		$where = 'date >= "'.$weekAgo.'" AND date <= "'.date("Y-m-d").'"';

		$this->db->select('date');
		$this->db->select('COUNT(*) as total');
		$this->db->where($where);
		$this->db->group_by('DAY(date)');

		return $query = $this->db->get('comments')->result();
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