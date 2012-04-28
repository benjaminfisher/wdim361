<?php

$title = 'Week 4 Homework';
include 'functions.php';
include '_header.php';

$page = tag_wrap('li', 'first');
$page .= tag_wrap('li', 'second');
$page .= tag_wrap('li', 'third');

$page = tag_wrap('ol', $page);

echo $page;
echo tag_wrap('span', 'This is not a block.');
echo tag_wrap('span', 'This is not a block.');

include '_footer.php';
?>