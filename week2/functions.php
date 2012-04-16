<?php 

function page_name($path){
	return ucwords(strstr($path, '.', TRUE));
}

function calculation($number1, $number2, $operation){
	switch ($operation) {
		case '1':
			return array(
				'answer'	=> 	$number1 + $number2,
				'operation'	=>	'plus',
			);
			break;
		case '2':
			return array(
				'answer'	=> $number1 - $number2,
				'operation'	=> 'minus',
			);
			break;
		case '3':
			return array(
				'answer'	=> $number1 * $number2,
				'operation'	=> 'times',
			);
			break;
		case '4':
			return array(
				'answer'	=> $number1 / $number2,
				'operation'	=> 'divided by',
			);
			break;
	}
};

function span_wrap($wrap, $class){
	return "<span class='$class'>$wrap</span>";
};

?>