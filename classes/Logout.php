<?php
require_once 'user.php';
require_once '../core/init.php';

$obj = new user();

if($obj -> endSession()){
	echo "You have been logged out!";
}

?>