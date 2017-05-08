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

$examID= $_POST['examID'];



$result = $conn->query("UPDATE `submitted_exams` SET `is_released`=1 WHERE examID = '$examID' " );


echo json_encode($result); 
$conn->close();

?>  
