<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	
	d4353a76-f84e-4507-a23a-124959c3f96b
	
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

		$btnlogin = $this->input->post('btnlogin');
		if($btnlogin=="LOGIN"){
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$this->load->helper('rest_helper');
			$data= array(
			    'email'  =>  $email,
			    'password'  =>  $password
			);

			$profile=array();
			$profile = post_http_request("http://localhost:8000/api/auth-coreuser/process",$data);
			$profile = json_decode($profile, TRUE);


			if(is_array($profile)==1){
				echo "login bner";
				//$list = get_http_request("http://localhost:8000/api/core-user/");
				// ubah string JSON menjadi array
				//$datalist= json_decode($list, TRUE);

				$arr=array(
					'id'=>$profile['id'],	
					'email'=>$profile['email'],
					'name'=>$profile['name'],
					'core_role_id'=>$profile['core_role_id']
				);
				$this->session->set_userdata($arr);
				

				redirect('/Dash');
			}else{
				echo "login salah";
				redirect('/Login');
			
			}

			

		}
		 // $this->load->view('formLogin');
		// $this->load->view('logintes');
		
$this->load->view('headermain');
			// $this->load->view('topbar');
			// $this->load->view('sidebar');		
		
		
		$this->load->view('logintes');
	}

	public function logout()
	{	
	    // $this->session->unset_userdata('id');
		$this->session->sess_destroy();
		// echo '<pre>';
		// print_r($this->session);
		redirect('/Login');

	}	
	

}
