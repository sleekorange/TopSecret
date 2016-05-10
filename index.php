<?php
	require_once 'core/init.php';
	require_once 'classes/functions.php';



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
		// Hasing and salting password
		$passwordHashed = hashFunction($password);
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
<!DOCTYPE html>
<html>
<head>
	<title>Rate my pet</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
</head>
<body>

  	<form method="POST">
  		<input type="text" placeholder="username" name="username"></input>
  		<input type="password" placeholder="password" name="password">
  		<input type="text" placeholder="email" name="email">
  		<input type="text" placeholder="phone" name="phone">
  		<input type="text" placeholder="First Name" name="firstName">
  		<input type="text" placeholder="Last Name" name="lastName">
		<button type="submit">Submit</button>
  	</form>

	

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>


</body>
</html>