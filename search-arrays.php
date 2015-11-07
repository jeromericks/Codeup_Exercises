<?php

$names = ['Tina', 'Dana', 'Mike', 'Amy', 'Adam'];

$compare = ['Tina', 'Dean', 'Mel', 'Amy', 'Michael'];


$value = arrayHasValue($names);

if($value) {
	$key = array_search('Tina', $names);
	$keys = array_search('Bob', $names); 
}

switch("integer") {
	case $key:
		echo $names[$key] . PHP_EOL;
		break;
	case $keys:
		echo $names[$keys] . PHP_EOL;
		break;
	default:
		break;
}

echo PHP_EOL;

function arrayHasValue($name) {
	if(count($name) != 0) {
		return true;
	} else {
		return false;
	}
}


function compareArray($compare, $names) {
	$result = array_intersect($compare, $names);
	sort($result);
	var_dump($result);
	if ($result) {
		for($i = 0; $i <= count($result); $i++) {
	    	return $result[$i] . PHP_EOL;
		}
	}
}

echo compareArray($compare, $names); 

?>