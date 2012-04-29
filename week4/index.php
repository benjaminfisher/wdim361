<?php

$title = 'Week 4 Homework';
include 'functions.php';
include '_header.php';

class Page{
	// Properties
	public $doc_type;
	public $title;
	public $columns;
	
	private $docTypes = array(
		'html4' => '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
		'html5' => '<!DOCTYPE = html>',
		'xhtml' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'
	);
	
	function __construct(){
		
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

$home = new Page();

$home -> doc_type = 'html5';
$home -> title = 'Home Page';
$home -> columns = 2;
echo $home -> genNav('nav', 'top', '5');

var_dump($home);


include '_footer.php';
?>