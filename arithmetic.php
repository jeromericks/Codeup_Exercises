<?php

$a = 5;
$b = 4;

function add($a, $b) {
	$error = errorCheck($a, $b);
	if($error) {
		return $a + $b . PHP_EOL;
	}
}

function subtract($a, $b) {
	$error = errorCheck($a, $b);
	if($error) {
		return $a - $b . PHP_EOL;
	}
}

function multiply($a, $b) {
	$error = errorCheck($a, $b);
	if($error) {
		return $a * $b . PHP_EOL;
	}
}

function divide($a, $b) {
	$error = errorCheck($a, $b);
	if($error) {
		if($a == 0 || $b == 0) {
			return "ERROR: cannot use zero as a variable" . PHP_EOL;
		} else {
			return $a / $b . PHP_EOL;
		}
	}
}

function modulus($a, $b) {
	$error = errorCheck($a, $b);
	if($error) {
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