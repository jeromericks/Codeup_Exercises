<?php
require 'park_migration.php';


echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$delete = 'TRUNCATE national_parks';
$dbc->exec($delete);

$parks = [
    ['name' => 'Acadia',   'location' => 'Maine', 'date_established' =>  '1919-02-26', 'area_in_acres' => '47389.67', 'url' => 'https://en.wikipedia.org/wiki/Acadia_National_Park'],
    ['name' => 'Arches',   'location' => 'Utah', 'date_established' => '1929-04-12', 'area_in_acres' => '76518.98', 'url' => 'https://en.wikipedia.org/wiki/Arches_National_Park'],
    ['name' => 'Badlands',   'location' => 'South Dakota', 'date_established' => '1978-11-10', 'area_in_acres' => '242755.94', 'url' => 'https://en.wikipedia.org/wiki/Badlands'],
    ['name' => 'Big Bend',   'location' => 'Texas', 'date_established' => '1944-06-12', 'area_in_acres' => '801163.21', 'url' => 'https://en.wikipedia.org/wiki/Big_Bend_(Texas)'],
    ['name' => 'Bryce Canyon',   'location' => 'Utah', 'date_established' => '1928-02-25', 'area_in_acres' => '35835.08', 'url' => 'https://en.wikipedia.org/wiki/Bryce_Canyon_National_Park'],
    ['name' => 'Canyonlands',   'location' => 'Utah', 'date_established' => '1964-09-12', 'area_in_acres' => '337597.83', 'url' => 'https://en.wikipedia.org/wiki/Canyonlands_National_Park'],
    ['name' => 'Death Valley',   'location' => 'California', 'date_established' => '1994-10-31', 'area_in_acres' => '3372401.96', 'url' => 'https://en.wikipedia.org/wiki/Death_Valley'],
    ['name' => 'Denali',   'location' => 'Alaska', 'date_established' => '1917-02-26', 'area_in_acres' => '4740911.72', 'url' => 'https://en.wikipedia.org/wiki/Denali'],
    ['name' => 'Everglades',   'location' => 'Florida', 'date_established' => '1934-05-30', 'area_in_acres' => '1508537.90', 'url' => 'https://en.wikipedia.org/wiki/Everglades'],
    ['name' => 'Glacier',   'location' => 'Montana', 'date_established' => '1910-05-11', 'area_in_acres' => '1013572.41', 'url' => 'https://en.wikipedia.org/wiki/Glacier_National_Park_(U.S.)'],
];
foreach ($parks as $park) {
    $query = "INSERT INTO national_parks (name, location, date_established, area_in_acres, url) 
    			VALUES ('{$park['name']}', 
	    			'{$park['location']}', 
	    			'{$park['date_established']}', 
	    			'{$park['area_in_acres']}',
	    			'{$park['url']}')";
    $dbc->exec($query);
}

