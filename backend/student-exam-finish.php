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
$userID=$_POST["userID"];
$result=$_POST["result"];
$outof=$_POST["outof"];

$result = $conn->query("INSERT INTO submitted_exams (`id`, `examID`, `userID`, `result`, `outof`) VALUES (NULL, '$examID', '$userID', '$result', '$outof')" );


$conn->close();
?>