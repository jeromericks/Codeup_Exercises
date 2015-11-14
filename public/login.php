<?php

var_dump($_POST);

function pageController()
{
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$login = isset($_POST['login']) ? $_POST['login'] : '';

	if($username == 'guest' && $password == 'password'){
		header("Location: authorized.php");
		die();
	} elseif($username != '' && $password != '') {
		$login = 'Login failed';
	}

	return array(
		'login' => $login,
		'username' => $username,
		'password' => $password
	);
}

extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Assignment 7.1.4. POST Requests">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="shortcut icon" href="/img/php.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	<h2><?= $login ?></h2>
	<form method="POST">
		<label for="username">Username</label>
		<input type="text" name="username">
		<label for="password">Password</label>
		<input type="password" name="password">
		<button>Submit</button>
	</form>
</body>
</html>