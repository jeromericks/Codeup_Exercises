<?php

// Set the default timezone
date_default_timezone_set('America/Chicago');

// Get Day of Week as number
// 1 (for Monday) through 7 (for Sunday)
$dayOfWeek = date('N');

echo PHP_EOL;

switch($dayOfWeek) {
	case 1:
 		echo "Monday" . PHP_EOL;
 		break;
	case 2:
 		echo "Tuesday" . PHP_EOL;
 		break;
    case 3:
    	echo "Wednesday" . PHP_EOL;
    	break;
    case 4:
    	echo "Thursday" . PHP_EOL;
    	break;
    case 5:
    	echo "Friday" . PHP_EOL;
    	break;
    case 6:
    	echo "Saturday" . PHP_EOL;
    	break;
    case 7:
    	echo "Sunday" . PHP_EOL;
    	break;
}

echo PHP_EOL;

if ($dayOfWeek == 1) {
	echo "Monday" . PHP_EOL;
} elseif ($dayOfWeek == 2) {
	echo "Tuesday" . PHP_EOL;
} elseif ($dayOfWeek == 3) {
	echo "Wednesday" . PHP_EOL;
} elseif ($dayOfWeek == 4) {
	echo "Thursday" . PHP_EOL;
} elseif ($dayOfWeek == 5) {
	echo "Friday" . PHP_EOL;
} elseif ($dayOfWeek == 6) {
	echo "Saturday" . PHP_EOL;
} elseif ($dayOfWeek == 7) {
	echo "Sunday" . PHP_EOL;
}

echo PHP_EOL;

?>