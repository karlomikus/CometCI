<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dota2 {
	private $apiKey = '60C93BF0B5507EB6A957E2A1D7F5EE84';

	public function get_dota_data($matchID) {
		$content = file_get_contents('http://api.steampowered.com/IDOTA2Match_570/GetMatchDetails/V001/?match_id='.$matchID.'&key='.$this->apiKey);
		$data = json_decode($content);

		return $data->result;
	}
}