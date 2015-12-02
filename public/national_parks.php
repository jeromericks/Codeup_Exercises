<?php

require_once '../config.php';
require_once '../db_connect.php';
require_once '../Input.php';


function pageController($dbc)
{
	$limit = 2;
	$pageNumber = Input::has('pageNumber') ? Input::get('pageNumber') : 1;
	$pageNumber = ($pageNumber > 0) ? $pageNumber : 1;
	$pageNumber = (is_numeric($pageNumber)) ? $pageNumber : 1;
	$next = $pageNumber + 1;
	$previous = $pageNumber - 1;
	$selectAll = 'SELECT * FROM national_parks LIMIT ' . $limit . ' OFFSET ' . ($limit * $pageNumber - $limit) .';' ;

	$stmt = $dbc->query($selectAll);

	$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$count = $dbc->query('SELECT COUNT(*) FROM national_parks;')->fetchColumn();

	return array(
		'pageNumber' => $pageNumber,
		'previous' => $previous,
		'next' => $next,
		'parks' => $parks,
		'count' => $count,
		'limit' => $limit
	);
}

extract(pageController($dbc));


function comma($number)
{
	if(strlen($number) == 8) {
		$number = substr($number, -9, 2) . ',' . substr($number, -6);
	} else if(strlen($number) == 9) {
		$number = substr($number, -9, 3) . ',' . substr($number, -6);
	} else if(strlen($number) == 10) {
		$number = substr($number, -10, 1) . ',' . substr($number, -9, 3) . ',' . substr($number, -6);
	}
	return $number;
}


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
				<td><a href="<?= $park['url'] ?>"><?= $park['name'] ?></a></td>
				<td><?= $park['location'] ?></td>
				<td><?= $park['date_established'] ?></td>
				<td><?= comma($park['area_in_acres']) ?></td>
			</tr>
		<?php endforeach ?>
	</table>
	<nav>
		<ul class="pager">
			<li>
				<?php if($pageNumber > 1): ?>
					<a href="national_parks.php?pageNumber=<?= $previous ?>" name='previous'>Previous</a>
				<?php endif ?>
			</li>
			<li>
				<?php if($count / $limit > $pageNumber): ?>
					<a href="national_parks.php?pageNumber=<?= $next ?>" name='next'>Next</a>
				<?php endif ?>
			</li>
		</ul>
	</nav>
	<div class="container-fluid">
		<p>Page: <?= $pageNumber ?> of <?= ceil($count / $limit) ?></p>
	</div>
</body>
</html>