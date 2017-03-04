// Get the modal
var modal = document.getElementById('add-new-modal');

// Get the button that opens the modal
var btn = document.getElementById("add-new-modal-button");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
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
function Questionslist(){
    var data= [{"name": "whats your name?", "answer": "Eric"} ,{"name": "whats your last name?", "answer": "Palumbo"}  ];
    console.log(data) ;
    var output="";
    for(i=0; i< data.length; i++ ){
        output+="<li>" + "<h3>"+data[i].name + "</h3> answer: " + data[i].answer;
    }
    document.getElementById("Questionslist").innerHTML=output;
}
function Examslist(){
    var data= [{"name": "midterm", "average": "93"}, {"name": "final", "average": "99"}];
    console.log(data) ;
    var output="";
    for(i=0; i< data.length; i++ ){
        output+="<li>" 
        output+='<div class="tab-div">'
        output+= '<button id="add-new-modal-2" class="orange-button tab-right">Edit</button>';
        output+= "<h3>"+data[i].name + "</h3>";
        output+= " average: " + data[i].average;
        output+="</div>"
        output+="</li>"
    }
    document.getElementById("Examslist").innerHTML=output;
}
Questionslist();
Examslist();
getRequest('https://web.njit.edu/~ep85/CS490/get-student-page.php', function(data){ 
            var user=JSON.parse(data);
            console.log("GET REQUEST")
            console.log(user);
});

