<?php

var_dump($_POST);


$login = '';
$username = '';
$info = '';

if(isset($_POST['username']) && isset($_POST['password'])) {
	$username = htmlspecialchars(strip_tags($_POST['username']));
	$password = htmlspecialchars(strip_tags($_POST['password']));

	if($username == 'guest' && $password == 'password'){
		header("Location: authorized.php");
		die();
	} else {
		$login = 'Login failed';
		$info = 'Enter the right information,';
		$username = strtoupper($username) . '!!!';
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Assignment 7.1.5. Handling User Input">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Example</title>
	<link rel="shortcut icon" href="/img/php.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/form-example.css">
</head>
<body>
	<form method="POST" role="form">
		<h4><?= $login ?></h4>
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" name="username">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password">
		</div>
		<h5><?= $info . ' ' . $username ?></h5>
		<button class="btn btn-primary">Submit</button>
	</form>
</body>
</html>