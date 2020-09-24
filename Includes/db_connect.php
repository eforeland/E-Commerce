<?php  
// This file also establishes a connection to MySQL, 
// selects the database, and sets the encoding.

// Set the database access information as constants:
DEFINE ('DB_USER', 'ICS199Group04_dev');
DEFINE ('DB_PASSWORD', 'Tempd04');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'ICS199Group04_dev');

// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');
?>