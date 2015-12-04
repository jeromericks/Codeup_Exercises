<?php

require_once '../Rectangle.php';
require_once '../Square.php';

$rectangle = new Rectangle(5, 4);
$square = new Square(5, 5);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Assignment 9.2.1. Inheritance">
	<title>Inheritance</title>
	<link rel="shortcut icon" href="/img/php.png">
</head>
<body>
	<p><?= $rectangle->area() ?></p>
	<p><?= $square->area() ?></p>
	<p><?= $square->perimeter() ?></p>
</body>
</html>
