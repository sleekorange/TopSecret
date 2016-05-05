<?php

class user {
	public $username,
			$password;

public function __construct() {
		$this -> _db = DB::getInstance();
		 print "User created! \n";
	}
	public function setUsername($newUsername)
  {
      $this->username = $newUsername;
  }
 
  public function getUsername()
  {
      return $this->username . "<br />";
  }

  public function setUsername($newUsername)
  {
      $this->username = $newPassword;
  }
 
  public function getUsername()
  {
      return $this->password . "<br />";
  }


}





?>