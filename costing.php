<?php 
include('list.php');

?>

<div class="card-header">
	<h2>Costing</h2>
</div>
<div class="card-body">
	<form action="" method="post">
		<div class="row">
			<div class="form-group col-md-4">
				<label><strong>Select number of raw material</strong></label>
				<select id="number" class="form-control">
					
				</select>
			</div>
			<div class="form-group col-md-8" id="show">

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