<!DOCTYPE HTML>
<html>
<head>
	<title><?php if(!empty($title)) print $title; ?> ADMIN - WDIM 361 Web Scripting 1</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css"></link>
	<link rel="stylesheet" href="../css/form.css" type="text/css"></link>
	<?php 
		if(!empty($header_extras)) { 
			print $header_extras; 
		}
	?>
</head>
<body>
	<div id="wrapper">
	<ul id="nav">
		<li><a href="index.php">Admin Home</a></li>
		<li><a href="addProduct.php">Add Product</a></li>
	</ul>