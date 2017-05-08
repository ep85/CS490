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
$examID=$_POST['examID'];
$questions=json_decode($_POST['questions']);
$newar=[];
$result = $conn->query("DELETE FROM questionsTOexams where examID='$examID' " );
foreach( $questions as &$question ) {
    if($question->checked){
      $result = $conn->query("INSERT INTO questionsTOexams (`questionID`, `examID`) VALUES ('$question->questionID', '$examID')" );
    }
}
echo json_encode("DONE"); 
$conn->close();

?>  
