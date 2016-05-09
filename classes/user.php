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
  	$query = $oDb->prepare("SELECT * FROM posts");
  	$query->execute();
  	$aResult = $query -> fetchAll(PDO::FETCH_ASSOC);
  	$sFlights = json_encode($aResult);

  	echo $sFlights;
  }

}





?>