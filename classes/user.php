<?php
class user {
	public $username,$password, $email, $phone, $firstName, $lastname;
public function __construct() {
		
		 // print "User created! \n";
	}

  public function getUserIdSession(){
    if($this->checkSession()){
      $user = json_decode($_SESSION['theActiveUserIs']);
      $userId = $user[0]->id;
      return $userId;
    } 
  }

  public function getSessionPassword(){
    if($this->checkSession()){
      $user = json_decode($_SESSION['theActiveUserIs']);
      $password = $user[0]->password;
      return $password;
    } 
  }

  public function getUserNameSession(){
    if($this->checkSession()){
      $user = json_decode($_SESSION['theActiveUserIs']);
      $userName = $user[0]->username;
      return $userName;
    } 
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
  	$query = $oDb->prepare("SELECT * FROM Users WHERE username = :paramName");
	$query->bindParam(':paramName', $username);
	$query->execute();
	$aResult = $query->fetchAll(PDO::FETCH_ASSOC);
  // if its not empty
	if(!empty($aResult))
	{
		return false;
	}
  // if its empty
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
  	if($query->execute())
  	{
  		$this->sendActivation($this->getPassword());
  		return true;
  	}
  	return false;
  }
  private function sendActivation($hash)
  {
  			$to = $this->getEmail(); // Send email to our user
  			$username = $this->getUsername();
  			$hash = $hash;
		 // create a new cURL resource
            // $ch = curl_init();
            
            // // set URL and other appropriate options
            //  curl_setopt($ch, CURLOPT_URL, "http://hansmygind.dk/mail-daemon/verify.php?to=$to&username=$username&hash=$hash");
            // curl_setopt($ch, CURLOPT_HEADER, 0);
            // // grab URL and pass it to the browser
            // curl_exec($ch);
            // // close cURL resource, and free up system resources
        header('Location: '."http://hansmygind.dk/mail-daemon/verify.php?to=$to&username=$username&hash=$hash");
            // curl_close($ch);
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

  private function updateSessionPassword($newPassword)
  {
    if($this->checkSession()){
      $user = json_decode($_SESSION['theActiveUserIs']);
      $user[0]->password = $newPassword;
      unset($_SESSION['theActiveUserIs']);
      $_SESSION['theActiveUserIs'] = json_encode($user);
      var_dump($_SESSION['theActiveUserIs']);
      return true;
    } 
  }

  public function endSession()
  {
    session_destroy();
    if (session_status() == PHP_SESSION_NONE) {
      return true;
  }
  return false;
  }

  public function changePassword($newPassword)
  {
    $fun = new functions();
    global $oDb;
    // retriveing current userId
    $id = $this->getUserIdSession();
    $hash = trim($this->getSessionPassword());
    $oldPassword = trim($this->getPassword());
    // verifying that current password is correct
    if($fun->deHashFunction($oldPassword,$hash))
    {
      if($hashNewPassword = $fun->hashFunction($newPassword)){
        echo $hashNewPassword;
        $query = $oDb->prepare("UPDATE Users SET password= :paramP WHERE id= :paramI");
        $query->bindParam(':paramP', $hashNewPassword);
        $query->bindParam(':paramI', $id);
        if($query->execute()){
        if($this->updateSessionPassword($hashNewPassword))
        {
          return true;
        }
        }
      }
    }else{
      echo "Wrong password";
    }
      return false;
  }
  public function changeInfo($newInfo, $column)
  {
    $fun = new functions();
    global $oDb;
    $id = $this->getUserIdSession();
  
  $query = $oDb -> prepare("UPDATE Users SET $column = :paramP WHERE id= :paramI");
  $query->bindParam(':paramP', $newInfo);
  $query->bindParam(':paramI', $id);
    if($query->execute())
    return true;
  }
}
?>