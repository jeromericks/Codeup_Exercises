<?php

for($i = 1; $i <= 100; $i++) {
	if ($i % 2 == 0) {
		echo $i . PHP_EOL;
        continue;
    }
}

echo PHP_EOL;

for($i = 1; $i <= 100; $i++) {
	echo ($i . PHP_EOL);
	if ($i >= 10) {
		break;
	}
}

?>