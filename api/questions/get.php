<?php

	include "../../db.php";

	$quiz_id = $_GET["quiz"];
	$query_questions = $db->query("SELECT * FROM questions WHERE quizes_id = '$quiz_id'");

	$result = array();

	if($query_questions->num_rows>0){
		while ($row = $query_questions->fetch_object()) {
			$question_id = $row->id;
			$query_answers = $db->query("SELECT * FROM answers WHERE question_id = '$question_id'");
			$result_answers = array();
			while ($row_a = $query_answers->fetch_object()) {
				$result_answers[] = array(
					"answer"=>$row_a->answer,
					"correct"=>$row_a->correct
				);
			}
			$result[] = array(
				"id"=>$row->id,
				"question"=>$row->question,
				array($result_answers)
			);
		}
	}

	echo json_encode($result);

 ?>