<?php

require_once '../Square.php';

$rectangle = new Rectangle(5, 8);
$square = new Square(10);

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
	<p>Rectangle Area: <?= $rectangle->area() ?></p>
	<p>Rectangle Perimeter: <?= $rectangle->perimeter() ?></p>
	<p>Square Area: <?= $square->area() ?></p>
	<p>Square Perimeter: <?= $square->perimeter() ?></p>
</body>
</html>
