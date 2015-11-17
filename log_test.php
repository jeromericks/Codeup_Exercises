<?php

date_default_timezone_set('America/Chicago');
require_once 'Log.php';

$log = new Log();

$log->filename = "data/log-" . date("Y-m-d") . ".log";
$log->info("This is an info message.");
$log->error("This is an error message.");

?>