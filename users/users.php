<?php 
require_once('../navbar/list.php');

if ($_SESSION['role'] != 'admin' || $_SESSION['role'] != 'sub_admin') {
	?>
	<script>
		window.location.href = '../index/';
	</script>
	<?php 
}


$select = 'SELECT * FROM `users` WHERE `role` != "admin"';
$result = mysqli_query($conn,$select);

?>

<div class="card-header">
	<h3>Users</h3>
</div>
<div class="card-body">
	<a href="../users/add-user.php" class="btn btn-primary">Add User</a>
</div>
<div class="card-body">
	<div class="details-container">
		<ul class="responsive-table">
			<li class="table-header">
				<div class="col col-1" data-label="#">#</div>
				<div class="col">Name</div>
				<div class="col">Email</div>
				<div class="col">Mobile</div>
				<div class="col">Address</div>
				<div class="col" colspan="2">Action</div>
			</li>
			<?php $n =1;?>
			<?php while ($value = mysqli_fetch_assoc($result)) { ?>
				<li class="table-row">
					<div class="col col-1" data-label="#"><?= $n++ ?></div>
					<div class="col" data-label="Name-"><?= $value['name'] ?></div>
					<div class="col" data-label="Category-"><?= $value['email'] ?></div>
					<div class="col" data-label="Qty after Shortage-"><?= $value['mobile_number'] ?></div>
					<div class="col" data-label="Shortage-"><?= $value['address'] ?></div>
					<div class="col">
						<a href="../users/user-edit?id=<?php echo $value['id']?>" class="btn btn-sm btn-primary">Edit</a>
					</div>
						<!-- <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#delete_stock-<?= $value['id'] ?>">
							Delete
						</button> -->
					</li>
				<?php } ?>

			</ul>
		</div>
	</div>

	<?php 
	require_once('../include/index-end.php');
?>