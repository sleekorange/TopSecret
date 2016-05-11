<?php 
	require_once '../classes/user.php';
	require_once '../classes/functions.php';
	require_once '../core/init.php';


	if(isset($_POST['function'])){
	
	$function = $_POST['function'];

		if($function == "logIn"){

			if(isset($_POST['username']) && isset($_POST['password'])){
				if(!empty($_POST['username']) && !empty($_POST['password']) ){
					$username = $_POST['username'];
					$password = $_POST['password'];
					$obj = new user();
					$obj->username = $username;
					$obj->password = $password;

						if(!$obj->login())
						{
							echo "error";
						}else{
							// echo "Hello ".urlencode($obj->username);
							echo "success";
							
						// var_dump(session_status());
						}
				}
			}

		}

		if($function == "logOut"){
			$obj = new user();

			if($obj -> endSession()){
				echo "You have been logged out!";
			}

		}

		if($function == "register"){

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
		}

		if($function == "verify"){

			if(isset($_GET['username']) && !empty($_GET['username']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
		    // Verify data
		    $username = $_GET['username']; // Set email variable
		    $hash = $_GET['hash']; // Set hash variable
		    $query = $oDb->prepare("SELECT id, password, active FROM Users WHERE username='".$username."' AND active='0'") or die(mysql_error());
			if($query->execute()){
				echo "1";
				$aResult = $query->fetchAll(PDO::FETCH_ASSOC);
				if(trim($hash) == trim($aResult[0]['password']))
					echo "2";
				{
					
					$query = $oDb->prepare("UPDATE Users SET active = 1 WHERE id = ".$aResult[0]['id']."");
					if($query->execute())
						{
							echo "You have now been verified!";
							exit;
						}
				}
			}else{
			    // Invalid approach
				}
			}
		}

	} 


?>