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
$examID=$_POST["examID"];
$questionID=$_POST["questionID"];
$userID=$_POST["userID"];
$result=$_POST["result"];
$result_text=$_POST["result_text"];
$pointvalue=$_POST["pointvalue"];
$output1=$_POST["output1"];
$output2=$_POST["output2"];
$output3=$_POST["output3"];
$output4=$_POST["output4"];
$submitted_answer=$_POST["submitted_answer"];

$result = $conn->query("INSERT INTO submitted_questions(`id`, `questionID`, `examID`, `userID`, `result`,`result_text`,`pointvalue`, `output1`, `output2`, `output3`, `output4`, `submitted_answer`) VALUES (NULL,'$questionID', '$examID', '$userID', '$result', '$result_text', '$pointvalue','$output1','$output2','$output3','$output4', '$submitted_answer')" );


$conn->close();
?>