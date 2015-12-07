<?php

require_once 'Model.php';

$model = new Model();
$model->name = 'Jerome Ricks';
$model->class = 'Codeup';

print_r($model);

echo PHP_EOL;
echo "Name is " . $model->name . PHP_EOL;
echo "Class is " . $model->class . PHP_EOL;
echo PHP_EOL;

?>
