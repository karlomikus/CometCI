<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forums extends Frontend_Controller {

	function __construct() {
		parent::__construct();
		$this->template
			->set('logged_in', $this->ion_auth->logged_in());
	}

	/**
	 * Lists all available forums,
	 * grouped by label
	 */
	public function index()
	{
		$this->load->model('forums_m');
		$this->load->helper('forum');
		$this->parser->addFunction('count_topics');
		$this->parser->addFunction('count_replies_in_forum');

		$data = array();
		$active_labels = $this->forums_m->get_active_forum_labels();
		foreach ($active_labels as $label) {
			$data[$label] = $this->forums_m->get_many_by('label', $label);
		}

		$this->template
			->set('data', $data)
			->build('main.twig');
	}

	/**
	 * Lists all topics in given forum
	 * @param  integer $id Forum ID
	 */
	public function forum($id = 0)
	{
		$this->load->model('forums_m');
		$this->load->helper('forum');
		$this->parser->addFunction('count_replies');
		$this->parser->addFunction('get_last_post_in_topic');

		$this->forums_m->order_by('sticky', 'DESC');

		$this->template
			->set('data', $this->forums_m->get_forum_topics($id))
			->set('forumID', $id)
			->build('topics.twig');
	}

	/**
	 * Shows forum topic with all replies,
	 * first post is the original post
	 * @param  integer $id Topic ID
	 */
	public function topic($id = 0)
	{
		$this->load->model('forums_m');

		$data_op = $this->forums_m->get_topic($id); // Original post
		$data = $this->forums_m->get_topic_replies($id); // Replies

		$this->template
			->set('original_post', $data_op)
			->set('data', $data)
			->build('topic.twig');
	}

	/**
	 * Creates new topic in given forum
	 * @param  integer $forumID Forum ID
	 */
	public function newtopic($forumID = 0)
	{
		$this->load->library('form_validation');
		$this->load->model('forums_m');
		$this->parser->addFunction('validation_errors');

		$this->form_validation->set_rules('title', 'Topic title', 'required');
		$this->form_validation->set_rules('content', 'Topic content', 'required');

		if($this->form_validation->run())
		{
			$data = array(
				'forum' => $forumID,
				'author' => $this->user->user_id,
				'title' => $this->input->post('title'),
				'date' => date('Y-m-d H:i:s'),
				'sticky' => $this->input->post('sticky'),
				'content' => $this->input->post('content')
			);

			$this->forums_m->insert_topic($data);
			redirect('forums/forum/'.$forumID);
		}
		else
		{
			$this->template
				->set('forumID', $forumID)
				->build('new-topic.twig');
		}
	}

	public function deletetopic($topicID = 0)
	{
		// Check if admin or moderator
		// Check for csfr
		// Delete topic
	}

	public function locktopic($topicID = 0)
	{
		// TODO
	}

	public function newreply($topicID = 0)
	{
		$this->load->library('form_validation');
		$this->load->model('forums_m');
		$this->parser->addFunction('validation_errors');

		$this->form_validation->set_rules('content', 'Reply content', 'required');

		if($this->form_validation->run())
		{
			$data = array(
				'topic' => $topicID,
				'poster' => $this->user->user_id,
				'date' => date('Y-m-d H:i:s'),
				'content' => $this->input->post('content')
			);

			$this->forums_m->insert_reply($data);
			redirect('forums/topic/'.$topicID);
		}
		else
		{
			$this->template
				->set('topicID', $topicID)
				->build('new-reply.twig');
		}
	}

}

/* End of file forums.php */
/* Location: .//C/wamp/www/cms/comet/modules/forums/controllers/forums.php */