<?php
require 'park_migration.php';


echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$delete = 'TRUNCATE national_parks';
$dbc->exec($delete);

$parks = [
    ['name' => 'Acadia',   	    'location' => 'Maine',        'date_established' => '1919-02-26',   'area_in_acres' => '47389.67',     'url' => 'https://en.wikipedia.org/wiki/Acadia_National_Park',         'description' => 'Acadia National Park is a national park located in the U.S. state of Maine.'],
    ['name' => 'Arches',        'location' => 'Utah',         'date_established' => '1929-04-12',   'area_in_acres' => '76518.98',     'url' => 'https://en.wikipedia.org/wiki/Arches_National_Park',         'description' => 'Arches National Park is a US National Park in eastern Utah.'],
    ['name' => 'Badlands',      'location' => 'South Dakota', 'date_established' => '1978-11-10',   'area_in_acres' => '242755.94',    'url' => 'https://en.wikipedia.org/wiki/Badlands',                     'description' => 'Badlands National Park is a national park in southwestern South Dakota.'],
    ['name' => 'Big Bend',      'location' => 'Texas',        'date_established' => '1944-06-12',   'area_in_acres' => '801163.21',    'url' => 'https://en.wikipedia.org/wiki/Big_Bend_(Texas)',             'description' => 'The Big Bend is a colloquial name of a geographic region in the western part of the state of Texas.'],
    ['name' => 'Bryce Canyon',  'location' => 'Utah',         'date_established' => '1928-02-25',   'area_in_acres' => '35835.08',     'url' => 'https://en.wikipedia.org/wiki/Bryce_Canyon_National_Park',   'description' => 'Bryce Canyon National Park is a National Park located in southwestern Utah.'],
    ['name' => 'Canyonlands',   'location' => 'Utah',         'date_established' => '1964-09-12',   'area_in_acres' => '337597.83',    'url' => 'https://en.wikipedia.org/wiki/Canyonlands_National_Park',    'description' => 'Canyonlands National Park is a U.S. National Park located in southeastern Utah.'],
    ['name' => 'Death Valley',  'location' => 'California',   'date_established' => '1994-10-31',   'area_in_acres' => '3372401.96',   'url' => 'https://en.wikipedia.org/wiki/Death_Valley',                 'description' => 'Death Valley National Park is a national park in the U.S. states of California and Nevada.'],
    ['name' => 'Denali',        'location' => 'Alaska',       'date_established' => '1917-02-26',   'area_in_acres' => '4740911.72',   'url' => 'https://en.wikipedia.org/wiki/Denali',                       'description' => 'Denali National Park and Preserve is a national park and preserve located in Interior Alaska.'],
    ['name' => 'Everglades',    'location' => 'Florida',      'date_established' => '1934-05-30',   'area_in_acres' => '1508537.90',   'url' => 'https://en.wikipedia.org/wiki/Everglades',                   'description' => 'Everglades National Park is a U.S. National Park in Florida.'],
    ['name' => 'Glacier',       'location' => 'Montana',      'date_established' => '1910-05-11',   'area_in_acres' => '1013572.41',   'url' => 'https://en.wikipedia.org/wiki/Glacier_National_Park_(U.S.)', 'description' => 'Glacier National Park is a national park located in the U.S. state of Montana.'],
];

$stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, url, description) VALUES (:name, :location, :date_established, :area_in_acres, :url, :description)');

foreach ($parks as $park) {
	$stmt->bindValue(':name',  $park['name'],  PDO::PARAM_STR);
	$stmt->bindValue(':location',  $park['location'],  PDO::PARAM_STR);
	$stmt->bindValue(':date_established',  $park['date_established'],  PDO::PARAM_STR);
	$stmt->bindValue(':area_in_acres',  $park['area_in_acres'],  PDO::PARAM_STR);
	$stmt->bindValue(':url',  $park['url'],  PDO::PARAM_STR);
	$stmt->bindValue(':description',  $park['description'],  PDO::PARAM_STR);
    $stmt->execute();
}

