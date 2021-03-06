<?php 
require_once('../navbar/list.php');
if (isset($_POST['save-stock'])) {
// dd($_POST);die();
	$name = $_POST['name'];
	$qty = str_replace(',', '', $_POST['qty']);
	
	$total_qty = $_POST['total_qty'];
	$shortage = $_POST['shortage'];
	
	$total_amount = $_POST['total_amount'];
	
	$amount_per_kg = $_POST['amount_per_kg'];
	$quality = $_POST['quality'];
	$category = $_POST['category'];
	
	$cargo = $_POST['cargo'];
	
	$amount_in_words = $_POST['amount_in_words'];
	
	if ($_POST['total_qty'] == 'NaN') {
		$total_qty = '';
	}
	if ($_POST['amount_per_kg'] == 'NaN') {
		$amount_per_kg = '';
	}

	$data = [
		'product_name' => $name,
		'product_qty' => $qty,
		'total_qty' => $total_qty,
		'shortage' => $shortage,
		'total_amount_paid' => $total_amount,
		'amount_per_kg' => $amount_per_kg,
		'quality' => $quality,
		'category' => $category,
		'cargo' => $cargo,
		'amount_in_words' => $amount_in_words
	];	

	create('inventory', $data);
	
	date_default_timezone_set("Asia/Calcutta");

	$logs = [
		'name' => $_SESSION['user_id'],
		'action' => 'Inventory Added',
		'description' => 'Added new Product',
		'time' => date("F d, Y h:i:s A"),
	];

	create('logs', $logs);
	?>
	<script>
		window.location.href = '../index/';
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
				<input type="text" id="product-name" required class="form-control" name="name" placeholder="Product Name">
			</div>
			<div class="form-group col-md-3">
				<label>Category</label>
				<input type="text" id="category-check" required class="form-control" name="category" placeholder="Category">
			</div>
			<div class="form-group col-md-3">
				<label>Total Quantity (kg)</label>
				<input type="text" onkeypress="return IsNumeric(event);" required class="add_product_qty form-control" name="qty" placeholder="Product Quantity" autocomplete="off">
			</div>
			<div class="form-group col-md-3">
				<label>Shortage (%)</label>
				<input type="text" class="form-control" maxlength="3" id="shortage" name="shortage" placeholder="Product Shortage" autocomplete="off">
			</div>
			<div class="form-group col-md-3">
				<label>Quantity after Shortage</label>
				<input type="text" class="form-control" id="total_qty" readonly name="total_qty" placeholder="kg">
			</div>
			<div class="form-group col-md-3">
				<label>Total Amount Paid</label>	
				<input type="text" id="amount_paid" maxlength="11" onkeypress="return IsNumeric(event);" autocomplete="off" class="form-control number" name="total_amount" placeholder="Paid Amount">
			</div>
			
			<div class="form-group col-md-3">
				<label>Cargo</label>	
				<input type="text" id="cargo" maxlength="11" onkeypress="return IsNumeric(event);" id="cargo" class="form-control" name="cargo" placeholder="Cargo" autocomplete="off">
			</div>
			<div class="form-group col-md-3">
				<label>Amount/kg</label>	
				<input type="text" onkeypress="return IsNumeric(event);" class="form-control" readonly name="amount_per_kg" id="amount_per_kg" placeholder="Amount/kg">
			</div>
			<div class="form-group col-md-3">
				<label>Quality</label>
				<select class="form-control" name="quality" required>
					<option value="">---Select Quality---</option>
					<?php for ($i=1; $i < 11; $i++) { ?>
						<option value="<?= $i ?>"><?= $i ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label>Total Amount in Words</label>	
				<input type="text" readonly class="amount-in-words form-control" name="amount_in_words" placeholder="Amount in Words">
			</div>
		</div>
		<div class="form-group">
			<button type="submit" name="save-stock" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>

<?php 
include('../include/index-end.php');
?>