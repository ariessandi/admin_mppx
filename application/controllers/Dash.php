<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		//$this->config->load('globals');
		
		$coremenu=$this->config->item('api_menu');

		// $arrku=$this->globals->nama_saya();

		// print_r($arrku);die;
		
	   if(!isset($this->session->userdata['id'])){$this->session->userdata['id']="";};
	   if($this->session->userdata['id']==""){ 
	    redirect('/Login');
	   }

		$this->load->helper('rest_helper');
		$profile = get_http_request($coremenu);
		// ubah string JSON menjadi array
		$data['profile'] = json_decode($profile, TRUE);
		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('listMain',$data);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('tabledash',$data);
	}
	

}
