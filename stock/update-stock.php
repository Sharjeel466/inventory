<?php 
// require_once('../navbar/list.php');

// $where = ['id' => $_GET['id']];
// $row = select('inventory', $where);
// $row = $row[0];

?>
<!-- <div class="card-header">
	<h2>Update Stock</h2>
</div>
<div class="card-body">
	<form action="../stock/stock-update" method="POST">
		<div class="row">
			<input type="hidden" name="id" value="<?= $row['id'] ?>">
			<div class="form-group col-md-3">
				<label>Name</label>
				<input type="text" required readonly class="form-control" value="<?= $row['product_name'] ?>" name="name" placeholder="Product Name">
			</div>
			<div class="form-group col-md-3">
				<label>Category</label>
				<input type="text" required readonly class="form-control" value="<?= $row['category'] ?>" name="category" placeholder="Category">
			</div>
			<div class="form-group col-md-3">
				<label>Total Quantity (kg)</label>
				<input type="hidden" name="previous_stock" value="<?= $row['product_qty'] ?>">
				<input type="text" onkeypress="return IsNumeric(event);" value="<?= $row['product_qty'] ?>" class="add_product_qty form-control" name="qty" placeholder="Product Quantity">
			</div>
			<div class="form-group col-md-3">
				<label>Shortage (%)</label>
				<input type="text" class="form-control" id="shortage" name="shortage" value="<?= $row['shortage'] ?>" placeholder="Product Shortage">
			</div>
			<div class="form-group col-md-3">
				<input type="hidden" name="previous_qty" value="<?= $row['total_qty'] ?>">
				<label>Quantity after Shortage</label>
				<input type="text" class="form-control" id="total_qty" readonly value="<?= $row['total_qty'] ?>" name="total_qty" placeholder="Total Quantity">
			</div>
			<div class="form-group col-md-3">
				<input type="hidden" name="previous_amount_paid" value="<?= $row['total_amount_paid'] ?>">
				<label>Total Amount Paid</label>	
				<input type="text" id="amount_paid" onkeypress="return IsNumeric(event);" value="<?= $row['total_amount_paid'] ?>" class="form-control" name="total_amount" placeholder="Paid Amount">
			</div>
			<div class="form-group col-md-3">
				<label>Cargo</label>	
				<input type="text" id="cargo" onkeypress="return IsNumeric(event);" id="cargo" value="<?= $row['cargo'] ?>" class="form-control" name="cargo" placeholder="Cargo">
			</div>
			<div class="form-group col-md-3">
				<label>Amount/kg</label>	
				<input type="text" onkeypress="return IsNumeric(event);" value="<?= $row['amount_per_kg'] ?>" class="form-control" readonly name="amount_per_kg" id="amount_per_kg" placeholder="Amount/kg">
			</div>
			<div class="form-group col-md-3">
				<label>Quality</label>
				<select class="form-control" name="quality">
					<?php for ($i=1; $i < 11; $i++) { ?>
						<option <?php if ($row['quality'] == $i): ?>value="<?= $row['quality'] ?>" selected><?= $row['quality'] ?></option><?php endif ?>
						value="<?= $i ?>"><?= $i ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<button type="submit" value="true" name="update-stock" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>
 -->
<?php 
// require_once('../include/index-end.php');
?>