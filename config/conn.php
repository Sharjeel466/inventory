<?php 
$server_name = 'localhost';
$user_name = 'root';
$database = 'inventory';
$password = '';

$conn = mysqli_connect($server_name, $user_name, $password, $database);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>