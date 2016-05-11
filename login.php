<?php
	require_once 'core/init.php';

	$content ='';

	$contentTwo ='';
	/**
     * Sets the page layout.
     * Takes (3) or (4) params.
     * @param
     * 1. String: fullWidth(3) | split(4) | fourEight(4)
     * 2. String: Sets meta-title
     * 3. HTML var: Content of page
     * 4. HTML var: More content if (4).
     * Ex: $page = new Page("fullWidth", "Index Page", $content);
     * Ex: $page = new Page("fourEight", "Index Page", $content, contentTwo);
     * Note: Param 3 and 4 must be declared before the instantiation of  the class.
     */

	$page = new Page("blogPost", "Second Page", $content, $contentTwo);
?>