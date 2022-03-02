<?php 
require_once('conn.php');
require_once('functions.php');

ajax_select('inventory');

function ajax_select($t){
	global $conn;

	$mat_number = $_GET['mat_number'];
	$select="SELECT * FROM inventory";
	$result=mysqli_query($conn,$select);	

	$costing_data = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$costing_data[] = $row;
	}
	$count = 1; 
	for ($x = 1; $x <= $mat_number; $x++) {

		?>
		<div class="row">
			<div class="form-group col-md-6">
				<label>Product-<?= $x ?></label>
				<select class="form-control inventory" data-id='<?= $x ?>'>
					<option value="">Select Product</option>
					<?php 

					foreach($costing_data as $key => $val){
						?><option value="<?= $val['id'] ?>" qty="<?= $val['total_qty'] ?>"><?= $val['product_name'] ?>(<?= $val['category'] ?>)</option><?php
						$count++;
					}?>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label>Quantity</label>
				<input type="text" onkeypress="return IsNumeric(event);" min="1" max="5" maxlength="" class="form-control product_qty-<?= $x ?>" placeholder="Quantity">
			</div>
		</div>

		<?php
	}
}
?>