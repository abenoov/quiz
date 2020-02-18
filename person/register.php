<?php 
	include "../db.php";

	if(isset($_POST["login"]) && strlen($_POST["login"])>0&&
		isset($_POST["password"]) && strlen($_POST["password"])>0&&
		isset($_POST["password2"]) && strlen($_POST["password2"])>0){

		$login = $_POST["login"];
		$password = $_POST["password"];
		$password2 = $_POST["password2"];

		$exist = $db->query("SELECT * FROM person WHERE login = '$login'");

		if ($exist->num_rows > 0) {
			header("Location: /quiz/chosenreg.php?choose=$choose&error=2");
		}elseif ($password != $password2) {
			header("Location: /quiz/chosenreg.php?choose=$choose&error=3");
		} else {
			$db->query("INSERT INTO person(login, password) VALUES('$login', '".sha1(sha1($password))."')");
			$db->query("INSERT INTO teachers(id) VALUES ('$login')");
			session_start();
			$_SESSION["login"] = $login;
			header("Location: /quiz/profile.php");
		}

	} else {
		header("Location: /quiz/quiz.php?error=1");
	}

 ?>