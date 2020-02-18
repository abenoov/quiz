<?php 
	include "../../db.php";
	session_start();
	$login = $_SESSION["login"];
	$pin = rand(10000, 99999);

	$query1 = $db->query("SELECT * FROM session_quiz WHERE pin = '$pin'");
	while($query1->num_rows>0){
		$pin = rand(10000, 99999);
		$query1 = $db->query("SELECT * FROM session_quiz WHERE pin = '$pin'");
	}

	$quiz_id = $_GET["id"];

	$db->query("DELETE FROM session_quiz WHERE quiz_id IN (SELECT id FROM quizes WHERE teacher_id = $login)");

	$db->query("INSERT INTO session_quiz(quiz_id, pin) VALUES ('$quiz_id', '$pin')");
	$query = $db->query("SELECT * FROM session_quiz WHERE quiz_id = '$quiz_id' order by id DESC");
	if($row = $query->fetch_object()){
		header("Location: /quiz/launch.php?id=$row->id");
	}
	

 ?>