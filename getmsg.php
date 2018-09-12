<?php

$sender_id = "1";
$receiver_id = "2";

session_start();

if(isset($_POST['receiver_id'])){
	$sender_id = $_SESSION['uid'];
	$receiver_id = $_POST['receiver_id'];
	//echo "$receiver_id";

	include_once 'connection.php';

$dbconfig = new dbconfig();
$con = $dbconfig->getCon();
$query = "SELECT account.id, account.g_name as 'sender',  messages.msg, messages.date, messages.seen FROM `messages` INNER JOIN account on account.id = messages.sender  WHERE `sender` = $sender_id and `receiver` = $receiver_id or `sender` = $receiver_id and `receiver` = $sender_id ORDER BY messages.date ASC";
//echo "$query";
//echo "$query";
$result = $con->query($query);
if($result->num_rows>0){
	while ($row = $result->fetch_assoc()){
		$long = strtotime($row['date']);
		$date = date('F d, Y', $long);
		$time = date('F d, Y h:i:s a', $long);
		//echo "" .$row['id'] . " " . $row['sender'] .  " " .  " " . " " . $row['msg'] . " " . $time . " " .$row['seen'] . '';
		
		if($sender_id===$row['id']){
			echo '<div class="removable">';
			echo '<div class="row" id="sender" style="width: 80%; float: right; ">
                    <div class="col-md-12">
                        <h5 style="font-weight: bold; float: right;">'. $row['sender'] .'</h5>
                    </div>
                    <div class="col-md-12" style="background-color:  #538cc6; height: auto; border-radius: 25px; padding-left: 25px;">
                        <h5>
                            '. $row['msg'] .'
                        </h5>
                        <div class="row" style="padding-left: 15px;">
                            '. $time .'
                        </div>
                    </div>
                </div>
                
                <br>';
                
		}else{
			
                echo '<div class="row" id="sender" style="width: 80%;">
                    <div class="col-md-12">
                        <h5 style="font-weight: bold;">'. $row['sender'] .'</h5>
                    </div>
                    <div class="col-md-12" style="background-color: #00cccc; height: auto; border-radius: 25px; padding-left: 25px;">
                        <h5>
                            '. $row['msg'] .'
                        </h5>
                        <div class="row" style="padding-left: 15px;">
                            '. $time .'
                        </div>
                    </div>
                </div>
                <br>';
		}
		
	}
}
}else{
	echo '<div class="row" id="sender" style="width: auto;">
                    <div class="col-md-12">
                        <h5 style="font-weight: bold;">System:</h5>
                    </div>
                    <div class="col-md-12" style="background-color: #ff751a; height: auto; border-radius: 25px;">
                        <h5>
                            Pls select contact
                        </h5>
                        <div class="row" style="padding-left: 15px;">
                            
                        </div>
                    </div>
                </div>
                <br>';
                echo '</div">';
}
//$owner = "1";




?>