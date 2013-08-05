<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Matches_m extends MY_Model {

	/**
	 * Gets only upcoming matches
	 * @return object Database object
	 */
	public function get_upcoming_matches($date = '') 
	{
		if(empty($date))
		{
			parent::order_by('date', 'DESC');
			$query = parent::get_many_by('status', 1);
		}
		else
		{
			$dateDay = date('d', strtotime($date));
			$dateMonth = date('m', strtotime($date));
			$dateYear = date('Y', strtotime($date));

			$this->db->order_by('date', 'desc');
			$this->db->where('status', 1);
			$this->db->where('DAY(date)', $dateDay);
			$this->db->where('MONTH(date)', $dateMonth);
			$this->db->where('YEAR(date)', $dateYear);
			$query = $this->db->get('matches')->result();
		}

		return $query;
	}

	/**
	 * Gets all matches
	 * @param  boolean $all If false gets all matches that are not upcoming
	 * @return object       Object with match results
	 */
	public function get_matches($all = TRUE) 
	{
		if($all)
		{
			parent::order_by('date', 'DESC');
			return parent::get_all();
		}
		else
		{
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

	public function delete_scores($matchID) 
	{
		$this->db->where('match', $id);
		return $this->db->delete('matches_scores');
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
	public function calculate_scores_rate()
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
			if($match->score1 < $match->score2) $rateWin++;
			else if($match->score1 > $match->score2) $rateLose++;
			else $rateDraw++;
		}

		$data = new stdClass();
		$data->win = $rateWin;
		$data->lose = $rateLose;
		$data->draw = $rateDraw;

		return $data;
	}

	/**
	 * Gets match outcome based on given ID. You can specify format of
	 * result as a second parameter. Use text to return result as a string
	 * or use html to return result as a formatted HTML.
	 * 
	 * @param  int $id     Match ID
	 * @param  string $format Return format
	 * @return mixed
	 */
	public function get_match_outcome($id, $format = '') 
	{
		$home = $this->calculate_score('team', $id);
		$away = $this->calculate_score('opponent', $id);

		$outcome = 0; // DRAW
		if($home > $away) $outcome = 1; // WIN
		elseif($home < $away) $outcome = 2; // LOSE

		if($format == 'text')
		{
			if($outcome == 1) $result = 'WIN';
			elseif($outcome == 2) $result = 'LOSE';
			else $result = 'DRAW';
		}
		elseif ($format == 'html')
		{
			if($outcome == 1) $result = '<span class="win-color">WIN</span>';
			elseif($outcome == 2) $result = '<span class="lose-color">LOSE</span>';
			else $result = '<span class="draw-color">DRAW</span>';
		}
		else
		{
			$result = $outcome;
		}

		return $result;
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

	/**
	 * Get number of matches played this week
	 * @return int
	 */
	public function get_matches_in_week()
	{
		$today = getdate();
		$weekStartDate 	= $today['mday'] - $today['wday'];
		$weekEndDate 	= $today['mday'] - $today['wday'] + 6;

		$startDate = $today['year'] .'-'.$today['mon'].'-'.$weekStartDate;
		$endDate = $today['year'] .'-'.$today['mon'].'-'.$weekEndDate;

		$this->db->where('date >= ', $startDate);
		$this->db->where('date <=', $endDate);
		$query = $this->db->get('matches');

		return $query->num_rows();
	}

	/**
	 * Get top 5 most played games
	 * @param  int $limit Limit the results
	 * @return object
	 */
	public function get_popular_games($limit)
	{
		$this->db->select('game');
		$this->db->select('COUNT(game) as rank');
		$this->db->group_by('game');
		$this->db->order_by('rank', 'DESC');
		$this->db->limit($limit);
		$query = $this->db->get('matches');

		return $query->result();
	}

	/**
	 * Get top 5 most active teams
	 * @param  int $limit Limit the results
	 * @return object
	 */
	public function get_popular_teams($limit)
	{
		$this->db->select('team');
		$this->db->select('COUNT(team) as rank');
		$this->db->group_by('team');
		$this->db->order_by('rank', 'DESC');
		$this->db->limit($limit);
		$query = $this->db->get('matches');

		return $query->result();
	}

	/**
	 * Get top 5 most active players
	 * @return array
	 */
	public function get_popular_players()
	{
		$query = $this->db->get('matches')->result();

		$result = array();
		foreach ($query as $teamPlayers)
		{
			$playersArray = explode(',', $teamPlayers->{'team-players'});
			$result = array_merge($result, $playersArray);
		}

		return array_count_values($result);
	}

	public function get_year_matches_stats($year)
	{
		$formatted = "[";
		$data = new stdClass();

		for ($i=1; $i <= 12; $i++)
		{ 
			$this->db->select('date');
			$this->db->select('match');
			$this->db->select('sum(matches_scores.opponent) as score1');
			$this->db->select('sum(matches_scores.team) as score2');
			$this->db->group_by('match');
			$this->db->from('matches_scores');
			$this->db->join('matches', 'matches.id = matches_scores.match');
			$this->db->where('YEAR(date)', $year);
			$this->db->where('MONTH(date)', $i);
			$query = $this->db->get()->result();

			$counterWins = 0;
			$counterDraws = 0;
			$counterLoses = 0;


			foreach ($query as $data)
			{
				if($data->score1 > $data->score2) $counterLoses++;
				elseif($data->score1 < $data->score2) $counterWins++;
				else $counterDraws++;
			}

			$formatted .= "{ month: '".date('M', strtotime($year.'-'.$i))."', wins: $counterWins, draws: $counterDraws, loses: $counterLoses },\n";
		}

		$formatted .= "]";

		return $formatted;
	}
}