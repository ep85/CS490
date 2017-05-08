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

$title= $_POST['title'];
$question= $_POST['question'];
$difficulty= $_POST['diff'];
$category= $_POST['cat'];
$pointvalue= $_POST['pointvalue'];
$testcase1= $_POST['test1'];
$testcase2= $_POST['test2'];
$testcase3= $_POST['test3'];
$testcase4= $_POST['test4'];
$answer1= $_POST['ans1'];
$answer2= $_POST['ans2'];
$answer3= $_POST['ans3'];
$answer4= $_POST['ans4'];


$result = $conn->query("INSERT INTO questions (`id`, `title`,`category`, `difficulty`,`pointvalue`, `question`, `testcase1`, `testcase2`, `testcase3`, `testcase4`,`answer1`, `answer2`, `answer3`, `answer4`) VALUES (NULL, '$title', '$category', '$difficulty', '$pointvalue', '$question' , '$testcase1', '$testcase2', '$testcase3', '$testcase4', '$answer1', '$answer2', '$answer3', '$answer4')" );
$newresult->title=$title;
$newresult->question=$question;
$newresult->difficulty=$difficulty;
$newresult->category=$category;
$newresult->pointvalue=$pointvalue;
$newresult->testcase1=$testcase1;
$newresult->testcase2=$testcase2;
$newresult->testcase3=$testcase3;
$newresult->testcase4=$testcase4;
$newresult->answer1=$answer1;
$newresult->answer2=$answer2;
$newresult->answer3=$answer3;
$newresult->answer4=$answer4;

echo json_encode($newresult); 
$conn->close();

?>  
