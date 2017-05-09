
function filterQuestions(){
    var e = document.getElementById("filterQues");
    var value = e.options[e.selectedIndex].value;
    console.log(value);
    var types=["ALL","Arithmetic","Strings","Loops","Conditionals","ArrayLists"];
    var ALL= document.getElementsByClassName("ALL");
    var selected= document.getElementsByClassName(value);
    if(value==types[0]){
        for(var i=0; i < ALL.length; i++){
            ALL[i].style.display="block"; 
        }
    }else{
        for(var y=0; y < ALL.length; y++){
           ALL[y].style.display="none"; 
        }
        for(var z=0; z < selected.length; z++){
           selected[z].style.display="block"; 
        }
    }
}



function getRequest(url, success) {
        var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
        xhr.open('GET', url);
        xhr.onreadystatechange = function() {
            if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }
        };
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send( null );
        return xhr;
    }
function postAjax(url, data, success) {
        var params = typeof data == 'string' ? data : Object.keys(data).map(
                function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
            ).join('&');
     
        var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
        xhr.open('POST', url);
        xhr.onreadystatechange = function() {
            if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }
        };
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(params);
        return xhr;
    }

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
} 
function Questionslist(data){
    //var data= [{"name": "whats your name?", "answer": "Eric"} ,{"name": "whats your last name?", "answer": "Palumbo"}  ];
    console.log(data) ;
    var output="";
    for(i=0; i< data.length; i++ ){
        output+='<li class="'+data[i].category+' ALL"  >' + "<h3>"+data[i].title + "</h3> <p><strong>Question</strong>: <br>" +  data[i].question + "</li>";
    }
    document.getElementById("Questionslist").innerHTML=output;
}
function Examslist(data){
   // var data= [{"name": "midterm", "average": "93"}, {"name": "final", "average": "99"}];
    console.log(data) ;
    var output="";
    for(i=0; i< data.length; i++ ){
        output+='<li><i class="fa fa-book" style="font-size:20px;color:red"></i>'; 
        // output+='<div class="tab-div">'
        
        output+='<i class="fa fa-clock-o" style="font-size:24px; float:right;margin-top:10px;"></i>'
        output+= '<button onclick="examClicked('+data[i].id+')" class="orange-button tab-right">Edit</button>';
        output+= '<button onclick="examPreview('+data[i].id+')" class="new-blue-button tab-right">Preivew</button>';
        output+='<h4>' + data[i].title + "</h4></li>";
        output+="</li>"
    }
    document.getElementById("Examslist").innerHTML=output;
}
function Resultslist(data){
    console.log(data)
    var output="";
    if(data== null || data.length==0){
        output+="<h2> No Exams to release</h2>";
    }
    for(i=0; i< data.length; i++ ){
        output+='<li id=release'+data[i].examID+'><i class="fa fa-book" style="font-size:20px;color:red"></i>'; 
        output+='<a >';
        output+='<i class="fa fa-list" style="font-size:24px; float:right;margin-top:10px;"></i>'
        output+= '<button onclick="releaseExam('+data[i].examID+')" class="orange-button tab-right">Release Grade</button>';
        output+= '<button onclick="examResultPreview('+data[i].examID+')" class="new-blue-button tab-right">Results/Edit</button>';
        output+='<h4>' + data[i].title + "</h4></a></li>";
        output+="</li>"
    }
    document.getElementById("Resultslist").innerHTML=output;
}
function releaseExam(id){
    console.log(id)
    var postdata={examID: id}
        postAjax('https://web.njit.edu/~np358/teacher-release-exam.php',  postdata , function(data){ 
            var data=JSON.parse(data);
            console.log("teacher submitted")
            console.log(data)
            var release='release'+id
            document.getElementById(release).style.display = 'none'; 
           // var output="<h2> No Exams to release</h2>";   
           // document.getElementById("Resultslist").innerHTML=output;
        });
}
function questionFormSubmit(){
    var form= document.getElementById("Questionform");
    var Formquestion= document.getElementById("Qquestion").value.replace(/'/g, "''");
    var Formtitle=document.getElementById("Qtitle").value.replace(/'/g, "''");
    var points=document.getElementById("pointvalue").value;
    var testcase1=document.getElementById("testcase1").value;
    var testcase2=document.getElementById("testcase2").value;
    var testcase3=document.getElementById("testcase3").value;
    var testcase4=document.getElementById("testcase4").value;
    var answer1=document.getElementById("answer1").value;
    var answer2=document.getElementById("answer2").value;
    var answer3=document.getElementById("answer3").value;
    var answer4=document.getElementById("answer4").value;
    var difficulty=document.getElementById("difficulty").value;
    var category=document.getElementById("category").value;
    if(Formquestion == "" || Formquestion.length < 3 || Formquestion.length == 0) {
        form.question.focus();
        document.getElementById("failTXT").innerHTML='<p style="color:red">Question is incorrect</p>';
    }else if(Formtitle == "" || Formtitle.length== 0 ){
        form.title.focus();
        document.getElementById("failTXT").innerHTML='<p style="color:red">Title is incorrect</p>';
    }else if(testcase1 == "" || testcase1.length==0){
        form.testcase1.focus();
        document.getElementById("failTXT").innerHTML='<p style="color:red">testcase1 is incorrect</p>';
    }
    else{
        document.getElementById("failTXT").innerHTML='';
        var postdata={title: Formtitle, diff:difficulty, cat:category, pointvalue: points,  question: Formquestion, test1:testcase1, test2: testcase2, test3:testcase3, test4:testcase4, ans1:answer1, ans2: answer2, ans3:answer3, ans4:answer4}
        console.log(postdata)
        postAjax('https://web.njit.edu/~np358/teacher-question-submitted.php',  postdata , function(data){ 
            var data=JSON.parse(data);
            console.log("teacher submitted")
            console.log(data)
            form.reset();
            Questmodal.style.display = "none";
            var output="<li>" + "<h3>"+data.title + "</h3> <p><strong>Question</strong>: <br>" +  data.question + "<br></p> </li>";
            document.getElementById("Questionslist").innerHTML=document.getElementById("Questionslist").innerHTML+output;
        });
    }
  }

function questionsToExamsSubmit(examid){
    var questionArr=[];
    var form=document.getElementById("examTOquestionsForm");
    var checks =document.getElementsByName("questionsTag");
    for (var i=0; i < checks.length; i++){
        questionArr[i]={"questionID":checks[i].value, "checked":checks[i].checked};
    }
    questionArr=JSON.stringify(questionArr);
    console.log(questionArr);
    var exam=document.getElementById("examID").value
    postAjax('https://web.njit.edu/~np358/teacher-post-questionsTOexams.php', { examID: exam, questions: questionArr }, function(data){ 
            Exammodal.style.display = "none";
    });

    
}

getRequest('https://web.njit.edu/~np358/teacher-get-all-exams.php', function(data){ 
            var data=JSON.parse(data);
            console.log("GET EXAMS")  
            Examslist(data);
});
getRequest('https://web.njit.edu/~np358/teacher-get-all-questions.php', function(data){ 
            var data=JSON.parse(data);
            console.log("GET QUESTIONS")  
            Questionslist(data);
});
getRequest('https://web.njit.edu/~np358/teacher-get-all-results.php', function(data){ 
            var data=JSON.parse(data);
            console.log("GET Results")  
            Resultslist(data);
});

/*
----------------------------------------------------------------------------------------
    Question modal
----------------------------------------------------------------------------------------
*/
var Questmodal = document.getElementById('add-new-question-modal');

// Get the button that opens the modal
var Questbtn = document.getElementById("add-new-question-modal-button");

// Get the <span> element that closes the modal
var Questspan =  document.getElementById("questionClose");

// When the user clicks the button, open the modal 
Questbtn.onclick = function() {
    Questmodal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
Questspan.onclick = function() {
    Questmodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == Questmodal) {
        Questmodal.style.display = "none";
    }
}
/*
----------------------------------------------------------------------------------------
    Exam modal
----------------------------------------------------------------------------------------
*/
var Exammodal = document.getElementById('exam-modal');
var Examspan = document.getElementById("examClose");

function examClicked(id){
    Exammodal.style.display = "block";
    postAjax('https://web.njit.edu/~np358/teacher-get-questionsTOexams.php', { examID: id }, function(data){ 
            var data=JSON.parse(data);
            console.log("GET QUESTIONS ATTACHED TO EXAMS")
            var output="";  
            for(i=0; i < data.length; i++){
                output+='<input type="checkbox" name="questionsTag" value="'+data[i].id+'"';
                if(data[i].checked){
                    output+=" checked >";
                }else{
                    output+=" >";
                }
                output+=data[i].title +"<br>";
            }
            document.getElementById("selectQuestions").innerHTML= output;
            document.getElementById("examID").value= id;
    });

}


// When the user clicks on <span> (x), close the modal
Examspan.onclick = function() {
    Exammodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == Exammodal) {
        Exammodal.style.display = "none";
    }
}
/*
----------------------------------------------------------------------------------------
    Exam RESULT VIEW
----------------------------------------------------------------------------------------
*/
function ExamResults(data){
    //var data= [{"id": 1, "name": "whats your name?", "answer": "Eric"} ,{ "id":2, "name": "whats your last name?", "answer": "Palumbo"}  ];
    console.log(data) ;
    var output="";
    for(i=0; i< data.length; i++ ){
        output+="<li>" + '<h3>'+data[i].title + "</h3> <p> Grade: "+ data[i].result+"/" + data[i].outof + "<br>Date "+ data[i].submitted+ " </p>";
        output+="<h3> Question Grades </h3>";
        output+="<ol>"
        for(z=0; z< data[i].questions.length; z++ ){
            output+="<li> <strong>Question</strong>"
            output+="<p>title: "+ data[i].questions[z].title + "</p>"
            output+="<p>question: <br>"+ data[i].questions[z].question + "</p>"
            output+="<p>result: "+ data[i].questions[z].result;
            output+="<br>difficuly: " + data[i].questions[z].difficulty 
            output+="<br>category: " + data[i].questions[z].category + " </p>" 
            /*
            output+="<br><p> submitted_answer: " + data[i].questions[z].submitted_answer 
            output+="<br>output1: " + data[i].questions[z].output1 
            output+="<br>output2: " + data[i].questions[z].output2  
            output+="<br>output3: " + data[i].questions[z].output3   
            output+="<br>output4: " + data[i].questions[z].output4 + " </p>" 
            */ 
            output+="</li>"
        }
        output+="</ol>"
        output+="</li>";
    }
    document.getElementById("Examslist").innerHTML=output;
}
var questionModal = document.getElementById('editQuestion-modal');
var questionSpan = document.getElementById("editQuestionClose");
function editResult(questionID, examID,result){
    document.getElementById('questionPoints').value=result
    document.getElementById('questID').value=questionID
    document.getElementById('EXID').value=examID
    questionModal.style.display = "block";
}
function editQuestionSubmitted(){
    var points=document.getElementById('questionPoints').value
    var quest=document.getElementById('questID').value
    var exam=document.getElementById('EXID').value

    postAjax('https://web.njit.edu/~ep85/CS490/edittedAQuestion.php', { points: points,questionID:quest, examID:exam }, function(data){ 
            console.log("RESULT UPDATED")
            console.log(data)
            examResultPreview(exam);
            questionModal.style.display = "none";
    });

}
// When the user clicks on <span> (x), close the modal
questionSpan.onclick = function() {
    questionModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == questionModal) {
        questionModal.style.display = "none";
    }
}
function PreviewResultQuestions(data){
    console.log(data)
    var question;
    var output="";
    output+="<h2>Exam: " + data[0].title+ "</h2>";
    output+="<p>Exam Score: " + data[0].examResult+ "<br>";
    output+="Exam Points Possible: " + data[0].examPossible+ "</p>";
    for(i=0;i<data[0].questions.length;i++){
        question=data[0].questions[i];
        output+='<input type="text" id="questionID" name="questons" class="hidden" value=" ' +question.id+  ' ">';
        output+="<h3>Question " + (i+1);
        output+='<button onclick="editResult('+question.id +','+ data[0].id+','+question.result+ ')" class="orange-button tab-right">Edit</button>';
        output+="</h3>";
        output+='<p>Title: '+question.title+ '<br>'
        output+='Result: '+question.result+ '<br>'
        output+='Question Value: '+question.pointvalue+ '</p>'
        output+='<p> Errors: '+question.result_text+ '</p>'
        output+='<p> Question: '+question.question+ '</p>'
    }
    document.getElementById("QuestionlistResultsPreview").innerHTML=output;
}
function clearPreviewResultQuestions(){
    var output="";
    document.getElementById("QuestionlistResultsPreview").innerHTML=output;
}

