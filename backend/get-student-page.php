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
$exams=[];
$result = $conn->query("SELECT * FROM exams" );
 while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $examID=$row[id];
    $questArr=[];
    $get_questions= $conn->query("SELECT * FROM questions, questionsTOexams where questionsTOexams.examID = '$examID' and questions.id = questionsTOexams.questionID");	
    while($row2 = $get_questions->fetch_array(MYSQLI_ASSOC)) {
    	array_push($questArr,$row2);
    }
    $row["questions"]=$questArr;
    array_push($exams,$row);
 
 }
echo json_encode($exams); 
$conn->close();

?>  

