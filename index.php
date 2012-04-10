<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	
	<?php
		include '_nav.php';
		echo "</br> This is an echo.";
	?>
	
	<p>This is pure HTML</p>
	
	<?php
		date_default_timezone_set('America/Los_Angeles');
        print '<p>This is more php</p>'; 
        $name = "Sir Issac Newton";
        
        print "<p>Hello there $name </p>"; // Exploding variables !!!
        
        print '<br />'. date('l F d, Y g:h a');
		
		$words = '<p>This is a very
				very very very
				long string (wheeeeew)</p>';
				
		echo "<br />$words";
		
		$flavor = 'Strawberry';
		print '<p>';
		print ($flavor == 'Vanilla') ? "That's boring. Yawn." : "That's better. I like $flavor!";
		print '</p>';
		
		$social = 'afdkgjdaf';
		print "<p>" .strlen($social) ."</p>";
		
		if (strlen($social) && is_numeric($social)){
			print "$social is a valid social";
		} else {
			print "Not a valid social. Try again dipshit!";
		}
		
		
    ?>
</body>
</html>