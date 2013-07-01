<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wi_navigation extends Frontend_Controller {
	
	public function index()
	{
		$this->load->model('navigation/navigation_m');

		$this->navigation_m->order_by('sort');
		$query = $this->navigation_m->get_all();

		$links = array();
		foreach ($query as $key => $value)
		{
			$queryLink = $value->link;
			$type = $value->type;

			if($type == 'uri')
			{
				$this->load->model('modules/modules_m');
				$modules = $this->modules_m->list_modules(); // TODO: Cache this
				if(!in_array($queryLink, $modules)) $link = base_url().'page/'.$queryLink;
				else $link = base_url().$queryLink;
			}
			else $link = $queryLink;

			$links[$key]->name = $value->name;
			$links[$key]->link = $link;
		}

		return $this->template
			->set('links', $links)
			->load_view('../widgets/wi_navigation/views/main.twig');
	}

}