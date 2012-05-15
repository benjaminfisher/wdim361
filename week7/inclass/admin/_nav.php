<?php
$navigation = array(
    'Add a Product'      =>  'addProduct.php',
);

// Print out the navigation items and links from $navigation
echo "<nav>\n";
echo "\t<ul>\n";
foreach ($navigation as $key => $value) {
    echo "\t<li><a href=\"$value\">$key</a></li>\n";
}
echo "\t</ul>\n";
echo "</nav>\n";

?>