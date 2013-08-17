<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forums_m extends MY_Model {

	/**
	 * Main forum list methods
	 */
	
	public function insert_forum($data)
	{
		$this->_table = 'forum_forums';
		parent::insert($data);
	}

	public function update_forum($id, $data)
	{
		$this->_table = 'forum_forums';
		parent::update($id, $data);
	}

	public function delete_forum($id)
	{
		// TODO: Delete all posts in the forum
		$this->_table = 'forum_forums';
		parent::delete($id);
	}

	public function get_forums()
	{
		$this->_table = 'forum_forums';
		return parent::get_all();
	}

	public function get_forum($id)
	{
		$this->_table = 'forum_forums';
		return parent::get($id);
	}

	public function get_active_forum_labels() 
	{
		$this->_table = 'forum_forums';
		$labels = array();
		$forums = parent::get_all();

		foreach ($forums as $forum)
		{
			if(!in_array($forum->label, $labels))
			{
				$labels[] = $forum->label;
			}
		}
		
		return $labels;
	}

	public function get_all_topics()
	{
		$this->db->order_by('last_modified', 'DESC');
		return $this->db->get('forum_topics')->result();
	}

	public function get_forum_topics($forumID, $type = 1)
	{
		if($type == 2) {
			$this->db->where('forum', $forumID);
			$this->db->where('sticky', '1');
		}
		elseif($type == 3) {
			$this->db->where('forum', $forumID);
			$this->db->where('sticky', '0');
		}
		else {
			$this->db->where('forum', $forumID);
		}
		return $this->db->get('forum_topics')->result();
	}

	/**
	 * Forum topics list methods
	 */

	public function insert_topic($data)
	{
		$this->_table = 'forum_topics';
		parent::insert($data);
	}

	public function edit_topic($id, $data)
	{
		$this->_table = 'forum_topics';
		parent::update($id, $data);
	}

	public function delete_topic($topicID)
	{
		// Delete topic
		$this->db->delete('forum_topics', array('id' => $topicID));
		// Delete replies
		$this->db->delete('forum_replies', array('topic' => $topicID));
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

	public function is_locked($topicID)
	{
		$this->_table = 'forum_topics';
		$query = parent::get($topicID);

		if($query->locked == 1) return TRUE;
		else return FALSE;
	}

	public function set_locked($topicID, $locked)
	{
		$this->db->set('locked', $locked);
		$this->db->where('id', $topicID);
		return $this->db->update('forum_topics');
	}

	public function is_sticky($topicID)
	{
		$this->_table = 'forum_topics';
		$query = parent::get($topicID);

		if($query->sticky == 1) return TRUE;
		else return FALSE;
	}

	public function set_sticky($topicID, $sticky)
	{
		$this->db->set('sticky', $sticky);
		$this->db->where('id', $topicID);
		return $this->db->update('forum_topics');
	}

	/* Replies */

	/**
	 * Insert topic reply into database
	 * @param  array $data Array of data
	 */
	public function insert_reply($data)
	{
		// Insert reply
		$this->_table = 'forum_replies';
		parent::insert($data);		
	}

	public function update_reply($id, $data)
	{
		// Insert reply
		$this->_table = 'forum_replies';
		parent::update($id, $data);		
	}

	public function get_topic_reply($id)
	{
		// Insert reply
		$this->_table = 'forum_replies';
		return parent::get($id);		
	}

	public function update_last_modified($topicID)
	{
		$this->db->set('last_modified', date('Y-m-d H:i:s'));
		$this->db->where('id', $topicID);
		return $this->db->update('forum_topics');
	}

	/**
	 * [get_reply description]
	 * @param  integer $postID [description]
	 * @return [type]          [description]
	 */
	public function get_reply($postID = 0)
	{
		$this->_table = 'forum_replies';
		return parent::get($postID);
	}

	/**
	 * Get all replies in a given topic
	 * @param  int $topicID Topic ID
	 * @return object          Database object
	 */
	public function get_topic_replies($topicID = 0) {
		$this->_table = 'forum_replies';
		return parent::get_many_by('topic', $topicID);
	}

	public function get_topic_forum($topicID = 0)
	{
		$this->_table = 'forum_topics';
		return parent::get_by('id', $topicID);
	}

	public function count_forum_topics($forumID = 0)
	{
		$this->db->where('forum', $forumID);
		return $this->db->count_all_results('forum_topics');
	}

	public function count_forum_posts($forumID = 0)
	{
		$this->db->select('*');
		$this->db->from('forum_forums');
		$this->db->join('forum_replies', 'forum_forums.id = forum_replies.topic');
		$this->db->where('forum_forums.id', 6);
		return $this->db->get()->num_rows();
	}

	public function count_topic_replies($topicID = 0)
	{
		$this->db->where('topic', $topicID);
		return $this->db->count_all_results('forum_replies');
	}

	public function get_last_post($topicID = 0)
	{
		$this->db->select_max('id');
		$this->db->from('forum_replies');
		$this->db->where('topic', $topicID);

		$postID = $this->db->get()->row()->id;
		if(isset($postID)) return $this->get_reply($postID);
		else return NULL;
		// If null: poster = autor
		
	}

	/**
	 * Moderators methods
	 */
	
	public function add_moderators($data, $forumID)
	{
		$this->delete_moderators($forumID);
		$mods = array();
		foreach($data as $userID)
		{
			$this->db->set('user', $userID);
			$this->db->set('forum', $forumID);
			$this->db->insert('forum_moderators'); 
		}
	}

	public function delete_moderators($id)
	{
		$this->_table = 'forum_moderators';
		return parent::delete_by(array('forum'=>$id));
	}

	public function get_moderators($forumID = 0)
	{
		$this->_table = 'forum_moderators';
		return parent::get_many_by('forum', $forumID);
	}

	public function is_moderator($userID, $forumID)
	{
		$this->db->select('*');
		$this->db->where('forum', $forumID);
		$moderators = $this->db->get('forum_moderators')->result_array();

		foreach($moderators as $mod)
		{
			if(in_array($userID, $mod)) return TRUE;
		}
		return FALSE;
	}

	public function update_views($table, $id)
	{
		$this->_table = $table;
		$total_views = parent::get($id)->views;
		$total_views++;
		parent::update($id, array('views' => $total_views));
	}

	public function count_views($id)
	{
		$this->_table = 'forum_topics';
		return parent::get($id)->views;
	}

	public function last_online()
	{
		$query = $this->db->query('SELECT * FROM users 
			WHERE TIMESTAMPDIFF(HOUR, FROM_UNIXTIME(last_login), NOW()) <= 1');
		return $query->result();
	}

}

/* End of file forums_m.php */
/* Location: .//C/wamp/www/cms/comet/modules/forums/models/forums_m.php */