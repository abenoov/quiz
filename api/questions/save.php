<?php 
	
	session_start();

	include "../../db.php";

	$quiz_id = $_POST["id"];
	$question = $_POST["question"];

	$login = $_SESSION["login"];

	$a1 = $_POST["a1"]; //right answer
	$a2 = $_POST["a2"];
	$a3 = $_POST["a3"];
	$a4 = $_POST["a4"];
	
	$db->query("INSERT INTO questions(question, quizes_id) VALUES ('$question', '$quiz_id')");
	$query = $db->query("SELECT * FROM questions WHERE quizes_id = '$quiz_id' order by id DESC");
	if($row = $query->fetch_object()){
		$question_id = $row->id;
		$db->query("INSERT INTO answers(answer, question_id, correct) VALUES ('$a1', '$question_id', TRUE)");
		$db->query("INSERT INTO answers(answer, question_id, correct) VALUES ('$a2', '$question_id', FALSE)");
		$db->query("INSERT INTO answers(answer, question_id, correct) VALUES ('$a3', '$question_id', FALSE)");
		$db->query("INSERT INTO answers(answer, question_id, correct) VALUES ('$a4', '$question_id', FALSE)");
	}

	echo true;

 ?>