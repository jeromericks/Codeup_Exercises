<?php

date_default_timezone_set('America/Chicago');
require_once 'Log.php';

$log = new Log('cli');

$log->info("This is an info message.");
$log->error("This is an error message.");

?>