<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

 <?php include 'nav.php'; ?>  
 <div class="container">
	<?php 
		session_start();
		$success= $_SESSION['success'] ;
	?>
	<div id="formid">
  		<h1> Login</h1>
	  <form  id="loginForm" >

		  UCID:<br>
		  <input type="text" name="ucid" value="" required>
		  <br>
		  Password:<br>
		  <input type="password" name="password" value="" required>
		  <br>
		  <?php
				if($success == "false"){
					echo '<p id="failedTXT"> Failed to Authenticate user DB</p>';
					$_SESSION['success']='true';
				}
			?>

		  <div id="failTXT"></div>
		  <br>
		  <input type="button" value="Submit" id="submitButton" onclick="checkForm()">
		</form> 
	</div>
 </div>


	<script type="text/javascript" src="main.js"></script>


</body>
</html>
