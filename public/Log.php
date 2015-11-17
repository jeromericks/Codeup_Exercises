<?php

class Log
{
	public $filename;

	public function logMessage($logLevel, $message)
	{
		$todaysDate = date("Y-m-d");
		$todaysDateTime = date("h:i:s A");
		$handle = fopen($this->$filename, 'a');
		$formattedDate = $todaysDate . ' ' . $todaysDateTime . ' ' . $logLevel . ' ' . $message . PHP_EOL;
		fwrite($handle, $formattedDate);
		fclose($handle);
	}

	public function info($message)
	{
		$this->logMessage("INFO", $message);
	}

	public function error($message)
	{
		$this->logMessage("ERROR", $message);
	}
}

?>