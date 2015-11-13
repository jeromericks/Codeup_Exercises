<?php

$adjectives = ['Cheerful', 'Graceful', 'Hollow', 'Messy', 'Nasty', 'Furry', 'Ambiguous', 'Poor', 'Neat', 'Instinctive'];
$nouns = ['Literature', 'Punishment', 'Alphabet', 'Saw', 'Latex', 'Sock', 'Flavor', 'Murderer', 'Bacteria', 'Pet'];
$colors = ['blue', 'red', 'green', 'orange', 'yellow', 'purple'];
$sizes = ['large', 'medium', 'little'];
$adjective = array_rand($adjectives);
$noun = array_rand($nouns); 
$color = array_rand($colors);
$size = array_rand($sizes);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Assignment 7.1. PHP with HTML">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Server Name Generator</title>
	<link rel="shortcut icon" href="/img/php.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/servergenerator.css">
</head>
<body>
	<h1>Server Name Generator</h1>
	<button class="btn btn-primary">Generate</button>
	<h2><span class="<?= $colors[$color] . ' ' . $sizes[$size]?>"><?= $adjectives[$adjective] . ' ' . $nouns[$noun] ?><span></h2>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="/js/servergenerator.js"></script>
</body>
</html>