<?php 
	include '../../db.php';
	session_start();
	$pin = $_GET["click"];
	$db->query("UPDATE session_quiz SET started = TRUE WHERE pin = '$pin'");
	header('Location: /quiz/profile.php');
 ?>