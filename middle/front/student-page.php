<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Student Page</title>
        <h1>Welcome! </h1>

        <link rel="stylesheet" href="https://web.njit.edu/~np358/front/styles.css">
    </head>
    <body>

		<div class="tab">
			  <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Questions')">Questions</a>
			  <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Exams')">Exams</a>
			  <a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Students')">Students</a>
		</div>

		<div id="Questions" class="tabcontent show">
		  
		  <div class="tab-div">
		  	 <h3 class="tab-title">Questions</h3>
		  	 <button id="add-new-modal-button" class="blue-button tab-right">add new</button>
		  </div>
		  
		  	<div class="instructor-List" >
		  		<ul id="Questionslist">
		  		</ul>
		  	</div>
		</div>

		<div id="Exams" class="tabcontent">
		  <h3>Exams</h3>
		  <p>Paris is the capital of France.</p> 
		  <div class="instructor-List tab-div" >
		  		
		  		<ul id="Examslist">
		  		</ul>
		  </div>
		</div>

		<div id="Students" class="tabcontent">
		  <h3>Students</h3>
		  <p>Tokyo is the capital of Japan.</p>
		  <div class="stulist" id="Studentslist"></div>
		</div>
	





		<button id="toggle">TOGGLE</button>
		<div id="content">Scores not released yet</div>

		


		<p> </p>

		<!-- Trigger/Open The Modal -->
		<button id="myBtn">View results</button>

		<!-- The Modal -->
		<div id="myModal" class="modal">

		  <!-- Modal content -->
		  <div class="modal-content">
		    <span class="close">&times;</span>
		    <p>Exam results will be available when instructor releases scores</p>
		  </div>

		</div>


<script type="text/javascript" src="main.js"> </script>
<script modal(); > </script>
    </body>
</html>