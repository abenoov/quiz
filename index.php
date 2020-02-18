<!DOCTYPE html>
<html>
<head>
	<title>Enter in a Game</title>
	<link rel="stylesheet" type="text/css" href="style/all.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	
	<div class="back">
		<div class="pin">
			<div class="label">
				<span class="label_q">Q</span>
				<span class="label_u">U</span>
				<span class="label_i">I</span>
				<span class="label_z">Z</span>
			</div>
			<form method='GET' class="pin_form" action="/quiz/api/launch/enter.php">
				<input type="text" name="name" placeholder="Username" required>
				<input type="text" name="pin" placeholder="PIN" required>
				<button>Enter</button>
			</form>
		</div>

		<div class="footer">
			<a href="quiz.php">Create your own account</a>
			<div class="footer_terms-privacy">
				<a href="">Terms</a>
				<span>|</span>
				<a href="">Privacy</a>
			</div>
		</div>
	</div>

</body>
</html>