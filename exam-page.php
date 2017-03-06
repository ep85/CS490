<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styles.css">
	<title>Exam Page</title>
</head>

<body>
	<?php include 'nav.php'; ?>
	<div class="container2">
		<h1>Welcome Student</h1>


		<div id="Questions" class="tabcontent show">
			<h3 class="tab-title">Questions</h3>
			


			<!-- Trigger/Open The Modal -->
			<button id="myBtn">Open Questions</button>

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
						<li><a href="#">Question #1</a></li>
						<li><a href="#">Question #2</a></li>
						<li><a href="#">Question #3</a></li>
						<li><a href="#">Question #4</a></li>
						</ul>
					</div>
					<div class="modal-footer">
						<h3></h3>
					</div>
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