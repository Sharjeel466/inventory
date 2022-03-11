<?php require_once('../navbar/list.php');
?>

<div class="card-header">
	<h3>Production</h3>
</div>
<div class="card-body">
	<a href="../production/add-production" class="btn btn-primary">Add Production</a>
</div>
<div class="card-body">
	
	<div class="details-container">
		<ul class="responsive-table">
			<li class="table-header">
				<div class="col col-1" data-label="#">#</div>
				<div class="col">Product(Category)</div>
				<div class="col">Mixture Name</div>
				<div class="col">User Quantity</div>
				<div class="col">Required Quantity</div>
				<div class="col">Total/kg</div>
				<div class="col">Total</div>
				<div class="col">Time</div>
				<div class="col">Total Amount</div>
			</li>
			<?php $n =1;
			$select = leftJoin('costing', 'inventory', 'product_id', 'id', 'costing', 'id');
			
			foreach ($select as $key => $f) {?>
				<li class="table-row">
					<div class="col col-1" data-label="#"><?= $n++ ?></div>
					<div class="col" data-label="Name-"><?= $f['product_name'] ?>(<?= $f['category'] ?>)</div>
					<div class="col" data-label="Category-"><?= $f['shake_name'] ?></div>
					<div class="col" data-label="Category-"><?= $f['user_qty'] ?></div>
					<div class="col" data-label="Total Qty-"><?= $f['required_qty'] ?></div>
					<div class="col" data-label="Total Qty-"><?= $f['total_per_kg'] ?></div>
					<div class="col" data-label="Total Qty-"><?= $f['total'] ?></div>
					<div class="col" data-label="Total Qty-"><?= $f['time'] ?></div>
					<div class="col" data-label="Total Qty-"><?= $f['total_product_qty'] ?></div>
				</li> 
				<?php 
			}
			?>

		</ul>
	</div>
</div>

<?php 
require_once('../include/index-end.php');
?>