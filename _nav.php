<?php
$navigation = array(
    'Week 1'    =>  'week1/',
    'Week 2'    =>  'week2/',
    'Week 3'    =>  'week3/',
    'Week 4'    =>  'week4/',
    'Week 5'    =>  'week5/',
    'Week 9'    =>  'week9/',
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