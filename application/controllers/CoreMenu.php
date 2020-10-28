<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coremenu extends CI_Controller {

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
 
	public function index()
	{
	   
	   if(!isset($this->session->userdata['id'])){$this->session->userdata['id']="";};
	   if($this->session->userdata['id']==""){ 
	    redirect('/Login');
	   }
	    
		$coremenu=$this->config->item('api_menu');
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
		$this->load->view('tablemenu',$data);
		
	}	

	public function deleteMain($id)
	{
		$coremenu=$this->config->item('api_menu');
		$this->load->helper('rest_helper');
		$profile = del_http_request($coremenu."/".$id);
		// ubah string JSON menjadi array
		$data['profile'] = json_decode($profile, TRUE);
		$this->load->view('mainHead');
		$this->load->view('nav');
		redirect('/CoreMenu');
	}

	public function formMenu()
	{
		$coremenu=$this->config->item('api_menu');
		$name = $this->input->post('name');
		$text = $this->input->post('text');
		$help = $this->input->post('help');
		$icon = $this->input->post('icon');
		$path = $this->input->post('path');
		$parent = $this->input->post('parent');
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
			$this->load->helper('rest_helper');
			$data= array(
			    'name'  =>  $name,
			    'text'  =>  $text,
			    'help'  =>  $help,
			    'icon'  =>  $icon,
			    'path'  =>  $path,
			    'parent'=>  null,
			    'active'=>  1
			);

			$profile = post_http_request($coremenu,$data);
			$profile = json_decode($profile, TRUE);

			redirect('/CoreMenu');
		}	
		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('formMain');
					$this->load->view('headermain');
			$this->load->view('topbar');
			$this->load->view('sidebar');
			$this->load->view('menuadd');
	}	


	public function editMain($id)
	{  
		$coremenu=$this->config->item('api_menu');
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
			$name = $this->input->post('name');
			$text = $this->input->post('text');
			$help = $this->input->post('help');
			$icon = $this->input->post('icon');
			$path = $this->input->post('path');
			$parent = $this->input->post('parent');
			$this->load->helper('rest_helper');
			$data= array(
			    'name'  =>  $name,
			    'text'  =>  $text,
			    'help'  =>  $help,
			    'icon'  =>  $icon,
			    'path'  =>  $path,
			    'parent'=>  null,
			    'active'=>  1
			);

			$profile = post_http_request($coremenu."/".$id,$data);
			$profile = json_decode($profile, TRUE);

			// echo '<pre>';
			// print_r($profile);	
			redirect('/CoreMenu');
		}else{


		$this->load->helper('rest_helper');
		$profile = get_http_request($coremenu."/".$id);
		// ubah string JSON menjadi array
		$data['profile'] = json_decode($profile, TRUE);
		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('formMain',$data);
			$this->load->view('headermain');
			$this->load->view('topbar');
			$this->load->view('sidebar');
			$this->load->view('menuadd',$data);		
		}
	}		

}
