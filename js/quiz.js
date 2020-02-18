var quizes = $("#quizes");
var questions = $("#questions");

function getQuizes(){
	$.ajax({
		method: "GET",
		url: 'api/quiz/get.php'
	}).done(function(data){
		data = JSON.parse(data);
		showQuizes(data);
	});
}

getQuizes();

function showQuizes(quiz){
	var listHTML = "";
	for(var i=0;i<quiz.length;i++){
		listHTML+="<form method='GET' onclick=showModal1('show',"+quiz[i].id+") action='/quiz/api/launch/launch.php'>"+
					"<h3>"+quiz[i].name       +"</h3>"+
					"<p>" +quiz[i].description+"</p>" +
					"<input type='hidden' name='id' value='"+quiz[i].id+"'>"+
					"<button>Launch QUIZ</button>"+
				  "</form>";
	}
	quizes.html(listHTML);
}

function addQuiz(e){
	e.preventDefault();

	var quiz_name = $("#quiz_name").val();
	var quiz_description = $("#quiz_description").val();

	$.ajax({
		method: "POST",
		url: 'api/quiz/save.php',
		data: {
			name: quiz_name,
			description: quiz_description
		}
	}).done(function(data){
		showModal();
		getQuizes();
	}).fail(function(err){
		console.log(err);
	});

}


function addQuestions(e){
	e.preventDefault();

	var quiz_id = $("#question_id").val();
	var q_name = $("#question").val();
	var a1 = $("#answer1").val();
	var a2 = $("#answer2").val();
	var a3 = $("#answer3").val();
	var a4 = $("#answer4").val();

	$.ajax({
		method: "POST",
		url: 'api/questions/save.php',
		data: {
			id: quiz_id,
			question: q_name,
			a1: a1,
			a2: a2,
			a3: a3,
			a4: a4
		}
	}).done(function(data){
		getQuestions(quiz_id);
	}).fail(function(err){
		console.log(err);
	});

}

function getQuestions(quiz_id){
	$.ajax({
		method: "GET",
		url: 'api/questions/get.php?quiz='+quiz_id
	}).done(function(data){
		data = JSON.parse(data);
		showQuestions(data);
	});
}

function showQuestions(questions_array){
	var listHTML = "";
	for(var i=0;i<questions_array.length;i++){
		listHTML+="<div class='question_with_answers'>"  +
					"<h3>"+questions_array[i].question+"</h3>"+
					"<p>" +questions_array[i][0][0][0].answer+"</p>" +
					"<p>" +questions_array[i][0][0][1].answer+"</p>" +
					"<p>" +questions_array[i][0][0][2].answer+"</p>" +
					"<p>" +questions_array[i][0][0][3].answer+"</p>" +
				  "</div>";
		console.log(questions_array[i][0][0][0]);
	}
	questions.html(listHTML);
}
