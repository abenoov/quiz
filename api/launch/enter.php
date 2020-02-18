<?php 
	
	include "../../db.php";

	$pin = $_GET["pin"];
	$name = $_GET["name"];
	$query = $db->query("SELECT * FROM session_quiz WHERE pin = '$pin'");
	$query2 = $db->query("SELECT * FROM new_users WHERE name LIKE '$name'");

	if($query->num_rows>0){
		if($row=$query->fetch_object()){
			if($query2->num_rows>0){
				header('Location: /quiz/index.php?error=1'); //с таким именем уже есть
			}
			else{
				$db->query("INSERT INTO new_users(name) VALUES ('$name')");
				$query3 = $db->query("SELECT id FROM new_users WHERE name = '$name'");
				if($row1=$query3->fetch_object()){
					$name_new_user=$row1->id;
				}
				session_start();
				$quiz_id = $row->quiz_id;
				$_SESSION["quiz"] = $quiz_id;
				$_SESSION["new_user"] = $name_new_user;
				$session_quiz_id = $row->id;

				$db->query("INSERT INTO connected(user_id, session_quiz_id) VALUES ('$name_new_user','$session_quiz_id')");
				//header("Location: /quiz/playing.php?user=$name_new_user");
			}
		}
	}
	else{
		header('Location: /quiz/index.php?error=0'); //такой игры нет
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
 </head>
 <body onload="checkingBeginning(<?php echo $_SESSION["quiz"] ?>)">
 	<h1>
 		WAITING ANOTHER PEOPLE!
 	</h1>
 	<style type="text/css">
 		h1{
 			font-size: 50px;
 		}
 	</style>
 	<script type="text/javascript" src="../../js/checkbeginning.js"></script>
 </body>
 </html>