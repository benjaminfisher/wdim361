<!DOCTYPE HTML>
<html>
<head>
	<title><?php if(!empty($title)) print $title; ?> WDIM 361 Web Scripting 1</title>
	<link rel="stylesheet" href="style.css" type="text/css"></link>
	<link rel="stylesheet" href="form.css" type="text/css"></link>
	<?php 
		if(!empty($header_extras)) { 
			print $header_extras; 
		}
	?>
</head>
<body>
	<h1>Main Front Page</h1>
	<div id="wrapper">