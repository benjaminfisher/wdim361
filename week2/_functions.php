<?php 

function page_name($path){
	return ucwords(strstr($path, '.', TRUE));
}

?>