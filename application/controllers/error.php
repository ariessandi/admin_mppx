<?php
if(! defined('BASEPATH'));
exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this->load->helper('url');
	}
	
	public function index() 
    { 
        //$this->output->set_status_header('404'); 
        //$data['content'] = 'error_404'; // Let View name 
        $this->load->view('error');// loading view
    } 
	
}