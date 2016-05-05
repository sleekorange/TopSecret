<?php 

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'mysql.hostinger.dk',
        'username' => 'u650868839_sec',
        'password' => 'hemmelig123kode',
        'db' => 'u650868839_sec'
    )
);

spl_autoload_register(function($class) {
    require_once 'classes/' . $class . '.php';
});




?>