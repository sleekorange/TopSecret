<?php
	require_once 'core/init.php';
	require_once'classes/user.php';
	// is user logged in
	$obj = new user();
	if($obj->checkSession())
	{
		Echo "Hello, you are logged in!";
	}	
	else{
		var_dump($obj->checkSession());
		echo "guess not";
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
  	<form method="POST" action="classes/register.php">
  		<input type="text" placeholder="username" name="username"></input>
  		<input type="password" placeholder="password" name="password">
  		<input type="text" placeholder="email" name="email">
  		<input type="number" placeholder="phone" name="phone">
  		<input type="text" placeholder="First Name" name="firstName">
  		<input type="text" placeholder="Last Name" name="lastName">
		<button type="submit">Register</button>
  	</form>

  	<form method="POST" action="classes/login.php">
		<input type="text" placeholder="username" name="username">
		<input type="text" placeholder="password" name="password">
		<button type="submit">Login</button>
  	</form>
	<h3>I want to change my</h3>
  	<form>
  		<label>Password</label>
  		<input type="checkbox" name="passwordCheck" value="1" checked>
  		<label>First Name</label>
  		<input type="checkbox" name="firstNameCheck" value="2">
  		<label>Last Name</label>
  		<input type="checkbox" name="lastNameCheck" value="3">
  		<label>Phone</label>
  		<input type="checkbox" name="phoneCheck" value="4">
		
  		<script></script>
		<form method="POST" action="classes/changeInfo.php" style="hidden">
			<input type="text" name="oldPassword">
			<input type="text" name="password">
			<input type="submit">
		</form>
		<form method="POST" action="classes/changeInfo.php" style="hidden">
			<input type="text" name="oldPassword">
			<input type="submit">
		</form>
		<form method="POST" action="classes/changeInfo.php" style="hidden">
			<input type="text" name="oldPassword">
			<input type="text" name="password">
			<input type="submit">
		</form>
		<form method="POST" action="classes/changeInfo.php" style="hidden">
			<input type="text" name="oldPassword">
			<input type="text" name="password">
			<input type="submit">
		</form>
  	</form>

	

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>


</body>
</html>