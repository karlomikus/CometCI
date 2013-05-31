<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Matches_m extends MY_Model {

	/**
	 * Gets only upcoming matches
	 * @return object Database object
	 */
	public function get_upcoming_matches() 
	{
		$this->db->select('*');
		parent::order_by('date', 'DESC');
		return $this->db->get_where('matches', array('status' => '1'))->result();
	}

	/**
	 * Gets all matches
	 * @param  boolean $all If false gets all matches that are not upcoming
	 * @return object       Object with match results
	 */
	public function get_matches($all = TRUE) 
	{
		if($all) {
			parent::order_by('date', 'DESC');
			return parent::get_all();
		}
		else {
			parent::order_by('date', 'DESC');
			$this->db->select('*');
			$this->db->where('status !=', '1');
			return $this->db->get('matches')->result();
		}
	}

	/**
	 * Inserts an array of scores in the database
	 * @param  array $scores Array of scores to be added
	 * @return bool
	 */
	public function insert_scores($scores) 
	{
		if(is_array($scores)) {
			$this->db->insert_batch('matches_scores', $scores);
			return true;
		}
		return false;
	}

	/**
	 * Updates an array of scores in the database
	 * @param  array $scores Array of scores to be added
	 * @return bool
	 */
	public function update_scores($id, $scores) 
	{
		$this->db->where('match', $id);
		$this->db->delete('matches_scores');

		if(is_array($scores)) {
			$this->db->insert_batch('matches_scores', $scores);
			return true;
		}
		return false;
	}

	/**
	 * Gets all scores from a match
	 * @param  int $id Match ID
	 * @return object
	 */
	public function get_scores($id) 
	{
		return $this->db->get_where('matches_scores', array('match' => $id))->result();
	}

	/**
	 * Calculates total team or opponent score
	 * @param  string 	$side 	Team or opponent
	 * @param  int 		$id   	Match ID
	 * @return int       		Total score
	 */
	public function calculate_score($side, $id) 
	{
		$this->db->select($side);
		$query = $this->get_scores($id);
		$result = 0;

		foreach($query as $score) {
			if($side == 'team') $result += $score->team;
			else $result += $score->opponent;
		}

		return $result;
	}

	/**
	 * Calculates win/draw/lose rate
	 * @param  string $type Win, lose or draw rate
	 * @return int
	 */
	public function calculate_scores_rate($type = 'win')
	{
		$this->db->select('match');
		$this->db->select('sum(opponent) as score1', FALSE);
		$this->db->select('sum(team) as score2', FALSE);
		$this->db->group_by('match');
		$query = $this->db->get('matches_scores')->result();

		$rateWin = 0;
		$rateLose = 0;
		$rateDraw = 0;
		foreach($query as $match)
		{
			if($match->score1 > $match->score2) $rateWin += 1;
			else if($match->score1 < $match->score2) $rateLose += 1;
			else $rateDraw += 1;
		}

		if($type == 'win') return $rateWin;
		else if ($type == 'lose') return $rateLose;
		else return $rateDraw;
	}

	/**
	 * Gets match outcome based on provided ID
	 * @param  int  $id     Match ID
	 * @param  boolean $text   If true returns text format of outcome
	 * @param  boolean $format If true returns HTML format of outcome
	 * @return mixed          Returns outcome
	 */
	public function get_match_outcome($id, $text = TRUE, $format = FALSE) 
	{
		$home = $this->calculate_score('team', $id);
		$away = $this->calculate_score('opponent', $id);

		$outcome = 0; // DRAW
		if($home > $away) $outcome = 1; // WIN
		elseif($home < $away) $outcome = 2; // LOSE

		if($text) {
			if($outcome == 1) $outcome_text = 'WIN';
			elseif($outcome == 2) $outcome_text = 'LOSE';
			else $outcome_text = 'DRAW';
		}

		if($text && $format) {
			if($outcome == 1) $outcome_text = '<span class="win-color">WIN</span>';
			elseif($outcome == 2) $outcome_text = '<span class="lose-color">LOSE</span>';
			else $outcome_text = '<span class="draw-color">DRAW</span>';
		}

		return $text ? $outcome_text : $outcome;
	}

	/**
	 * Adds match (screenshot) files to the database
	 * @param  int $matchID Match ID
	 * @param  string $file    Filename
	 * @param  string $type    Type of data
	 * @return bool
	 */
	public function insert_files($matchID, $file, $type='screenshot') 
	{
		$data = array(
			'match_id' => $matchID,
			'file' => $file,
			'type' => $type
		);
		return $this->db->insert('matches_files', $data); 
	}

	/**
	 * Remove file data from database and remove screenshot
	 * @param  string $filename Name of the file
	 * @return bool
	 */
	public function delete_screenshot($filename) 
	{
		if($this->db->delete('matches_files', array('file' => $filename)))
		{
			unlink('./uploads/screenshots/'.$filename);
			return TRUE;
		}
		else return FALSE;
	}

	/**
	 * Remove all files related to match ID
	 * @param  int $matchID Match ID
	 * @return void
	 */
	public function delete_files($matchID)
	{
		$query = $this->db->get_where('matches_files', array('match_id' => $matchID))->result();
		foreach ($query as $file) {
			unlink('./uploads/screenshots/'.$file->file);
		}
		$this->db->delete('matches_files', array('match_id' => $matchID));
	}

	/**
	 * Get all match screenshots
	 * @param  int $id Match ID
	 * @return object
	 */
	public function get_match_screenshots($id) 
	{
		$this->db->select('*');
		$query = $this->db->get_where('matches_files', array('match_id' => $id))->result();

		return $query;
	}

	/**
	 * Extract meta information from screenshot filename.
	 * Usually containts matchID, picture number and timestamp.
	 * @param  string $file Filename
	 * @return array
	 */
	public function get_screenshot_meta($file) 
	{
		$pass1 = explode('_', $file);
		$pass2 = explode('.', $pass1[2]); // Get timestamp

		$result = array($pass1[0], $pass1[1], $pass2[0]); // MatchID, PictureNo, Timestamp
		return $result;
	}

	/**
	 * Get all matches that are played in specific month in a chosen year
	 * @param  int $month Month
	 * @param  int $year  Year
	 * @return object
	 */
	public function get_matches_in_month($month, $year)
	{
		// Empty params. given, show this months calendar
		if(!isset($month) && !isset($year))
		{
			$month = date("m");
			$year = date("Y");
		}

		$this->db->where('MONTH(date) =', $month);
		$this->db->where('YEAR(date) =', $year);
		$query = $this->db->get('matches');

		return $query->result();
	}

	/**
	 * Get all matches played on specific date (unix timestamp)
	 * @param  int $timeStamp Unix timestamp
	 * @return object
	 */
	public function get_matches_on_date($timeStamp)
	{
		if(!isset($timeStamp)) $timeStamp = time();

		$day 	= date("d", $timeStamp);
		$month 	= date("m", $timeStamp);
		$year 	= date("Y", $timeStamp);

		$this->db->where('DAY(date) =', $day);
		$this->db->where('MONTH(date) =', $month);
		$this->db->where('YEAR(date) =', $year);
		$query = $this->db->get('matches');

		return $query->result();
	}
}