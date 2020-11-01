<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

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
	 d4353a76-f84e-4507-a23a-124959c3f96b
	 */

	public function index()
	{
		$rolid=$this->session->userdata['role_id'];
		//echo $rolid;die;
	   $api_banner=$this->config->item('api_banner');
	   if(!isset($this->session->userdata['id'])){$this->session->userdata['id']="";};
	   if($this->session->userdata['id']==""){ 
	    redirect('/Login');
	   }		
		$this->load->helper('rest_helper');
		$profile = get_http_request($api_banner,$rolid);
		$data['profile'] = json_decode($profile, TRUE);
		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('listBanner',$data);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('tablebanner',$data);
	}	



	public function main($rolid)
	{
		//$rolid=$this->session->userdata['role_id'];
		//echo $rolid;die;
	   $api_banner=$this->config->item('api_banner');
	   if(!isset($this->session->userdata['id'])){$this->session->userdata['id']="";};
	   if($this->session->userdata['id']==""){ 
	    redirect('/Login');
	   }		
		$this->load->helper('rest_helper');
		$profile = get_http_request($api_banner,$rolid);
		$data['profile'] = json_decode($profile, TRUE);
		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('listBanner',$data);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('tablebanner',$data);
	}	



	public function formBanner($rolid)
	{
		$api_banner=$this->config->item('api_banner');
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
				$url=$api_banner;
				$subject = $this->input->post('subject');
				$link = $this->input->post('link');
				$logo=$_FILES['image'];
				$publish = $this->input->post('publish');		

				$this->load->helper('rest_helper');
				$data= array(
					'image' =>'',
				    'subject'  =>  $subject,
				    'publish'  =>  $publish,
				    'link'  =>  $link

				);
				$profile = upload_http_request($url,$data,$logo,$rolid);
				$profile = json_decode($profile, TRUE);
				// echo '<pre>';
				// print_r($profile);die;
				redirect('/Banner/main/'.$rolid);

		}
			// $this->load->view('mainHead');
			// $this->load->view('nav');
			// $this->load->view('formBanner');
					$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('banneradd');
	}

	public function deleteBanner($id,$rolid)
	{
		$api_banner=$this->config->item('api_banner');
		$this->load->helper('rest_helper');
		$profile = del_http_request($api_banner."/".$id,$rolid);
		// ubah string JSON menjadi array
		$data['profile'] = json_decode($profile, TRUE);
		$this->load->view('mainHead');
		$this->load->view('nav');
		redirect('/Banner/main/'.$rolid);
	}	





}
