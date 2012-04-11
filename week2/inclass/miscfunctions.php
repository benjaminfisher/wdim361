<?php
if( !function_exists('array_trim') )
{
  function array_trim($array)
  {
    if( is_array($array) )
    {
      foreach( $array as $key => $value )
      {
        if( is_string($value) )
          $array[$key] = trim($value);
        else
          $array[$key] = $value;
      }
      return $array;
    }
    return false;
  }
}

function array_sort_by_key( $array, $sortkey, $order=SORT_ASC )
{
  foreach( $array as $key => $row )
  {
    foreach( $row as $field => $value )
    {
      if( empty($$field) )
        $$field = array();
      if( function_exists('remove_accents') )
        $row[$field] = remove_accents($row[$field]);
      array_push( $$field, $row[$field] );
    }
  }
  if( array_multisort($$sortkey, $order, $array) )
    return $array;
  return false;
}

# returns a string with any accents replace by the english equivilent
# ---

function remove_accents( $string )
{
  $string = htmlentities($string);
  return preg_replace("/&([a-z])[a-z]+;/i","$1",$string);
}

function htmlconvert( $string )
{
  $string = htmlentities($string);
  $string = str_replace("™","&trade;",$string);
  $string = str_replace("\"","&quot;",$string);
  $string = str_replace("'","&#39;",$string);
  return $string;
}


# trim_string
# ---
# given a string, it tests the string length and chops anything beyond
# a certain threshhold and appends an elipsis; the length can be passed as well

function trim_string( $string,$length=10 )
{
  if( strlen($string) > $length )
  {
    $string = substr($string,0,($length-2))."...";
  }
  return $string;
}


# random_password
# ---
# create a readable password by alternating vowels and constants
# lower case L and O have been taken out to avoid confusion

function random_password( $length=7 )
{
  $constanants = "bcdfghjkmnpqrstvwxz";
  $vowels = "aeiuy";
  $numbers = "0123456789";

  srand((double)microtime()*1000000);

    $pass = '' ;
    for($i=1;$i<=$length;$i++)
    {
    if( $i == 1 || $i % 3 == 0 )
      $pass .= substr($constanants, rand()%19, 1);
    else if( $i % 5 == 0 )
      $pass .= substr($numbers, rand()%10, 1);
    else
      $pass .= substr($vowels, rand()%5, 1);
    }
    return $pass;
}

# strtodate
# ---
# converts a date string to a readable date, checking first to see if the string is empty
function strtodate( $date_str, $date_format_str="m/d/y" )
{
	if( !empty($date_str) )
		return date($date_format_str,strtotime($date_str));
}


function isEmail($email)
{ 
	if( (!preg_match('/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/', $email)) && 
		(preg_match('/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/',$email)) )
	{return true;}
	return false;
}

function isPhone( $phone )
{
	if( !preg_match("/[^0-9)(.+ -]/", $phone) )
	{
		$phone = preg_replace( "/(-|\.| )/", "", $phone );
		$phone = preg_replace( "/\(/", "", $phone );
		$phone = preg_replace( "/\)/", "", $phone );
		$phone = ltrim( $phone, "1" );
		if( strlen($phone) == 10 )
			return substr($phone,0,3).'-'.substr($phone,3,3) . "-" . substr($phone,6,4);
		else
			return false;
	}
	return false;
}

function cln($str)
{
	// strip dangerous characters.       
	$chars = preg_quote("={}:<?(^$!>)*");
	$str = strip_tags(preg_replace("/[$chars]/", '', $str));
	return $str;
}
?>