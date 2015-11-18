<?php

require_once '../Input.php';

session_start();

if(!isset($_SESSION['LOGGED_IN_USER'])) {
	header("Location: login.php");
	die();
} 

$username = ucfirst($_SESSION['LOGGED_IN_USER']);

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
	<h2>Authorized</h2>
	<h2><?= $username ?></h2>
	<a class="btn btn-primary" href="/logout.php">Logout</a>
</body>
</html>