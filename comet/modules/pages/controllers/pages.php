<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends Frontend_Controller {

	public function page($slug = '')
	{
		// Invalid slug
		if(empty($slug)) show_404();

		// We have slug, get page data
		$this->load->model('pages_m', 'page');
		$pageData = $this->page->get_by('slug', $slug);

		// But first check if slug exists
		if(empty($pageData)) show_404();

		// Check access rights
		if($pageData->access == 'registered' && !$this->ion_auth->logged_in()) show_404();
		if(($pageData->access == 'clan' && !$this->ion_auth->in_group('clan')) && !$this->ion_auth->is_admin()) show_404();
		
		// All is good, set custom layout if there is one
		if(!empty($pageData->layout)) $customLayout = $pageData->layout;
		else $customLayout = get_layout(__CLASS__);

		// Render page
		$this->template
			->set('data', $pageData)
			->set_layout($customLayout)
			->build('page.twig');
	}

}

/* End of file pages.php */
/* Location: comet/modules/pages/controllers/pages.php */