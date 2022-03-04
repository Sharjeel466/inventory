<?php 
session_start();
require_once('conn.php');
require_once('functions.php');

if (isset($_POST['save-stock'])) {

	$product_id = $_POST['product_id'];
	// $p_id=implode(',', $product_id);

	$user_qty = $_POST['user_qty'];
	// $u_qty=implode(',', $user_qty);

	$required_qty = $_POST['required_qty'];
	$lot = $_POST['lot'];
	$total_amount = $_POST['total_amount'];

	$data = [
		'time' => date("F d, Y h:i:s A"),
		'product_id' => $product_id,
		'user_qty' => $user_qty,
		'required_qty' => $required_qty,
		'lot' => $lot,
		'total_amount' => $total_amount
	];

	for ($i=0; $i < count($data['product_id']); $i++) { 

		$insert='INSERT INTO `costing` (`time`, `product_id`, `user_qty`, `required_qty`, `lot`, `total_amount`) VALUES ("'.$data['time'].'", "'.$data['product_id'][$i].'", "'.$data['user_qty'][$i].'", "'.$data['required_qty'].'", "'.$data['lot'].'", "'.$data['total_amount'].'")';

			$result=mysqli_query($conn,$insert);
	
		}
		
	foreach ($product_id as $key => $value) {

		$select="SELECT * FROM `inventory` WHERE `id` = '".$value."'";
		$result=mysqli_query($conn,$select);
		$f = mysqli_fetch_assoc($result);

		$remaining_stock = $f['total_qty'] - $user_qty[$key];

		$update = "UPDATE `inventory` SET `total_qty` = '".$remaining_stock."' WHERE `id` = '".$value."'";
		mysqli_query($conn,$update);

	}

	header('location: costing.php');

	}

?>