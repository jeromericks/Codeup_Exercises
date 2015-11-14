<?php

function pageController()
{
	$counter = isset($_GET['counter']) ? $_GET['counter'] : 0;
	$up = $counter + 1;
	$down = $counter - 1;

	return array(
		'counter' => $counter,
		'up'      => $up,
		'down'    => $down
	);
}

extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Assignment 7.1.3. GET Requests">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Counter</title>
	<link rel="shortcut icon" href="/img/php.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/counter.css">
</head>
<body>
	<h2>Counter: <?= $counter; ?></h2>
	<a href="counter.php?counter=<?= $up; ?>">Up</a>
	<a href="counter.php?counter=<?= $down; ?>">Down</a>
</body>
</html>