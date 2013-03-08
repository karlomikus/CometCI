<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions_m extends MY_Model {

	protected $primary_key = 'permissionID';

	public function listModules($permissionID) {

		$permission = parent::get($permissionID);
		$permission = unserialize($permission->allow);

		return $permission;
	}

}