<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Backend_Controller {

	public function index()
	{
		$this->load->model('settings_m');
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('sitename', 'Site name', 'required|min_length[3]');
		$this->form_validation->set_rules('clanname', 'Clan name', 'required|min_length[3]');

		if($this->form_validation->run())
		{
			$data = array(
				'sitename' => $this->input->post('sitename'),
				'clanname' => $this->input->post('clanname'),
				'clantag' => $this->input->post('clantag'),
				'adminmail' => $this->input->post('adminmail'),
				'comments' => $this->input->post('comments'),
				'commentsdelay' => $this->input->post('commentdelay'),
				'closed' => $this->input->post('closed'),
				'date' => date('Y-m-d H:i:s')
			);

			$this->settings_m->update(1, $data);
			redirect('admin/settings');
		}

		$this->template
			->set('title', 'Site Settings')
			->set('data', $this->settings_m->get(1))
			->set('themes', $this->template->get_themes())
			->set('layouts', $this->template->get_theme_layouts('default'))
			->build('admin/main');
	}

	public function backup($uploads = 0)
	{
		$this->load->dbutil();
		$this->load->helper('file');
		$this->load->helper('download');

		// Get database name and set file name
		$dbName = $this->db->database;
		$backupName = 'backup_'.date('Y_m_d').'_'.$dbName.'.gz';

		// Backup configuration
		$prefs = array(
            'format'      => 'zip',
            'filename'    => $dbName.'.sql'
        );

		if ($this->dbutil->database_exists($dbName))
		{
			$backup =& $this->dbutil->backup($prefs);
			force_download($backupName, $backup); 
		}
	}

}