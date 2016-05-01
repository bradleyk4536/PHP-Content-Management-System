<?php
//assign all parameters for mysql_connect() to variables

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = '';
$db['db_name'] = 'cms';

//Convert each variable to constant

foreach($db as $key => $value){ define(strtoupper($key), $value); }

//	Create connection to database using mysql_connect(localhost, root, password, database name)

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(!$connection) { 
	die("Database connection failed"); 
} 
?>