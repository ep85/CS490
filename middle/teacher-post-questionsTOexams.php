<?php 
$url = 'https://web.njit.edu/~ep85/CS490/teacher-post-questionsTOexams.php';
	$fields = array(
		'examID' => urlencode($_POST["examID"]),
		'questions' => urlencode($_POST["questions"])

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
?>

