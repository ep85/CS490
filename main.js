function postAjax(url, data, success) {
	var params = typeof data == 'string' ? data : Object.keys(data).map(
		function (k) {
			return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
		}
	).join('&');

	var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
	xhr.open('POST', url);
	xhr.onreadystatechange = function () {
		if (xhr.readyState > 3 && xhr.status == 200) {
			success(xhr.responseText);
		}
	};
	xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.send(params);
	return xhr;
}

function checkForm() {
	var form = document.getElementById("loginForm");

	var UCID = form.ucid.value;
	var pass = form.password.value;

	if (UCID == "" || UCID.length > 6 || UCID.length == 0) {
		form.ucid.focus();
		document.getElementById("failTXT").innerHTML = '<p style="color:red">UCID is incorrect</p>';
	} else if (pass == "" || pass.length > 10 || pass.length == 0) {
		form.password.focus();
		document.getElementById("failTXT").innerHTML = '<p style="color:red">Password is incorrect</p>';
	} else {
		document.getElementById("failTXT").innerHTML = '';
		postAjax('https://web.njit.edu/~np358/get-login.php', {
			ucid: UCID,
			password: pass
		}, function (data) {
			//
			var user = JSON.parse(data);
			user = user.user;
			console.log(user);
			if (user.UCID == undefined || user.UCID == "") {
				document.getElementById("failTXT").innerHTML = '<p style="color:red">Username and Password incorrect</p>';
			} else if (user.isTeacher == 0) {
				//is a student
				window.location.href = "student-page.php";
			} else if (user.isTeacher == 1) {
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
