<?php

// Output should include:
// - total number of employees
// - total number of units sold
// - avg units sold per employee
// - Then output should share employee production, ordered from highest to lowest # of units
// * Units   |     Full Name       |   Employee Number
// * 5             Bob Boberson        2

function parseEmployees($filename)
{
    $employeesArray = array();
   
	$handle = fopen($filename, 'r');
	$contentString = trim(fread($handle, filesize($filename)));
	$arrayOfStrings = explode(PHP_EOL, $contentString);
	//Put the unnecessary items in their own array
	for($i = 0; $i < 6; $i++){
		$firstLines[] = array_shift($arrayOfStrings);
	}
	$data = count($arrayOfStrings);
	foreach ($arrayOfStrings as $index => $employee) {
		$innerArray = explode(', ', $employee);
		unset($arrayOfStrings[$index]);
		$employeesArray[$index]['Units'] = $innerArray[3];
		$employeesArray[$index]['Full Name'] = $innerArray[1] . ' ' . $innerArray[2];
		$employeesArray[$index]['Employee Number'] = $innerArray[0];
	}
	$unit = unitTotal($employeesArray);
	fclose($handle);
	echo "Total Number of Employees: " . $data . PHP_EOL;
	echo "Total Number of Units Sold: " . $unit . PHP_EOL;
	echo "Average Units Sold Per Employee: " . $unit / $data . PHP_EOL;

	return $employeesArray;
}

function unitTotal($array)
{
	$sum = 0;
	foreach ($array as $index => $value) {
		$sum = $sum + $value['Units'];
	}
	return $sum;
}


$employee = parseEmployees("data/report.txt");

function compareUnits($a, $b) 
{
	return (int)$b['Units'] - (int)$a['Units'];
}
	
usort($employee, "compareUnits");
print_r($employee);