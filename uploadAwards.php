<?php

date_default_timezone_set("Asia/Manila");

//echo "GGGGG";
    include_once 'connection.php';
if(isset($_GET['action'])){


        $action = $_GET['action'];

        //echo "$action";
        
		//$trail_id = $_POST['trail_id'];
        //echo "string";
		//echo "$book_id $trail_id $orgname $orgadd $date $trail_id";

        //echo "$distype $discon $conven $ disdate $ book_id";
		//print_r($files);
		
        //echo "$awards $parties $ awardsloc $awardsdesc $awardsdate $book_id";
        if(isset($_FILES['myFile'])){

            $files = $_FILES['myFile'];
            $count = count($_FILES['myFile']['tmp_name']);
            //echo "$count";
            
            for($i=0;$i<$count;$i++) {
                $file_name = $_FILES['myFile']['name'][$i];
                //echo "$file_name";
                $fileTemp = $_FILES['myFile']['tmp_name'][$i];
                $file_type = $_FILES['myFile']['type'][$i];
                $file_error = $_FILES['myFile']['error'][$i];
                $file_size = $_FILES['myFile']['size'][$i];


                $fileext = explode(".",$file_name);
                $extension = strtolower(end($fileext));
                $finalname = "documents/" . uniqid('',true) . "." . $extension;
                if(move_uploaded_file($fileTemp, $finalname)){

                    include_once 'connection.php';
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $query = "INSERT INTO `documents` (`id`, `book_id`, `documents`, `orig_name`) VALUES (NULL, '$book_id', '$finalname', '$file_name')";
                    //echo $query;
                    $result = $conn->query($query);


//                  echo "Ipload";

                      //echo "Upload Done";
                }

                //echo "File: " . $i . ": " . $finalname ;
            }
        }

        if($action==="save"){
            $error = 0;
            $error2 = 0;
            

            $awards = $_POST['awards'];
            $parties = $_POST['parties'];
            $awardsloc = $_POST['awards-loc'];
            $awardsdesc = $_POST['awards-desc'];
            $awardsdate = $_POST['awards-date'];
            $book_id = $_POST['awards_book_id'];
        	//echo "ggggg";
            include_once 'connection.php';
            $datenow = date('Y-m-d H:i:s');
            $dbconfig = new dbconfig();
            $conn = $dbconfig->getCon();
            $query = "INSERT INTO `awards` (`id`, `book_id`, `awards`, `parties`, `location`, `description`, `date`) VALUES (NULL, '$book_id', '$awards', '$parties', '$awardsloc', '$awardsdesc', '$awardsdate')";
            //echo $query;
            $result55 = $conn->query($query);
            if($result55){
                echo "Success";
            }else{
                echo "Error: " .mysql_error($conn);
            }
            /*if($result55){
                $datenow = date('Y-m-d H:i:s');
                $dbconfig = new dbconfig();
                $conn = $dbconfig->getCon();
                $query = "SELECT * FROM `bookhistory` WHERE `book_id` = $book_id and `date` = '$datenow'";
                $result56 = $conn->query($query);
                if($result56->num_rows>0){
                    $row56 = $result56->fetch_assoc();
                    $history = $row56['id'];
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $query = "INSERT INTO `utilize` (`id`, `book_id`, `orgname`, `orgaddress`, `date`, `history`) VALUES (NULL, '$book_id', '$orgname', '$orgadd', '$date', '$history')";
                    $result57 = $conn->query($query);
                    //echo $query;
                    if($result57){
                        echo "Success!";
                    }else{
                        echo "Error: " . mysql_error();
                    }
                }
            }*/
        
            
        
    }else if($action==="update"){
    	$util_id = $_GET['util_id'];
    	
            include_once 'connection.php';
            $datenow = date('Y-m-d H:i:s');
            $dbconfig = new dbconfig();
            $conn = $dbconfig->getCon();
            //$dis_id = $_GET['dis_id'];
            //echo "$dis_id";
            $query = "UPDATE `utilize` SET `orgname` = '$orgname', `orgaddress` = '$orgadd', `date` = '$date' WHERE `utilize`.`id` = $util_id";
            //echo $query;
            $result55 = $conn->query($query);
            if($result55){
                echo "Update SuccessfulS";
            }else{
                echo "Error: " .mysql_error();
            }
        
            
        if($error ===0){
        }else{
            echo "There is Error uploading your Files";
        }
        //echo "$util_id";
    }
            
		

        

		
}


if(isset($_POST['action']) && $_GET['awards_id']){

        $awards_id = $_GET['awards_id'];
        $action = $_GET['action'];

        if($action==="delete"){
            $dbconfig = new dbconfig();
            $conn = $dbconfig->getCon();
            $query = "DELETE FROM `awards` WHERE `awards`.`id` = $awards_id";
            //echo "$query";
            $result22 = $conn->query($query);
            if($result22){
                echo "Deleted";
            }else{
                echo "Error: " . mysql_error($conn);
            }
        }
        

/*
	
	//echo "$util_id";
    //$util_id = $_POST['dis_id'];
   //echo "$dis_id";
   include_once 'connection.php';
   $dbconfig = new dbconfig();
    $conn = $dbconfig->getCon();
    $query = "SELECT `history` FROM `utilize` WHERE `id` = $util_id";

    $result = $conn->query($query);
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $history = $row['history'];


        
        
    } */
}


?>