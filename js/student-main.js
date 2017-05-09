//tabs
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
function examPage(id){
        url = 'student-test.php?id=' + encodeURIComponent(id);
        document.location.href = url;
}

function Questionslist(data){
    //var data= [{"id": 1, "name": "whats your name?", "answer": "Eric"} ,{ "id":2, "name": "whats your last name?", "answer": "Palumbo"}  ];
    console.log(data) ;
    var output="";
    for(i=0; i< data.length; i++ ){
        output+='<li><i class="fa fa-book" style="font-size:20px;color:red"></i>';
        output+='<a href="javascript:;" onclick="examPage(';
        output+=data[i].id+')"><i class="fa fa-clock-o" style="font-size:24px; float:right;margin-top:10px;"></i><h4>'
        output+=data[i].title + "</h4></a></li>";
    }
    document.getElementById("Questionslist").innerHTML=output;
}
function ExamResults(data){
    //var data= [{"id": 1, "name": "whats your name?", "answer": "Eric"} ,{ "id":2, "name": "whats your last name?", "answer": "Palumbo"}  ];
    console.log("EXAM RESULTS")
    console.log(data) ;
    var output="";
    for(i=0; i< data.length; i++ ){
        output+="<li>" + '<h3>'+data[i].title + "</h3> <p> Grade: "+ data[i].examResult+"/" + data[i].examPossible + "<br>Date: "+ data[i].submitted+ " </p>";
        output+="<h3> Question Grades </h3>";
        output+="<ol>"
        for(z=0; z< data[i].questions.length; z++ ){
            output+="<li> <strong>Question</strong>"
            output+="<p>title: "+ data[i].questions[z].title + "</p>"
            output+="<p>question: <br>"+ data[i].questions[z].question + "</p>"
            output+="<p>result: "+ data[i].questions[z].result;
            output+="<br>points possible: " + data[i].questions[z].pointvalue; 
            output+="<br>difficuly: " + data[i].questions[z].difficulty;
            output+="<br>category: " + data[i].questions[z].category + " </p>" 
            output+="<p>Errors: " + data[i].questions[z].result_text + " </p>"
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

getRequest('https://web.njit.edu/~np358/get-student-page.php', function(data){ 
    var exams=JSON.parse(data);
    console.log("GET REQUEST")
    Questionslist(exams);
});
var user = localStorage.getItem('user');
user= JSON.parse(user);


postAjax('https://web.njit.edu/~np358/get-student-results.php',{userID: user.id}, function(data){ 
    var exams=JSON.parse(data);
    console.log("GET RESULTS")
    ExamResults(exams);
});

