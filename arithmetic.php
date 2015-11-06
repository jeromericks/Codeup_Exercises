<?php

$a = 5;
$b = hi;

function add($a, $b) {
	$noError = errorCheck($a, $b);
	if($noError) {
		return $a + $b . PHP_EOL;
	}
}

function subtract($a, $b) {
	$noError = errorCheck($a, $b);
	if($noError) {
		return $a - $b . PHP_EOL;
	}
}

function multiply($a, $b) {
	$noError = errorCheck($a, $b);
	if($noError) {
		return $a * $b . PHP_EOL;
	}
}

function divide($a, $b) {
	$noError = errorCheck($a, $b);
	if($noError) {
		if($a == 0 || $b == 0) {
			return "ERROR: cannot use zero as a variable" . PHP_EOL;
		} else {
			return $a / $b . PHP_EOL;
		}
	}
}

function modulus($a, $b) {
	$noError = errorCheck($a, $b);
	if($noError) {
		if($a == 0 || $b == 0) {
			return "ERROR: cannot use zero as a variable" . PHP_EOL;
		} else {
			return $a % $b . PHP_EOL;
		}
	}
}

function errorCheck($a, $b) {
	if(!is_numeric($a) || !is_numeric($b)) {
		echo "ERROR: {$a} and {$b} must be numbers" . PHP_EOL;
		return false;
	} else {
		return true;
	}
}


// Add code to test your functions here
echo(add($a, $b));
echo(subtract($a, $b));
echo(multiply($a, $b));
echo(divide($a, $b));
echo(modulus($a, $b));


?>