<?php

function inputHas($key)
{
	if(isset($_REQUEST[$key])){
		return true;
	}
	return false;
}

function inputGet($key)
{
	if(inputHas($key)){
		return $_REQUEST[$key];
	}
	return null;
}

function escape($input)
{
	return htmlspecialchars(strip_tags($input));
}

?>