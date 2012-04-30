<?php
	if(!empty($doctype)){
		echo $doctype."\n";
	} else {
		echo "<!DOCTYPE = html>\n";
	}
?>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title><?php if(!empty($title)){ echo $title; } ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	
	<?php
		if(!empty($header_extras)){
			print $header_extras;
		}
	?>
</head>
<body>
	<div class="wrapper">
		