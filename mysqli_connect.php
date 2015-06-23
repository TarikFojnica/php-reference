<?php
DEFINED('DB_USER') || DEFINE ('DB_USER', 'root');
DEFINED('DB_PASSWORD') || DEFINE ('DB_PASSWORD', 'tarik3656422');
DEFINED('DB_HOST') || DEFINE ('DB_HOST', 'localhost');
DEFINED('DB_NAME') || DEFINE ('DB_NAME', 'final');

// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');