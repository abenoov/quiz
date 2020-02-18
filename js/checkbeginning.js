function checkingBeginning(session_quiz_id){
	setInterval(function(){
		$.ajax({
			method: "GET",
			url: '../launch/checking.php?id='+session_quiz_id
		}).done(function(data){
			window.location.href = "http://localhost/quiz/playing.php?user="+data;
		});
	}, 3000);
}