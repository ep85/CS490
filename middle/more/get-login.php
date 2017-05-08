<?php 
	$url = 'https://web.njit.edu/~ep85/CS490/login.php';
	$fields = array(
		'ucid' => urlencode($_POST["ucid"]),
		'password' => urlencode($_POST["password"]),
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
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
	
	//execute post
	$result = curl_exec($ch);

	//close connection
	curl_close($ch);
	
	echo $result;

	// // ****  FOR NJIT  **** //

	
	// $ch = curl_init();

	// $url= "https://cp4.njit.edu/cp/home/login";
	// //$url="https://www.njit.edu/cp/login.php";
	
	// $username = 'ep85';
	// $password = '824Qyb7m';
	
	// $fields = array(
	// 	'user' => urlencode($username),
	// 	'pass' => urlencode($password),
	// 	'uuid' => urlencode('0xACA021'),
	// );

	// foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	// rtrim($fields_string, '&');

	// curl_setopt($ch,CURLOPT_URL, $url);
	// curl_setopt($ch,CURLOPT_POST, count($fields));
	// curl_setopt($ch,CURLOPT_HEADER, false); 
	// curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


	// $server_output = curl_exec ($ch);
	// echo "hello" . $server_output;
	// //print_r(curl_getinfo($ch));
	// curl_close ($ch);

	// checkFail();

	// function checkFail() 
	// {
	// 	// echo "You are really a nice person, Have a nice time!";
		 
	// 	$arrSucc = array('success' => 'true');
	// 	$arrFail = array('fail' => 'false');

	// 	$ch = curl_init("https://cp4.njit.edu/cp/home/login");
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	$text = curl_exec($ch);
	// 	print_r(curl_getinfo($ch));
	// 	$test = strpos($ch, "Failed Login");
	// 	echo $test;
	// 	//echo $test;
	// 	if ($test===false) {
	// 	  //  echo json_encode($arrSucc);
	// 	 }
	// 	else {
	// 	   // echo json_encode($arrFail);
	// 	 }

	// }

 ?>