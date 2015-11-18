<?php

require_once('../Input.php');

var_dump($_POST);

session_start();


$loginError = '';
$username = '';
$info = '';


if(isset($_SESSION['LOGGED_IN_USER'])) {
	header("Location: authorized.php");
	die();
}

if(Input::has('username') && Input::has('password')) {
	$username = Input::escape(Input::get('username'));
	$password = Input::escape(Input::get('password'));

	if($username == 'guest' && $password == 'password'){
		$_SESSION['LOGGED_IN_USER'] = $username;
		header("Location: authorized.php");
		die();
	} else {
		$loginError = 'Login failed';
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
	<meta name="description" content="Assignment 7.1.4. POST Requests">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="shortcut icon" href="/img/php.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/form-example.css">
</head>
<body>
	<form method="POST" role="form">
		<h4><?= $loginError ?></h4>
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