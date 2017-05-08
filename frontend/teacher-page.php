<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Roto Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Teacher Page</title>
		<?php
        include 'teacher-navbar.php';
		?>
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<!-- <div class="tab">

		</div> -->

		<div id="Questions" class="tabcontent show">

			<div class="tab-div">
				<h3 class="tab-title">Questions</h3>
				<select class="tab-right" onchange="filterQuestions()" id="filterQues" style="width:120px; margin-right:120px">
				  <option value="ALL">ALL</option>
				  <option value="Arithmetic">Arithmetic</option>
				  <option value="Strings">Strings</option>
				  <option value="Loops">Loops</option>
				  <option value="Conditionals">Conditionals</option>
				  <option value="ArrayLists">ArrayLists</option>
				</select>
				<button id="add-new-question-modal-button" class="blue-button tab-right">
					add new
				</button>
			</div>
			<div class="instructor-List" >
				<ul id="Questionslist"></ul>
			</div>
		</div>

		<div id="Exams" class="tabcontent">
			<div class="tab-div">
				<h3 class="tab-title">Exams</h3>
				<p></p>
				<div class="instructor-List tab-div" >

					<ul id="Examslist"></ul>
				</div>
			</div>
			
			<!-- Exam Preview -->
			<div id="ExamPreview" class= "tab-div" >
                <div>
                	<p class="tab-title">Exam Preview</p>
                	<button onclick="clearPreviewQuestions()" class="clear-button tab-right">Clear</button>
            	</div>
                <ul id="QuestionlistPreview"></ul>
            </div>
		</div>

		<div id="Results" class="tabcontent">
			<div class="tab-div">
				<h3 class="tab-title">Results</h3>
				<p></p>
				<div class="instructor-List tab-div" >

					<ul id="Resultslist"></ul>
				</div>
			</div>
			<!-- Exam Preview -->
			<div id="ExamPreview" class= "tab-div" >
                <div>
                	<p class="tab-title">Show Results</p>
                	<button onclick="clearPreviewResultQuestions()" class="clear-button tab-right">Clear</button>
            	</div>
                <ul id="QuestionlistResultsPreview"></ul>
            </div>
		</div>

		<!-- Question Modal -->
		<div id="add-new-question-modal" class="modal">
			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span id="questionClose" class="close">&times;</span>
					<h2>Add a new Question</h2>
				</div>
				<div class="modal-body">
					<div id="questionDivForm">
						<form  id="Questionform" >
					      Title:<br>
					      <input type="text"  id="Qtitle" name="title" ></input>
					      Difficulty <br>
					      <select id="difficulty">
							  <option value="Easy" selected>Easy</option>
							  <option value="Medium">Medium</option>
							  <option value="Hard">Hard</option>
							</select>
						  Category <br>
					      <select id="category">
							  <option value="Arithmetic" selected>Arithmetic</option>
							  <option value="Strings">Strings</option>
							  <option value="Loops">Loops</option>
							  <option value="Conditionals">Conditionals</option>
							  <option value="ArrayList">ArrayList</option>
							</select>
					      Question:<br>
					      <textarea  id="Qquestion" name="question" ></textarea>
					      <br>
					      Point Value:<br>
					      <input id="pointvalue" name="pointvalue" type="number" > </input>
					      <br>
					      testcase1:<br>
					      <input id="testcase1" name="testcase1" type="text" > </input>
					      <br>
					      answer1:<br>
					      <input id="answer1" name="answer1" type="text" > </input>
					      <br>
					      testcase2:<br>
					      <input id="testcase2" name="testcase2" type="text" > </input>
					      <br>
					      answer2:<br>
					      <input id="answer2" name="answer2" type="text" > </input>
					      <br>
					      testcase3:<br>
					      <input id="testcase3" name="testcase3" type="text" > </input>
					      <br>
					      answer3:<br>
					      <input id="answer3" name="answer3" type="text" > </input>
					      <br>
					      testcase4:<br>
					      <input id="testcase4" name="testcase4" type="text" > </input>
					      <br>
					      answer4:<br>
					      <input id="answer4" name="answer4" type="text" > </input>
					      <br>
					      <div id="failTXT"></div>
					      <br>
					      <input type="button" value="Submit" id="submitButton" onclick="questionFormSubmit()">
					    </form> 
					</div>
				</div>
			</div>
		</div>

		<!-- Exam Modal -->
		<div id="exam-modal" class="modal">
			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span id="examClose" class="close">&times;</span>
					<h2>Add Questions to Exam </h2>
				</div>
				<div class="modal-body">
					<div id="examDivForm">
						<form  id="examTOquestionsForm" >
							<div id="selectQuestions"></div>
							<input class="hidden" id="examID">
							</input>
							<input type="button" value="Submit" id="submitButton" onclick="questionsToExamsSubmit()">
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Exam Modal -->
		<div id="editQuestion-modal" class="modal">
			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span id="editQuestionClose" class="close">&times;</span>
					<h2>Edit Points </h2>
				</div>
				<div class="modal-body">
					<div id="editQuestionFormDib">
						<form  id="editQuestionForm" >
							<label>
								Grade: 
								<input  id="questionPoints"></input>
							</label>
							<input class="hidden" id="questID"></input>
							<input class="hidden" id="EXID"></input>
							<input type="button" value="Submit" id="submitButton" onclick="editQuestionSubmitted()">
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
        include 'footer.php';
		?>
		<script type="text/javascript" src="js/teacher-main.js"></script>
	</body>

</html>