<?php
require_once('../navbar/list.php');

if ($_SESSION['role'] == 'employee') {
	?>
	<script>
		window.location.href = '../index/';
	</script>
	<?php 
}

$result = leftJoin('logs', 'users', 'name', 'id', 'logs', 'id');
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
				<div class="col">User Role</div>
				<div class="col">Action</div>
				<div class="col">Description</div>
				<div class="col">Time</div>
			</li>
			<?php $n =1;?>
				
			<?php foreach ($result as $key => $value): ?>
				<li class="table-row">
					<div class="col col-1" data-label="#"><?= $n++ ?></div>
					<div class="col" data-label="Name-"><?= $value['name'] ?></div>
					<div class="col" data-label="Category-"><?= $value['role'] ?></div>
					<div class="col" data-label="Category-"><?= $value['action'] ?></div>
					<div class="col" data-label="Qty after Shortage-"><?= $value['description'] ?></div>
					<div class="col" data-label="Shortage-"><?= $value['time'] ?></div>
			<?php endforeach ?>

			</ul>
		</div>
	</div>

	<?php 
	require_once('../include/index-end.php');
?>