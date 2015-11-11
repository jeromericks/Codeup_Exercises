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
	foreach ($arrayOfStrings as $index => $employee) {
		$innerArray = explode(', ', $employee);
		unset($arrayOfStrings[$index]);
		$employeesArray[$index]['Units'] = $innerArray[3];
		$employeesArray[$index]['Full Name'] = $innerArray[1] . ' ' . $innerArray[2];
		$employeesArray[$index]['Employee Number'] = $innerArray[0];
	}
	fclose($handle);

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

function cleanOutputForEmployee($employee)
{
	$a = cleanString(8, $employee['Units']);
	$b = cleanString(45, $employee['Full Name']);
	$c = "         {$employee['Employee Number']}";
	return "$a|$b|$c";
}

function cleanString($total_length, $string)
{
	$string_length = strlen($string);
	$spaces = $total_length - $string_length -2;
	$string = "  $string";
	for($i = 0; $i < $spaces / 2; $i++) {
		$string = " $string ";
	}
	if ($spaces % 2 === 0) {
		$string .= ' ';
	}
	return $string;
}


$employee = parseEmployees("data/report.txt");

	
$data = count($employee);
$unit = unitTotal($employee);

echo PHP_EOL;
echo "Total Number of Employees: " . $data . PHP_EOL;
echo "Total Number of Units Sold: " . $unit . PHP_EOL;
echo "Average Units Sold Per Employee: " . $unit / $data . PHP_EOL;
echo PHP_EOL;

arsort($employee);

echo '  Units  |                   Full Name                  |   Employee Number' . PHP_EOL;
echo '===========================================================================' . PHP_EOL;

foreach($employee as $employeeString)
{
	echo cleanOutputForEmployee($employeeString) . PHP_EOL;
}

echo PHP_EOL;