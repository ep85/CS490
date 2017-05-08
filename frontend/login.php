<!DOCTYPE html>
<html>

	<head>
		<link rel="stylesheet" href="css/styles.css">
		<!-- Roboto Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
		<!-- Icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Login</title>
		<?php
        include 'login-navbar.php';
		?>
	</head>

	<body>
		<div class="container">
			<?php
            session_start();
            $success = $_SESSION['success'];
			?>
			<div id="formid">
				<h1>Login</h1>
				<form id="loginForm">
					UCID:
					<br>
					<input type="text" name="ucid" value="" required>
					<br>
					Password:
					<br>
					<input type="password" name="password" value="" required>
					<br>
					<?php
                    if ($success == "false") {
                        echo '<p id="failedTXT"> Failed to Authenticate user DB</p>';
                        $_SESSION['success'] = 'true';
                    }
					?>
					<div class="message" id="failTXT"></div>
					<br>
					<input type="button" value="Submit" id="submitButton" onclick="checkForm()">
				</form>
			</div>
			
			
			
			
			<div class="credentials">
			<h3>CS-490 Spring 2017</h3>
        
        <p> Eric Palumbo &bull; Back End </p>
        <p> Nishant Patel &bull; Middle</p>
        <p> Gustavo Buitrago &bull; Front End</p>
        
        </div>
        
		</div>
		<!-- <?php
        include 'footer.php';
		?> -->
		<script type="text/javascript" src="js/main.js"></script>
	</body>
</html>
