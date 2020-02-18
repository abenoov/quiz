<?php 
	include "../db.php";

	if(isset($_POST["login"]) && strlen($_POST["login"])>0&&
		isset($_POST["password"]) && strlen($_POST["password"])>0){

	
		$login = $_POST["login"];
		$password = $_POST["password"];

		$exist = $db->query("SELECT * FROM person WHERE login = '$login'");

		if ($exist->num_rows > 0) {
			
			$row=$exist->fetch_object();
			if(sha1(sha1($password))==$row->password) {
				session_start();
				$_SESSION["login"] = $login;
				header("Location: /quiz/profile.php");
			} else {
				header("Location: /quiz/login.php?error=3");
			}

		} else {
			header("Location: /quiz/login.php?error=2");
		}

	} else {
		header("Location: /quiz/login.php?error=1");
	}

 ?>