<?php

function pageController()
{
	$favorites = ['Pizza', 'Travelling', 'Movies', 'Lobster', 'Steak'];
	$colors = ['blue', 'red', 'green', 'orange', 'yellow', 'purple'];
	$sizes = ['large', 'medium', 'little'];

	$color = array_rand($colors);
	$size = array_rand($sizes);

	return array(
		'favorites' => $favorites,
		'colors' => $colors,
		'sizes' => $sizes,
		'color' => $color,
		'size' => $size
	);
}

extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Assignment 7.1. PHP with HTML">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Favorite Things</title>
	<link rel="shortcut icon" href="/img/php.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/myfavoritethings.css">
</head>
<body>
	<h1>My Favorite Things</h1>
	<button class="btn btn-primary">Generate</button>
	<table class="table table-striped">
		<tbody>
		<tr>
		<?php foreach($favorites as $favorite): ?>
			<td class="<?= $colors[$color] . ' ' . $sizes[$size]?>"><?= $favorite ?></td>
		</tr>
		<?php endforeach; ?>
		</tbody>	
	</table>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="/js/myfavoritethings.js"></script>
</body>
</html>