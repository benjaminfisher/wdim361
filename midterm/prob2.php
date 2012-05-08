<?php
include 'functions.php';

$title = "Problem 2 | WDIM361 Midterm";
$page_title = "WDIM361 Midterm - Problem 2";
$page_name = "WDIM361 Server-side Scripting 1 Midterm";

include '_header.php';

/*
 * Collect and sanitize user name from the webform
 */ 

// Create short variables from POST data
if(!empty($_POST['first_name'])){
    $first_name = cln($_POST['first_name']);
};
if(!empty($_POST['last_name'])){
    $last_name = cln($_POST['last_name']);
    
    // Create the username from the first letter of the firstname
    // and the first 5 letters of the last name.
    $username = strtolower(substr($first_name, 0, 1) . substr($last_name, 0, 5));
};

?>

<!-- Web Form to collect the user's first and last name -->

<?php if(empty($_POST['first_name']) && empty($_POST['last_name'])) :  ?>
<form action="" method="post">
    <p>Enter your first and last name to recieve a username</p>
	<label for="first_name">First Name: <input type="text" name="first_name" required /></label>
	<label for="last_name">Last Name: <input type="text" name="last_name" required /></label>
	<button type="submit">Submit User!</button>
</form>

<?php
// Output the username
    else: echo tag_wrap('p', "This is your username: $username");
    endif;
?>

<?php include '_footer.php'; ?>