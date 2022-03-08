<?php 
session_start();
require_once('../config/conn.php');
require_once('../helper/functions.php');

ajax_select('inventory');

function ajax_select($t){

	$mat_number = $_GET['mat_number'];
	$result = select('inventory');

	$costing_data = [];
	foreach ($result as $key => $row) {
		$costing_data[] = $row;
	}

	$count = 1; 
	for ($x = 1; $x <= $mat_number; $x++) {

		?>
		<div class="row">
			<div class="form-group col-md-6">
				<label>Product-<?= $x ?></label>
				<select class="form-control inventory" data-id='<?= $x ?>' name="product_id[]">
					<option value="">Select Product</option>
					<?php 

					foreach($costing_data as $key => $val){
						?><option value="<?= $val['id'] ?>" price="<?= $val['amount_per_kg'] ?>" qty="<?= $val['total_qty'] ?>"><?= $val['product_name'] ?>(<?= $val['category'] ?>)</option><?php
						$count++;
					}?>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label>Stock: <strong class="prod_id-<?= $x ?> product_id"></strong></label>

				<input type="text" onkeypress="return IsNumeric(event);" name="user_qty[]" maxlength="" product_id="" required class="form-control t_qty product_qty-<?= $x ?>" placeholder="Required Qty" autocomplete="off">
				
				<input type="hidden" id="hidden-product_qty-<?= $x ?>" class="hidden_data">
				<input type="hidden" name="total_product_qty[]" class="product-required-<?= $x ?>">
			</div>
		</div>

		<?php
	}
}
?>