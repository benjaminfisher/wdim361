<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>WDIM361 | Week2 In Class Arrays</title>
	
	<link rel="stylesheet" href="style.css" media="all" />
	<link rel="stylesheet" href="form.css" media="all" />
</head>
<body>
	<div id="wrapper">
<?php 
	include '_nav.php';
	
	$pets = array('Sasha', 'Midnight', 'Great Cthulu', 'Hazel', 'Zwei');
	
	//print count($pets).'<br />';
	
	//var_dump($pets);
	
	echo "<ul>\n";
	foreach ($pets as $pet) {
		print "\t<li>$pet</li>\n";
	}
	echo "</ul>\n";
	
	sort($pets);
	
	echo "<ul>\n";
	foreach ($pets as $pet) {
		print "\t<li>$pet</li>\n";
	}
	echo "</ul>\n";
	
	shuffle($pets);
	
	echo "<ul>\n";
	foreach ($pets as $pet) {
		print "\t<li>$pet</li>\n";
	}
	echo "</ul>\n";
	
	$pets[] = "Oreo";
	
	echo "<ul>\n";
	foreach ($pets as $pet) {
		print "\t<li>$pet</li>\n";
	}
	echo "</ul>\n";
	
	$movies = array(
		'Hunger Games' => 'Katniss',
		'21 Jump Street' => 'Jonah Hill',
		'Wrath of the Titans' => 'Some warrior dude',
		'Project X' => 'Every teen in America',
		'Hangover' => 'Steve Galifianakis'
	);
	
	// print $movies['Project X']; // show the value for a key in an array
	
	print "\n<ul>\n";
	foreach ($movies as $movie => $actor) {
		print "\t<li>The movie $movie starred $actor </li>\n";
	}
	print "</ul>";
	
	$two_dim = array($pets, $movies); // Two dimensional arrays are arrays inside of arrays
	
	
?>

	</div>
</body>
</html>