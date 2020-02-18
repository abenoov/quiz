<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/all.css">
	<?php 
		include "db.php";
		$id = $_GET["id"];
		$query = $db->query("SELECT * FROM session_quiz WHERE id = '$id'");
		if($row = $query->fetch_object()){
			$pin = $row->pin;
		}

	 ?>
	 
</head>

<body onload="setSessionQuiz_id(<?php echo $id ?>)">

	<div id='pin' class="pin">
		<span>Enter the pin-code: <?php echo $pin ?></span>
	</div>
	<div class="members" id="members"></div>

	<form action="api/launch/launchquiz.php">
		<input type="hidden" name="click" value="<?php echo $pin ?>">
		<button class="launch_button">Launch</button>
	</form>
	
	<script
	  src="http://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/checkmembers.js"></script>
	<style type="text/css">
		.pin{
			width: 100%;
			height: 20vh;
			background: LawnGreen;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.pin span{
			background: white;
			font-size: 80pt;
			display: inline-block;
			
		}
		.members{
			width: 100%;
			height: 80vh; 
			background: GreenYellow;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
		}
		.members h1{
			display: block;
			font-size: 30px;
		}
		.launch_button{
			position: fixed;
			right: 30px;
			bottom: 30px;
			border: 1px solid transparent;
			line-height: 50px;
			width: 300px;
			background: #333;
			color: white;
			transition: .3s;
		}
		.launch_button:hover{
			color: black;
			background: GreenYellow;
			border: 1px solid #333;
		}

	</style>
	
</body>
</html>