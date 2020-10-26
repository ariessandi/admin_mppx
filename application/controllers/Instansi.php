<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends CI_Controller {

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
		
		$this->load->helper('rest_helper');
		$profile = get_http_request("http://localhost:8000/api/instansi");
		$data['profile'] = json_decode($profile, TRUE);
		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('listInstansi',$data);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('tableinstansi',$data);
	}	




	public function formInstansi()
	{
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
				$url="http://localhost:8000/api/instansi";
				$name = $this->input->post('name');
				$logo=$_FILES['logo'];
				$shortname = $this->input->post('shortname');		

				$this->load->helper('rest_helper');
				$data= array(
					'logo' =>'',
				    'name'  =>  $name,
				    'shortname'  =>  $shortname
				);
				$profile = upload_http_request($url,$data,$logo);
				$profile = json_decode($profile, TRUE);
				redirect('/Instansi');

		}
			// $this->load->view('mainHead');
			// $this->load->view('nav');
			// $this->load->view('formInstansi');
			$this->load->view('headermain');
			$this->load->view('topbar');
			$this->load->view('sidebar');
			$this->load->view('instansiadd');	
	}	


	public function editInstansi($id)
	{
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
			$name = $this->input->post('name');
			$logo=$_FILES['logo'];
			$shortname = $this->input->post('shortname');		

			$this->load->helper('rest_helper');
			$data= array(
				'logo' =>'',
			    'name'  =>  $name,
			    'shortname'  =>  $shortname
			);
			$profile = post_http_request("http://localhost:8000/api/instansi/".$id,$data);
			$profile = json_decode($profile, TRUE);
			redirect('/CoreRole');
		}else{
			$this->load->helper('rest_helper');
			$profile = get_http_request("http://localhost:8000/api/instansi/".$id);
			$data['profile'] = json_decode($profile, TRUE);
			// $this->load->view('mainHead');
			// $this->load->view('nav');
			// $this->load->view('formInstansi',$data);
			$this->load->view('headermain');
			$this->load->view('topbar');
			$this->load->view('sidebar');
			$this->load->view('instansiadd',$data);	
		}

	}	


	public function deleteInstansi($id)
	{
		$this->load->helper('rest_helper');
		$profile = del_http_request("http://localhost:8000/api/instansi/".$id);
		// ubah string JSON menjadi array
		$data['profile'] = json_decode($profile, TRUE);
		$this->load->view('mainHead');
		$this->load->view('nav');
		redirect('/Instansi');
	}


}
