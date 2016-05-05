<?php

class user {
public function __construct() {
		$this -> _db = DB::getInstance();
		print "construct \n";
	}


}



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

?>