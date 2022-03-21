<?php require_once('../navbar/list.php');
?>

<div class="card-header">
	<h3>Production</h3>
</div>
<div class="card-body">
	<a href="../production/add-production" class="btn btn-primary">Add Production</a>
</div>
<div class="card-body">
	
	<div class="details-container">
		<ul class="responsive-table">
			<li class="table-header">
				<div class="col col-1" data-label="#">#</div>
				<div class="col">Shake Name</div>
				<div class="col">Required Quantity</div>
				<div class="col">Total/kg</div>
				<div class="col">Total</div>
				<div class="col">Action</div>
			</li>
			<?php $n =1;

			$select="SELECT * FROM `costing` ORDER BY `ID` DESC";

			$result=mysqli_query($conn,$select);
			$data=[];
			while ($row=mysqli_fetch_assoc($result)) {
				$data[]=$row;
			}
			
			foreach ($data as $key => $f) {?>
				<li class="table-row">
					<div class="col col-1" data-label="#"><?= $n++ ?></div>
					<div class="col" data-label="Name-"><?= $f['shake_name'] ?></div>
					<div class="col" data-label="Category-"><?= $f['required_qty'] ?></div>
					<div class="col" data-label="Category-"><?= $f['total_per_kg'] ?></div>
					<div class="col" data-label="Total Qty-"><?= $f['total'] ?></div>
					<div class="col btn btn-success" data-label="Total Qty-" onclick="costing(<?= $f['id'] ?>, '<?= $f['shake_name'] ?>')">Details</div>
				</li> 
				<?php 
			}
			?>

		</ul>
	</div>
</div>

<?php 
require_once('../include/index-end.php');
?>