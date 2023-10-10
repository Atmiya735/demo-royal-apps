<?php 
include "config.php";
if(isset($_POST['delete_author']))
{
	$id = $_POST['id'];
	$curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://candidate-testing.api.royal-apps.io/api/v2/authors/'.$id,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer '.$_SESSION['token'].'',
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response, true);
    if(sizeof($response['books']) == 0){
		$curl = curl_init();
	    curl_setopt_array($curl, array(
	    CURLOPT_URL => 'https://candidate-testing.api.royal-apps.io/api/v2/authors/'.$id,
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_ENCODING => '',
	    CURLOPT_MAXREDIRS => 10,
	    CURLOPT_TIMEOUT => 0,
	    CURLOPT_FOLLOWLOCATION => true,
	    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	    CURLOPT_CUSTOMREQUEST => 'DELETE',
	    CURLOPT_HTTPHEADER => array(
	        'Content-Type: application/json',
	        'Authorization: Bearer '.$_SESSION['token'].'',
	    ),
	    ));
	    $response = curl_exec($curl);
	    curl_close($curl);
    	echo json_encode(array("status"=>"success"));
    	die;
    }
    else{
    	echo json_encode(array("status"=>"fail", "error"=>'Sorry the author have books.'));
		die;
    }
}
else if(isset($_POST['delete_book']))
{
	$id = $_POST['id'];
	$curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://candidate-testing.api.royal-apps.io/api/v2/books/'.$id,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'DELETE',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Bearer '.$_SESSION['token'].'',
    ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
	echo json_encode(array("status"=>"success"));
}
else if(isset($_POST['add_book'])){
	$author = $_POST['author'];
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$isbn = $_POST['isbn'];
	$formats = $_POST['formats'];
	$pages = $_POST['pages'];
	
	if($author == "" || $title == "" || $desc == "" || $isbn == "" || $formats == "" || $pages == ""){
		echo json_encode(array("status"=>"fail", "error"=>'Data missing please fill all details.'));
		die;
	}
	else{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://candidate-testing.api.royal-apps.io/api/v2/books",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\"author\": {\"id\": \"".$author."\"},\"title\": \"".$title."\",\"description\": \"".$desc."\",\"number_of_pages\": ".$pages.",\"isbn\": \"".$isbn."\",\"format\":\"".$formats."\"}",
		  CURLOPT_HTTPHEADER => array(
		        'Content-Type: application/json',
		        'Authorization: Bearer '.$_SESSION['token'].'',
		    ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		echo json_encode(array("status"=>"success"));
		die;
	}
}
?>