<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forums_m extends MY_Model {

	/**
	 * Get labels that have forums
	 * @return array Unique list of label ID's
	 */
	public function get_active_forum_labels() 
	{
		$this->_table = 'forum_forums';
		$labels = array();
		$forums = parent::get_all();
		foreach ($forums as $forum) {
			if(!in_array($forum->label, $labels)) {
				$labels[] = $forum->label;
			}
		}
		return $labels;
	}

	/**
	 * Get all topics from chosen forum
	 * @param  int $forumID Forum ID
	 * @return object
	 */
	public function get_forum_topics($forumID)
	{
		$query = $this->db->get_where('forum_topics', array('forum' => $forumID));
		return $query->result();
	}

	/**
	 * Insert new topic into database
	 * @param  array $data Array of data
	 */
	public function insert_topic($data)
	{
		$this->_table = 'forum_topics';
		parent::insert($data);
	}

	/**
	 * Insert topic reply into database
	 * @param  array $data Array of data
	 */
	public function insert_reply($data)
	{
		$this->_table = 'forum_replies';
		parent::insert($data);
	}

	/**
	 * Get topic based on topic ID,
	 * gets original post
	 * @param  int $topicID Topic ID
	 * @return object          Database object
	 */
	public function get_topic($topicID)
	{
		$this->_table = 'forum_topics';
		return parent::get($topicID);
	}

	/**
	 * Get all replies in a given topic
	 * @param  int $topicID Topic ID
	 * @return object          Database object
	 */
	public function get_topic_replies($topicID) {
		$this->_table = 'forum_replies';
		return parent::get_many_by('topic', $topicID);
	}

	public function count_forum_replies()
	{

	}

}

/* End of file forums_m.php */
/* Location: .//C/wamp/www/cms/comet/modules/forums/models/forums_m.php */