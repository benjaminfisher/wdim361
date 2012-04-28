<?php 

function is_block($string){
	
	$block_elements = array('article', 'aside', 'blockquote', 'button', 'canvas', 'caption', 'col', 'colgroup', 
	'dd', 'div', 'dl', 'dt', 'embed', 'fieldset', 'figcaption', 'figure', 'footer', 'form', 'p', 'ol', 'li');
	
	if(is_string($string)){
		if(array_search($string, $block_elements)){
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	};
};

function page_name($path){
	return ucwords(strstr($path, '.', TRUE));
};

// Return $content wrapped in a specified HTML $tag with optional $class
function tag_wrap($tag, $content, $class = NULL){
	$result = (is_block($tag)) ? "\n<" : "<" ;
	$result .= $tag;
	$result .= (!empty($class)) ? ' class="'.$class.'">' : '>' ;
	$result .= $content;
	$result .= (is_block($tag)) ? "\n</$tag>\n" : "</$tag>" ;
	
	return $result;
};

?>