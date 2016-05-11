<?php
require_once 'user.php';
require_once 'functions.php';
require_once '../core/init.php';
	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['firstName']) && isset($_POST['lastName'])){
		if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['firstName']) && !empty($_POST['lastName'])){
			// ENCODE THE INPUTS
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			
			
			$obj = new user();
			$fun = new functions();
			// Hasing and salting password
			$passwordHashed = $fun->hashFunction($password);
			// Saving userdata to database
			
			$obj->setUsername($username);
			$obj->setPassword($passwordHashed);
			$obj->setEmail($email);
			$obj->setPhone($phone);
			$obj->setFirstName($firstName);
			$obj->setLastName($lastName);
			//Save
			$obj->saveUser();
	}
}	
?>