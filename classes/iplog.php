<?php
	require_once '../classes/user.php';
class iplog {
	public $ip,$error;

	public function getIp()
  	{
      return $this->ip;
  	}
  	public function setIp($newIp)
  	{
      $this->ip = $newIp;
  	}
  	public function getError()
    {
        return $this->error;
    }
    public function setError($newError)
    {
        $this->error = $newError;
    }

	public function retrieveIp()
	{
		if (!empty($_SERVER["HTTP_CLIENT_IP"]))
		{
		 //check for ip from share internet
		 $ip = $_SERVER["HTTP_CLIENT_IP"];
		}
		elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
		{
		 // Check for the Proxy User
		 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		else
		{
		 $ip = $_SERVER["REMOTE_ADDR"];
		}

		$this->setIp($ip);
	}

	public function logIp($obj)
	{

  		global $oDb;
  		//set new error if empty
  		if(empty($this->getError()))
	  		$error = "PasswordOrOther";

	  	$ip = $this->getIp();
	  	$username = $obj->username;
	 	// if user does exist
		if($obj->userExist($username) != true)
		{

		}else
		{
			// user doesnt exist

			$this->setError("NoneUser");
		}
		if(!empty($this->getError()))
		{
			$error = $this->getError();
		}
		// creating log!
		$query = $oDb->prepare("INSERT INTO Log(userId, ip, error) VALUES ((SELECT id FROM Users WHERE username = :paramN), :paramI, :paramE)");
	  	$query->bindParam(':paramN', $username);
	  	$query->bindParam(':paramI', $ip);
	  	$query->bindParam(':paramE', $error);
	  	if($query->execute())
	  	{

	  	}
	}

	public function checkUserBan($obj)
	{
		global $oDb;
		$username = $obj->username;

		$query = $oDb->prepare("SELECT id FROM Log WHERE `time` > timestampadd(day, -1, now()) AND userId = (SELECT id FROM Users WHERE username = :paramN)");
		$query -> bindParam(':paramN', $username);
		$query->execute();
		$aResult = $query->fetchAll(PDO::FETCH_ASSOC);

		$count = $query->rowCount();
		if(!empty($aResult))
		{
		    if($count > 3){
		    	$this->setError("User has been banned");
		      	return true;
		    }
		    return false;
		}
	}

	public function checkIpBan()
	{
		global $oDb;
		$ip = $this->getIp();
		$query = $oDb->prepare("SELECT * FROM Log WHERE time > timestampadd(day, -1, now()) AND userId=:paramI");
		$query -> bindParam(':paramI', $ip);
		$query->execute();
		$aResult = $query->fetchAll(PDO::FETCH_ASSOC);

		$count = $query->rowCount();
		if(!empty($aResult))
		{
		    if($count > 3){
		    	$this->setError("IP has been banned");
		      	return true;

		    }else{
		    	 return false;
		    }

		}
	}



}
