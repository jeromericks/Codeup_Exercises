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

if ($argc < 2) {
    fwrite(STDOUT, 'Please enter a starting numeric value: ');
    $min = trim(fgets(STDIN));
    if (!is_numeric($min)) {
        die('NOT a numeric value');
    }
} else {
    $min = $argv[1];
}
if ($argc < 3) {
    fwrite(STDOUT, 'Please enter a ending numeric value: ');
    $max = trim(fgets(STDIN));
    if (!is_numeric($max)) {
        die('NOT a numeric value');
    }
} else {
    $max = $argv[2];
}
    
if ($argc < 4) {
    fwrite(STDOUT, 'Please enter a numeric increment value: ');
    $increment = trim(fgets(STDIN));
} else {
    $increment = $argv[3];
}
if (empty($increment)) {
    $increment = 1;
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