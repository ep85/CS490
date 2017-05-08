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
$questions=[];
$result = $conn->query("SELECT * FROM questions" );
while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $questionID= $row['id'];
    $result2 = $conn->query("SELECT * FROM questionsTOexams where examID = '$examID' and questionID = '$questionID' " );
    $row2=$result2->fetch_array(MYSQLI_ASSOC);
    if(isset($row2)){
   		 $row['checked']=true;
   	}else{
   		 $row['checked']=false;
   	}
   	array_push($questions,$row);
}

echo json_encode($questions); 
$conn->close();

?>  
