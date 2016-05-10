<?php

class user {

	public $username,$password, $email, $phone, $firstName, $lastname;

public function __construct() {
		
		 // print "User created! \n";
	}
	public function setUsername($newUsername)
  {
      $this->username = $newUsername;
  }
 
  public function getUsername()
  {
      return $this->username;
  }

  public function setPassword($newPassword)
  {
      $this->password = $newPassword;
  }
 
  public function getPassword()
  {
      return $this->password;
  }

  public function setEmail($newEmail)
  {
      $this->email = $newEmail;
  }
 
  public function getEmail()
  {
      return $this->email;
  }

  public function setPhone($newPhone)
  {
      $this->phone = $newPhone;
  }
 
  public function getPhone()
  {
      return $this->phone;
  }

  public function setFirstName($newFirstName)
  {
      $this->firstName = $newFirstName;
  }
 
  public function getFirstName()
  {
      return $this->firstName;
  }

  public function setLastName($newLastName)
  {
      $this->lastName = $newLastName;
  }
 
  public function getLastName()
  {
      return $this->lastName;
  }

  public function userExist($username)
  {
  	global $oDb;
  	echo "checking if user exists";
  	$query = $oDb->prepare("SELECT * FROM Users WHERE username = :paramName");
	$query->bindParam(':paramName', $username);
	$query->execute();
	$aResult = $query->fetchAll(PDO::FETCH_ASSOC);
	var_dump($aResult);
	if(!empty($aResult))
	{
		return false;
	}
	return true;
  }

  public function saveUser()
  {
  	global $oDb;
  	$username = $this->getUsername();
  	$password = $this->getPassword();
  	$email = $this->getEmail();
  	$phone = $this->getPhone();
  	$firstName = $this->getFirstName();
  	$lastName = $this->getLastName();
 	// check if user exist
	if($this->userExist($username) != true)
	{
		echo "User creation failed";
		return false;
	}
	// User does not exist. Creating user
	$query = $oDb->prepare("INSERT INTO Users(username, password, email, phone, firstName, lastName) VALUES (:paramName, :paramPass, :paramM, :paramT, :paramFn, :paramLn)");
  	$query->bindParam(':paramName', $username);
  	$query->bindParam(':paramPass', $password);
  	$query->bindParam(':paramM', $email);
  	$query->bindParam(':paramT', $phone);
  	$query->bindParam(':paramFn', $firstName);
  	$query->bindParam(':paramLn', $lastName);
  	$query->execute();
  	return true;
  }

  public function login()
  {
  	global $oDb;
  	$username = $this -> getUsername();
  	$password = $this -> getPassword();
  	// fetch from database
  	$query = $oDb->prepare("SELECT * FROM Users WHERE username = :paramN");
  	$query -> bindParam(':paramN', $username);
  	$query->execute();
  	$aResult = $query->fetchAll(PDO::FETCH_ASSOC);
  	if(empty($aResult))
  	{

  		echo "Login failed.";
  		return false;
  	}
	
	$fun = new functions();
	$hash = trim($aResult[0]['password']);
	if($fun->deHashFunction($password, $hash))
		{
			if($this->setSession($aResult))
			{
				return true;
			}
			return false;
		}
	return false;

  }

  private function setSession($user)
  {
  	if (session_status() == PHP_SESSION_NONE) {
	}
	$oUser = json_encode($user);
	$_SESSION['theActiveUserIs'] = $oUser;
  	return true;
  }

  public function checkSession()
  {
  	if (!isset($_SESSION['theActiveUserIs'])) 
  	{
    return false;
	}
	return true;
  }

}





?>