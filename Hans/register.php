<?php
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
		var_dump($passwordSalted);
		var_dump(hashFunction($passwordSalted));
	}
	

}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  </head>
  <body>
  	<form method="POST">
  		<input type="text" placeholder="username" name="username"></input>
  		<input type="password" placeholder="password" name="password">
		<button type="submit">Submit</button>
  	</form>
  </body>
</html> 