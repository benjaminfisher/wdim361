<?php 
/***
It's expected that you would combine the form_field method here with the form.css file.  
 
	 Example use: 
	 $horse = array(
			'type' => 'text',
			'label' => 'Horse Power',
			'name' => 'horse_power',
			'class' => 'longtext',
			); 		
			
	print Form::form_field($horse); 
*/
class Form
{
	//set up the properties
	public $action = ''; 
	public $id = '';
	public $classes = ''; 
	public $method = 'get'; 
	public $enctype = ''; 
	

	public $us_states = array(
	'0' => '- Select State -','AL' =>'Alabama','AK' =>'Alaska','AZ' =>'Arizona','AR' =>'Arkansas',
	'CA' =>'California','CO' =>'Colorado','CT' =>'Connecticut','DE' =>'Delaware','DC' => 'District of Columbia',
	'FL' =>'Florida','GA' =>'Georgia','GU' =>'Guam','HI' =>'Hawaii','ID' =>'Idaho',
	'IL' =>'Illinois','IN' =>'Indiana','IA' =>'Iowa','KS' =>'Kansas','KY' =>'Kentucky','LA' =>'Louisiana',
	'ME' =>'Maine','MD' =>'Maryland','MA' =>'Massachusetts','MI' =>'Michigan',
	'MN' =>'Minnesota','MS' =>'Mississippi','MO' =>'Missouri','MT' =>'Montana','NE' =>'Nebraska',
	'NV' =>'Nevada','NH' => 'New Hampshire','NJ' => 'New Jersey','NM' => 'New Mexico','NY' => 'New York',
	'NC' =>'North Carolina',	'ND' => 'North Dakota','OH' =>'Ohio','OK' =>'Oklahoma','OR' =>'Oregon',
	'PW' =>'Palau','PA' =>'Pennsylvania','PR' => 'Puerto Rico','RI'=> 'Rhode Island','SC' => 'South Carolina',
	'SD' =>'South Dakota','TN' =>'Tennessee','TX' =>'Texas','UT' =>'Utah','VT' =>'Vermont',
	'VA' =>'Virginia','WA' =>'Washington','WV' => 'West Virginia','WI' =>'Wisconsin','WY' =>'Wyoming'
	);
	
	public function form_field($fld = array())
	{
		$output = ''; 
		// type, name are required
		if (empty($fld['value']))
			$fld['value'] = '';
		
		if (empty($fld['label']))
			$fld['label'] = '';
		
		if ($fld['type'] != 'hidden') {
			$output = '<div class="form-item '; 
			if (!empty($fld['class'])){ 
				$output .= $fld['class'];
			}
			$output .= '">'."\n";
			if (!empty($fld['prefix'])) {
				$output .= '<div class="prefix">'.$fld['prefix'].'</div>';
			}
			$output .= "\t".'<label for="'.$fld['name'].'">'.$fld['label']; 
			if (!empty($fld['req']))
				$output .= '<span class="req">*</span>';
			$output .= '</label>'."\n";
			$output .= "\t".'<div class="input">';
		} 
		$output .= '<input type="'.$fld['type'].'" id="'.$fld['name'].'" name="'.$fld['name'].'" ';
		$output .= 'value="'.$fld['value'].'"'; 
		if (!empty($fld['class'])){ 
			$output .= ' class="'.$fld['class'].'"' ;
		}
		if (!empty($fld['checked']))
			$output .= ' checked="checked" '; 
		
		if (!empty($fld['src'])){
			$output .= ' src="'.$fld['src'].'"';
		}
		
		$output .= '/>'; 
		
		
		$output .= self::fieldError($fld['name']); 
		if ($fld['type'] != 'hidden') {
			$output .= '</div>'."\n";
			if (!empty($fld['suffix'])){ 
				$output .= ' <div class="suffix">'.$fld['suffix'].'</div>';
			} 
			$output .= '</div>'."\n\n";
		}
		return $output;
	}
	
	/* 
	#render an html select box based on array values.  
	# for example:
	
		$cat_options = array('3'=>'dogs','5'=>'fish','7'=>'birds'); 
		
		$cat_items = array(
				'type' => 'select',
				'label' => 'Category',
				'name' => 'categories',
				'multiple' => true,
				'class' => 'midtext',
				'options' => $cat_options,
				'selected' => Form::fieldValue('categories',$product),
			);
	*/ 
	
