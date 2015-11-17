<?php

class Log
{
	public $filename;
	public $handle;


	public function __construct($prefix = 'log')
	{
		$this->filename = "data/" . $prefix . "-" . date("Y-m-d") . ".log";
		$this->handle = fopen($this->filename, 'a');
	}

	public function logMessage($logLevel, $message)
	{
		$todaysDate = date("Y-m-d");
		$todaysTime = date("h:i:s A");
		$formattedDate = $todaysDate . ' ' . $todaysTime . ' ' . $logLevel . ' ' . $message . PHP_EOL;
		fwrite($this->handle, $formattedDate);
	}

	public function info($message)
	{
		$this->logMessage("INFO", $message);
	}

	public function error($message)
	{
		$this->logMessage("ERROR", $message);
	}

	public function __destruct()
	{
		fclose($this->handle);
	}
}

?>