<?php 

$servername = "web63.meebox.net";
$username = "hansmygi_secure";
$password = "hemmelig123kode";
$dbname = "hansmygi_security";

$oDb = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);


spl_autoload_register(function($class) {
    require_once 'classes/' . $class . '.php';
});


// 'host' => 'mysql.hostinger.dk',
//         'username' => 'u650868839_sec',
//         'password' => 'hemmelig123kode',
//         'db' => 'u650868839_sec'

?>