<?php
if(function_exists('mysql_connect') || function_exists('mysqli_connect'))
{

define('FETCH_ASSOC', 0);
define('FETCH_NUM', 1);
define('FETCH_BOTH', 2);

global $dbConfigDefault;
$dbConfigDefault = array(
	'dbType'	=>	"mysql"
,	'hostname'	=>	"localhost"
,	'username'	=>	""
,	'password'	=>	""
,	'database'	=>	""
,	'mysqli'	=>	function_exists('mysqli_connect')
,	'fetch-mode'	=> FETCH_ASSOC
,	'verbose'	=>	true
,	'privacy'	=>	true
,	'schema'	=>	false
,	'result-only'	=>	false
,	'store-result'	=>	true
);

if( !function_exists( "mtime" ) )
{
	function mtime()
	{
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}
}

/**
* Simple straight SQL passthru function, which can override the settings in $dbConfigDefault above
* Returns an array with key 'data' that has assoc arrays (by default) of your result rows
* Or it may have a key 'error' if it errors. Plus a lot of other stuff but that's the important part.
*/
function SQLQuery( $query, $param = false )
{
	static $dbStates;

	if(!isset($dbStates))
	{
		$dbStates = array();
	}

	if(!is_array($param))
	{
		$param = array($param);
	}

	global $dbConfigDefault; global $dbConfig;
	$config = array_merge($dbConfigDefault, $dbConfig);
	foreach($config as $key => $ignored)
	{
		if(isset($param[$key]))
		{
			$config[$key] = $param[$key];
		}
		elseif(array_search($key, $param) !== false)
		{
			$config[$key] = true;
		}
		elseif(array_search('no-'.$key, $param) !== false)
		{
			$config[$key] = false;
		}
	}

	if($config['dbType'] != 'mysql')
	{
		return false;
	}

	$query = trim($query);
	$return = array();

	if(!empty($config['verbose']))
	{
		$t_start = mtime();
		$return['query'] = $query;
		$return['dbType'] = 'mysql';
		$return['status'] = false;
		$return['connection'] = false;
		$return['database'] = false;
		$return['schema'] = false;

		if(!$config['privacy'])
		{
			$return['connectionInfo'] = $config;
		}
	}

	$dbConnect = implode('|', array(
		$config['hostname'], $config['username'], $config['password']
	));

	if( empty($dbStates[$dbConnect]['connection']) )
	{
		# We need to connect!
		if(!empty($config['mysqli']))
		{
			$try = new mysqli( $config['hostname'], $config['username'], $config['password'], $config['database'] );
			if(mysqli_connect_errno())
			{
				$return['error'] = mysqli_connect_error();
			}
			else
			{
				$dbStates[$dbConnect] = array();
				$dbStates[$dbConnect]['connection'] = $try;
				$dbStates[$dbConnect]['database'] = $config['database'];
			}
		}
		else
		{
			$try = @mysql_connect( $config['hostname'], $config['username'], $config['password'] );
			if($try)
			{
				$dbStates[$dbConnect] = array();
				$dbStates[$dbConnect]['connection'] = $try;
				$dbStates[$dbConnect]['database'] = '';
			}
			else
			{
				$return['error'] = mysql_error();
			}
		}
		if(!empty($return['error']))
		{
			if(!empty($config['verbose']))
			{
				$t_stop = mtime();
				$return['time'] = array( 'start' => $t_start, 'stop' => $t_stop, 'elapsed' => $t_stop - $t_start );
			}
			return $return;
		}
	}
	$db = $dbStates[$dbConnect]['connection'];

	if($config['verbose'])
	{
		$return['connection'] = $db;
	}

	if(!empty($config['database']) && $config['database'] != $dbStates[$dbConnect]['database'])
	{
		if(!empty($config['mysqli']))
		{
			if(!$db->select_db($config['database']))
			{
				$return['error'] = $db->error;
			}
		}
		else
		{
			if(!@mysql_select_db( $config['database'], $db ))
			{
				$return['error'] = mysql_error($db);
			}
		}
		if(!empty($return['error']))
		{
			if($config['verbose'])
			{
				$return['connection'] = false;
				$t_stop = mtime();
				$return['time'] = array( 'start' => $t_start, 'stop' => $t_stop, 'elapsed' => $t_stop - $t_start );
			}
			return $return;
		}
	}

	if(!empty($config['verbose']))
	{
		$return['database'] = true;
		$q_start = mtime();
	}

	if(!empty($config['mysqli']))
	{
		$q = @$db->real_query($query);
	}
	else
	{
		$q = @mysql_unbuffered_query($query, $db);
	}

	if($config['verbose'])
	{
		$q_stop = mtime();
		$return['rtime'] = array( 'start' => $q_start, 'stop' => $q_stop, 'elapsed' => $q_stop - $q_start );
	}

	if($q === false)
	{
		if(!empty($config['mysqli']))
		{
			$return['error'] = $db->error;
		}
		else
		{
			$return['error'] = mysql_error($db);
		}
		if($config['verbose'])
		{
			$return['connection'] = false;
			$t_stop = mtime();
			$return['time'] = array( 'start' => $t_start, 'stop' => $t_stop, 'elapsed' => $t_stop - $t_start );
		}
		return $return;
	}

	if($config['verbose'])
	{
		$return['status'] = true;
	}

	list($queryType, $ignored) = preg_split('/[\s]+/', $query, 2);
	$queryType = strtolower($queryType);

	switch($queryType)
	{
		case 'select':
		case 'show':
		case 'describe':
		case 'explain':
			if($config['verbose'])
			{
				$return['queryType'] = 'select';
			}

			if(!empty($config['mysqli']))
			{
				$rs = @$db->use_result();
			}
			else
			{
				$rs = $q;
			}

			if(!$config['store-result'])
			{
				$return['data'] = $rs;
			}
			elseif(!empty($config['mysqli']))
			{
				if($config['fetch-mode'] == FETCH_NUM)
					$m = MYSQLI_NUM;
				elseif($config['fetch-mode'] == FETCH_BOTH)
					$m = MYSQLI_BOTH;
				else
					$m = MYSQLI_ASSOC;

				$r = array();
				while($row = @$rs->fetch_array($m))
				{
					if(empty($param['id_fields']))
					{
						$r[] = $row;
					}
					elseif(is_array($param['id_fields']))
					{
						$k = array();
						foreach($param['id_fields'] as $field_name)
						{
							$k[] = $row[$field_name];
						}
						$k = implode(',', $k);
						$r[$k] = $row;
					}
					else
					{
						$r[$row[$param['id_fields']]] = $row;
					}
				}

				if($config['verbose'] && $config['schema'])
				{
					$f = array(); $s = array();
					while($field = $rs->fetch_field())
					{
						$f[$rs->current_field] = $field->name;
						$s[$rs->current_field] = $field;
					}
				}

				$rs->close();
			}
			else
			{
				if($config['fetch-mode'] == FETCH_NUM)
					$m = MYSQL_NUM;
				elseif($config['fetch-mode'] == FETCH_BOTH)
					$m = MYSQL_BOTH;
				else 
					$m = MYSQL_ASSOC;

				$r = array();
				while($row = mysql_fetch_array($rs, $m))
				{
					if(empty($param['id_fields']))
					{
						$r[] = $row;
					}
					elseif(is_array($param['id_fields']))
					{
						$k = array();
						foreach($param['id_fields'] as $field_name)
						{
							$k[] = $row[$field_name];
						}
						$k = implode(',', $k);
						$r[$k] = $row;
					}
					else
					{
						$r[$row[$param['id_fields']]] = $row;
					}
				}

				if($config['verbose'] && $config['schema'])
				{
					$f = array(); $s = array();
					for($i = 0; $i < mysql_num_fields($rs); $i++)
					{
						$f[$i] = mysql_field_name($rs, $i);
						if($config['schema'])
							$s[$i] = mysql_fetch_field($rs, $i);
					}
				}
			}

			if(empty($return['data']))
			{
				$return['data'] = $r;

				if($config['verbose'])
				{
					if($config['schema'])
					{
						$return['allKeys'] = $f;
						$return['assocCols'] = sizeof($f);
						$return['schema'] = $s;
					}
					$return['rows'] = sizeof($return['data']);
				}
			}
		break;

		case 'insert':
		case 'replace':
			if($config['verbose'])
			{
				$return['queryType'] = 'insert';
			}
			if(!empty($config['mysqli']))
			{
				$return['insertID'] = $db->insert_id;
				$return['rowsAffected'] = $db->affected_rows;
			}
			else
			{
				$return['insertID'] = mysql_insert_id($db);
				$return['rowsAffected'] = mysql_affected_rows($db);
			}
		break;

		case 'update':
		case 'delete':
			if($config['verbose'])
			{
				$return['queryType'] = $queryType;
			}
			if(!empty($config['mysqli']))
			{
				$return['rowsAffected'] = $db->affected_rows;
			}
			else
			{
				$return['rowsAffected'] = mysql_affected_rows($db);
			}
		break;
	}

	if(!empty($config['mysqli']) && !$config['store-result'])
	{
		mysql_free_result($q);
	}

	if($config['verbose'])
	{
		$t_stop = mtime();
		$return['time'] = array( 'start' => $t_start, 'stop' => $t_stop, 'elapsed' => $t_stop - $t_start );
	}

	if($config['result-only'] && isset($return['data']))
	{
		return $return['data'];
	}
	else
	{
		return $return;
	}
}

}
else
{

function SQLQuery( $query, $param = false )
{
	return false;
}

}

?>
