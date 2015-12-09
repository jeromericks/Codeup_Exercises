<?php

require_once 'Model.php';

class User extends Model
{
	protected static $table = 'contacts';

}

$user = new User();
$user->email = 'jeromericks@gmail.com';
$user->name = 'Jerome';
$user->phone = '979-446-7969';
$user->address = '100 Hi Avenue';
$user->city = 'San Antonio';
$user->state = 'TX';
$user->zip = '78212';
$user->name = 'Jerome is the greatest';
$model = User::all();
// $find = User::find(2);
$test = $user->getAttributes();
$save = $user->save();
var_dump($model);
// $user->save();