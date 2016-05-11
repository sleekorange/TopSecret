<?php
	require_once 'core/init.php';

	$hello = "Hello World";

	$content ='

	';

	$contentTwo ='
	<h2>Index Page 2</h2>
	<p>Der er mange tilgængelige udgaver af Lorem Ipsum, men de fleste udgaver har gennemgået forandringer, når nogen har tilføjet humor eller tilfældige ord, som på ingen måde ser ægte ud. Hvis du skal bruge en udgave af Lorem Ipsum, skal du sikre dig, at der ikke indgår noget pinligt midt i teksten. Alle Lorem Ipsum-generatore på nettet har en tendens til kun at dublere små brudstykker af Lorem Ipsum efter behov, hvilket gør dette til den første ægte generator på internettet. Den bruger en ordbog på over 200 ord på latin kombineret med en håndfuld sætningsstrukturer til at generere sætninger, som ser pålidelige ud. Resultatet af Lorem Ipsum er derfor altid fri for gentagelser, tilføjet humor eller utroværdige ord osv.</p>
		<p>'.$hello.'</p>
	';
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

	$page = new Page("postFeed", "Index", $content);
?>