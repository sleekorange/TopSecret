<?php
require_once '../core/init.php';
require_once 'functions.php';
require_once 'user.php';

	if(isset($_POST['action']) && !empty($_POST['action'])){
		$action = $_POST['action'];
		$fun = new functions();
		$obj = new user();
		if(!$obj->checkSession())
			return false;
		switch($action)
		{
			case 'password':
				// skal vi encode her?
				$password = $fun->encode($_POST['password']);
				$obj->password = $fun->encode($_POST['oldPassword']);
				if($obj->changePassword($password))
					echo "Your password has been changed!";
			break;
			case 'firstName':
			echo "0";
				$firstName = $fun->encode($_POST['firstName']);
				if($obj->changeInfo($firstName, $action))
					echo "1";
			break;
			case 'lastName':
				$lastName = $fun->encode($_POST['lastName']);
					if($obj->changeInfo($lastName, $action))
						echo "1";
			break;
			case 'phone':
				$phone = $fun->encode($_POST['phone']);
				if(ctype_digit($phone))
				{
					echo "success";
				if($obj->changeInfo($phone, $action))
					echo "1";
				}else{
					echo "not a number";
				}
			break;
		}
	}	


?>