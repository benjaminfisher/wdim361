<?php 

function page_name($path){
	return ucwords(strstr($path, '.', TRUE));
};

// Return $content wrapped in a specified HTML $tag with optional $class
function tag_wrap($content, $tag, $class = NULL){
	$result = "\n<$tag";
	$result .= (!empty($class)) ? ' class="'.$class.'">' : '>' ;
	$result .= "$content</$tag>\n";
	
	return $result;
};

?>