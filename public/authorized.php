<?php

require_once '../Input.php';
require_once '../Auth.php';

session_start();

if(!Auth::check()) {
	header("Location: login.php");
	die();
} 

$username = ucfirst(Auth::user());

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Assignment 7.1.4. POST Requests">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Authorized</title>
	<link rel="shortcut icon" href="/img/php.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/form-example.css">
</head>
<body>
	<h2>Congratulations, You're Authorized!!!</h2>
	<h2><?= 'Hello, ' . Input::escape($username) ?></h2>
	<a class="btn btn-primary" href="/logout.php">Logout</a>
</body>
</html>