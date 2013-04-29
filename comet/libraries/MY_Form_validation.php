<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {
    public function __construct()
    {
        parent::__construct();
        $this->_error_prefix    = '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>';
        $this->_error_suffix    = '</div>';
    }
}

/* End of file MY_Form_validation.php */
/* Location: .//C/wamp/www/cms/comet/libraries/MY_Form_validation.php */