<?php 

session_start();
require_once('../helper/functions.php');
require_once('../config/conn.php');

if(isset($_POST['update-inventory'])){
	$_POST['qty'] = str_replace(',', '', $_POST['qty']);

	$update = "UPDATE `inventory` SET 
	`product_name` = '".$_POST['name']."',
	`product_qty` = '".$_POST['qty']."',
	`total_qty` = '".$_POST['total_qty']."',
	`shortage` = '".$_POST['shortage']."',
	`total_amount_paid` = '".$_POST['total_amount']."',
	`amount_per_kg` = '".$_POST['amount_per_kg']."',
	`quality` = '".$_POST['quality']."',
	`category` = '".$_POST['category']."',
	`cargo` = '".$_POST['cargo']."',
	`amount_in_words` = '".$_POST['amount_in_words']."'
	WHERE `id` = '".$_POST['id']."' ";

	mysqli_query($conn, $update);

	date_default_timezone_set("Asia/Calcutta");

	$logs = [
		'name' => $_SESSION['user_id'],
		'action' => 'Inventory Update',
		'description' => 'Updated the Product',
		'time' => date("F d, Y h:i:s A"),
	];

	create('logs', $logs);
	
	header("location: ../index/");
}

?>