<?php 
require_once('functions.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	delete('inventory', $id);
	header('location:index.php');
}

?>