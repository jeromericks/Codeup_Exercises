<?php

class Rectangle
{
	private $height;
	private $width;

	public function __construct($height, $width)
    {
        $this->setHeight($height);
        $this->setWidth($width);
    }

    protected function setHeight($height)
    {
        $this->height = trim($height);
    }

    protected function setWidth($width)
    {
        $this->width = trim($width);
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function area()
    {
    	return $this->getHeight() * $this->getWidth();
    }

    public function perimeter()
    {
    	return ($this->getHeight() + $this->getWidth()) * 2;
    }

}

?>