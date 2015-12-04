<?php

require_once 'Rectangle.php';

class Square extends Rectangle
{
	public function perimeter()
	{
		return $this->height * 4;
	}
}

?>