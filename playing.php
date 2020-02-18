<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php session_start();
	$id = $_SESSION["quiz"];
	$name = $_GET["user"];
	include 'db.php';
	$db->query("INSERT INTO connected(user_id, session_quiz_id) VALUES ('$name', '$id')");
	 ?>
	<link rel="stylesheet" type="text/css" href="style/all.css">
</head>
<body onload="startBody(<?php echo $id ?>, <?php echo $name ?>);">
	<audio src="audio/kahoot.mp3" id="audio"></audio>
	<div id="question"></div>
	<div id="answers"></div>
	<div id="timer"></div>
	<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/questions.js"></script>
</body>
</html>