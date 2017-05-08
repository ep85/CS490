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

function Questionslist(){
    var data= [{"id": 1, "name": "whats your name?", "answer": "Eric"} ,{ "id":2, "name": "whats your last name?", "answer": "Palumbo"}  ];
    console.log(data) ;
    var output="";
    for(i=0; i< data.length; i++ ){
        output+="<li>" + '<a href="javascript:;" onclick="examPage('+data[i].id+')"><h3>'+data[i].name + "</h3> answer: " + data[i].answer;
    }
    document.getElementById("Questionslist").innerHTML=output;
}
Questionslist();

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

function checkForm()
  {
 	var form= document.getElementById("loginForm");

  	var UCID= form.ucid.value;
  	var pass=form.password.value;
  	
    if(UCID == "" || UCID.length >6 || UCID.length == 0) {
      form.ucid.focus();
      document.getElementById("failTXT").innerHTML='<p style="color:red">UCID is incorrect</p>';
    }
    else if(pass == "" || pass.length >10 || pass.length ==0) {
      form.password.focus();
      document.getElementById("failTXT").innerHTML='<p style="color:red">Password is incorrect</p>';
    }else{
    	document.getElementById("failTXT").innerHTML='';
    	postAjax('https://web.njit.edu/~np358/get-login.php', { ucid: UCID, password: pass }, function(data){ 
    		//
    		var user=JSON.parse(data);
    		user=user.user;
    		console.log(user);
    		if(user.UCID==undefined || user.UCID==""){
    			document.getElementById("failTXT").innerHTML='<p style="color:red">Username and Password incorrect</p>';
    		}else if(user.isTeacher==0){
    			//is a student
    			 window.location.href = "student-page.php";
    		}else if(user.isTeacher==1){
    			//is a teacher
    			 window.location.href = "teacher-page.php";
    		}

		});
    }
  }

       // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
      }


var toggle  = document.getElementById("toggle");
var content = document.getElementById("content");

toggle.addEventListener("click", function(){
  content.classList.toggle("appear");
}, false);


function myFunction() {
    var toggle  = document.getElementById("toggle");
    var content = document.getElementById("content");

    toggle.addEventListener("click", function(){
      content.style.display = (content.dataset.toggled ^= 1) ? "block" : "none";
    }, false);
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
    console.log(exams);
});

