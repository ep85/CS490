
<?php
//
// A very simple PHP example that sends a HTTP POST to a remote site
//

$ch = curl_init();
  
$url= "https://cp4.njit.edu/cp/home/login";
//$url="https://www.njit.edu/cp/login.php";
$username = "ep85";
$password = "824Qyb7m";
	// user=UCID&pass=pass&uuid=0xACA021

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://cp4.njit.edu/cp/home/login");
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
	 	"user" => $username,
	 	"pass" => $password,
	 	"uuid" => "0xACA021"
	)));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($ch);
	$returned= curl_getinfo($ch);
	curl_close($ch);
	print_r($returned);
	if($returned['redirect_url'] == "https://cp4.njit.edu/cps/welcome/loginok.html"){
		echo json_encode(array("success" => "true"));
	}else{
		echo json_encode(array("success" => "false"));
	}
	
	
?>