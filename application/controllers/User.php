<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

	public function index($id)
	{
		echo $id;die;
		$this->load->helper('rest_helper');
		$profile = get_http_request("http://localhost:8000/api/core-user/".$id);
		$data['profile'] = json_decode($profile, TRUE);
		$this->load->view('mainHead');
		$this->load->view('nav');
		$this->load->view('listUser',$data);
	}	

	public function listUser($id)
	{
		$this->load->helper('rest_helper');
		$profile = get_http_request("http://localhost:8000/api/core-user/".$id);
		$data['profile'] = json_decode($profile, TRUE);
		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('listUser',$data);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('tableuser',$data);
	}	


	public function formUsers()
	{
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
				$url="http://localhost:8000/api/core-user";
				$title = $this->input->post('title');
				$logo=$_FILES['image'];
				$publish = $this->input->post('publish');		

				$this->load->helper('rest_helper');
				$data= array(
					'image' =>'',
				    'title'  =>  $title,
				    'publish'  =>  $publish

				);
				$profile = upload_http_request($url,$data,$logo);
				$profile = json_decode($profile, TRUE);
				// echo '<pre>';
				// print_r($profile);die;
				redirect('/Gallery');

		}
			$this->load->view('mainHead');
			$this->load->view('nav');
			$this->load->view('formUser');
	}	





}
