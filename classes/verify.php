<?php 
require_once '../core/init.php';

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
?>