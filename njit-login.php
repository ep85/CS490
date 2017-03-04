<?php

function checkFail() {
	echo "You are really a nice person, Have a nice time!";

	$ch = curl_init("https://cp4.njit.edu/cp/home/login");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$text = curl_exec($ch);
	$test = strpos($text, "Failed Login");
	
	if ($test==false)
	 {
	    echo "MADE IT WOOOOOO";
	 }
	else
	 {
	    echo "FAILED TO LOGIN bruh";
	 }

}

$ch = curl_init();

$url= "https://cp4.njit.edu/cp/home/login";
//$url="https://www.njit.edu/cp/login.php";

$username = 'np358';
$password = '123456p';

$fields = array(
	'user' => urlencode($username),
	'pass' => urlencode($password),
	'uuid' => urlencode('0xACA021'),
);

foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_HEADER, false); 
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$server_output = curl_exec ($ch);

echo "hello" . $server_output;
print_r(curl_getinfo($ch));

checkFail();
curl_close ($ch);
?>