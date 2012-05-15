<!DOCTYPE HTML>
<html>
<head>
    <title><?php if(!empty($title)) print $title; ?> WDIM 361 Web Scripting 1</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css"></link>
    <link rel="stylesheet" href="../css/form.css" type="text/css"></link>
    <?php 
        if(!empty($header_extras)) { 
            print $header_extras;
        }
    ?>
</head>
<body>
    <header class="global">
    	<nav class="global">
    		<ul>
    			<li><a href="addProduct.php">Add a Product</a></li>
    		</ul>
    	</nav>
    </header>
    
    <div id="wrapper"><!-- Ends in _footer.php file -->