<?php
include 'functions.php';

class Page{
	// Properties
	public $title;
	public $columns;
	
	public $docTypes = array(
		'html4' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
		'html5' => '<!DOCTYPE = html>',
		'xhtml' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'
	);
	
	function __construct(){
		
	}
	
	public function __get($name){
		return $this -> $name;
	}
	
	public function __set($name, $value){
		$this -> $name = $value;
	}
	
	public function genNav($tag, $orientation, $linkCount)
	{
		$nav = "";
		for ($i=0; $i < $linkCount; $i++) {
			$link = '<a href="#">link-'.($i + 1).'</a>';
			$nav .= tag_wrap('li', $link);
		}
		
		$nav = tag_wrap('ul', $nav);
		$nav = tag_wrap($tag, $nav, 'global');
		
		return $nav;
	}
}

?>