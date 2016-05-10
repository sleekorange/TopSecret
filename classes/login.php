<?php
require_once 'user.php';
require_once 'functions.php';
require_once '../core/init.php';

if(isset($_POST['username']) && isset($_POST['password'])){
	if(!empty($_POST['username']) && !empty($_POST['password']) ){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$obj = new user();
		$obj->username = $username;
		$obj->password = $password;
		var_dump($obj->login());
		if(!$obj->login())
		{
			echo "Error";
		}else{
			echo "success";
			$obj->checkSession();
		}
		



		}
	}
?>