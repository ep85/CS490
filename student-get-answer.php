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
$questionID=$_POST["questionID"];
$result = $conn->query("SELECT * FROM questions where id='$questionID' " );
 $row = $result->fetch_array(MYSQLI_ASSOC);
echo json_encode($row); 
$conn->close();

?>  
