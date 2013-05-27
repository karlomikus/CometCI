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

	/**
	 * Add javascript assets from admin assets folder
	 * 
	 * @param  string $file   Javascript file without extension
	 * @param  string $folder Javascript folder
	 * @return string         Fully formatted HTML script tags
	 */
	public static function adminJs($file, $folder = 'js')
	{
		$assetPath = base_url().'assets/admin/'.$folder.'/'.$file;
		return '<script src="'.$assetPath.'.js"></script>';
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
}

/* End of file Assets.php */
/* Location: .//C/wamp/www/cms/comet/libraries/Assets.php */