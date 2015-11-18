<?php

require_once('../Input.php');

function pageController()
{
	if(Input::has('gameOver')) {
		$gameOver = Input::get('gameOver');
		return array(
			'gameOver' => $gameOver
		);
	}

	$counter = Input::has('counter') ? Input::get('counter') : 0;
	$hit = $counter + 1;
	$miss = $counter;

	return array(
		'counter' => $counter,
		'hit'     => $hit,
		'miss'    => $miss
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
	<title>Ping</title>
	<link rel="shortcut icon" href="/img/php.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	<?php if(isset($gameOver)): ?>
		<a href="pong.php">Play Again?</a>
	<?php else: ?>
		<h2>Counter: <?= $counter; ?></h2>
		<a href="pong.php?counter=<?= $hit; ?>">Hit</a>
		<a href="pong.php?gameOver=true">Miss</a>
	<?php endif; ?>
</body>
</html>