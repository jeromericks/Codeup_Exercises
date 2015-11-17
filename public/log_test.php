<?php

require_once 'Log.php';

$log = new Log();

$log->filename = "data/log-{$todaysDate}.log";
$log->info("This is an info message.");
$log->error("This is an error message.");

?>