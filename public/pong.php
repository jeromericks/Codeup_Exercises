<?php

function pageController()
{
	if(isset($_GET['game-over'])) {
		$gameOver = $_GET['game-over'];
		return array(
			'gameOver' => $gameOver
		);
	}

	$counter = isset($_GET['counter']) ? $_GET['counter'] : 0;
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
	<title>Pong</title>
	<link rel="shortcut icon" href="/img/php.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
	<h2>Counter: <?= $counter; ?></h2>
	<?php if(isset($gameOver)): ?>
		<a href="ping.php">Play Again?</a>
	<?php else: ?>
		<a href="pong.php?counter=<?= $hit; ?>">Hit</a>
		<a href="pong.php?game-over=true">Miss</a>
	<?php endif; ?>
</body>
</html>