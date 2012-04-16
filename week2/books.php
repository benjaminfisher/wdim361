<?php
include '_header.php';

// Declare variables
$books_array = array();

// Retrieve post and set short variables
if(!empty($_POST['books'])){
	$books = strip_tags(trim($_POST['books']));

	$books_array = explode(',', $books);
};

?>

<form action="" method="post">
	<p>So what books have YOU read recently?</p>
	<textarea name="books" cols="30" rows="10" placeholder="Comma seperated list please..."></textarea>
	<button>Submit Human</button>
</form>

<ol>
	<?php foreach ($books_array as $book): ?>
		<li><?php echo $book; ?></li>
	<?php endforeach; ?>
</ol>

<?php include '_footer.html'; ?>