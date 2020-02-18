<?php 
	include 'db.php';
	session_start();
	$login = $_SESSION["login"];
	$query = $db->query("SELECT * FROM quizes WHERE teacher_id = $login");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/all.css">
</head>
<body>
	<header class="profile_header">
		<a href="index.php">QUIZ!</a>
		<a href="">Create a QUIZ!</a>
	</header>

	<div class="quiz">
		<h1>My QUIZes</h1>
		<h2>QUIZ (<span>0</span>)</h2>
		<button onclick="showModal('show')">Create new</button>
		<div class="quizes" id="quizes"></div>
	</div>

	<div class="modal" id="modal">
		<div class="modal_backdrop" onclick="showModal()"></div>
		<div class="modal_inner">
			<span class="modal_close" onclick="showModal()">X</span>
			<h1 class="modal_title">Add QUIZ</h1>
			<form onsubmit="addQuiz(event)">
					<fieldset class="form_field">
						<input id="quiz_name" class="input" type="text" name="" placeholder="Quiz Name">
					</fieldset>
					<fieldset class="form_field">
						<input id="quiz_description" class="input" type="text" name="" placeholder="Description">
					</fieldset>
					<fieldset class="form_field">
						<button class="button button_block">Add</button>
					</fieldset>
			</form>	
		</div>
	</div>

	<div class="modal1" id="modal1">
		<div class="modal_backdrop1" onclick="showModal1()"></div>
		<div class="modal_inner1">
			<span class="modal_close" onclick="showModal1()">X</span>
			<h1 class="modal_title">Add Question</h1>
			<form onsubmit="addQuestions(event)">
					<fieldset class="form_field">
						<input id="question_id" type="hidden">
					</fieldset>
					<fieldset class="form_field">
						<input id="question" class="input" type="text" name="" placeholder="Question" required>
					</fieldset>
					<fieldset class="form_field">
						<input id="answer1" class="input" type="text" name="" placeholder="Right answer" required>
					</fieldset>
					<fieldset class="form_field">
						<input id="answer2" class="input" type="text" name="" placeholder="answer2" required>
					</fieldset>
					<fieldset class="form_field">
						<input id="answer3" class="input" type="text" name="" placeholder="answer3" required>
					</fieldset>
					<fieldset class="form_field">
						<input id="answer4" class="input" type="text" name="" placeholder="answer4" required>
					</fieldset>
					<fieldset class="form_field">
						<button class="button button_block">Add</button>
					</fieldset>
			</form>
			<h1>Questions</h1>
			<div id="questions">
				
			</div>
		</div>
	</div>

	<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/quiz.js"></script>
	<script type="text/javascript" src="menu.js"></script>
</body>
</html>