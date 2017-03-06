<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styles.css">
	<title>Teacher Page</title>
</head>

<body>
	<?php include 'nav.php'; ?>
	<div class="container2">
		<h1>TEACHER PAGE</h1>
		<div class="tab">
			<a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Questions')">Questions</a>
			<a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Exams')">Exams</a>
			<a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Students')">Students</a>
		</div>

		<div id="Questions" class="tabcontent show">
			<h3 class="tab-title">Questions</h3>
			<div class="tab-div">

				<button id="add-new-modal-button" class="blue-button tab-right">Add&nbsp;New</button>
			</div>
			
		    <div class="dropdown">
			    <button class="dropbtn">Available Questions</button>
					<div class="dropdown-content">
						<a href="#">Question #1</a>
						<a href="#">Question #2</a>
						<a href="#">Question #3</a>
						<a href="#">Question #4</a>
					</div>
			  </div>
		</div>

		<div id="Exams" class="tabcontent">
			<h3>Exams</h3>
			<p>Paris is the capital of France.</p>
			 <div class="dropdown">
			    <button class="dropbtn">Available Exams</button>
					<div class="dropdown-content">
						<a href="#">Midterm A</a>
						<a href="#">Midterm B</a>
						<a href="#">Final A</a>
						<a href="#">Final B</a>
					</div>
			  </div>
		</div>

		<div id="Students" class="tabcontent">
			<h3>Students</h3>
			<p>Tokyo is the capital of Japan.</p>
			<div class="stulist" id="Studentslist"></div>
		</div>

		<!-- The Modal -->
		<div id="add-new-modal" class="modal">

			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span class="close">&times;</span>
					<h2>Modal Header</h2>
				</div>
				<div class="modal-body">
					<div id="questionDivForm">
						<form id="Questionform">

							Question:<br>
							<textarea id="question"></textarea>
							<br> Answer:
							<br>
							<textarea id="answer"></textarea>
							<br>
							<?php
							if ( $success == "false" ) {
								echo '<p id="failedTXT"> Failed to Authenticate user DB</p>';
								$_SESSION[ 'success' ] = 'true';

							}
							?>
							<br>
							<div id="failTXT"></div>
							<br>
							<input type="button" value="Submit" id="submitButton" onclick="checkForm()">
						</form>
					</div>
				</div>

			</div>

		</div>
		<script type="text/javascript" src="main.js"></script>
	</div>
</body>

</html>