<?php 
session_start();
require_once('../helper/functions.php');
require_once('../config/conn.php');

$query = 'SELECT * FROM `production` 
LEFT JOIN `costing` ON `production`.`costing_id` = `costing`.`id`
WHERE `production`.`costing_id` = "'.$id = $_GET['id'].'" ORDER BY `production`.`costing_id` DESC';
$sql = mysqli_query($conn, $query);

$data=[];
while ($row = mysqli_fetch_assoc($sql)) {
	$data[] = $row;
}

echo json_encode($data);

?>