	public function form_select($fld = array())
	{
		// label, type, name & options are required
		if (empty($fld['value']))
			$fld['value'] = '';
		
		if (empty($fld['class']))
			$fld['class'] = '';
		
		$output = '<div class="form-item">'."\n";
		$output .= "\t".'<label for="'.$fld['name'].'">'.$fld['label']; 
		if (!empty($fld['req']))
			$output .= '<span class="req">*</span>';
		$output .= '</label>'."\n";
		$output .= "\t".'<select class="'.$fld['class'].'" ';
		
		//need to add [] for multiple
		if (!empty($fld['multiple']))
		{
			$output .= 'name="'.$fld['name'].'[]" ';
			$output .= ' multiple="multiple"';
		}
		else 
		{
			$output .= 'name="'.$fld['name'].'" ';
		}	
		$output .= '>';
		
		//check to see if any options match previously selected options
		foreach($fld['options'] as $key => $value)
		{
			if (is_array($fld['selected'])) //multiple selected
			{
				$match = false; 
				foreach($fld['selected']as $fkey => $fval)
				{
					if ($fkey == $key)
					{
						$output .= '<option value="'.$key.'" selected="selected">'.$value.'</option>'."\n";
						$match = true; 
						break;
					}
				}
				if (!$match)
					$output .= '<option value="'.$key.'">'.$value.'</option>'."\n";
			}
			elseif ($fld['selected'] == $key)
			{
				$output .= '<option value="'.$key.'" selected="selected">'.$value.'</option>'."\n";
			}
			else
			{
				$output .= '<option value="'.$key.'">'.$value.'</option>'."\n";
			}
		}
		$output .= '</select>'.self::fieldError($fld['name'])."\n";
		$output .= '</div>'."\n\n";
		return $output;
	}
	
	public function form_txtarea($fld = array())
	{
		$output = ''; 
		// type, name are required
		if (empty($fld['value']))
			$fld['value'] = '';
		
		if (empty($fld['label']))
			$fld['label'] = '';
		
		if ($fld['type'] != 'hidden') {
			$output = '<div class="form-item '; 
			if (!empty($fld['class'])){ 
				$output .= $fld['class'];
			}
			$output .= '">'."\n";
			if (!empty($fld['prefix'])) {
				$output .= $fld['prefix'];
			}
			$output .= "\t".'<label for="'.$fld['name'].'">'.$fld['label']; 
			if (!empty($fld['req']))
				$output .= '<span class="req">*</span>';
			$output .= '</label>'."\n";
			$output .= "\t".'<div class="input">';
		} 
		$output .= '<textarea id="'.$fld['name'].'" name="'.$fld['name'].'" ';
		if (!empty($fld['rows'])){ 
			$output .= ' rows="'.$fld['rows'].'"'; 
		}
		if (!empty($fld['cols'])){ 
			$output .= ' cols="'.$fld['cols'].'"'; 
		}
		if (!empty($fld['class'])){ 
			$output .= ' class="'.$fld['class'].'"' ;
		}
		
		$output .= '>'.$fld['value'].'</textarea>'; 
				
		$output .= self::fieldError($fld['name']); 
		if ($fld['type'] != 'hidden') {
			$output .= '</div>'."\n";
			if (!empty($fld['suffix'])){ 
				$output .= ' '.$fld['suffix'];
			} 
			$output .= '</div>'."\n\n";
		}
		return $output;
	}
	
	# returns a span or div tag with a field specific error; if no error is set returns nothing
	# ---
	public function fieldError( $field, $tag = "span" )
	  {
	    global $errors;
	    if( isset( $errors[$field]) )
	      return " <$tag class='error'>".$errors[$field]."</$tag>";
	  }
	 
	public function fieldValue( $field, $data=false )
	  {
		if( !empty($data[$field]) )
	      return $data[$field];
	    else if( isset($_POST[$field]) )
	      return $_POST[$field];
	    else if( isset($_GET[$field]) )
	      return $_GET[$field];
	  }
		
	public function build($form) { 
		$output = array(); 
		foreach($form as $key => $fld) { 
			$fld['name'] = $key;
			if ($fld['type'] != 'select' && 
					$fld['type'] != 'textarea') { 
				$output[] = $this->form_field($fld); 
			}
			if ($fld['type'] == 'select') { 
				$output[] = $this->form_select($fld); 
			}
			if ($fld['type'] == 'textarea') { 
				$output[] = $this->form_txtarea($fld); 
			}
		}
		$fields = implode('',$output);
		$output = '<form action="'.$this->action.'" method="'.$this->method.'" id="'.$this->id.'" enctype="'.$this->enctype.'" class="'.$this->classes.'">'; 
		$output .= $fields; 
		$output .= '</form>'; 
		return $output; 
	} 
}
?>