<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styles.css">
	<title>Student Page</title>
</head>

<body>
	<?php include 'nav.php'; ?>
	<div class="container2">
		<h1>Welcome Student</h1>

		<div id="Questions" class="tabcontent show">
			<h3 class="tab-title">Questions</h3>
			<div class="tab-div">
				<button id="add-new-modal-button" class="blue-button tab-right">Add&nbsp;New</button>
			</div>
			<div class="instructor-List">
				<ul id="Questionslist">
				</ul>
			</div>

			<!-- Trigger/Open The Modal -->
			<button id="myBtn">Open Modal</button>

			<!-- The Modal -->
			<div id="myModal" class="modal">

				<!-- Modal content -->
				<div class="modal-content">
					<div class="modal-header">
						<span class="close">&times;</span>
						<h2>Available Exams</h2>
					</div>
					<div class="modal-body">
						<ul>
						<li><a href="#">Midterm A</a></li>
						<li><a href="#">Midterm B</a></li>
						<li><a href="#">Final A</a></li>
						<li><a href="#">Final B</a></li>
						</ul>
					</div>
					<div class="modal-footer">
						<h3></h3>
					</div>
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


		<div><button id="toggle">TOGGLE</button>
		</div>
		<div id="content">Scores not released yet</div>


		<p> </p>

		<!-- Trigger/Open The Modal -->
		<div>
			<button id="myBtn">View results</button>
		</div>
		<!-- The Modal -->
		<div id="myModal" class="modal">

			<!-- Modal content -->
			<div class="modal-content">
				<span class="close">&times;</span>
				<p>Exam results will be available when instructor releases scores</p>
			</div>

		</div>

		<script type="text/javascript" src="main.js">
		</script>
		<script modal();>
		</script>
	</div>
</body>

</html>