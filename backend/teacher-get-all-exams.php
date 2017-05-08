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
$questions=[];
$result = $conn->query("SELECT * FROM exams " );
 while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    array_push($questions,$row);
 
 }
echo json_encode($questions); 
$conn->close();

?>  
