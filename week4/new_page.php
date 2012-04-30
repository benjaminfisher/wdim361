<?php

include 'Page.php';

$home = new Page();

$home -> title = 'About';
$home -> columns = 2;

$doctype  = $home -> docTypes['html4'];
$title = $home -> title;

$nav = $home -> genNav('nav', 'top', '10');

if(!empty($home->style)){
	$fp = fopen("style.css", 'w', true);
	
	fwrite($fp, $home->style);
	
	$header_extras = "<link rel=\"stylesheet\" href=\"style.css\" media=\"all\" />";
}



include '_header.php';

echo "<p>Put content here...</p>";

include '_footer.php';
?>
