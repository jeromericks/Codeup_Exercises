<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'password');

require 'db_connect.php';

$dbc->exec('DROP TABLE IF EXISTS national_parks');

$query = 'CREATE TABLE national_parks (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    date_established DATE NOT NULL,
    area_in_acres DOUBLE(10, 2) NOT NULL,
    PRIMARY KEY (id)
)';

$park = $dbc->exec($query);

echo $park. PHP_EOL;