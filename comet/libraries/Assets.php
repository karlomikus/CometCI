<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assets
{
	protected $ci;

	public $assets_path;
	private $assets_group = array();

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->assets_path = base_url().'assets/';
	}

	public function build($group = '')
	{
		//print_r($this->assets_group);
		$i = 0;
		foreach ($this->assets_group as $group) {
			//echo $group[$i];
			$i++;
		}
	}

	public function css($file)
	{
		return $this->assets_path.'admin/css/'.$file.'.css';
	}

	public function js($file)
	{
		return $this->assets_path.'admin/js'.$file;
	}

	public function get_asset($file, $folder, $module, $theme)
	{
		//TODO
	}

	public function _add_to_group($asset, $group = 'default')
	{
		$this->assets_group[$asset][] = $group;
		return $this;
	}

}

/* End of file Assets.php */
/* Location: .//C/wamp/www/cms/comet/libraries/Assets.php */