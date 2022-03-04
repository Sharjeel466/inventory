<?php include('list.php');

?>

<div class="card-header">
	<h3>Costing</h3>
</div>
<div class="card-body">
	<a href="add_costing.php" class="btn btn-primary">Add Costing</a>
</div>
<div class="card-body">
	
	<div class="details-container">
		<ul class="responsive-table">
			<li class="table-header">
				<div class="col col-1" data-label="#">#</div>
				<div class="col">Product Name</div>
				<div class="col">Product Category</div>
				<div class="col">User Quantity</div>
				<div class="col">Required Quantity</div>
				<div class="col">Lot</div>
				<div class="col">Time</div>
				<div class="col">Total Amount</div>
			</li>
			<?php $n =1;
			
			$slect ='SELECT * FROM `costing` LEFT JOIN `inventory` ON `costing`.`product_id` = `inventory`.`id`';
			$r = mysqli_query($conn,$slect);
			
			while ($f = mysqli_fetch_assoc($r)) {?>
				<li class="table-row">
					<div class="col col-1" data-label="#"><?= $n++ ?></div>
					<div class="col" data-label="Name-"><?= $f['product_name'] ?></div>
					<div class="col" data-label="Category-"><?= $f['category'] ?></div>
					<div class="col" data-label="Category-"><?= $f['user_qty'] ?></div>
					<div class="col" data-label="Total Qty-"><?= $f['required_qty'] ?></div>
					<div class="col" data-label="Total Qty-"><?= $f['lot'] ?></div>
					<div class="col" data-label="Total Qty-"><?= $f['time'] ?></div>
					<div class="col" data-label="Qty after Shortage-"><?= $f['total_amount'] ?></div>
				</li> 
				<?php 
			}
			?>

		</ul>
	</div>
</div>

<?php 
include('index-end.php');
?>