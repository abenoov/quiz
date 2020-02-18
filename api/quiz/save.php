<?php 
	
	session_start();

	include "../../db.php";

	$title = $_POST["name"];
	$description = $_POST["description"];
	$login = $_SESSION["login"];
	
	$db->query("INSERT INTO quizes(name, description, teacher_id) VALUES ('$title', '$description', '$login')");

	echo true;

 ?>