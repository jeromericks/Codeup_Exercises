<?php

date_default_timezone_set('America/Chicago');
require_once '../Input.php';
require_once '../Auth.php';

var_dump($_POST);

session_start();


$username = ucfirst(Input::get('username'));
$password = Input::get('password');
$loginError = '';
$info = '';


if(Auth::check()) {
	header("Location: authorized.php");
	die();
}

if(!empty($_POST)) {

	if(Auth::attempt($username, $password)) {
		header("Location: authorized.php");
		die();
	} 
	
	$loginError = 'Login failed';
	$info = 'Enter the right information,';
	$username = strtoupper($username) . '!!!';
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
		<h5><?= $info . ' ' . Input::escape($username) ?></h5>
		<button class="btn btn-primary">Submit</button>
	</form>
</body>
</html>