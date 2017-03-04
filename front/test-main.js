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
		output+='<input type="text" id="questionID" class="hidden" value=" ' +data[i].questionID+  ' ">';
		output+='<h3>'+data[i].question+ '</h3>'
		output+='<textarea >Answer</textarea>';
	}
	document.getElementById("questions").innerHTML=output;
}

