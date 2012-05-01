<?php

include 'Page.php';

// Declare short tags
$page_name = trim(strip_tags($_POST['page_name']));
$doc_type = $_POST['doc_type'];
$page_columns = $_POST['page_columns'];
$nav_tag = $_POST['nav_tag_type'];
$nav_location = $_POST['nav_location'];
$nav_link_count = $_POST['nav_link_count'];

$home = new Page($page_columns);

$home -> title = $page_name;

$doctype  = $home -> docTypes[$doc_type];
$title = $page_name;

$nav = $home -> genNav($nav_tag, $nav_location, $nav_link_count);

if(!empty($home->style)){
	$fp = fopen("style.css", 'w', true);
	
	fwrite($fp, $home->style);
	
	$header_extras = "<link rel=\"stylesheet\" href=\"style.css\" media=\"all\" />";
}

include '_header.php';

echo $home->columns;

include '_footer.php';
?>
