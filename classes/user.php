<?php

class user {
	public $username,
			$password;

public function __construct() {
		
		 print "User created! \n";
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

  public function saveUser()
  {
  	global $oDb;
  	$username = $this->getUsername();
  	echo "saving user ".$username; 
  	$query = $oDb->prepare("INSERT INTO `posts`(`post`) VALUES (:paramName)");
  	$query->bindParam(':paramName', $username);
  	$query->execute();
  }

}





?>