<?php

// params: dbhost, user, pswd, database
$mysqli = new mysqli('localhost', 'web_catalog', 'sxsfpNKLKswN6Hfe', 'web_catalog');

/* Check the connection */
if(mysqli_connect_errno()){
    print "Connection to DB failed: ".mysqli_connect_error();
    exit();
}

?>