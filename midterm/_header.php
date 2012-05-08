<?php
	// Doctype defaults to HTML5
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
	<header>
		<hgroup>
			<h1><?php (!empty($page_name)) ? print $page_name : print "Page Name" ; ?></h1>
			<h2>Benjamin J. Fisher</h2>
		</hgroup>
		
		<?php include '_nav.php'; ?>
	</header>
	<div class="wrapper">
		