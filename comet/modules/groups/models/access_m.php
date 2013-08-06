<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_m extends MY_Model {

	protected $_table = 'groups_access';

	public function insert_access_array($array, $groupID)
	{
		if(!empty($array))
		{
			$publicValues = array();
			if(array_key_exists('public', $array)) $publicValues = $array['public'];
			
			$adminValues = array();
			if(array_key_exists('admin', $array)) $adminValues = $array['admin'];

			parent::delete_by('group_id', $groupID);

			$modulesArray = array_unique(array_merge($publicValues, $adminValues));
			$dataArray = array();

			foreach ($modulesArray as $moduleID)
			{
				$ruleArray = array();

				$ruleArray['module_id'] = $moduleID;
				$ruleArray['group_id'] = $groupID;

				if(in_array($moduleID, $publicValues)) $ruleArray['public_rule'] = 'allow';
				else $ruleArray['public_rule'] = 'deny';

				if(in_array($moduleID, $adminValues)) $ruleArray['admin_rule'] = 'allow';
				else $ruleArray['admin_rule'] = 'deny';

				$dataArray[] = $ruleArray;
			}

			$this->db->insert_batch($this->_table, $dataArray);
		}
	}

}

/* End of file permissions_m.php */
/* Location: .//C/wamp/www/cms/comet/modules/groups/models/permissions_m.php */