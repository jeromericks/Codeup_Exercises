<?php

require_once '../config.php';
require_once '../db_connect.php';
require_once '../Input.php';

$limit = 4;

function pageController()
{
	$pageNumber = Input::has('pageNumber') ? Input::get('pageNumber') : 1;
	$next = $pageNumber + 1;
	$previous = $pageNumber - 1;

	return array(
		'pageNumber' => $pageNumber,
		'previous' => $previous,
		'next' => $next
	);
}

extract(pageController());


$selectAll = 'SELECT * FROM national_parks LIMIT ' . $limit . ' OFFSET ' . ($limit * $pageNumber - $limit) .';' ;

$stmt = $dbc->query($selectAll);

$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

$count = $dbc->query('SELECT COUNT(*) FROM national_parks;')->fetchColumn();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Assignment 9.1.3. Query and Results">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>National Parks</title>
	<link rel="shortcut icon" href="/img/php.png">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/national_parks.css">
</head>
<body>
	<h2>National Parks</h2>
	<h3>Database Driven Web Application</h3>
	<table class="table table-striped">
		<tr>
			<th>Park Name</th>
			<th>Location</th>
			<th>Date Established</th>
			<th>Area in Acres</th>
		</tr>
	<?php 
		foreach($parks as $park): ?>
			<tr>
				<td><?= $park['name'] ?></td>
				<td><?= $park['location'] ?></td>
				<td><?= $park['date_established'] ?></td>
				<td><?= $park['area_in_acres'] ?></td>
			</tr>
		<?php endforeach ?>
	</table>
	<?php if($pageNumber > 1): ?>
		<a href="national_parks.php?pageNumber=<?= $previous ?>" name='previous'>Previous</a>
	<?php endif ?>
	<span><?= $pageNumber ?></span>
	<?php if($count / $limit > $pageNumber): ?>
	<a href="national_parks.php?pageNumber=<?= $next ?>" name='next' id='next'>Next</a>
	<?php endif ?>
</body>
</html>