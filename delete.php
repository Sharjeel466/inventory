<?php 
session_start();
require_once('functions.php');

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	delete('inventory', $id);

	date_default_timezone_set("Asia/Calcutta");

	$logs = [
		'name' => $_SESSION['user_id'],
		'action' => 'Inventory Deleted',
		'description' => 'Deleted the Product',
		'time' => date("F d, Y h:i:s A"),
	];

	create('logs', $logs);

	header('location:index.php');
}

?>