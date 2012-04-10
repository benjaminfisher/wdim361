<?php
	$num = FALSE;
	
	if (!empty($_POST['number'])) {
		$num = strip_tags(trim($_POST['number'])); // strip_tags removes any attempt to insert code. trim clears whitespace
	}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>WDIM361 | Week2 In Class</title>
	
	<link rel="stylesheet" href="style.css" media="all" />
	<link rel="stylesheet" href="form.css" media="all" />
	
</head>
<body>
	
	<?php
	ini_set('display_errors', 1); // Attempt to display errors if disabled on the Server
	error_reporting(E_ALL);
		
	if (!empty($num) && !is_numeric($num)) {
		echo '<div class="error">Enter a number, Human!</div>';
	}
	
	if ($num > 0) {
		print "The square root of $num = ".sqrt($num)."<br />";
	}
	
	if ($num > 100) {
		print "That's one Big NUMBER. <br />";
	} elseif ($num > 50){
		print "You have a very medium size number there, human.<br />";
	} elseif ($num > 10) {
		print "You have a small number, human. Ha haaa <br />";
	} else {
		print "What a tiny number you have, inadequite human. How sad for you";
	}
	
	switch ($num) {
		case 1:
			print '<br /><img src="images/1bis.gif" alt="" />';
			break;
		case 0:
			print '<br /><img src="images/0-anthropomorph_S.gif" alt="" />';
			break;
		case 3:
			print '<br /><img src="images/3bis.gif" alt="" />';
			break;
		default:
			print "<br />Your number is lame, silly human";
	}
	
?>
	<div class="wrapper">
		<form class="form-item" method="post" action="">
			<label>Number: 
				<input type="text" name="number" />
				<button type="submit" value="Submit Human!">Submit Human!</button>
			</label>
		</form>
	</div>
	
	<a href="index.php?interest=icecream">Show Ice cream</a>
	<a href="index.php?interest=sunset">Show Sunset</a>
	
<?php
	if (isset($_GET['interest'])) {
		if ($_GET['interest'] == 'icecream') {
			print '<img src="images/ice-cream.jpg" alt="" />';
		} elseif ($_GET['interest'] == 'sunset') {
			print '<img src="images/sunset.jpg" width="500px" alt="" />';
		}
	}
?>
</body>
</html>