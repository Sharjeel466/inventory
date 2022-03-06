<?php 
include('list.php');
if (isset($_POST['save-stock'])) {

	$name = $_POST['name'];
	$qty = $_POST['qty'];
	$total_qty = $_POST['total_qty'];
	$shortage = $_POST['shortage'];
	$total_amount = $_POST['total_amount'];
	$amount_per_kg = $_POST['amount_per_kg'];
	$quality = $_POST['quality'];
	$category = $_POST['category'];
	$cargo = $_POST['cargo'];

	$data = [
		'product_name' => $name,
		'product_qty' => $qty,
		'total_qty' => $total_qty,
		'shortage' => $shortage,
		'total_amount_paid' => $total_amount,
		'amount_per_kg' => $amount_per_kg,
		'quality' => $quality,
		'category' => $category,
		'cargo' => $cargo
	];	

	create('inventory', $data);
	?>
	<script>
		window.location.href = 'index.php';
	</script>
	<?php 
}

?>

<div class="card-header">
	<h2>Add Stock</h2>
</div>
<div class="card-body">
	<form action="add-inventory.php" method="post">
		<div class="row">
			<div class="form-group col-md-3">
				<label>Name</label>
				<input type="text" required class="form-control" name="name" placeholder="Product Name">
			</div>
			<div class="form-group col-md-3">
				<label>Category</label>
				<input type="text" required class="form-control" name="category" placeholder="Category">
			</div>
			<div class="form-group col-md-3">
				<label>Total Quantity (kg)</label>
				<input type="text" onkeypress="return IsNumeric(event);" id="product_qty" class="form-control" name="qty" placeholder="Product Quantity">
			</div>
			<div class="form-group col-md-3">
				<label>Shortage (%)</label>
				<input type="text" class="form-control" id="shortage" name="shortage" placeholder="Product Shortage">
			</div>
			<div class="form-group col-md-3">
				<label>Quantity after Shortage</label>
				<input type="text" class="form-control" id="total_qty" readonly name="total_qty" placeholder="kg">
			</div>
			<div class="form-group col-md-3">
				<label>Total Amount Paid</label>	
				<input type="text" id="amount_paid" onkeypress="return IsNumeric(event);" class="form-control" name="total_amount" placeholder="Paid Amount">
			</div>
			<div class="form-group col-md-3">
				<label>Cargo</label>	
				<input type="text" id="cargo" onkeypress="return IsNumeric(event);" id="cargo" class="form-control" name="cargo" placeholder="Cargo">
			</div>
			<div class="form-group col-md-3">
				<label>Amount/kg</label>	
				<input type="text" onkeypress="return IsNumeric(event);" class="form-control" readonly name="amount_per_kg" id="amount_per_kg" placeholder="Amount/kg">
			</div>
			<div class="form-group col-md-3">
				<label>Quality</label>
				<select class="form-control" name="quality">
					<option value="no quality selected">---Select Quality---</option>
					<?php for ($i=1; $i < 11; $i++) { ?>
						<option value="<?= $i ?>"><?= $i ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<button type="submit" name="save-stock" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>

<?php 
include('index-end.php');
?>