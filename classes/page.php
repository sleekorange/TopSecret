<?php

    class Page {
        public $meta_title;
        public $meta_keywords;
        public $html_body;

        public function displayPage() {
        	$page ='
        	<html>
        	<head>
        		<title>'.$this->meta_title.'</title>
        		<meta name="keywords" content="'.$this->meta_keywords.'" />
        	</head>
        	<body>
        		'.$this->html_body.'
        	</body>
        	</html>
    ';
        	echo $page;
        }
    }

?>