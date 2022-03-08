<?php
require_once('../navbar/list.php');

if ($_SESSION['role'] != 'admin') {
	?>
	<script>
		window.location.href = '../index/';
	</script>
	<?php 
}

require_once('../helper/functions.php');

if(isset($_POST['update-user'])){
	$data = $_POST;

	$update = "UPDATE `users` SET 
	`name` = '".$data['user_name']."',
	`email` = '".$data['email']."',
	`mobile_number` = '".$data['mobile_number']."',
	`address` = '".$data['address']."'
	WHERE `id` = '".$data['id']."' ";
	
	mysqli_query($conn, $update);

	date_default_timezone_set("Asia/Calcutta");

	$logs = [
		'name' => $_SESSION['user_id'],
		'action' => 'User updated',
		'description' => 'Updated the User',
		'time' => date("F d, Y h:i:s A"),
	];

	create('logs', $logs);
	?>
	<script>
		window.location.href = '../users/users';
	</script>
	<?php 
}

?>