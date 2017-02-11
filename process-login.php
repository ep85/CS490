<?php
session_start();

$url = 'https://web.njit.edu/~np358/get-login.php';
$fields = array(
    'ucid' => urlencode($_POST['ucid']),
    'password' => urlencode($_POST['password']),
);

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');
 
//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

$json = json_decode($result);
$success=$json->success;
if($success == "true"){
    header("Location: success.php");
}else{
    $_SESSION['success']=false;
    header("Location: login.php");
}
//gets response from DB success = true or false

?>