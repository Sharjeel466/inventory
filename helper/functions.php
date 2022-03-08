<?php 
require_once('../config/conn.php');

function dd($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function login($table,$email,$password){
	global $conn;

	$password = md5($password);

	$sql = "SELECT * FROM `".$table."` WHERE `email` = '".$email."' AND `password` = '".$password."'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {
			if($row['email'] === $email && $row['password'] === $password){
				
				$_SESSION['user_name'] = $row['name'];
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['role'] = $row['role'];
				
			}

		}
	}
}

function validate($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function create($table, $data){
	global $conn;
	$col=(array_keys($data));
	
	$da=implode(",", $col);
	
	$ad=implode('","', $data);
	
	$insert='INSERT INTO '.$table.' ('.$da.') VALUES ("'.$ad.'")';
	
	$result=mysqli_query($conn,$insert);
	$data=[];

	return $data;
}

function select($t,$wh=[]){
	global $conn;

	$q1 = where($wh);
	$select="SELECT * FROM $t $q1";
	
	$result=mysqli_query($conn,$select);
	$data=[];
	while ($row=mysqli_fetch_assoc($result)) {
		$data[]=$row;
	}
	return ($data);
}

function where($wh){
	$q=['WHERE 1 '];
	if(!empty($wh)){
		foreach ($wh as $col => $value) {
			$q[]=$col .'='.$value;
		}
	}
	$q1=implode(' AND ', $q);
	return $q1;
}

function delete($t, $id){
	global $conn;

	$del = "DELETE FROM `".$t."` WHERE `id` = '".$id."'";
	$result = mysqli_query($conn, $del);
	
}

function update($table,$data,$where=[]){
	global $conn;

	$a=[];
	foreach ($data as $key => $val) {
		$a[]=$key.'='.'"'.$val.'"';
	}

	$a1=implode(",", $a);

	$q=['WHERE 1 '];
	if(!empty($where)){
		foreach ($where as $col => $value) {
			$q[]=$col .'='.$value;
		}
	}

	$q1=implode(' AND ', $q);
	$update="UPDATE $table SET ".$a1.' '.$q1;

	$result=mysqli_query($conn,$update);
}

function leftJoin($main_table, $left_table, $main_table_index, $left_table_index, $order_by_table, $order_by_column)
{
	global $conn;

	$select = 'SELECT * FROM `'.$main_table.'` LEFT JOIN `'.$left_table.'` ON `'.$main_table.'`.`'.$main_table_index.'` = `'.$left_table.'`.`'.$left_table_index.'` ORDER BY `'.$order_by_table.'`.`'.$order_by_column.'` DESC';
	$result = mysqli_query($conn, $select);

	$data=[];
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}
	return ($data);
}

?>