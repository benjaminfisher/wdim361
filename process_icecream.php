<?php 
	$flavor = $_POST['flavor'];
	$scoops = $_POST['scoops'];
	$container = $_POST['container'];
	
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	
	$file = fopen("$DOCUMENT_ROOT/wdim361/orders/orders.txt", 'a+');
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<?php
echo <<< TheEnd
	<p>So you wanted<br />
	$scoops scoops<br />
	of $flavor icecream<br />
	in a $container.</p>
TheEnd;

$output = "Scoops: $scoops\t Flavor: $flavor\t Container: $container\n";
fwrite($file, $output);

fclose($file);
?>

</body>
</html>