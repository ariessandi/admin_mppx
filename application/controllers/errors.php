<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// if(! defined('BASEPATH'));
// exit('No direct script access allowed');

class Errors extends CI_Controller {

	// public function __construct() {
		// parent::__construct();
		// $this->load->helper('url');
		// $this->load->view('error404');// loading view
	// }
	
	public function index() 
    { 
        $this->load->view('error404');// loading view
    } 
	
	public function page_missing() 
    { 
        $this->load->view('error404');// loading view
    } 	
	
}