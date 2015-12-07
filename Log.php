<?php

class Log
{
	private $filename;
	private $handle;


	public function __construct($prefix = 'log')
	{
		$this->setFileName("data/" . $prefix . "-" . date("Y-m-d") . ".log");
		$this->setHandle(fopen($this->getFileName(), 'a'));
	}

	protected function setFileName($filename)
    {
    	if(is_string($filename) && is_writable($filename)){
	        $this->filename = trim($filename);
	        touch($this->filename);
    	} else {
    		echo "Must use a sting for filename" . PHP_EOL;
    	}
    }

    protected function setHandle($handle)
    {
    	$this->handle = $handle;
    }

    public function getFileName()
    {
        return $this->filename;
    }

    public function getHandle()
    {
        return $this->handle;
    }

	public function logMessage($logLevel, $message)
	{
		$todaysDate = date("Y-m-d");
		$todaysTime = date("h:i:s A");
		$formattedDate = $todaysDate . ' ' . $todaysTime . ' ' . $logLevel . ' ' . $message . PHP_EOL;
		fwrite($this->getHandle(), $formattedDate);
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
		fclose($this->getHandle());
	}
}

?>