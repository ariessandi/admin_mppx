<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('test_method'))
{
    function test_method($var = '')
    {
        return $var;
    }   

    function post_http_request($url,$data){
	    $login='mppBukitTinggi';
	    $password='tomorrowNeverDies!';
   
	    $ch = curl_init(); 
	    $datax=json_encode($data);
	    //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $datax);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, [
	      'Content-Type: application/json'
	    ]);


	    // set url 
	    curl_setopt($ch, CURLOPT_URL, $url);
	    
	    // set user agent 
	    /*   
	    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	    */
	    
	    // return the transfer as a string 
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	    curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");

	    // $output contains the output string 
	    $output = curl_exec($ch); 

	    // tutup curl 
	    curl_close($ch);      
	    // mengembalikan hasil curl
		

	    return $output;
	}


    function upload_http_request($url,$data,$locfile){
	    $login='mppBukitTinggi';
	    $password='tomorrowNeverDies!';


$fileName = $locfile['name'];	
$filedata = $locfile['tmp_name'];
$filesize = $locfile['size'];
$type = $locfile['type'];
$tmp=$locfile['tmp_name'];

$keys = array_keys($data);

// echo $keys[0];die;
$data[$keys[0]]=curl_file_create($filedata, $type, $fileName);

// echo '<pre>';
// print_r($data);die;

if ($filedata != '')
{
	    // $login='mppBukitTinggi';
	    // $password='tomorrowNeverDies!';	
		//ini_set('display_errors', 1);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_VERBOSE, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_USERPWD, "$login:$password");
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_POST, true);
		// curl_setopt(
		//     $curl,
		//     CURLOPT_POSTFIELDS,
		//     array(
		//       'logo' => curl_file_create($filedata, $type, $fileName),
		//       'name'  => $name,
		//       'shortname'  => $shortname,
		//     ));
		curl_setopt(
		    $curl,
		    CURLOPT_POSTFIELDS,
		    $data);
		// output the response
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		//var_dump($result, curl_error($curl));

		unlink($tmp); // remove temp file

		curl_close($curl);
	}
	}


	function get_http_request($url){
	    $login='mppBukitTinggi';
	    $password='tomorrowNeverDies!';
	    // persiapkan curl
		// echo $url;die;
		
	    $ch = curl_init(); 
	    // set url 
	    curl_setopt($ch, CURLOPT_URL, $url);
	    
	    // set user agent 
	    /*   
	    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	    */
        //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	    // return the transfer as a string 
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	    curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");

	    // $output contains the output string 
	    $output = curl_exec($ch); 

	    // tutup curl 
	    curl_close($ch);      

	    // mengembalikan hasil curl
	    return $output;
	}



	function del_http_request($url){
	    $login='mppBukitTinggi';
	    $password='tomorrowNeverDies!';
	    // persiapkan curl
	    $ch = curl_init(); 
	    // set url 
	    curl_setopt($ch, CURLOPT_URL, $url);
	    
	    // set user agent 
	    /*   
	    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	    */
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	    // return the transfer as a string 
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	    curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");

	    // $output contains the output string 
	    $output = curl_exec($ch); 

	    // tutup curl 
	    curl_close($ch);      

	    // mengembalikan hasil curl
	    return $output;
	}

}