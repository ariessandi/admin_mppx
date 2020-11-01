<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

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
		
		$api_gallery=$this->config->item('api_gallery');
		$this->load->helper('rest_helper');
		$profile = get_http_request($api_gallery);
		$data['profile'] = json_decode($profile, TRUE);
		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('listGallery',$data);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('tablegallery',$data);
	}	

	public function main($rolid)
	{

	   if(!isset($this->session->userdata['id'])){$this->session->userdata['id']="";};
	   if($this->session->userdata['id']==""){ 
	    redirect('/Login');
	   }
		
		$api_gallery=$this->config->item('api_gallery');
		$this->load->helper('rest_helper');
		$profile = get_http_request($api_gallery,$rolid);
		$data['profile'] = json_decode($profile, TRUE);
		// $this->load->view('mainHead');
		// $this->load->view('nav');
		// $this->load->view('listGallery',$data);
		$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('tablegallery',$data);
	}	


	public function formGallery($rolid)
	{
		$api_gallery=$this->config->item('api_gallery');
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
				$url=$api_gallery;
				$title = $this->input->post('title');
				$logo=$_FILES['image'];
				$publish = $this->input->post('publish');		

				$this->load->helper('rest_helper');
				$data= array(
					'image' =>'',
				    'title'  =>  $title,
				    'publish'  =>  $publish

				);
				$profile = upload_http_request($url,$data,$logo,$rolid);
				$profile = json_decode($profile, TRUE);
				// echo '<pre>';
				// print_r($profile);die;
				redirect('/Gallery/main/'.$rolid);

		}
			// $this->load->view('mainHead');
			// $this->load->view('nav');
			// $this->load->view('formGallery');
					$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('galleryadd');
	}	


	public function editGallery($id,$rolid)
	{
		$api_gallery=$this->config->item('api_gallery');
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
			$title = $this->input->post('title');
			$logo=$_FILES['image'];
			$publish = $this->input->post('publish');		

			$this->load->helper('rest_helper');
			$data= array(
				'image' =>'',
			    'title'  =>  $title,
			    'publish'  =>  $publish

			);
			$profile = upload_http_request($api_gallery."/".$id,$data,$logo,$rolid);
			$profile = json_decode($profile, TRUE);
			redirect('/Gallery/main/'.$rolid);
		}else{
			$this->load->helper('rest_helper');
			$profile = get_http_request($api_gallery."/".$id,$rolid);
			$data['profile'] = json_decode($profile, TRUE);
			// $this->load->view('mainHead');
			// $this->load->view('nav');
			// $this->load->view('formGallery',$data);
					$this->load->view('headermain');
		$this->load->view('topbar');
		$this->load->view('sidebar');
		$this->load->view('galleryadd',$data);
		}

	}	

    public function deleteGallery($id,$rolid)
	{
		$api_gallery=$this->config->item('api_gallery');
		$this->load->helper('rest_helper');
		$profile = del_http_request($api_gallery."/".$id,$rolid);
		// ubah string JSON menjadi array
		$data['profile'] = json_decode($profile, TRUE);
		$this->load->view('mainHead');
		$this->load->view('nav');
		redirect('/Gallery/main/'.$rolid);
	}




}
