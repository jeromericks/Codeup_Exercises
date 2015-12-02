<?php
require 'park_migration.php';


echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$delete = 'TRUNCATE national_parks';
$dbc->exec($delete);

$parks = [
    ['name' => 'Acadia',   'location' => 'Maine', 'date_established' =>  '1919-02-26', 'area_in_acres' => '47389.67'],
    ['name' => 'Arches',   'location' => 'Utah', 'date_established' => '1929-04-12', 'area_in_acres' => '76518.98'],
    ['name' => 'Badlands',   'location' => 'South Dakota', 'date_established' => '1978-11-10', 'area_in_acres' => '242755.94'],
    ['name' => 'Big Bend',   'location' => 'Texas', 'date_established' => '1944-06-12', 'area_in_acres' => '801163.21'],
    ['name' => 'Bryce Canyon',   'location' => 'Utah', 'date_established' => '1928-02-25', 'area_in_acres' => '35835.08'],
    ['name' => 'Canyonlands',   'location' => 'Utah', 'date_established' => '1964-09-12', 'area_in_acres' => '337597.83'],
    ['name' => 'Death Valley',   'location' => 'California', 'date_established' => '1994-10-31', 'area_in_acres' => '3372401.96'],
    ['name' => 'Denali',   'location' => 'Alaska', 'date_established' => '1917-02-26', 'area_in_acres' => '4740911.72'],
    ['name' => 'Everglades',   'location' => 'Florida', 'date_established' => '1934-05-30', 'area_in_acres' => '1508537.90'],
    ['name' => 'Glacier',   'location' => 'Montana', 'date_established' => '1910-05-11', 'area_in_acres' => '1013572.41'],
];
foreach ($parks as $park) {
    $query = "INSERT INTO national_parks (name, location, date_established, area_in_acres) 
    			VALUES ('{$park['name']}', 
	    			'{$park['location']}', 
	    			'{$park['date_established']}', 
	    			'{$park['area_in_acres']}')";
    $dbc->exec($query);
}

