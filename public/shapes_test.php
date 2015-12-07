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
	<h2>Rectangle</h2>
	<p>The area of a rectangle with a height of <?= $rectangle->height ?> and a width of <?= $rectangle->width ?> is <?= $rectangle->area() ?>.</p>
	<p>The perimeter of said shape is <?= $rectangle->perimeter() ?>.</p>
	<h2>Square</h2>
	<p>The area of a square with a side of <?= $square->height ?> is <?= $square->area() ?>.</p>
	<p>The perimeter of said shape is <?= $square->perimeter() ?>.</p>
</body>
</html>
