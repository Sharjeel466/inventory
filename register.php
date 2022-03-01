<?php 
session_start();
require_once('../config/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat</title>
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/fa/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body>
	<div class="wrapper">
		<div class="wrapper-child">
			<h2><strong>Chating App</strong></h2>
			<hr>
			<form action="" class="form-group">
				<label>User name</label>
				<input type="text" placeholder="User Name" class="form-control">
				<label>Email Address</label>
				<input type="email" placeholder="Email Address" class="form-control">
				<div>
					<label>Password</label>
					<input type="password" autocomplete="current-password" required="" placeholder="Password" id="password" class="form-control">
					<i class="fa fa-eye-slash" onclick="toggle()" id="icon"></i>
				</div>
				<div>
					<label>Select Image</label>
					<input type="file"class="form-control">
				</div>
				<input type="submit" class="form-control register btn btn-secondary" value="Register">
			</form>
		</div>
	</div>

	<?php 
	require_once('../include/footer.php');
?>