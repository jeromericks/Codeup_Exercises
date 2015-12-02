<?php
require 'park_migration.php';


echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$delete = 'TRUNCATE national_parks';
$dbc->exec($delete);

$parks = [];

foreach($parks as $park) {
	$query = "INSERT INTO national_parks(name, location, date_established, area_in_acres) 
	VALUES ('Yosemite', 'California', '1980-02-02', '747956'),
		   ('Yellowstone', 'Wyoming', '1972-09-08', '2219791'),
		   ('Arches', 'Utah', '1929-08-18', '76518.98'),
		   ('Big Bend', 'Texas', '1944-12-25', '801163.21'),
		   ('Bryce Canyon', 'Utah', '1928-04-09', '35835.08'),
		   ('Carlsbad Caverns', 'New Mexico', '1930-09-27', '46766.45'),
		   ('Death Valley', 'California', '1994-10-10', '3372401.96'),
		   ('Everglades', 'Florida', '1934-11-23', '1508537.90'),
		   ('Great Smoky Mountains', 'Tennessee', '1934-10-14', '521490.13'),
		   ('Guadalupe Mountains', 'Texas', '1966-12-26', '86415.97')";
    $dbc->exec($query);
}

