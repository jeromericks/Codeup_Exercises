<?php

require_once 'config.php';
require_once 'Model.php';

class User extends Model
{
	protected static $table = 'contacts';
}

// $user = new User();
// $user->email = 'jeromericks@gmail.com';
// $user->name = 'Jerome';
// $user->phone = '979-446-7969';
// $user->address = '100 Hi Avenue';
// $user->city = 'San Antonio';
// $user->state = 'TX';
// $user->zip = '78212';
// $user->save();

// $user2 = new User();
// $user2->email = 'jeromeric@gmail.com';
// $user2->name = 'Jerome';
// $user2->phone = '979-446-7969';
// $user2->address = '100 Hi Avenue';
// $user2->city = 'San Antonio';
// $user2->state = 'TX';
// $user2->zip = '78212';
// $user2->save();

$find = User::find(35);
$find->email = 'jeromerick@gmail.com';
$find->save();
// var_dump($find);
// echo $find . PHP_EOL;

// $test = $user->getAttributes();

// $delete = User::delete(34);
$model = User::all();
var_dump($model);