<?php

require_once '../nat_config.php';
require_once '../db_connect.php';
require_once '../Input.php';


function pageController($dbc)
{
	var_dump($_POST);
	$error = '';
	$errors = NULL;
	$limit = 2;
	$pageNumber = Input::has('pageNumber') ? Input::get('pageNumber') : 1;
	$pageNumber = ($pageNumber > 0) ? $pageNumber : 1;
	$pageNumber = (is_numeric($pageNumber)) ? $pageNumber : 1;
	$offset = $limit * $pageNumber - $limit;

	if(!empty($_POST)){
		if(checkValues()) {
			$errors = insertPark($dbc);
		} 
	}
	deletePark($dbc);


	$stmt = $dbc->prepare("SELECT * FROM national_parks LIMIT :limit OFFSET :offset");
	$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
	$stmt->bindValue(':limit', $limit, PDO::PARAM_INT); 
	$stmt->execute();
	$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);


	$count = $dbc->query('SELECT COUNT(*) FROM national_parks;')->fetchColumn();

	$maxPage = ceil($count / $limit);
	$next = $pageNumber + 1;
	$previous = $pageNumber - 1;
	
	if($pageNumber > $maxPage) {
		$pageNumber = 1;
		header("Location: national_parks.php?pageNumber=1");
		die();
	}
	
	return array(
		'pageNumber' => $pageNumber,
		'previous' => $previous,
		'next' => $next,
		'parks' => $parks,
		'maxPage' => $maxPage,
		'error' => $error,
		'errors' => $errors
	);
}
extract(pageController($dbc));


function comma($number)
{
	$mystring = '.';
	$findme   = '00';
	if(strpos($number, $mystring) > strpos($number, $findme)) {
		if(strlen($number) == 8) {
			$number = substr($number, -9, 2) . ',' . substr($number, -6);
		} else if(strlen($number) == 9) {
			$number = substr($number, -9, 3) . ',' . substr($number, -6);
		} else if(strlen($number) == 10) {
			$number = substr($number, -10, 1) . ',' . substr($number, -9, 3) . ',' . substr($number, -6);
		}
	} else {
		if(strlen($number) == 7) {
			$number = substr($number, -9, 1) . ',' . substr($number, -6);
		} else if(strlen($number) == 8) {
			$number = substr($number, -9, 2) . ',' . substr($number, -6);
		} else if(strlen($number) == 9) {
			$number = substr($number, -9, 3) . ',' . substr($number, -6);
		} else if(strlen($number) == 10) {
			$number = substr($number, -10, 1) . ',' . substr($number, -9, 3) . ',' . substr($number, -6);
		}
	}
	return $number;

}

function deletePark($dbc)
{
	if(Input::notEmpty('id')){
		$id = Input::get('id');
		$delete = $dbc->prepare('DELETE FROM national_parks WHERE id = :id');
		$delete->bindValue(':id', $id, PDO::PARAM_INT);
		$delete->execute();
	}
}

function insertPark($dbc)
{
	$errors = [];

	try{
		$name = Input::getString('name');
	} catch (Exception $e) {
    	array_push($errors, $e->getMessage());
	}
	
	try{
		$location = Input::getString('location');
	} catch (Exception $e) {
    	array_push($errors, $e->getMessage());
	}

	try{
		$date_established = Input::getDate('date_established');
		$date_established = $date_established->format("Y-m-d");
	} catch (Exception $e) {
    	array_push($errors, $e->getMessage());
	}

	try{
		$area_in_acres = Input::getNumber('area_in_acres');
	} catch (Exception $e) {
    	array_push($errors, $e->getMessage());
	}

	try{
		$url = Input::getString('url');
	} catch (Exception $e) {
    	array_push($errors, $e->getMessage());
	}

	try{
		$description = Input::getString('description');
	} catch (Exception $e) {
    	array_push($errors, $e->getMessage());
	}

	if(!empty($errors)) {
		return $errors;
	}

	$userInput = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, url, description) VALUES (:name, :location, :date_established, :area_in_acres, :url, :description)');		
	$userInput->bindValue(':name', ucfirst($name),  PDO::PARAM_STR);
	$userInput->bindValue(':location', ucfirst($location),  PDO::PARAM_STR);
	$userInput->bindValue(':date_established', $date_established,  PDO::PARAM_STR);
	$userInput->bindValue(':area_in_acres', $area_in_acres,  PDO::PARAM_STR);
	$userInput->bindValue(':url', $url,  PDO::PARAM_STR);
	$userInput->bindValue(':description', ucfirst($description),  PDO::PARAM_STR);
	$userInput->execute();

	return $errors;
}

