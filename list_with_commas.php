<?php


function humanizedList($array, $alphabeticalSort = false) 
{
	if($alphabeticalSort) {
		sort($array);
	}
	$lastValue = array_pop($array);
	$arrayString = implode(', ', $array);
	$arrayString = $arrayString . ', and ' . $lastValue;
	return $arrayString;
}


// List of famous peeps
$physicistsString = 'Gordon Freeman, Samantha Carter, Sheldon Cooper, Quinn Mallory, Bruce Banner, Tony Stark';

// TODO: Convert the string into an array
$physicistsArray = explode(', ', $physicistsString);

// Humanize that list
$famousFakePhysicists = humanizedList($physicistsArray);

// Output sentence
echo "Some of the most famous fictional theoretical physicists are {$famousFakePhysicists}." . PHP_EOL;

// print_r($physicistsArray) . PHP_EOL;

?>