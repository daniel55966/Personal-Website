<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$hostname = "php-mysql-exercisedb.slccwebdev.com";
$username = "phpmysqlexercise";
$password = "mysqlexercise";
$databasename = "php_mysql_exercisedb";

// Create connection
$conn = new mysqli($hostname, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>