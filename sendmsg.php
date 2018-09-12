<?php
session_start();
//echo $_POST['receiver'];


date_default_timezone_set("Asia/Manila");
if(isset($_SESSION['uid']) && isset($_POST['receiver'])){
	include_once 'connection.php';
	$receiver = $_POST['receiver'];
	$sender = $_SESSION['uid'];
	$msg = $_POST['msg'];
	$dbconfig = new dbconfig();
	$con = $dbconfig->getCon();

	$time = date("Y-m-d H:i:s");

	$query = "INSERT INTO `messages` (`id`, `receiver`, `sender`, `msg`, `date`, `seen`) VALUES (NULL, '$receiver', '$sender', '$msg', '$time', '0')";
	//echo "$query";
	$result = $con->query($query);
	if($result){
		echo "success";
	}
}else{
	echo "hbfsefj";
}



?>