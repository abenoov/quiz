var m = $("#members");
var session_quiz_id;

function checking(){
	$.ajax({
		method: "GET",
		url: 'api/launch/get.php?id='+session_quiz_id
	}).done(function(data){
		data = JSON.parse(data);
		showMembers(data);
	});
}

function showMembers(member){
	var listHTML = "";
	for(var i=0;i<member.length;i++){
		listHTML+="<h1>"+member[i].user+"</h1>";
	}
	m.html(listHTML);
}

function setSessionQuiz_id(quiz_id){
	session_quiz_id = quiz_id;
	setInterval(function(){
		checking();
	}, 1000);
}