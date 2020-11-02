<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {

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
	   // if(!isset($this->session->userdata['id'])){$this->session->userdata['id']="";};
	   // if($this->session->userdata['id']==""){ 
	   //  redirect('/Login');
	   // }
		$api_Survey=$this->config->item('api_Survey');
		$this->load->helper('rest_helper');
		$profile = get_http_request($api_Survey);
		$data['profile'] = json_decode($profile, TRUE);

		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('listSurvey',$data);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('tableSurvey',$data);
	}	

	public function main($rolid)
	{
	   // if(!isset($this->session->userdata['id'])){$this->session->userdata['id']="";};
	   // if($this->session->userdata['id']==""){ 
	   //  redirect('/Login');
	   // }
		$api_Survey=$this->config->item('api_Survey');
		$this->load->helper('rest_helper');
		$profile = get_http_request($api_Survey,$rolid);
		$data['profile'] = json_decode($profile, TRUE);

		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('listSurvey',$data);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('tableSurvey',$data);
	}	


	public function formSurvey($rolid)
	{

		$api_Survey=$this->config->item('api_Survey');
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
				$url=$api_Survey;
				$name = $this->input->post('name');
				$location = $this->input->post('location');	
				$order = $this->input->post('order');	
				$active = $this->input->post('active');	
					

				$this->load->helper('rest_helper');
				$data= array(
				    'name'  =>  $name,
				    'location'  =>  $location,
					'order'  =>  $order,
					'active'  =>  $active
				);
				$profile = post_http_request($url,$data,$rolid);
				$profile = json_decode($profile, TRUE);
				redirect('/Survey/main/'.$rolid);

		}
			// $this->load->view('mainHead');
			// $this->load->view('nav');
			// $this->load->view('formSurvey');
			$this->load->view('headermain');
			$this->load->view('topbar');
			$this->load->view('sidebar');
			$this->load->view('Surveyadd');	
	}	


	public function editSurvey($id,$rolid)
	{
		$api_Survey=$this->config->item('api_Survey');
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
			$name = $this->input->post('name');
			$logo=$_FILES['logo'];
			$shortname = $this->input->post('shortname');	
			$address = $this->input->post('address');	
			$email = $this->input->post('email');	
			$telp = $this->input->post('telp');	
			$fax = $this->input->post('fax');	
			$tracking_url = $this->input->post('trurl');	
			$website = $this->input->post('website');	

			$this->load->helper('rest_helper');
			$data= array(
			    'id' => $id,
			    'name'  =>  $name,
			    'shortname'  =>  $shortname,
				'address'  =>  $address,
				'email'  =>  $email,
				'telp'  =>  $telp,
				'fax'  =>  $fax,
				'tracking_url'  =>  $tracking_url,
				'website'  =>  $website
			);
			$profile = post_http_request($api_Survey."/".$id,$data,$rolid);
			$profile = json_decode($profile, TRUE);
			redirect('/Survey/main/'.$rolid);
		}else{
			$this->load->helper('rest_helper');
			$profile = get_http_request($api_Survey."/".$id,$rolid);
			$data['profile'] = json_decode($profile, TRUE);
			// $this->load->view('mainHead');
			// $this->load->view('nav');
			// $this->load->view('formSurvey',$data);
			$this->load->view('headermain');
			$this->load->view('topbar');
			$this->load->view('sidebar');
			$this->load->view('Surveyadd',$data);	
		}

	}	


	public function deleteSurvey($id,$rolid)
	{
		$api_Survey=$this->config->item('api_Survey');
		$this->load->helper('rest_helper');
		$profile = del_http_request($api_Survey."/".$id,$rolid);
		// ubah string JSON menjadi array
		$data['profile'] = json_decode($profile, TRUE);
		$this->load->view('mainHead');
		$this->load->view('nav');
		redirect('/Survey/main/'.$rolid);
	}


}
