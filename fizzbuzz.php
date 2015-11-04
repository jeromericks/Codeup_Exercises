<?php

// $fizzbuzz = 0;

// while ($fizzbuzz <= 100) {
// 	$fizzbuzz++;
// 	if($fizzbuzz % 3 === 0 && $fizzbuzz % 5 === 0){
// 		echo "FizzBuzz \n";
// 		continue;
// 	}
// 	else if($fizzbuzz % 3 === 0){
// 		echo "Fizz \n";
// 		continue; 
// 	}
// 	else if($fizzbuzz % 5 === 0){
// 		echo "Buzz \n";
// 		continue;
// 	}
// 	else {
// 		echo "$fizzbuzz \n";
// 	}
// }


$min = 1;
$max = 100;
$increment = 1;

if($argv[1] && $argv[2] && $argv[3]) {
	$min = $argv[1];
	$max = $argv[2];
	$increment = $argv[3];
}

if (!is_numeric($min) && !is_numeric($max) && !is_numeric($increment)) {
	$min;
	$max;
	$increment;
}

for($fizzbuzz = $min; $fizzbuzz <= $max; $fizzbuzz += $increment) {
	if($fizzbuzz % 3 === 0 && $fizzbuzz % 5 === 0){
		echo "FizzBuzz \n";
		continue;
	}
	else if($fizzbuzz % 3 === 0){
		echo "Fizz \n";
		continue; 
	}
	else if($fizzbuzz % 5 === 0){
		echo "Buzz \n";
		continue;
	}
	else {
		echo "$fizzbuzz \n";
	}
}

?>