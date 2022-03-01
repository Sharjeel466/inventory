<?php 
require_once('conn.php');
require_once('functions.php');

ajax_select('inventory');

function ajax_select($t){
	global $conn;

	$select="SELECT * FROM `".$t."`";
	$result=mysqli_query($conn,$select);	

	$data = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}
	echo json_encode($data);
}
?>