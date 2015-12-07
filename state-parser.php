<?php

function parseStates($filename)
{
	$statesArray = array();

	$handle = fopen($filename, 'r');
	$contentString = trim(fread($handle, filesize($filename)));
	$arrayOfStrings = explode(PHP_EOL, $contentString);

	foreach($arrayOfStrings as $index => $state) {
		$innerArray = explode(',', $state);
		unset($arrayOfStrings[$index]);
		$statesArray[$index]['state'] = $innerArray[0];
		$statesArray[$index]['capital'] = $innerArray[1];
		$statesArray[$index]['bird'] = $innerArray[2];
	}

	fclose($handle);
	return $statesArray;
}

print_r(parseStates('states.txt'));