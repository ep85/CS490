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
    echo "Move to njit";
    echo " I NEED TO PASS!cwehcjrw";

    /* FOR my.njit.edu */


$url = 'https://www.njit.edu/cp/login.php';
 $fields = array(
     'userid' => urlencode("np358"),
     'cplogin' => urlencode("123456Np"),
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

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);


// ///////////


//  $url = 'http://www.njit.edu/cp/login.php';
//  $myvars = 'userid=' . $myvar1 . 'cplogin=' . $myvar2;

//  $ch = curl_init( $url );
//  curl_setopt( $ch, CURLOPT_POST, 1);
//  curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
//  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
//  curl_setopt( $ch, CURLOPT_HEADER, 0);
//  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

//  $response = curl_exec( $ch );

 ?>