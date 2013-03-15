<?php

// Database configuration
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'INSE_db';

// Database connection
$connection = mysql_connect($db_host, $db_user, $db_password);

// Checks database has been found
if(!mysql_select_db($db_name))
	echo 'Connection to the database failed';

?>