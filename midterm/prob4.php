<?php
include 'functions.php';

$title = "Problem 4 | WDIM361 Midterm";
$page_title = "WDIM361 Midterm - Problem 4";
$page_name = "WDIM361 Server-side Scripting 1 Midterm";

include '_header.php';

// Create and array of people with corresponding ages
$people_ages = array(
    'Bob'       => 50,
    'Bill'      => 20,
    'Mary'      => 3,
    'Lestat'    => 5560,
    'Louie'     => 523,
    'Chris'     => 13,
    'Xander'    => 37,
    'Benjamin'  => 39,
);

// Output the array in unordered list sorted by name
ksort($people_ages);
echo "<h2>People I know sorted by name</h2>";
echo "<ul>";
foreach ($people_ages as $name => $age) {
	echo "<li>$name is $age years old.";
}
echo "</ul>";

// Output the array in a list sorted by age
asort($people_ages);

echo "<h2>People I know sorted by age</h2>";
echo "<ul>";
foreach ($people_ages as $name => $age) {
    echo "<li>$name is $age years old.";
}
echo "</ul>";

?>


<?php include '_footer.php'; ?>
