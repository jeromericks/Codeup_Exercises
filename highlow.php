<?php

$counter = 0;
$random = mt_rand(1, 100);
fwrite(STDOUT, 'Guess? ');
$guess = fgets(STDIN);

do {
	if($guess < $random) {
		echo "HIGHER" . PHP_EOL;
		fwrite(STDOUT, "Guess?" . PHP_EOL);
	} else if($guess > $random) {
		echo "LOWER" . PHP_EOL;
		fwrite(STDOUT, "Guess?" . PHP_EOL);
	} 
	$counter++;

} while ($random !== $guess);


if ($guess == $random) {
	echo "GOOD GUESS!" . PHP_EOL;
	echo "Number of guesses: {$counter}" . PHP_EOL;
}

?>