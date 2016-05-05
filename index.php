<?php
	require_once 'core/init.php';
	$obj = new user();

// Methods:
function saltFunction ( $password ) {
			$salt = mcrypt_create_iv(50, MCRYPT_DEV_URANDOM);
			$passwordSalt = $password . $salt;
			$passwordArray = array('passwordSalt' => $passwordSalt, 'salt' => $salt);
			return $passwordArray;
		}

function hashFunction ( $password ) {
			$passwordHash = password_hash($password, PASSWORD_DEFAULT)."\n";
			return $passwordHash;
		}


if(isset($_POST['username']) && isset($_POST['password'])){
	if(!empty($_POST['username']) && !empty($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		echo "Something works!".$username.$password;
		echo "<br>";

		

		$passwordSalted = saltFunction("string")['passwordSalt'];


		

		//$salt = mcrypt_create_iv(50, MCRYPT_DEV_URANDOM);
		//$passwordSalt = $password . $salt;
		// $passwordHash = password_hash($passwordSalt, PASSWORD_DEFAULT)."\n";
		// $hashedSalt = hash('sha512',$salt);
		$obj->username = "Hans";
		var_dump($obj);
		var_dump($passwordSalted);
		var_dump(hashFunction($passwordSalted));
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
		<button type="submit">Submit</button>
  	</form>

	

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>


</body>
</html>