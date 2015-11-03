<?php

$fizzbuzz = 0;

while ($fizzbuzz < 100) {
	$fizzbuzz++;
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