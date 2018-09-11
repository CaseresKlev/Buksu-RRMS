<?php

$sender_id = 1;
$receiver_id = 2;

include_once 'connection.php';

$dbconfig = new dbconfig();
$con = $dbconfig->getCon();
$query = "SELECT account.id, account.g_name as 'sender',  messages.msg, messages.date, messages.seen FROM `messages` INNER JOIN account on account.id = messages.sender  WHERE `sender` = $sender_id and `receiver` = $receiver_id or `sender` = $receiver_id and `receiver` = $sender_id ORDER BY messages.date ASC LIMIT 20";
//echo "$query";
$result = $con->query($query);
if($result->num_rows>0){
	while ($row = $result->fetch_assoc()){
		echo "$row['id'] $row['msg'] $row['date'] $row['']";
	}
}


?>