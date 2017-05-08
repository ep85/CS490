<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
		<!-- Icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Student Test</title>
		<?php
        include 'student-test-navbar.php';
		?>
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<div class="container">

			<div id="Questions" class="tabcontent show">

				<form id="questionsForm" method="post">
					<input type="text" id="examID" class="hidden">
					<div id="questions"></div>

					<input type="button" value="Submit" id="testButton" onclick="questionsToExamsSubmit()">
				</form>

			</div>

		</div>

		<!-- Exam Modal -->
		<div id="loading-modal" class="modal">
			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span id="examClose" class="close">&times;</span>
					<h2 style="margin-left:43%">LOADING </h2>
				</div>
				<div class="modal-body" style="height:300px">
					<div class="row">
						<i 	id="loading4" style="margin-left:40%; margin-top:20px" class="fa fa-refresh fa-spin fa-6x fa-fw" aria-hidden="true"></i>
						<div style="margin-left:33%">
							<i  id="loading1" class="fa fa-refresh fa-spin fa-3x fa-fw" aria-hidden="true"></i><span style="font-size:22px">Compiling code</span><br>
							<i  id="loading2" class="fa fa-refresh fa-spin fa-3x fa-fw" aria-hidden="true"></i><span style="font-size:22px"> Running testcases</span><br>
							<i 	id="loading3" class="fa fa-refresh fa-spin fa-3x fa-fw" aria-hidden="true"></i><span style="font-size:22px"> Grading Exam </span><br>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
        include 'footer.php';
		?>
		<script type="text/javascript" src="js/test-main.js"></script>

	</body>
</html>
</body>
</html>