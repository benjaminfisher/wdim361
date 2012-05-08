<?php
$navigation = array(
    'Problem 2' =>  'prob2.php',
    'Problem 3' =>  'prob3.php',
    'Problem 4' =>  'prob4.php',
    'Problem 5' =>  'prob5.php',
);

// Print out the navigation items and links from $navigaion
echo "<nav>\n";
echo "\t<ul>\n";
foreach ($navigation as $key => $value) {
	echo "\t<li><a href=\"$value\">$key</a></li>\n";
}
echo "\t</ul>\n";
echo "</nav>\n";

?>