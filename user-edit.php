<?php 
include('list.php');

$where = ['id' => $_GET['id']];
$row = select('users', $where);
$row = $row[0];
?>
<div class="card-header">
	<h2>Update Update</h2>
</div>
<div class="card-body">
	<form action="update-user.php" method="POST">
		<div class="row">
			<input type="hidden" name="id" value="<?= $row['id'] ?>">
			<div class="form-group col-md-3">
				<label>User Name</label>
				<input type="text" required class="form-control" value="<?= $row['name'] ?>" name="user_name" placeholder="User Name">
			</div>
			<div class="form-group col-md-3">
				<label>Email</label>
				<input type="email" required class="form-control" value="<?= $row['email'] ?>" name="email" placeholder="Email">
			</div>
			<div class="form-group col-md-3">
				<label>Mobile Number</label>
				<input type="text" class="form-control" value="<?= $row['mobile_number'] ?>" onkeypress="return IsNumeric(event);" name="mobile_number" placeholder="Mobile Number">
			</div>
			<div class="form-group col-md-3">
				<label>Address</label>
				<input type="text" class="form-control" value="<?= $row['address'] ?>" name="address" placeholder="Address">
			</div>
		</div>
		<div class="form-group">
			<button type="submit" value="true" name="update-user" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>

<?php 
include('index-end.php');
?>