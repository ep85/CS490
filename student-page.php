<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Roto Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Student Page</title>
		<?php
        include 'student-navbar.php';
		?>
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<div class="container">

			<div id="Exams" class="tabcontent show">

				<div class="tab-div">
					<h3 class="tab-title">Exams</h3>

				</div>

				<div class="instructor-List" >
					<ul id="Questionslist"></ul>
				</div>
			</div>

			<div id="Exam-Results" class="tabcontent">
				<h3>Exam Results</h3>
				<div class="instructor-List tab-div" >

					<ul id="Examslist"></ul>
				</div>
			</div>

		</div>
		<?php
        include 'footer.php';
		?>
		<script type="text/javascript" src="js/student-main.js"></script>
	</body>
</html>