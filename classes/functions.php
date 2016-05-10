<?php
class functions {
	// Methods:
	public function hashFunction ( $userPassword ) {
				$secret_string = 'ave32adshjkok542bywdu@#$@#$224';
				$password  = trim($userPassword) . $secret_string;
				$passwordHashSalt = password_hash($password, PASSWORD_DEFAULT)."\n";
				return $passwordHashSalt;
			}

	// Password hash works by using crypt() in basically a wrapper. It returns a string that contains the salt, the cost and the hash all in one. It is a one-way algorithm, in that you don't decrypt it to validate it, you simply pass the original string in with your password and if it generates the same hash for the provided password, you're authenticated.

	public function deHashFunction ( $userPassword, $passwordHashSalt ){
				$secret_string = 'ave32adshjkok542bywdu@#$@#$224';
				$password = trim($userPassword) . $secret_string;
				return password_verify($password, $passwordHashSalt);
			}

	public function encode ( $toBeEncoded )
	{
		return urlencode($toBeEncoded);
	}
}
		?>
