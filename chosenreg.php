<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style/all.css">
</head>
<body>
	<header class="register_header">
		<a href="index.php">QUIZ!</a>
		<div class="register_login">
			<h1>Already got an account?</h1>
			<a href="chosenreg.php?choose=login">Log in</a>
		</div>
	</header>

	<div class="enter">
		<form method="POST" action="person/register.php" class="register_form">
			<input type="text" name="login" placeholder="Create a Login">
			<input type="password" name="password" placeholder="Create a Password">
			<input type="password" name="password2" placeholder="Сonfirm a Password">
			<button>Register</button>
		</form>
	</div>
</body>
</html>