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
$examid= $_POST['exam'];
$questions=[];
$result = $conn->query("SELECT * FROM questions, questionsTOexams where questionsTOexams.questionID = questions.id and questionsTOexams.examID = '$examid' " );
 while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    array_push($questions,$row);
 
 }
echo json_encode($questions); 
$conn->close();

?>  
