<?php
session_start();

  $book_id = "";
  if(isset($_SESSION['uid']) && $_GET['book_id']){
   // print_r($_SESSION);
    $book_id = $_GET['book_id'];
  }else{
    header("Location: index.php");
  }

  $accname = $_SESSION['gname'];
  $acctype = $_SESSION['type'];
  $uid = $_SESSION['uid'];

  if($acctype==="STUDENT"){
    header("Location: index.php");
  }elseif ($acctype==="admin") {
    header("Location: admindashboard.php");
  }

?>



<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Administrator </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="css/temp.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/custom.min.css">


</head>

  <body class="nav-md" style="background-color: gray">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a class="site_title"><span> Research Record Management System </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="img/final.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span> <?php echo strtoupper($accname) ?> </span>
                <h2> <?php echo strtoupper($acctype) ?> </h2>
              </div>
            </div>
            <!--/menu profile quick info-->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <div class="nav side-menu">
					<ul><a  href="instructordashboard.php"> MY FINISHED RESEARCH </span></a></ul>
          <ul><a  class= "dashboard-active" href="instructor-on-process-paper.php"> MY On-Process RESEARCH </span></a></ul>
					<ul><a href="accesscode_instruct.php"> ACCESS CODE </a> </ul>
					 <?php
                            $d = Date('Y-m-d');
                            $yr = explode("-", $d);
                            echo '<ul><a href="book_reports.php?title=&dept=&status=&author=&from=0&to=' . $yr[0] . '" target="_blank"> REPORTS </a> </ul>';
                          ?>
					</br>
					<ul><a href="index.php"> Back to Home </a> </ul>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main" style= "min-height: 700px;">
			<div id= "instructor-frm-search" class= "frm-search" style= "font-size: 18px">


        <center><h2>Paper Status</h2><br></center>

        <?php

          include_once 'connection.php';
          $dbconfig = new dbconfig();
          $conn = $dbconfig->getCon();
          $query = "SELECT book.book_title, paper_stat.title, isdone, date FROM paper_trail INNER JOIN book on book.book_id = paper_trail.book_id INNER JOIN paper_stat on paper_stat.id = paper_trail.p_sat_id WHERE book.book_id = $book_id";
          $result = $conn ->query($query);
          if($result->num_rows>0){
            $row = $result->fetch_assoc();
          }
          
        ?>


				<b style="font-size:18pt;"> <?php echo $row['book_title']; ?></b><br>
        <b style="font-size:12pt;"> Author: 
          <?php
          $dbconfig= new dbconfig();
          $con= $dbconfig -> getCon();
          $query= "SELECT DISTINCT(a_id) as 'a_id' , a_lname as 'a_lname', SUBSTRING(a_fname, 1, 1) as 'a_fname' FROM author INNER JOIN junc_authorbook on author.a_id = junc_authorbook.aut_id WHERE junc_authorbook.book_id =$book_id";
          $result = $con -> query($query);
          $autorList ="";
          if($result->num_rows>0){
            while ($row1 = $result->fetch_assoc()) {
            //  $autorList .= $row['a_lname'] . ", " . $row['a_fname'] . "; ";
            ?>
            <a href="author.php?aut_id=<?php echo $row1['a_id']; ?>" style="font-weight: bold; font-size: 14pt">  <?php echo $row1['a_lname'] . ", " . $row1['a_fname'] . "; ";?>
              </a>
        <?php }
      } ?>
        </b>
        <br><br><br>
         
				<div id= "instructor-div-voidmain" class= "div-voidmain">
					<div class="container">
            <div class="row">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Step</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    
                  </tr>
                </thead>

                <tbody>
                  <?php

                    include_once 'connection.php';
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $query = "SELECT paper_trail.id, paper_trail.requirements, book.book_title, p_sat_id, paper_stat.title, isdone, date FROM paper_trail INNER JOIN book on book.book_id = paper_trail.book_id INNER JOIN paper_stat on paper_stat.id = paper_trail.p_sat_id WHERE book.book_id =$book_id";
                    $result = $conn ->query($query);
                    if($result->num_rows>0){
                      while($rowDis = $result->fetch_assoc()){

                        if($rowDis['requirements']==="1"){
                           echo '<tr>
                                <th scope="row">' . $rowDis['p_sat_id'] .'</th>
                                <th scope="row"><a href="view-full-status.php?trail=' . $rowDis['id'] . '&book_id=' . $book_id . '">' . $rowDis['title'] . '</a></th>
                                <td style="background-color: #66ff66">Done</td>
                                
                              </tr>';
                            }else{
                              echo '<tr>
                                <th scope="row">' . $rowDis['p_sat_id'] .'</th>
                                <th scope="row"><a href="view-full-status.php?trail=' . $rowDis['id'] . '&book_id=' . $book_id . '">' . $rowDis['title'] . '</a></th>
                                <td style="background-color: #ffb84d">Some requirements are missing.</td>
                                
                              </tr>';
                            }
                       
                    }
                  }
                    
                  ?>

                  
                  
                </tbody>
                <th></th>
              </table>
            </div>
            
          </div>
					
				

			 </div>

          <!-- top tiles -->
          <div class="row tile_count"></div>
          <!-- /top tiles -->
            </div>
        </div>
        <!-- /page content -->

      </div>




      <!--- -->
  <!--<div class="modal fade" id="ModaladdNew" role="dialog">
    <div class="modal-dialog">
    
     
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Add New Research</h4>
        </div>
        <div class="modal-body">
          <form action="/action_page.php">
            <div class="form-group">
                <label for="fname">Title:</label>
                <input type="text" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="fname">Username:</label>
                <input type="text" class="form-control" id="reg_uname">
            </div>
              <div class="form-group">
                <label for="mname">Password:</label>
                <input type="Password" class="form-control" id="reg_upass">
            </div>
            <div class="form-group">
                <label for="acc_type">Account Type:</label><br>
                <select class="btn btn-primary" id="acc_type">
                  <option class="btn btn-default">User</option>
                  <option class="btn btn-default">Admin</option>
            </select>
              </div>
              <div class="form-group">
                <center>
                  <button type="button" class="btn btn-success" id="btn_login_register">Register</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </center>
                
              </div>
              <!--<div class="form-group">
                <fieldset>
                  <b style="color: red">For Demo Purposes</b><br>
                  Admin login:<br>Username = admin<br>Password = 1234<br><br>User login:<br>Username = loyd<br>Password = 1111
                </fieldset>
                
              </div>-->
              
              
          <!--</form>
        </div>
        <div class="modal-footer">
          <a href="#"><p class="text-center" style="font-weight: bold;" id="reg">Register</p></a>
        </div>
      </div>
      
    </div>
  </div>-->



    </div>

    <!-- jQuery -->

    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <!--<script src="js/bootstrap.min.js"></script>-->
    <script type="text/javascript" src="js/on-process.js"></script>
    <!-- Custom Theme Scripts -->
    <!--<script src="js/custom.min.js"></script>-->

  </body>
</html>
