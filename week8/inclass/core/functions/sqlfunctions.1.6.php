<?php

# 1.3:	modified the way the SQLValue function escapes new lines
# 1.4:	removed SQLInsertString function; modified SQLUpdateString, insertData & replaceData
#		functions to escape any field names
# 1.5:	cache some db result in static variable; allow multiple keys in updateData
# 1.6: removed mysql dependency

function duplicateCheck( $new, $existingData )
{

	if( empty($existingData) )
		return false;

	foreach( $existingData as $temp =>$compare )
	{
		$id = "";
		if( empty($id) && strstr( key($compare), "id" ) )
		{
			$id = $compare[key($compare)];
		}
		$duplicate = true;
		foreach( $new as $key => $value )
		{
			if( isset($compare[$key]) && $compare[$key] != $value )
			{
				$duplicate = false;
				break;
			}
		}
		if( $duplicate )
		{
			if(!empty($id) )
				$duplicate = $id;
			return $duplicate;
		}
	}
	return false;
}

function SQLValue( $string, $keepZero = false )
{
	if( trim($string) == "" && !$keepZero )
		$value = "NULL";
	else
	{
		$value = "'".addslashes($string)."'";
		$value = str_replace("\\\\","\\",$value);
		$value = str_replace("\\\\","\\",$value);
	}
	return $value;
}

function SQLValues( $data )
{
	if( is_array($data) )
	{
		foreach( $data as $key => $value )
			$data[$key] = SQLValue( $value );
	}
	else
		$data = SQLValue( $data );
	return $data;
}

function SQLUpdateString( $array )
{
	if( is_array($array) )
	{
		$string = "";
		foreach( $array as $key => $value )
			$string .= "`$key` = ".SQLValue( $value ).", ";
		return rtrim($string,", ");
	}
}

# loops through an associative array and returns a list of fields that
# are valid for a particular table

function SQLTableData( $table, $data )
{
	$columns = tableColumns($table);
	$array = array();
	if( !empty($data) && is_array($data) )
	{
		foreach( $data as $key => $value )
		{
			if( in_array($key,$columns) )
				$array[$key] = $value;
		}
		if( !empty($array) )
			return $array;
	}
	return false;
}

function tableColumns($tableName)
{
  static $schema = array();

  if(empty($schema[$tableName]))
  {
	  $columns = sqlquery("SHOW COLUMNS FROM ".$tableName);
	  $column_array = array();
	  if( !empty($columns['data']) )
	  {
		  foreach( $columns['data'] as $column )
		  {
			  array_push($column_array, $column['Field']);
		  }
	  }
	  $schema[$tableName] = $column_array;
	}
	else
	{
	  $column_array = $schema[$tableName];
	}
	if( !empty($column_array) )
		return $column_array;
	return false;
}

function getEnumValues( $table, $field )
{
  static $schema = array();

  if(empty($schema[$table.'::'.$field]))
  {
	  $select = sqlquery("
		  DESCRIBE ".$table." ".$field."
	  ");
	  $enum = explode(",",trim(strstr($select['data'][0]['Type'],"("),")("));
	  foreach( $enum as $key => $value )
	  {
		  $enum[$key] = trim($value,"'");
	  }
	  $schema[$table.'::'.$field] = $enum;
	}
	else
	{
	  $enum = $schema[$table.'::'.$field];
	}
	return $enum;
}

function relevantDataArray( $table, $array )
{
	$tableFields = tableColumns($table);
	if( !empty($tableFields) && !empty($array) )
	{
		foreach( $array as $key => $value )
		{
			if( in_array($key, $tableFields) )
				$data[$key] = $value;
		}
		return $data;
	}
	return false;
}

function insertData( $table, $data, $showQuery=false )
{
	if( $data = relevantDataArray( $table, $data ) )
	{
		$insert = sqlquery( "
			INSERT INTO ".$table."
			(`". implode( "`,`",array_keys($data) ) ."`)
			VALUES(". implode( ",", SQLValues($data) ) .")
		");
		if( $showQuery )
			echo "<pre>", print_r($insert), "</pre>";
		if( isset($insert['insertID']) )
			return $insert['insertID'];
		else if( isset($insert['rowsAffected']) && $insert['rowsAffected'] == 1 )
			return true;
	}
	return false;
}

function replaceData( $table, $data, $showQuery=false )
{
	if( $data = relevantDataArray( $table, $data ) )
	{
		$insert = sqlquery( "
			REPLACE INTO ".$table."
			(`". implode( "`,`",array_keys($data) ) ."`)
			VALUES(". implode( ",", SQLValues($data) ) .")
		");
		if( $showQuery )
			echo "<pre>", print_r($insert), "</pre>";
		if( isset($insert['insertID']) )
			return $insert['insertID'];
		else if( isset($insert['rowsAffected']) && $insert['rowsAffected'] == 1 )
			return true;
	}
	return false;
}

function updateData( $table, $data, $key, $showQuery= false )
{
  $id = array();
  if(is_array($key))
  {
    foreach($key as $k)
    {
      $id[] = "`$k` = ".SQLValue($data[$k]);
	    unset($data[$k]);
    }
  }
  else
  {
	  $id[] = "`$key` = ".SQLValue($data[$key]);
	  unset($data[$key]);
  }
	if( $data = relevantDataArray( $table, $data ) )
	{
		$update = sqlquery("
			UPDATE $table
			SET ".SQLUpdateString( $data )."
			WHERE ".implode(' AND ', $id)."
		");
		if( $showQuery )
			echo "<pre>", print_r($update), "</pre>";
		if( !empty($update['rowsAffected']))
			return $update['rowsAffected'];
		else if( empty($update['errors']) )
			return true;

	}
	return false;
}

?>