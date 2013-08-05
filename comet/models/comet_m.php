<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comet_m extends MY_Model {

	/**
	 * Get visits by chosen month.
	 * @param  int $month Month
	 * @return array
	 */
	public function get_visits_stats($month, $format = true)
	{
		$this->load->helper('date');

		// First get total visits by date from database
		$this->db->where('MONTH(date)', $month);
		$this->db->group_by('DAY(date)');
		$this->db->select('date, COUNT(*) AS total');
		$result = $this->db->get('site_views')->result();

		// Set starting variables
		$monthStartDay = date('Y-'.$month.'-01');
		$numberOfDaysInMonth = days_in_month($month);

		// Fill all dates with zero views
		$range = array();
		for($i = 0; $i <= $numberOfDaysInMonth; $i++)
		{
			$dateIncrement = date("Y-m-d", strtotime($monthStartDay." +".$i." day"));
			$range[$dateIncrement] = 0;
		}

		// Remove starting day of next month
		array_pop($range);

		// Fill dates with real values
		foreach ($result as $visit)
		{
			$formatDate = date('Y-m-d', strtotime($visit->date));
			$range[$formatDate] = $visit->total;
		}

		if($format)
		{
			return $this->format_js_data($range);
		}
		else
		{
			return $range;
		}
	}

	private function format_js_data($data)
	{
		$formatted = "[";
		foreach ($data as $date => $visits)
		{
			$formatted .= "{ day: '".date('d', strtotime($date)).".', value: $visits }, \n";
		}
		$formatted .= "]";

		return $formatted;
	}

	/**
	 * Updates (unique) site view. Works by checking
	 * if visitor's IP or user ID is already in the database,
	 * if it's not then inserts a view into the database
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
		$dateColumn = 'date';
		if($table == 'users') $dateColumn = 'created_on';

		$weekAgo = date("Y-m-d", strtotime("-1 week"));
		$where = $dateColumn.' >= "'.$weekAgo.'" AND '.$dateColumn.' <= "'.date("Y-m-d", strtotime("+1 day")).'"';

		// Users table uses unix timestamps as date columns so we need to do some converting
		if($table == 'users') $where = $dateColumn.' >= UNIX_TIMESTAMP("'.$weekAgo.'") AND '.$dateColumn.' <= UNIX_TIMESTAMP("'.date("Y-m-d", strtotime("+1 day")).'")';

		if($table == 'users') $this->db->select('FROM_UNIXTIME('.$dateColumn.') as date');
		else $this->db->select($dateColumn);

		$this->db->select('COUNT(*) as total');
		$this->db->where($where);
		$this->db->order_by($dateColumn, 'asc');

		if($table == 'users') $this->db->group_by('DAY(FROM_UNIXTIME('.$dateColumn.'))');
		else $this->db->group_by('DAY('.$dateColumn.')');

		$query = $this->db->get($table)->result();

		$range  = array_fill(0, 7, 0);
		foreach ($query as $row) {
			$key = (date("w", strtotime($row->date)) + (date('w') + 5)) % 7;
			$range[$key] = $row->total;
		}

		return implode(',', $range);
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