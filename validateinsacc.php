<?php
  session_start();
  include_once 'connection.php';

  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $suf = $_POST['suf'];
  $email = $_POST['email'];
  $uname= $_POST['uname'];
  $upass= $_POST['upass'];
  $access = $_POST['access'];

 // echo "$fname $mname $lname $suf $email $uname $pass $access";



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

    //check if accesskey if not used
    if($row['used']==0){



        
        $dbconfig = new dbconfig();
        $conn = $dbconfig->getCon();
        $query ="SELECT COUNT(adviser.adv_id) as 'adv_id' FROM `adviser` WHERE adviser.adv_fname = '$fname' and adviser.adv_midName = '$mname' and adviser.adv_Lname = '$lname' AND adv_suff ='$suf'";
        $result = $conn->query($query);
        $count = $result->fetch_assoc();
        //print_r(expression);
        if($count['adv_id']==0){
          // the adviser already have account (check by name)

          $dbconfig = new dbconfig();
          $conn = $dbconfig->getCon();
          $query ="SELECT * FROM `account` WHERE account.u_name COLLATE latin1_general_cs LIKE '$uname' and account.password COLLATE latin1_general_cs LIKE '$upass'";
          $result2 = $conn->query($query);


          if($result2->num_rows==0){
            //username and password is valid
            
            $dbconfig = new dbconfig();
            $conn = $dbconfig->getCon();

            //create accout
            $query = "INSERT INTO `account` (`id`, `g_name`, `u_name`, `password`, `activate`, `type`) VALUES (NULL, '$uname', '$uname', '$upass', '1', 'INSTRUCTOR')";
            $result3 = $conn->query($query);

            if($result3){
              //create account successful
              $dbconfig = new dbconfig();
              $conn = $dbconfig->getCon();
              $query ="SELECT * FROM `account` WHERE account.u_name COLLATE latin1_general_cs LIKE '$uname' and account.password COLLATE latin1_general_cs LIKE '$upass'";
              $result4 = $conn->query($query);
              $row4 = $result4->fetch_assoc();
              $accid = $row4['id'];

              //get acc id and insert adviser
              $dbconfig = new dbconfig();
              $conn = $dbconfig->getCon();
              $query ="INSERT INTO `adviser` (`adv_id`, `adv_fname`, `adv_midName`, `adv_Lname`, `adv_suff`, `adv_email`, `accid`) VALUES (NULL, '$fname', '$mname', '$lname', '$suf', '$email', '$accid')";
              $result5 = $conn->query($query);

              //update the accesskey to used
              $dbconfig = new dbconfig();
              $conn = $dbconfig->getCon();
              $query ="UPDATE `acesskey` SET `used` = '1' WHERE `acesskey`.`id` = $access_id";
              $result6 = $conn->query($query);

              //$result5 = $conn->query($query);
               if($result5){
                  echo "Success: Account Created Successfully";
              }else{
                echo "error:Theres error while creating your account";
              }

            }else{
              echo "error:There is error in creating your account!";
            }


           

          }else{
            //username and password is used
            echo "erro:Username and password is not valid.";

          }

        }else{
          //the adviser dont have account

          echo "error:This user already created an account";
        }


    }else{
      echo "Access key already been Used!";
    }


  }else{
    echo "Access key not valid!";
  }





//header('Location: login.php');




?>
