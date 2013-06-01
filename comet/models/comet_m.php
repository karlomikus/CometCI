<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comet_m extends MY_Model {

	/**
	 * Get visits by chosen month.
	 * 
	 * @param  int $month Month
	 * @return object
	 */
	public function get_visits_stats($month)
	{
		$this->db->where('MONTH(date)', $month);
		$this->db->group_by('DAY(date)');
		$this->db->select('date, COUNT(*) AS total');

		return $this->db->get('site_views')->result();
	}

	/**
	 * Updates (unique) site view. Works by checking
	 * if visitor's IP or user ID is already in the database,
	 * if it's not then inserts a view into the database
	 * 
	 * @param  int $userID User ID
	 * @return object
	 */
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

	// TODO: Make count and stats into 2 seperate functions
	/**
	 * Count all record in $table
	 * @param  string $table Table name
	 * @return int
	 */
	public function count_table_rows($table)
	{
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	/**
	 * Counts all records made in last 7 days
	 * @param  string $table Table name
	 * @return object
	 */
	public function generate_stats($table)
	{
		$weekAgo = date("Y-m-d", strtotime("-1 week"));
		$where = 'date >= "'.$weekAgo.'" AND date <= "'.date("Y-m-d", strtotime("+1 day")).'"';

		$this->db->select('date');
		$this->db->select('COUNT(*) as total');
		$this->db->where($where);
		$this->db->order_by('date', 'asc');
		$this->db->group_by('DAY(date)');

		return $query = $this->db->get($table)->result();
	}

	/**
	 * Check if specific user ID or IP has result in the database
	 * @param  int  $ip     IP converted to long
	 * @param  int  $userID UserID
	 * @return boolean
	 */
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