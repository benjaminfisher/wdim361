<?php

include 'functions.php';

$title = "Problem 3 | WDIM361 Midterm";
$page_title = "WDIM361 Midterm - Problem 3";
$page_name = "WDIM361 Server-side Scripting 1 Midterm";

include '_header.php';

// Create products array

function calculate_order_total($order){
    $product_price = array(
        'boots' =>  78.95,
        'hats'  =>  42.95,
        'jeans' =>  28.50,
        'shirts'=>  23.45
    );
    
    // Compute the total of the order
    
    $total = ($order['boots'] * $product_price['boots'])
        + ($order['hats'] * $product_price['hats'])
        + ($order['jeans'] * $product_price['jeans'])
        + ($order['shirts'] * $product_price['shirts']);
       
    // Return the result
    return $total;
}


// Collect user input for quantities of products

if(!empty($_POST)){
    $order = array();
    
    $order['boots'] = cln($_POST['order_boots_count']);
    $order['hats'] = cln($_POST['order_hats_count']);
    $order['jeans'] = cln($_POST['order_jeans_count']);
    $order['shirts'] = cln($_POST['order_shirts_count']);
    
    // Compute order total
    $order_total = calculate_order_total($order);

}

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

<p>Thanx Cowboy!</p>
<p>Your order total is: $<?php echo number_format($order_total, 2, '.', ',') ?></p>
    
<?php endif; ?>

<?php include '_footer.php'; ?>
