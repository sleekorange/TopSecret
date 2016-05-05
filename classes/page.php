<?php

    class Page {

        function __construct() 
        { 
            $a = func_get_args(); 
            $i = func_num_args(); 
            if (method_exists($this,$f='__construct'.$i)) { 
                call_user_func_array(array($this,$f),$a); 
            } 
        } 

        function __construct3($layout, $title, $content){
            // $this->displayPage($layout, $title, $content);
            include 'templates/_layout.php';
        }

        function __construct4($layout, $title, $content, $contentTwo){
            // $this->displayMore($layout, $title, $content, $contentTwo);
            include 'templates/_layout.php';
        }

    }

?>