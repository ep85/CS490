<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php 
    session_start();
    $success= $_SESSION['success'] ;
    
?>  
<div id="formid">
    <form action="process-login.php" method="post" id="loginForm">
      ucid:<br>
      <input type="text" name="ucid" value="" >
      <br>
      password:<br>
      <input type="password" name="password" value="" >
      <br>
      <?php
            if($success == "false"){
                echo '<p id="failedTXT"> Failed to Authenticate user DB</p>';
                $_SESSION['success']='true';
               
            }
        ?>
      <div id="failTXT"></div>
      <br>
      <input type="submit" value="Submit">
    </form> 
</div>



<script type="text/javascript" src="main.js"></script>







</body>
</html>
