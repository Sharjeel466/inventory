<?php 
require_once('../navbar/list.php');
// require_once('conn.php');
// require_once('functions.php');
?>

<div class="card-header">
	<h2>Production</h2>
</div>
<div class="card-body">
	<form id="production-form" action="../production/save-production" method="post">
		<div class="row">
			<div class="form-group col-md-4">
				<label><strong>Write Mixture Name</strong></label>
				<input type="text" class="form-control" id="mixture-name" required name="shake_name" placeholder="Mixture Name">

				<label class="mt-3"><strong>Select number of raw material</strong></label>
				<?php
				$select = 'SELECT * FROM `inventory` WHERE `shortage` != "" AND `shortage` != "total_amount_paid" AND `amount_per_kg` != "" AND `shortage` != "" AND `cargo` != "" ';
				$result=mysqli_query($conn,$select);

				$data=[];
				while ($row=mysqli_fetch_assoc($result)) {
					$data[]=$row;
				}


				$costing_data = [];
				foreach ($data as $key => $row) {
					$costing_data[] = $row;
				}

				$costing_count = count($data);
				
				?>
				<select id="mat-number" class="form-control">
					<?php 
					$count = 1;
					foreach($costing_data as $key => $val){
						?><option value="<?php echo $count ?>"><?php echo $count ?></option><?php
						$count++;
					}
					
					?>
				</select>
			</div>

			<div class="form-group col-md-8" id="products-show-wrapper">

			</div>
			
			<div class="col-md-4 mb-2 d-none">
				<!-- <input type="hidden" class="form-control" id="total"> -->
				<input type="hidden" class="form-control" id="total-qty">
			</div>

			<div class="col-md-4 mb-2">
				<strong>Required</strong>
				<input type="text" onkeypress="return IsNumeric(event);" name="required_qty" placeholder="Required" id="required-qty" class="form-control" required autocomplete="off">
			</div>
			<?php if ($_SESSION['role'] == 'admin'){ ?>
				<div class="col-md-4 mb-2">
					<strong>Total/kg</strong>
					<input type="text" class="form-control" placeholder="Total/kg" readonly name="total_per_kg" id="total">
				</div>

				<div class="col-md-4 mb-2">
					<strong>Total</strong>
					<input type="text" class="form-control" placeholder="Total" readonly name="total" id="all_total">
				</div>
			<?php } else{?>
				<div class="d-none">
					<div class="col-md-4 mb-2">
						<strong>Total/kg</strong>
						<input type="text" class="form-control" placeholder="Total/kg" readonly name="total_per_kg" id="total">
					</div>

					<div class="col-md-4 mb-2">
						<strong>Total</strong>
						<input type="text" class="form-control" placeholder="Total" readonly name="total" id="all_total">
					</div>
				</div>
			<?php } ?>

		</div>
		<hr>
		<div class="form-group">
			<button type="button" data-toggle="modal" data-target="#production_confirm" id="production" class="btn btn-secondary">Check</button>
			<button type="submit" name="save-stock" id="production_submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<?php 
require_once('../include/index-end.php');
?>
<!-- Modal -->
<div class="modal fade" id="production_confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
						<strong>Product</strong>
						<div id="model_arr"></div>
					</div>
					<div class="col-md-4">
						<strong>Total Stock</strong>
						<div id="model_stock"></div>
					</div>

					<?php if ($_SESSION['role'] != 'employee'){ ?>
						<div class="col-md-4">
							<strong>Total Price</strong>
							<div id="model_price"></div>
						</div>
					<?php }?>
				</div> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>