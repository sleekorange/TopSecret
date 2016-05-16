<?php

	
	function setToken() {
		$token = md5(uniqid(rand(), true));
		$_SESSION["token"] = $token;
		return $token;
	}

	function verifyToken() {
		if($_SESSION["token"] != $_POST["token"] || empty($_SESSION["token"])){
			return "hej false";
        } else {
        	return "hej true";
        }

	}


?>