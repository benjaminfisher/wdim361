<?php 
$title = 'Week 4 PHP';
include '_header.php';

function getMin($list){
	sort($list);
	
	return $list[0];
}

function getMax($list){
	rsort($list);
	
	return $list[0];
}
?>

<h1>Week 4 - Functions, Arrays, OOP</h1>

<?php
	$nums = array(12, 34, 68, 9, 190, 24, 54, 39);
	
	echo "<p>Max number = ".getMax($nums)."</p>\n";
	echo "<p>Min number = ".getMin($nums)."</p>\n";
	
	var_dump($nums);


include '_footer.php';
?>
