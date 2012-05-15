<?php
require '_config.php';

mysql_connect(
  $server = getenv('MYSQL_DB_HOST'),
  $username = getenv('MYSQL_USERNAME'),
  $password = getenv('MYSQL_PASSWORD'));
mysql_select_db(getenv('MYSQL_DB_NAME'));

$sql = 'SELECT * FROM books';
$result = mysql_query($sql);

var_dump($result);

while($row = $result->fetch_array()){
    print $row['id'].' '. $row['category']. '<br />';
}

?>