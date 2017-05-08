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

$points= $_POST['points'];
$examID= $_POST['examID'];
$questionID= $_POST['questionID'];

$result = $conn->query("UPDATE `submitted_questions` SET `result`='$points' WHERE examID = '$examID' AND questionID= '$questionID' " );


echo json_encode($result); 
$conn->close();

?>  
