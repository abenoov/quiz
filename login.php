<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/all.css">
</head>
<body>
	<header class="register_header">
		<a href="index.php">QUIZ!</a>
		<div class="register_login">
			<h1>You haven't got account?</h1>
			<a href="register.php">Sign up</a>
		</div>
	</header>

	<div class="enter">
		<form method="POST" action="person/login.php" class="register_form">
			<input type="text" name="login" placeholder="Enter Login">
			<input type="password" name="password" placeholder="Enter Password">
			<button>Login</button>
		</form>
	</div>
</body>
</html>