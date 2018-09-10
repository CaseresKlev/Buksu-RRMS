<?php

include_once 'connection.php';

$name = $_POST['name'];


    $dbconfig = new dbconfig();
    $conn = $dbconfig->getCon();
    $query= "SELECT * FROM author where a_fname='$name[0]' and a_mname='$name[1]' and a_lname='$name[2]' and a_suffix='$name[3]'";
    $result= $conn->query($query);
    $data = null;

    if($result->num_rows>0){
    	while($row = $result->fetch_assoc()){
    		$data = $row['a_fname'] . "?" .  $row['a_mname'] . "?" .  $row['a_lname'] . "?" .  $row['a_suffix'] . "?" .  $row['a_add'] . "?" . $row['a_contact'] . "?" . $row['a_email'];
    	}
    }

    echo $data;


?>