function checkValues()
{
	return (Input::notEmpty('name') && Input::notEmpty('location') && Input::notEmpty('date_established') && Input::notEmpty('area_in_acres') && Input::notEmpty('description') && Input::notEmpty('url'));
}

var_dump($errors);
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/national_parks.css">
</head>
<body>
	<h2>National Parks</h2>
	<table class="table table-striped">
		<tr>
			<th>Park Name</th>
			<th>Location</th>
			<th>Date Established</th>
			<th>Area (in acres)</th>
			<th>Description</th>
			<th></th>
		</tr>

	<?php foreach($parks as $park): ?>
		<tr>
			<td><a href="<?= $park['url'] ?>"><?= Input::escape($park['name']) ?></a></td>
			<td><?= Input::escape($park['location']) ?></td>
			<td><?= Input::escape($park['date_established']) ?></td>
			<td><?= comma(Input::escape($park['area_in_acres'])) ?></td>
			<td><?= Input::escape($park['description']) ?></td>
			<td><a href="?pageNumber=<?= $pageNumber ?>&id=<?= $park['id'] ?>" class="btn btn-danger">Delete</a></td>
		</tr>
	<?php endforeach ?>

	</table>
	<nav>
		<ul class="pager">
			<li class="previous">
				<?php if($pageNumber > 1): ?>
					<a href="national_parks.php?pageNumber=<?= $previous ?>" name='previous'>Previous</a>
				<?php endif ?>
			</li>
			<li class="next">
				<?php if($maxPage > $pageNumber): ?>
					<a href="national_parks.php?pageNumber=<?= $next ?>" name='next'>Next</a>
				<?php endif ?>
			</li>
		</ul>
	</nav>
	<div class="container-fluid">
		<p>Page: <?= $pageNumber ?> of <?= $maxPage ?></p>
	</div>
	<div class="well submit_form">
		<form method="POST">
			<h4><?= $error ?></h4>
			<?php if(!empty($errors)): ?> 
				<?php foreach($errors as $errorMessage): ?> 
					<h4><?= $errorMessage ?></h4>
				<?php endforeach ?>
			<?php endif ?>
			<div class="form-group">
				<label for="name">Name *</label>
				<input type="text" class="form-control" name="name" placeholder="Enter a park name">
			</div>
			<div class="form-group">
				<label for="location">Location *</label>
				<input type="text" class="form-control" name="location" placeholder="Park Location">
			</div>
			<div class="form-group">
				<label for="date_established">Date Established *</label>
				<input type="text" class="form-control" name="date_established" placeholder="MM/DD/YYYY">
			</div>
			<div class="form-group">
				<label for="area_in_acres">Area (in acres) *</label>
				<input type="text" class="form-control" name="area_in_acres" placeholder="Area in acres">
			</div>
			<div class="form-group">
				<label for="description">Description *</label>
				<input type="text" class="form-control" name="description" placeholder="Park Description">
			</div>
			<div class="form-group">
				<label for="url">URL *</label>
				<input type="url" class="form-control" name="url" placeholder="Park URL">
			</div>
			<p><small>* indicates a required field</small></p>
			<button class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>
</html>