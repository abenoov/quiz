<?php

	include "../../db.php";
	session_start();
	$login = $_SESSION["login"];
	$query = $db->query("SELECT * FROM quizes WHERE teacher_id = '$login'");

	$result = array();

	if($query->num_rows>0){
		while ($row = $query->fetch_object()) {
			$result[] = array(
				"id"=>$row->id,
				"name"=>$row->name,
				"description"=>$row->description
			);
		}
	}

	echo json_encode($result);

 ?>