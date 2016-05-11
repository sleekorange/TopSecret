<?php 

    require_once 'core/init.php';
    require_once 'library/htmlpurifier/library/HTMLPurifier.auto.php';

	function escape($string) {

		$config = HTMLPurifier_Config::createDefault();
		$config->set('Cache.DefinitionImpl', null);
	    $purifier = new HTMLPurifier($config);

	    $clean_html = $purifier->purify($dirty_html);
	    return $clean_html;
	}


?>