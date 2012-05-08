<?php

include 'functions.php';

$title = "Problem 3 | WDIM361 Midterm";
$page_title = "WDIM361 Midterm - Problem 3";
$page_name = "WDIM361 Server-side Scripting 1 Midterm";

include '_header.php';

// Create products array

$product_price = array(
    'boots' =>  78.95,
    'hats'  =>  42.95,
    'jeans' =>  28.50,
    'shirts'=>  23.45
);

// Collect user input for quantities of products

// Compute order total

?>

<!-- Products Web Form -->

<?php if(empty($_POST)): ?>
<form action="" method="post">
	<h2>Enter your order Cowboy</h2>
	<label>Leather Boots: <input type="number" step="1" name="order_boots_count" /></label>
	<label>Hats: <input type="number" step="1" name="order_hats_count" /></label>
	<label>Jeans: <input type="number" step="1" name="order_jeans_count" /></label>
	<label>Western Shirts: <input type="number" step="1" name="order_shirts_count" /></label>
	
	<button type="submit">Submit Cowboy!</button>
	<button type="reset">Clear the Order</button>
</form>

<?php else: ?>
<!-- Output the order total formatted as currency -->
    
<?php endif; ?>

<?php include '_footer.php'; ?>
