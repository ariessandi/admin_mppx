<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas extends CI_Controller {

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
		$api_Fasilitas=$this->config->item('api_Fasilitas');
		$this->load->helper('rest_helper');
		$profile = get_http_request($api_Fasilitas);
		$data['profile'] = json_decode($profile, TRUE);

		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('listFasilitas',$data);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('tableFasilitas',$data);
	}	

	public function main($rolid)
	{
	   // if(!isset($this->session->userdata['id'])){$this->session->userdata['id']="";};
	   // if($this->session->userdata['id']==""){ 
	   //  redirect('/Login');
	   // }
		$api_Fasilitas=$this->config->item('api_Fasilitas');
		$this->load->helper('rest_helper');
		$profile = get_http_request($api_Fasilitas,$rolid);
		$data['profile'] = json_decode($profile, TRUE);

		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('listFasilitas',$data);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('tableFasilitas',$data);
	}	


	public function formFasilitas($rolid)
	{

		$api_Fasilitas=$this->config->item('api_Fasilitas');
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
				$url=$api_Fasilitas;
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
				redirect('/Fasilitas/main/'.$rolid);

		}
			// $this->load->view('mainHead');
			// $this->load->view('nav');
			// $this->load->view('formFasilitas');
			$this->load->view('headermain');
			$this->load->view('topbar');
			$this->load->view('sidebar');
			$this->load->view('Fasilitasadd');	
	}	


	public function editFasilitas($id,$rolid)
	{
		$api_Fasilitas=$this->config->item('api_Fasilitas');
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
			$profile = post_http_request($api_Fasilitas."/".$id,$data,$rolid);
			$profile = json_decode($profile, TRUE);
			redirect('/Fasilitas/main/'.$rolid);
		}else{
			$this->load->helper('rest_helper');
			$profile = get_http_request($api_Fasilitas."/".$id,$rolid);
			$data['profile'] = json_decode($profile, TRUE);
			// $this->load->view('mainHead');
			// $this->load->view('nav');
			// $this->load->view('formFasilitas',$data);
			$this->load->view('headermain');
			$this->load->view('topbar');
			$this->load->view('sidebar');
			$this->load->view('Fasilitasadd',$data);	
		}

	}	


	public function deleteFasilitas($id,$rolid)
	{
		$api_Fasilitas=$this->config->item('api_Fasilitas');
		$this->load->helper('rest_helper');
		$profile = del_http_request($api_Fasilitas."/".$id,$rolid);
		// ubah string JSON menjadi array
		$data['profile'] = json_decode($profile, TRUE);
		$this->load->view('mainHead');
		$this->load->view('nav');
		redirect('/Fasilitas/main/'.$rolid);
	}


}
