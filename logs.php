<?php
include('list.php');

if ($_SESSION['role'] != 'admin') {
	?>
	<script>
		window.location.href = '../inventory';
	</script>
	<?php 
}

$select = 'SELECT * FROM `users` WHERE `role` != "admin"';
$result = mysqli_query($conn,$select);

?>

<div class="card-header">
	<h3>Logs</h3>
</div>

<div class="card-body">
	<div class="details-container">
		<ul class="responsive-table">
			<li class="table-header">
				<div class="col col-1" data-label="#">#</div>
				<div class="col">User Name</div>
				<div class="col">Action</div>
				<div class="col">Description</div>
				<div class="col">Time</div>
			</li>
			<?php $n =1;?>
			<?php while ($value = mysqli_fetch_assoc($result)) { ?>
				<li class="table-row">
					<div class="col col-1" data-label="#"><?= $n++ ?></div>
					<div class="col" data-label="Name-"><?= $value['name'] ?></div>
					<div class="col" data-label="Category-"><?= $value['email'] ?></div>
					<div class="col" data-label="Qty after Shortage-"><?= $value['mobile_number'] ?></div>
					<div class="col" data-label="Shortage-"><?= $value['address'] ?></div>
				<?php } ?>

			</ul>
		</div>
	</div>

	<?php 
	include('index-end.php');
?>