<?php 
require_once"functions.php";

if(isset($_POST['update-stock'])){
	$data = $_POST;
	// unset($data['update-stock']);
	// $where = ['id'=>$_POST['id']];
	// unset($data['id']);
	$update = "UPDATE `inventory` SET 
	`product_name` = '".$data['name']."',
	`product_qty` = '".$data['qty']."',
	`total_qty` = '".$data['total_qty']."',
	`shortage` = '".$data['shortage']."',
	`total_amount_paid` = '".$data['total_amount']."',
	`amount_per_kg` = '".$data['amount_per_kg']."',
	`quality` = '".$data['quality']."',
	`category` = '".$data['category']."',
	`cargo` = '".$data['cargo']."'
	WHERE `id` = '".$data['id']."' ";
	
	mysqli_query($conn, $update);
	
	header("location:index.php");
}

?>