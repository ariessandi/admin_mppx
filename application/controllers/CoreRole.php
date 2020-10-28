<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoreRole extends CI_Controller {

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
		$corerole=$this->config->item('api_role');
		$this->load->helper('rest_helper');
		$profile = get_http_request($corerole);
		$data['profile'] = json_decode($profile, TRUE);
		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('listRole',$data);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('tableadmin',$data);
	}	



	public function tablepro()
	{
		
		$corerole=$this->config->item('api_role');
		
     	$this->load->helper('rest_helper');
		$profile = get_http_request($corerole);
		// ubah string JSON menjadi array
		$data['profile'] = json_decode($profile, TRUE);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('tablepro');
	}

	public function tableadmin()
	{
		$corerole=$this->config->item('api_role');
     	$this->load->helper('rest_helper');
		$profile = get_http_request($corerole);
		// ubah string JSON menjadi array
		$data['profile'] = json_decode($profile, TRUE);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('tablepro');
	}	
	
	
	public function formadmin()
	{
		$corerole=$this->config->item('api_role');
     	$this->load->helper('rest_helper');
		$profile = get_http_request($corerole);
		// ubah string JSON menjadi array
		$data['profile'] = json_decode($profile, TRUE);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('formadd');
	}		
	
	public function formRole()
	{
		$corerole=$this->config->item('api_role');
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$parent = $this->input->post('parent');			
			$this->load->helper('rest_helper');
			$data= array(
			    'name'  =>  $name,
			    'description'  =>  $description,
			    'active'=>  1
			);

			$profile = post_http_request($corerole,$data);
			$profile = json_decode($profile, TRUE);
			redirect('/CoreRole');
		}	
		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('formRole');

		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('roleadd');
	}


	public function deleteRole($id)
	{
		$corerole=$this->config->item('api_role');
		$this->load->helper('rest_helper');
		$profile = del_http_request($corerole."/".$id);
		// ubah string JSON menjadi array  http://localhost/Codes/CoreRole/deleteRole/0b85fe11-468b-4d45-8a2d-f4ab6cf1654d
		$data['profile'] = json_decode($profile, TRUE);
		$this->load->view('mainHead');
		$this->load->view('nav');
		redirect('/CoreRole');
	}

	public function editRole($id)
	{  
		$corerole=$this->config->item('api_role');
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
			$name = $this->input->post('name');
			$description = $this->input->post('description');	
			$this->load->helper('rest_helper');
			$data= array(
			    'name'  =>  $name,
			    'description'  =>  $description,
			    'active'=>  1
			);
			$profile = post_http_request($corerole.$id,$data);
			$profile = json_decode($profile, TRUE);
			redirect('/CoreRole');
		}else{
			$this->load->helper('rest_helper');
			$profile = get_http_request($corerole.$id);
			$data['profile'] = json_decode($profile, TRUE);
			// $this->load->view('mainHead');
			// $this->load->view('nav');
			// $this->load->view('formRole',$data);
			$this->load->view('headermain');
			$this->load->view('topbar');
			$this->load->view('sidebar');
			$this->load->view('roleadd',$data);
		}
	}	

}
