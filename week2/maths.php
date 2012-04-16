<?php
include '_header.php';
include 'functions.php';
?>

<?php

var_dump($_SERVER);

if (!empty($_POST['input1']) || !empty($_POST['input2'])) {
	$num1 = $_POST['input1'];
	$num2 = $_POST['input2'];
	$operation = $_POST['operation'];
	
	$result = calculation($num1, $num2, $operation);
} else {
	$result = NULL;
};

?>

<form action="" method="post">
	<p>Enter two numbers and an operation:</p>
	<input type="number" name="input1" placeholder="First input"/>
	<label>Operation:
		<select name="operation">
			<option value="1">Addition</option>
			<option value="2">Subtraction</option>
			<option value="3">Multiplication</option>
			<option value="4">Division</option>
		</select>
	</label>
	<input type="number" name="input2" placeholder="Second input"/>
	<button type="submit">Submit human</button>
</form>

<?php if(!empty($result)) : ?>
	
	<p>The result of the calculation:
		<?php echo span_wrap($num1, 'green') ." " .$result['operation'] ." " .span_wrap($num2, 'green') ." is " .span_wrap($result['answer'], 'green')."."; ?>
	</p>
	
	<p>You should thank <?php echo span_wrap($_SERVER['SERVER_NAME'], 'green'); ?> for doing your homework.</p>

<?php endif; ?>

<?php include '_footer.html'; ?>