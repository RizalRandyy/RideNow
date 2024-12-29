<?php

$db_host = "localhost"; // database server
$db_username = "root";  // database username
$db_password = "";      // database password
$db_name = "ridenow";   // database name

// connect to mysql, if error will stop program
$db_connection = mysqli_connect($db_host, $db_username, $db_password) or die;

// select active database
mysqli_select_db($db_connection, $db_name);
