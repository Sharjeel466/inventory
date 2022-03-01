<?php include('list.php');

$data = select('inventory');

?>

<div class="card-header">
	<h3>Inventory</h3>
</div>
<div class="card-body">
	<a href="add-inventory.php" class="btn btn-primary">Add Inventory</a>
</div>
<div class="card-body">
	<table class="table table-striped">
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
	</table>
</div>

<?php 
include('index-end.php');
?>