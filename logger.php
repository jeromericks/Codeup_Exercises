<?php

function logMessage($logLevel, $message)
{
	date_default_timezone_set('America/Chicago');
	$todaysDate = date("Y-m-d");
	$todaysDateTime = date("h:i:s A");
    $filename = "data/log-{$todaysDate}.log";
	$handle = fopen($filename, 'a');
	$formattedDate = $todaysDate . ' ' . $todaysDateTime . ' ' . $logLevel . ' ' . $message . PHP_EOL;
	fwrite($handle, $formattedDate);
	fclose($handle);
}

function logInfo($message)
{
	logMessage("INFO", $message);
}

function logError($message)
{
	logMessage("ERROR", $message);
}

logInfo("This is an info message.");
logError("This is an error message.");