<?php 
include('list.php');
require_once('conn.php');
require_once('functions.php');
?>

<div class="card-header">
	<h2>Costing</h2>
</div>
<div class="card-body">
	<form action="" method="post">
		<div class="row">
			<div class="form-group col-md-4">
				<label><strong>Select number of raw material</strong></label>
				<?php
					global $conn;

					$select="SELECT * FROM inventory";
					$result=mysqli_query($conn,$select);	

					$costing_data = [];
					while ($row = mysqli_fetch_assoc($result)) {
						$costing_data[] = $row;
					}
					$costing_count = mysqli_num_rows($result);
					
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
		</div>
		<div class="form-group">
			<button type="submit" name="save-stock" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>

<?php 
include('index-end.php');
?>