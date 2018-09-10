<?php
  session_start();
// remove all session variables


  $uname = $_POST['username'];
  $upass = $_POST['password'];
 // $old = $_POST['opsw'];



  include_once 'connection.php';
  $dbconfig = new dbconfig();
  $con = $dbconfig->getCon();
  $query = "SELECT `id`, `g_name`, `activate`, `type`, `adviser` FROM `account` WHERE u_name='$uname' AND password='$upass'";
  $result = $con->query($query);

  if ($result->num_rows>0) {
    while ($row=$result->fetch_assoc()) {
      $_SESSION['uid'] = $row['id'];
      $_SESSION['gname'] = $row['g_name'];
      $_SESSION['stat']= $row['activate'];
      $_SESSION['type'] = $row['type'];
      $_SESSION['adviser'] = $row['adviser'];
    }

    echo "Success:Login";
    //header("Location: index.php");
}else {
    echo "Error:Your username and password do not match. Please try again.";
  }





 ?>
