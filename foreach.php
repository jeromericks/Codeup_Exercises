<?php

$things = array('Sgt. Pepper', "11", null, array(1,2,3), 3.14, "12 + 7", false, (string) 11);

foreach ($things as $thing) {
	if (is_integer($thing)) {
		echo ("{$thing}'s type is integer" . PHP_EOL);
	} elseif (is_float($thing)) {
		echo ("{$thing}'s type is float" . PHP_EOL);
	} elseif (is_bool($thing)) {
		echo ("{$thing}'s type is boolean" . PHP_EOL);
	} elseif (is_array($thing)) {
		foreach ($thing as $element) {
			echo ("{$element} is part of an array" . PHP_EOL);
		}
	} elseif (is_null($thing)) {
		echo ("{$thing} type is null" . PHP_EOL);
	} elseif (is_string($thing)) {
		echo ("{$thing}'s type is string" . PHP_EOL);
	}
}

echo (PHP_EOL);
echo (PHP_EOL);

foreach ($things as $thing) {
	if (is_scalar($thing)) {
		echo ("{$thing} is scalar" . PHP_EOL);
	} 
}

echo (PHP_EOL);
echo (PHP_EOL);

foreach ($things as $thing) {
	if (is_array($thing)) {
		echo (implode(', ', $thing) . PHP_EOL);
	}
}

?>