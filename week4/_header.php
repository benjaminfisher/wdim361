<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title><?php if(!empty($title)){ echo $title; } ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="form.css" media="all" />
	
	<?php
		if(!empty($header_extras)){
			print $header_extras;
		}
	?>
</head>
<body>
	<div class="wrapper">
		