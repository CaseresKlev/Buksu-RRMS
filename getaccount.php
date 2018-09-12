<?php

if(isset($_GET['action'])){
	$action = $_GET['action'];
	if($action==="getname"){
		include_once 'connection.php';
		$dbocnfig = new dbconfig();
		$con = $dbocnfig->getCon();
		$query = 'SELECT `id`, `g_name` FROM `account` WHERE `g_name` like "e%" and type = "INSTRUCTOR" or type = "admin"';
		$result = $con->query($query);
		if($result->num_rows>0){
			while ($row = $result->fetch_assoc()) {
				echo $row['g_name']."-";
			}
		}else{
			echo "none";
		}
	}else{

		$zz = $_GET['search'];
		include_once 'connection.php';
		$dbocnfig = new dbconfig();
		$con = $dbocnfig->getCon();
		$query = 'SELECT `id`, `g_name` FROM `account` WHERE `g_name` like "'. $zz .'%" and type = "INSTRUCTOR" or type = "admin"';
		$result = $con->query($query);
		if($result->num_rows>0){
			while ($row = $result->fetch_assoc()) {
				echo $row['id'] + "-" + $row['g_name'];
			}
		}else{
			echo "none";
		}
	}
}




?>