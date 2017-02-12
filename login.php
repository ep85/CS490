<?php 
$username="ep85";
$password="p4Ywq0KjV";
$dbname="ep85";
$servername="sql.njit.edu";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$ucid= $_POST['ucid'];
$pass= $_POST['password'];
$sql = "SELECT * FROM users where UCID='$ucid' and password='$pass'";
$result = $conn->query($sql);
$newresult=$result->fetch_assoc();

if ($result->num_rows ==  1) {
     // output data of each row
		$fields = array(
			'success' => urlencode("true"),
		);
		//url-ify the data for the POST
} else {
     $fields = array(
			'success' => urlencode("false"),
		);
}
echo json_encode($fields);  
$conn->close();

?>  

