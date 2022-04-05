<?php 

// session_start();
// require_once('../helper/functions.php');
// require_once('../config/conn.php');

// if(isset($_POST['update-stock'])){
// 	$data = $_POST;

// 	$total_stock = $data['qty'] + $data['previous_stock'];
// 	$total_qty = $data['previous_qty'] + $data['total_qty'];
// 	$total_amount_paid = $data['previous_amount_paid'] + $data['total_amount'];
	
// 	$update = "UPDATE `inventory` SET
// 	`product_qty` = '".$total_stock."',
// 	`total_qty` = '".$total_qty."',
// 	`shortage` = '".$data['shortage']."',
// 	`total_amount_paid` = '".$total_amount_paid."',
// 	`amount_per_kg` = '".$data['amount_per_kg']."',
// 	`quality` = '".$data['quality']."',
// 	`category` = '".$data['category']."',
// 	`cargo` = '".$data['cargo']."'
// 	WHERE `id` = '".$data['id']."' ";

// 	mysqli_query($conn, $update);

// 	date_default_timezone_set("Asia/Calcutta");

// 	$logs = [
// 		'name' => $_SESSION['user_id'],
// 		'action' => 'Inventory Update',
// 		'description' => 'Updated the Product',
// 		'time' => date("F d, Y h:i:s A"),
// 	];

// 	create('logs', $logs);
	
// 	header("location: ../index/");
// }

?>