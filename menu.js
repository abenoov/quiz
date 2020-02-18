function showModal(action) {
	if (action == 'show') {
		document.getElementById("modal").style.display = "flex";
	} else {
	 	document.getElementById("modal").style.display = "none";
	 }
}

function showModal1(action, id) {
	if (action == 'show') {
		getQuestions(id);
		document.getElementById("modal1").style.display = "flex";
		document.getElementById("question_id").value = id;
		console.log(id);
	} else {
	 	document.getElementById("modal1").style.display = "none";
	 }
}

function laucnchQuiz(){
	
}