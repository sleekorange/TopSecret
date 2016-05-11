<?php 

// $GLOBALS['config'] = array(
//     'mysql' => array(
//         'host' => 'localhost',
//         'username' => 'topsecret',
//         'password' => '123',
//         'db' => 'topsecret'
//     )
// );

// $servername = "web63.meebox.net";
// $username = "hansmygi_secure";
// $password = "hemmelig123kode";
// $dbname = "hansmygi_security";

// $servername = "localhost";
// $username = "topsecret";
// $password = "123";
// $dbname = "topsecret";

$servername = "web63.meebox.net";
$username = "hansmygi_secure";
$password = "hemmelig123kode";
$dbname = "hansmygi_security";

$oDb = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
session_start();


spl_autoload_register(function($class) {
    require_once 'classes/' . $class . '.php';
});

//require_once 'functions/purifier.php';




?>