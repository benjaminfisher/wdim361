<?php include '_functions.php'; 

$current_page = strstr(basename($_SERVER['PHP_SELF']), '.', TRUE);
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title><?php echo ucwords($current_page); ?> | WDIM361 Week2</title>
	
	<link rel="stylesheet" href="css/style.css" media="all" />
</head>
<body class="<?php echo $current_page; ?>">

<header>
	<h1>WDIM361 Week2 Homework</h1>
	<nav class="global">
		<ul>
			<li><a href="animals.php">Furry Friends</a></li>
			<li><a href="maths.php">Do the Math</a></li>
			<li><a href="books.php">Read a Book Mother F**ker!</a></li>
		</ul>
	</nav>
	
</header>

<div class="wrapper">
