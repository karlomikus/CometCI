<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Matches_m extends MY_Model {

	public function insert_scores($scores) {
		if(is_array($scores)) {
			$this->db->insert_batch('matches_scores', $scores);
			return true;
		}
		return false;
	}

	public function update_scores($id, $scores) {
		$this->db->where('match', $id);
		$this->db->delete('matches_scores');

		if(is_array($scores)) {
			$this->db->insert_batch('matches_scores', $scores);
			return true;
		}
		return false;
	}

	public function get_scores($id) {
		$this->db->select('*');
		return $this->db->get_where('matches_scores', array('match' => $id))->result();
	}

	public function calculate_score($side, $id) {
		$this->db->select($side);
		$query = $this->db->get_where('matches_scores', array('match' => $id))->result();
		$result = 0;

		foreach($query as $score) {
			if($side == 'team') $result += $score->team;
			else $result += $score->opponent;
		}

		return $result;
	}

	public function get_match_outcome($id, $text = TRUE, $format = FALSE) {
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

	public function insert_files($matchID, $file, $type='screenshot') {
		$data = array(
			'match_id' => $matchID,
			'file' => $file,
			'type' => $type
		);
		return $this->db->insert('matches_files', $data); 
	}

	public function delete_screenshot($matchID, $i) {
		$this->db->select('file');
		$query = $this->db->get_where('matches_files', array('match' => $matchID))->result();
		foreach($query as $file) {
			$meta = $this->get_screenshot_meta($file);
			if($meta[1] == $i) {
				unlink('./uploads/screenshots/'.$file);
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		return FALSE;
	}

	public function get_match_screenshots($id) {
		$this->db->select('*');
		$query = $this->db->get_where('matches_files', array('match_id' => $id))->result();

		return $query;
	}

	public function get_screenshot_meta($file) {
		$pass1 = explode('_', $file);
		$pass2 = explode('.', $pass1[2]); // Get timestamp

		$result = array($pass1[0], $pass1[1], $pass2[0]); // MatchID, PictureNo, Timestamp
		return $result;
	}
}