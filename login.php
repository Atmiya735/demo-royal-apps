<?php 
include "config.php";
if(isset($_POST['flag']) && $_POST['flag'] == "yes"){
    $uname = $_POST['uname'];
    $ps = $_POST['psw'];
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://candidate-testing.api.royal-apps.io/api/v2/token',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>"{\"email\" : \"".$uname."\",\"password\":\"".$ps."\"}",
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response, true);
    if(isset($response['token_key'])){
        $_SESSION['user_info'] = $response['user'];
        $_SESSION['token'] = $response['token_key'];
        $_SESSION['ref_token'] = $response['refresh_token_key'];
        header("Location:listing.php");
    }
    else{
        header("Location:index.php?c=w");
    }
}
else{
    header("Location:index.php");
}
?>