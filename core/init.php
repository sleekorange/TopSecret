<?php 

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'web63.meebox.net',
        'username' => 'hansmygi_secure',
        'password' => 'hemmelig123kode',
        'db' => 'hansmygi_security'
    )
);

spl_autoload_register(function($class) {
    require_once 'classes/' . $class . '.php';
});


// 'host' => 'mysql.hostinger.dk',
//         'username' => 'u650868839_sec',
//         'password' => 'hemmelig123kode',
//         'db' => 'u650868839_sec'

?>