<?php
$navigation = array(
    'About Us'      =>  'about.php',
    'Our Products'  =>  'products.php',
    'Contaxt'       =>  'contact.php',
    'Testimonials'  =>  'test.php',
    'Blog'          =>  'blog.php'
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