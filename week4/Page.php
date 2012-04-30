<?php
include 'functions.php';

class Page{
	// Properties
	public $title;
	public $style = "";
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
		
		$this->style .= "header nav{\r\t";
		$this->style .= "overflow:auto;\r";
		
		if($orientation === "left"){
			 $this->style .= "float: left;";
		} elseif ($orientation === "right") {
			$this->style .= "float: right;";
		}
		
		$this->style .= "\r\tborder: 1px solid black;";
		$this->style .= "\r\tmargin: 0 1em;\r";
		$this->style .= "\r\tpadding: 1em;\r";
		$this->style .= "}\n";
		
		if ($orientation === "top") {
			$this->style .= "\nheader nav li{";
			$this->style .= "\r\tfloat:left;";
			$this->style .= "\r\tlist-style-type:none;";
			$this->style .= "\r\tmargin-right:1em;";
			$this->style .= "\r}";
		}
		
		$this->style .= "\n.wrapper{ margin:1em; }\n";
		return $nav;
	}
}

?>