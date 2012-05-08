<?php
include 'functions.php';

$title = "Problem 5 | WDIM361 Midterm";
$page_title = "WDIM361 Midterm - Problem 5";
$page_name = "WDIM361 Server-side Scripting 1 Midterm";

include '_header.php';

$people_stats = array(
    'Bob' => array(
        'age'           => 50,
        'music'         => 'Hard Rock',
        'relationship'  => 'Friend'
    ),
    
    'Bill' => array(
        'age'           => 20,
        'music'         => 'Heavy Metal',
        'relationship'  => 'Enemy'
    ),
    
    'Mary' => array(
        'age'           => 3,
        'music'         => 'Teletubbies songs',
        'relationship'  => 'Ankle Bitter'
    ),
    'Lestat' => array(
        'age'           => 5560,
        'music'         => 'Classical',
        'relationship'  => 'Fictional Character'
    ),
    'Louie' => array(
        'age'           => 523,
        'music'         => 'Opera',
        'relationship'  => 'Vampire'
    ),
    'Chris' => array(
        'age'           => 13,
        'music'         => 'Tween Wave',
        'relationship'  => 'Annoying Nephew'
    ),
    'Xander' => array(
        'age'           => 37,
        'music'         => 'Video Game Theme Music',
        'relationship'  => 'Cartoon Character'
    ),
    'Benjamin'=> array(
        'age'           => 39,
        'music'         => 'Gothic and Industrial',
        'relationship'  => 'Me'
    )
);

// Build the table header
$table = <<<EOT
<h2>Table of People I um... know</h2>
<table border="1">
    <thead>
        <tr>
            <td>Name</td>
            <td>Age</td>
            <td>Musical Taste</td>
            <td>Relationship</td>
        </tr>
    </thead>
    <tbody>
EOT;

// Populate the table rows
foreach ($people_stats as $person => $stats) {
    
    // Start a new row and populate the person's name
    $table .= "<tr><td>$person</td>";
    
    // populate the rest to the person's stats
	foreach ($stats as $stat => $value) {
		$table .= "<td>$value</td>";
	}
    // End the row
    $table .= "</tr>";
}
// Close the table
$table .= "</tbody>";

// Output the table
echo $table;
?>


<?php include '_footer.php'; ?>
