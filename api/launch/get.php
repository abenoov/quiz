<?php

	include "../../db.php";
	session_start();
	$login = $_SESSION["login"];
	$quiz_id = $_GET["id"];
	$query = $db->query("SELECT * FROM connected WHERE session_quiz_id = '$quiz_id'");

	$result = array();

	if($query->num_rows>0){
		while ($row = $query->fetch_object()) {
			$member = $row->user_id;
			$query1 = $db->query("SELECT * FROM new_users WHERE id = '$member'");
			while($row1 = $query1->fetch_object()){
				$result[] = array(
					"user"=>$row1->name
				);
			}
		}
	}

	echo json_encode($result);

 ?>