function examResultPreview(id){
    postAjax('https://web.njit.edu/~ep85/CS490/get-exam-results.php',{examID: id}, function(data){ 
        var exams=JSON.parse(data);
        console.log("GET RESULTS")
        //console.log(exams)
        PreviewResultQuestions(exams);
    });
    
}


/*
----------------------------------------------------------------------------------------
    Exam Preview
----------------------------------------------------------------------------------------
*/
function PreviewQuestions(data){
    var output="";
    for(i=0;i<data.length;i++){
        output+='<input type="text" id="questionID" name="questons" class="hidden" value=" ' +data[i].questionID+  ' ">';
        output+='<h3>'+data[i].question+ '</h3>'
        output+="Point Value: "+ data[i].pointvalue + '<br>';
        output+="Enter Code below:"
        output+='<textarea class="answerArea" name="answers"></textarea>';
    }
    document.getElementById("QuestionlistPreview").innerHTML=output;
}
function clearPreviewQuestions(){
    var output="";
    
    document.getElementById("QuestionlistPreview").innerHTML=output;
}

function examPreview(id){
    postAjax('https://web.njit.edu/~np358/get-exam-page.php', { exam: id}, function(data){ 
        var exams=JSON.parse(data);
        console.log("GET REQUEST")
        console.log(exams);
        PreviewQuestions(exams)
    });
    
}
