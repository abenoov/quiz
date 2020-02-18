var question = $("#question");
var answers = $("#answers");
var htmlTimer = $("#timer");
var limit = 15;
var beginning = 0;
var questionsArr;
var questionArrLength;
var questionNumber = 0;
var rightAnswers = 0;
var choosed = 0;

HTMLAudioElement.prototype.stop = function(){
	this.pause();
	this.currentTime = 0.0;
}
var audio = document.getElementById("audio");

function startBody(quiz_id, user_id){

	$.ajax({
		method: "GET",
		url: 'api/questions/get.php?quiz='+quiz_id
	}).done(function(data){
		questionsArr = JSON.parse(data);
		questionArrLength = questionsArr.length;
	});

	var functionOfPlaying = function(){
		audio.play();
		showQuestion();
		var timerID = setInterval(function(){
			var listHTML = limit-beginning;
			htmlTimer.html(listHTML);
			beginning++;
		}, 1000);
		setTimeout(function(){
			clearInterval(timerID);
			limit = 15;
			beginning = 0;
			audio.stop();
			choosed=0;
			showRightAnswer();
			questionNumber++;
		}, 16000);
	};

	setTimeout(function(){
		functionOfPlaying();
		setTimeout(function(){
			var changingAnswers = setInterval(function(){
				if (questionNumber!=questionArrLength) {
					functionOfPlaying();
				}
				else{
					showResult();
					clearInterval(changingAnswers);
				}
			},20000);
		},1000);
	}, 1000);
	
}

function showQuestion(){
	
	var listHTMLQuestion = "<h1>"+questionsArr[questionNumber].question+"</h1>";
	console.log(questionsArr[questionNumber].question);
	var listHTMLAnswer ="<div onclick='choose(1)' id='a1'><h1>"+questionsArr[questionNumber][0][0][0].answer+"</h1></div>" +
					"<div onclick='choose(2)' id='a2'><h1>" +questionsArr[questionNumber][0][0][1].answer+"</h1></div>" +
					"<div onclick='choose(3)' id='a3'><h1>" +questionsArr[questionNumber][0][0][2].answer+"</h1></div>" +
					"<div onclick='choose(4)' id='a4'><h1>" +questionsArr[questionNumber][0][0][3].answer+"</h1></div>";
	
	question.html(listHTMLQuestion);
	answers.html(listHTMLAnswer);
}

function choose(getNumberAnswer){
	if (choosed!=1) {
		if (getNumberAnswer==1) {
		rightAnswers++;
		}
		for (var i = 1; i < 5; i++) {
			if (i!=getNumberAnswer) {
				document.getElementById("a"+i).style.opacity = "0.5";
			}
		}
	}
	choosed=1;
}

function showRightAnswer(){
	for (var i = 1; i < 5; i++) {
			if (i!=1) {
				document.getElementById("a1").style.opacity = "1.0";
				document.getElementById("a"+i).style.opacity = "0.5";
			}
		}
}

function showResult(){
	alert("You answered on "+rightAnswers+" questions");
}