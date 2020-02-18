<?php

	include "../../db.php";
	session_start();
	$name_new_user = $_SESSION["new_user"];
	$quiz_id = $_GET["id"];
	$query = $db->query("SELECT * FROM session_quiz WHERE quiz_id = '$quiz_id'");


	if($query->num_rows>0){
		if($row = $query->fetch_object()) {
			if($row->started==1){
				echo $name_new_user;
			}
			else{
				echo 0;
			}
		}
	}

 ?>