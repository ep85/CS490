var examID
window.onload = function () {
    var url = document.location.href,
        params = url.split('?')[1].split('&'),
        data = {}, tmp;
    for (var i = 0, l = params.length; i < l; i++) {
         tmp = params[i].split('=');
         data[tmp[0]] = tmp[1];
    }
    examID=data.id;
    document.getElementById("examID").value=examID;
    postAjax('https://web.njit.edu/~np358/get-exam-page.php', { exam: examID}, function(data){ 
    	var exams=JSON.parse(data);
    	console.log("GET REQUEST")
    	console.log(exams);
    	buildQuestions(exams)
	});
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
function buildQuestions(data){
	var output="";
	for(i=0;i<data.length;i++){
		output+='<input type="text" id="questionID" name="questons" class="hidden" value=" ' +data[i].questionID+  ' ">';
		output+='<h3>'+data[i].question+ '</h3>'
        output+="Point Value: "+ data[i].pointvalue + '<br>';
        output+="Enter Code below: "
		output+='<textarea class="answerArea" name="answers"></textarea>';
	}
	document.getElementById("questions").innerHTML=output;
}
function changeLoading1(){
    document.getElementById("loading1").className="fa fa-check fa-4x";
}
function changeLoading2(){
    document.getElementById("loading2").className="fa fa-check fa-4x";
}
function changeLoading3(){
    document.getElementById("loading3").className="fa fa-check fa-4x";
}
function changeLoading4(){
    document.getElementById("loading4").className="fa fa-check fa-6x";
}
function questionsToExamsSubmit(){
    document.getElementById("loading-modal").style.display="block";
    setTimeout( changeLoading1, 3000);
    setTimeout( changeLoading2, 5000);
    setTimeout( changeLoading3, 7000);
    console.log("HITTTT")
    var questionArr=[];
    var questions =document.getElementsByName("questons");
    var answers =document.getElementsByName("answers");
    var examID=document.getElementById("examID").value;
   // console.log(questions)
    //console.log(answers)
    for (var i=0; i < questions.length; i++){
        questionArr[i]={"QuestionID": questions[i].value, "Answer":answers[i].value};
    }
    questionArr=JSON.stringify(questionArr);
    
    var user = localStorage.getItem('user');
    user= JSON.parse(user);
    var exam=document.getElementById("examID").value
    postAjax('https://web.njit.edu/~np358/student-get-answer.php', { examID: exam,userID: user.id, questions: questionArr }, function(data){ 
            changeLoading4()
            window.location.href="student-page.php"
            
    });
    
}
