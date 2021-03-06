<?php
session_start();
require_once('../config/conn.php');
require_once('../helper/functions.php');

if (isset($_SESSION['user_name'])) {
	header("location: ../index/");
	exit();
}

if (isset($_POST['login'])) {
	$email = validate($_POST['email']);
	$password = validate($_POST['password']);

	login('users', $email, $password);

	header("location: ../index/");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inventory</title>
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/fa/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body>
	<div class="wrapper">
		<div class="wrapper-child">
			<h2><strong>Inventory</strong></h2>
			<hr>
			<form action="" method="post" class="form-group">
				<label>Email Address</label>
				<input type="email" placeholder="Email Address" required class="form-control" name="email">
				<div>
					<label>Password</label>
					<input type="password" autocomplete="current-password" required placeholder="Password" id="password" class="form-control" name="password">
					<i class="fa fa-eye-slash" onclick="toggle()" id="icon"></i>
				</div>
				<input type="submit" name="login" class="form-control register btn btn-secondary" value="Login">
			</form>
		</div>
	</div>
	<script src="../assets/js/script.js"></script>
	<script src="../assets/js/jquery-3.5.1.min.js"></script>
</body>
</html>