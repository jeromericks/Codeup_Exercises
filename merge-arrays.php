<?php

$names = ['Tina', 'Dana', 'Mike', 'Amy', 'Adam'];

$compare = ['Tina', 'Dean', 'Mel', 'Amy', 'Michael'];


function lookInArray($element, $array){
	$result = array_search($element, $array); 
	if ($result === false){
		return false; 
	} else {
		return true;
	}
}

echo lookInArray('Tina', $names) . PHP_EOL;
echo lookInArray('Bob', $names) . PHP_EOL; 


function compareArray($newArray, $controlArray) {
	$match = 0;
	$diff = 0;

	foreach ($newArray as $singleElement) {
		if(lookInArray($singleElement, $controlArray)) {
			$match = $match + 1;
		} else {
			$diff = $diff + 1;
		}

		
	}
	return "These arrays have {$match} values in common and {$diff} that didn't match between the two arrays" . PHP_EOL; 
}

echo compareArray($compare, $names) . PHP_EOL; 


function combine_arrays($newArray, $controlArray) {
	$thirdArray = [];

	for ($i = 0; $i < count($newArray); $i++) { 
		if($newArray[$i] == $controlArray[$i]) {
			array_push($thirdArray, $newArray[$i]);
		} else {
			array_push($thirdArray, $newArray[$i]);
			array_push($thirdArray, $controlArray[$i]);
		}
	}
	print_r($thirdArray);
}

echo combine_arrays($names, $compare) . PHP_EOL;

?>