<?php 
require_once"functions.php";

if(isset($_POST['update-user'])){
	$data = $_POST;

	$update = "UPDATE `users` SET 
	`name` = '".$data['user_name']."',
	`email` = '".$data['email']."',
	`mobile_number` = '".$data['mobile_number']."',
	`address` = '".$data['address']."'
	WHERE `id` = '".$data['id']."' ";
	
	mysqli_query($conn, $update);
	
	header("location:users.php");
}

?>