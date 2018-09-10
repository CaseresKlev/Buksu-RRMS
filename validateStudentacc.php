<?php
  session_start();
  include_once 'connection.php';

  $gname= $_POST['groupname'];
  $uname= $_POST['uname'];
  $pass= $_POST['password'];
  $access = $_POST['access'];
  //echo $access;

  //echo "FROM " . $gname . " " . $uname . " " . $pass;

  //echo "$gname $uname $pass $access";

  $dbconfig1 = new dbconfig();
  $conn = $dbconfig1->getCon();
  $query = "SELECT * FROM `acesskey` WHERE acesskey COLLATE latin1_general_cs LIKE '$access'";
  //echo $query;
  $result = $conn->query($query);


  //check if accesskey exist
  if($result->num_rows>0){



    //echo "Valid";
    $row = $result->fetch_assoc();
    $access_id = $row['id'];
    $type = $row['type'];
    $ins_id = $row['ins_id'];

    //check if accesskey if not used
    if($row['used']==0){

        $dbconfig = new dbconfig();
        $conn = $dbconfig->getCon();
        $query ="SELECT * FROM `account` WHERE account.u_name COLLATE latin1_general_cs LIKE '$uname' and account.password COLLATE latin1_general_cs LIKE '$pass'";
        $result = $conn->query($query);

        //check if username and password exist
        if($result->num_rows==0){
          $dbconfig = new dbconfig();
          $conn = $dbconfig->getCon();
          //$id = $_GET['book_id'];
          //$query = "INSERT INTO `account` (`id`, `g_name`, `u_name`, `password`) VALUES (NULL, '$gname', '$uname', '$pass');";
          $query = "INSERT INTO `account` (`id`, `g_name`, `u_name`, `password`, `activate`, `type`, `adviser`) VALUES (NULL, '$gname', '$uname', '$pass', '1', '$type', '$ins_id');";
         //echo ($query);
          $result = $conn->query($query);
          //echo ($result);
          if ($result) {
            $dbconfig = new dbconfig();
            $conn = $dbconfig->getCon();
            //$id = $_GET['book_id'];
            //$query = "INSERT INTO `account` (`id`, `g_name`, `u_name`, `password`) VALUES (NULL, '$gname', '$uname', '$pass');";
            $query = "UPDATE `acesskey` SET `used` = '1' WHERE `acesskey`.`id` = $access_id";
            $result = $conn->query($query);

            echo "Success: Account Successfully Created!";

        

        }else {
          echo "Something went wrong creating your account!";
        }
        }else{
          echo "Account username and password already exist";
        }

    }else{
      echo "Access key already been Used!";
    }


  }else{
    echo "Access key not valid!";
  }





//header('Location: login.php');




?>
