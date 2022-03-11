<?php 
require_once('../navbar/list.php');

if ($_SESSION['role'] != 'admin' || $_SESSION['role'] != 'sub_admin') {
	?>
	<script>
		window.location.href = '../index/';
	</script>
	<?php 
}

if (isset($_POST['save-user'])) {

	$user_name = $_POST['user_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$mobile_number = $_POST['mobile_number'];
	$address = $_POST['address'];
	$role = $_POST['role'];

	$data = [
		'name' => $user_name,
		'email' => $email,
		'password' => md5($password),
		'mobile_number' => $mobile_number,
		'address' => $address,
		'role' => $role,
	];	

	create('users', $data);

	date_default_timezone_set("Asia/Calcutta");

	$logs = [
		'name' => $_SESSION['user_id'],
		'action' => 'User Added',
		'description' => 'Inserted new User in the system',
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

<div class="card-header">
	<h2>Add User</h2>
</div>
<div class="card-body">
	<form action="../users/add-user" method="post">
		<div class="row">
			<div class="form-group col-md-3">
				<label>User Name</label>
				<input type="text" required class="form-control" name="user_name" placeholder="User Name">
			</div>
			<div class="form-group col-md-3">
				<label>Email</label>
				<input type="email" required class="form-control" name="email" placeholder="Email">
			</div>
			<div class="form-group col-md-3">
				<label>Password</label>
				<input type="password" required class="form-control" name="password" id="password" placeholder="Password">
				<i class="fa fa-eye-slash" onclick="toggle()" id="icon"></i>
			</div>
			<div class="form-group col-md-3">
				<label>Mobile Number</label>
				<input type="text" class="form-control" onkeypress="return IsNumeric(event);" name="mobile_number" placeholder="Mobile Number">
			</div>
			<div class="form-group col-md-3">
				<label>Address</label>
				<input type="text" class="form-control" name="address" placeholder="Address">
			</div>
			<div class="form-group col-md-3">
				<label>Role</label>
				<select class="form-control" required name="role">
					<option value="">---Select Role---</option>
					<option value="sub_admin">Sub Admin</option>
					<option value="employee">Employee</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<button type="submit" name="save-user" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>

<?php 
require_once('../include/index-end.php');
?>