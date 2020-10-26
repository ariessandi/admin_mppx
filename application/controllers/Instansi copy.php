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
		$this->load->helper('rest_helper');
		$profile = get_http_request("http://192.168.64.2:8000/api/instansi");
		// ubah string JSON menjadi array
		$data['profile'] = json_decode($profile, TRUE);
		$this->load->view('mainhead');
		$this->load->view('nav');
		$this->load->view('listInstansi',$data);
	}	

	public function formInstansifix()
	{
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
			$name = $this->input->post('name');
			$shortname = $this->input->post('shortname');	
			$url = "http://192.168.64.2:8000/api/instansi"; // request URL
			$fileName = $_FILES['logo']['name'];
			$filedata = $_FILES['logo']['tmp_name'];
			$filesize = $_FILES['logo']['size'];
			$type = $_FILES['logo']['type'];
			$tmp=$_FILES['logo']['tmp_name'];

			if ($filedata != '')
			{
				    $login='mppBukitTinggi';
				    $password='tomorrowNeverDies!';	
					//ini_set('display_errors', 1);
					$curl = curl_init();
					curl_setopt($curl, CURLOPT_URL, 'http://192.168.64.2:8000/api/instansi');
					curl_setopt($curl, CURLOPT_VERBOSE, 1);
					curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
					curl_setopt($curl, CURLOPT_POST, 1);
					curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
					curl_setopt($curl, CURLOPT_USERPWD, "$login:$password");
					curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($curl, CURLOPT_POST, true);
					curl_setopt(
					    $curl,
					    CURLOPT_POSTFIELDS,
					    array(
					      'logo' => curl_file_create($filedata, $type, $fileName),
					      'name'  => $name,
					      'shortname'  => $shortname,
					    ));

					// output the response
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					$result = curl_exec($curl);
					var_dump($result, curl_error($curl));

					unlink($tmp); // remove temp file

					curl_close($curl);

			//echo $errmsg;
			//die;

	/*
				$name = $this->input->post('name');
				$logo=$_FILES['logo'];
				$shortname = $this->input->post('shortname');		

				$this->load->helper('rest_helper');
				$data= array(
				    'name'  =>  $name,
				    'shortname'  =>  $shortname
				);
				$profile = upload_http_request("http://192.168.64.2:8000/api/instansi",$data,$logo);
				$profile = json_decode($profile, TRUE);

	*/

			}	
		}
			$this->load->view('mainHead');
			$this->load->view('nav');
			$this->load->view('formInstansi');
	}







	public function formInstansi()
	{
		$btnsubmit = $this->input->post('btnsubmit');
		if($btnsubmit=="SAVE"){
				$url="http://192.168.64.2:8000/api/instansi";
				$name = $this->input->post('name');
				$logo=$_FILES['logo'];
				$shortname = $this->input->post('shortname');		

				$this->load->helper('rest_helper');
				$data= array(
				    'name'  =>  $name,
				    'shortname'  =>  $shortname
				);
				$profile = upload_http_request($url,$data,$logo);
				$profile = json_decode($profile, TRUE);
				redirect('/Instansi');

		}
			$this->load->view('mainHead');
			$this->load->view('nav');
			$this->load->view('formInstansi');
	}	





}
