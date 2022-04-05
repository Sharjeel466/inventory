<?php include('../navbar/list.php');

$data = select('inventory');
?>

<div class="card-header">
	<h3>Inventory</h3>
</div>
<div class="card-body">
	<a href="../stock/add-inventory" class="btn btn-primary">Add Inventory</a>
</div>
<div class="card-body">
	<!-- <table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Category</th>
				<th>Total Qty</th>
				<th>Qty after shortage</th>
				<th>Shortage</th>
				<th>Total Paid Amount</th>
				<th>Amount / kg</th>
				<th>Quality</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $n =1;?>
			<?php foreach ($data as $key => $value): ?>
				<tr>
					<td><?= $n++ ?></td>
					<td><?= $value['product_name'] ?></td>
					<td><?= $value['category'] ?></td>
					<td><?= $value['product_qty'] ?></td>
					<td><?= $value['total_qty'] ?></td>
					<td><?= $value['shortage'] ?></td>
					<td><?= $value['total_amount_paid'] ?></td>
					<td><?= $value['amount_per_kg'] ?></td>
					<td><?= $value['quality'] ?></td>
					<td class="btn-group" role="group">
						<a href="edit.php?id=<?php echo $value['id']?>" class="btn btn-sm btn-primary">Edit</a>
						<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#delete_stock-<?= $value['id'] ?>">
							Delete
						</button>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table> -->
	<div class="details-container">
		<ul class="responsive-table">
			<li class="table-header">
				<div class="col col-1" data-label="#">#</div>
				<div class="col">Name</div>
				<div class="col">Category</div>
				<div class="col">Total Qty</div>
				<div class="col">Qty after Shortage</div>
				<div class="col">Shortage</div>
				<div class="col">Total paid Amount</div>
				<div class="col">Cargo</div>
				<div class="col">Amount/kg</div>
				<div class="col">Quality</div>
				<div class="col" colspan="2">Action</div>
			</li>
			<?php $n =1;?>
			<?php foreach ($data as $key => $value): ?>
				<li class="table-row">
					<div class="col col-1" data-label="#"><?= $n++ ?></div>
					<div class="col" data-label="Name-"><?= $value['product_name'] ?></div>
					<div class="col" data-label="Category-"><?= $value['category'] ?></div>
					<div class="col" data-label="Total Qty-"><?= $value['product_qty'] ?></div>

					<div class="col <?php if ($value['total_qty'] == ''): ?> bg-danger <?php endif ?>" data-label="Qty after Shortage-"><?= $value['total_qty'] ?></div>

					<div class="col <?php if ($value['shortage'] == ''): ?> bg-danger <?php endif ?>" data-label="Shortage-"><?= $value['shortage'] ?></div>

					<div class="col <?php if ($value['total_amount_paid'] == ''): ?> bg-danger <?php endif ?>" data-label="Total Amount Paid-"><?= $value['total_amount_paid'] ?></div>

					<div class="col <?php if ($value['cargo'] == ''): ?> bg-danger <?php endif ?>" data-label="Amount/kg-"><?= $value['cargo'] ?></div>

					<div class="col <?php if ($value['amount_per_kg'] == ''): ?> bg-danger <?php endif ?>" data-label="Amount/kg-"><?= $value['amount_per_kg'] ?></div>
					
					<div class="col" data-label="Quality-"><?= $value['quality'] ?></div>
					
					<div class="btn-group" role="group">
						<a href="../stock/edit-inventory.php?id=<?php echo $value['id']?>" class="btn btn-sm btn-primary">Edit</a>
						<!-- <a href="../stock/update-stock.php?id=<?php echo $value['id']?>" class="btn btn-sm btn-success">Update</a> -->
						<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#delete_stock-<?= $value['id'] ?>">
							Delete
						</button>
					</div>
				</li>
			<?php endforeach ?>

		</ul>
	</div>
</div>

<?php 
include('../include/index-end.php');
?>