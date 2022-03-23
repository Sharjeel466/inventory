<?php 
session_start();
require_once('../config/conn.php');
require_once('../helper/functions.php');

if (isset($_POST['save-stock'])) {

	$product_id = $_POST['product_id'];
	$product_name = $_POST['product_name'];
	$user_qty = $_POST['user_qty'];
	$total_product_qty = $_POST['total_product_qty'];
	$required_qty = $_POST['required_qty'];
	$total_per_kg = $_POST['total_per_kg'];
	$total = $_POST['total'];
	$shake_name = $_POST['shake_name'];

	$costing_data = [
		'time' => date("F d, Y h:i:s A"),

		// 'product_id' => $product_id,
		// 'user_qty' => $user_qty,
		// 'total_product_qty' => $total_product_qty,

		'required_qty' => $required_qty,
		'total_per_kg' => $total_per_kg,
		'shake_name' => $shake_name,
		'total' => $total
	];

	create('costing', $costing_data);
	$last_id = mysqli_insert_id($conn);

	for ($i=0; $i < count($product_id); $i++) {

		$insert = 'INSERT INTO `production` (`costing_id`, `product_id`, `product_name`, `user_qty`, `total_product_qty`) 
		VALUES (
			"'.$last_id.'",
			"'.$product_id[$i].'", 
			"'.$product_name[$i].'", 
			"'.$user_qty[$i].'", 
			"'.$total_product_qty[$i].'"
		)';

		$result = mysqli_query($conn, $insert);
		
	}

	foreach ($product_id as $key => $value) {

		$select="SELECT * FROM `inventory` WHERE `id` = '".$value."'";
		$result=mysqli_query($conn,$select);
		$f = mysqli_fetch_assoc($result);

		$remaining_stock = $f['total_qty'] - $total_product_qty[$key];

		$update = "UPDATE `inventory` SET `total_qty` = '".$remaining_stock."' WHERE `id` = '".$value."'";
		mysqli_query($conn, $update);

	}

	date_default_timezone_set("Asia/Calcutta");

	$logs = [
		'name' => $_SESSION['user_id'],
		'action' => 'Production Added',
		'description' => 'Created new Production',
		'time' => date("F d, Y h:i:s A"),
	];

	create('logs', $logs);

	header('location: ../production/costing');

}

?>