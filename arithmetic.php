<?php

$a = 5;
$b = 0;

function add($a, $b) {
	if (is_numeric($a) && is_numeric($b)) {
    	return $a + $b . PHP_EOL;
    } else {
        error($a, $b);
    }
}

function subtract($a, $b) {
	if (is_numeric($a) && is_numeric($b)) {
    	return $a - $b . PHP_EOL;
    } else {
        error($a, $b);
    }
}

function multiply($a, $b) {
	if (is_numeric($a) && is_numeric($b)) {
    	return $a * $b . PHP_EOL;
    } else {
        error($a, $b);
    }
}

function divide($a, $b) {
	if (is_numeric($a) && is_numeric($b) && $a !== 0 && $b !== 0) {
    	return $a / $b . PHP_EOL;
    } else {
        error($a, $b);
    }
}

function modulus($a, $b) {
	if (is_numeric($a) && is_numeric($b) && $a !== 0 && $b !== 0) {
		return $a % $b . PHP_EOL;
	} else {
        error($a, $b);
    }
}

function error($a, $b) {
	return "ERROR: {$a} and {$b} must be numbers and you can't use zero" . PHP_EOL;
}


// Add code to test your functions here
echo(add($a, $b));
echo(subtract($a, $b));
echo(multiply($a, $b));
echo(divide($a, $b));
echo(modulus($a, $b));


?>