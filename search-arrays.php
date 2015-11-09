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
	$commonItems = 0;
	foreach ($names as $key => $value) {
		$check = array_search($value, $compare); 
		if ($check !== false){   
			$commonItems++;  
		}
	}
	return "These arrays have {$commonItems} things in common" . PHP_EOL; 
}

echo compareArray($compare, $names) . PHP_EOL; 

?>