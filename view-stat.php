<?php

  session_start();
  $book_id ="";
  $book_title = "";

  if(isset($_SESSION['uid']) && isset($_GET['book_id'])){
    $book_id = $_GET['book_id'];
  }else{
    header("Location: admindashboard.php");
  }

  $accname = $_SESSION['gname'];
  $acctype = $_SESSION['type'];
  if($acctype==="admin"){
    //echo "Admin ANG NAKALOGIN";
  }else if($acctype==="INSTRUCTOR"){
    //echo "Instructor ang naka login";

    header("Location: instructordashboard.php");
  }else if($acctype==="student"){
    header("Location: index.php");
  }

  include_once 'connection.php';
  $dbconfig = new dbconfig();
  $conn = $dbconfig->getCon();
  $query = "SELECT book_id, book_title, cited, enabled FROM `book` WHERE book_id=" .$book_id;
  $result = $conn->query($query);
  if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $book_title = $row['book_title'];
  }





  ?>




<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Administrator </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/temp.css">
    <!-- Custom Theme Style -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/custom.min.css">

</head>

<body class="nav-md" >
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
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <div class="nav side-menu">
					<ul><a class= "dashboard-active" href="admindashboard.php"> RESEARCH </span></a></ul>
					<ul><a href="updateAcc.php"> UPDATE ACCOUNT </a></ul>
					<ul><a href="accesscode.php"> ACCESS CODE </a> </ul>
                        <?php
                            $d = Date('Y-m-d');
                            $yr = explode("-", $d);


                            echo '<ul><a href="book_reports.php?title=&dept=&status=&author=&from=0&to=' . $yr[0] . '" target="_blank"> REPORTS </a> </ul>';
                          ?>

          <ul><a href="dept.php">DEPARTMENT </a> </ul> </br>
					<ul><a href="index.php"> Back to Home </a> </ul>

                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main" style= "min-height: 712px;">
			<div id= "admin-frm-search" class= "frm-search" style= "font-size: 18px">
        <div class="container">
          <div class="row">
            <div class="col-md-12" style="font-size: 22pt"><b><i> <?php echo $book_title ?></i> </b></div>
            <div class="col-md-12" ><b style="color: gray"> gggg </b></div>
          </div>
          <br>
          <br>
          <div class="row">
            <div class="col-md-12" ><b style="font-size: 22pt">Status </b></div>
          </div>
				<hr>

				<div id= "admin-div-voidmain" class= "container">
          

          <table class="table">
            <thead>
              <tr>
                <td scope="col" style="font-weight: bold; font-size: 15pt">Step</td>
                <td scope="col" style="font-weight: bold; font-size: 15pt">Status</td>
                <td scope="col" style="font-weight: bold; font-size: 15pt">Action</td>
              </tr>
              
            </thead>
            <tbody>

              <?php 

                  $max = 2;
                  include_once 'connection.php';
                  $dbconfig = new dbconfig();
                  $conn = $dbconfig->getCon();
                  $query = "SELECT Max(paper_stat.id) as 'lates' FROM paper_stat INNER JOIN paper_trail on  paper_trail.p_sat_id = paper_stat.id WHERE paper_trail.book_id = $book_id";
                  $result = $conn->query($query);
                  if($result->num_rows>0){
                    $row = $result->fetch_assoc();
                    $max = $row['lates'];
                  }



                 include_once 'connection.php';
                  $dbconfig = new dbconfig();
                  $conn = $dbconfig->getCon();
                  $query = "SELECT paper_stat.id as 'step-id', CONCAT('Step ' , paper_stat.id, ': ', paper_stat.title) as 'step', paper_stat.id as 'count', paper_stat.hassub FROM paper_stat";
                  $result = $conn->query($query);
                  if($result->num_rows>0){
                    while ($row=$result->fetch_assoc()) {

                      if($row['count']<=$max){

                          $stat_ = "";
                          $tmp = "";

                          include_once 'connection.php';
                          $dbconfig = new dbconfig();
                          $conn = $dbconfig->getCon();
                          $query3 = "SELECT paper_trail.id, paper_trail.isdone FROM paper_trail WHERE paper_trail.p_sat_id = " . $row['count'] . " and paper_trail.book_id = $book_id";
                          //echo $query3;
                          //echo $query3;
                          $result3 = $conn->query($query3);
                            if($result3->num_rows>0){
                               $row3 = $result3->fetch_assoc();
                                $stat_ = $row3['isdone'];
                            }

                            if($stat_==="1"){
                              $tmp = "Done";
                            }else{
                              $tmp = "On-Going";
                            }


                        echo '<tr>
                <td scope="col" style="width: 75%"><a href="admin-view-full-status.php?trail=' . $row3['id'] . '&book_id='. $book_id .'"><em class="btn btn-primary btn-md" style="width: 100%; text-align: left; style=" >'. $row['step'] .'</em></a></td>
                <td scope="col" style="width: 20%">
                  <select class="form-control" id="select-'. $row['count'].'">
                    <option>'. $tmp .'</option>
                  </select>
                </td>
                <td scope="col" style="width: 5%%"><button class="btn btn-danger btn-md" name="'. $row['count'] .'-' . $row3['id'] . '-' . $row['step-id']. '" id="btn[]">Edit</button></td>
              </tr>';
                      }else{

                        if($row['count']==$max+1 && $tmp==="Done"){
                          echo '<tr>
                <td scope="col" style="width: 75%"><em class="btn btn-warning btn-md" style="width: 100%; text-align: left; color: black" disabled="true">'. $row['step'] .'</em></td>
                <td scope="col" style="width: 20%">
                  <select class="form-control" id="select-'. $row['count'].'">
                    <option></option>
                    <option>Done</option>
                  </select>
                </td>
                <td scope="col" style="width: 5%%"><button class="btn btn-success btn-md" name="'. $row['count'] .'-' . $row3['id'] . '-' . $row['step-id']. '" id="btn[]">Save</button></td>
              </tr>'; 
            }else{

              if($max>=9){
                echo '<tr>
                <td scope="col" style="width: 75%"><em class="btn btn-warning btn-md" style="width: 100%; text-align: left; color: black" disabled="true">'. $row['step'] .'</em></td>
                <td scope="col" style="width: 20%">
                  <select class="form-control" id="select-'. $row['count'].'">
                    <option></option>
                    <option>Done</option>
                  </select>
                </td>
                <td scope="col" style="width: 5%%"><button class="btn btn-success btn-md" name="'. $row['count'] .'-' . $row3['id'] . '-' . $row['step-id']. '" id="btn[]">Save</button></td>
              </tr>'; 
              }else{
                echo '<tr>
                <td scope="col" style="width: 75%"><em class="btn btn-default btn-md" style="width: 100%; text-align: left; style=" disabled="true">'. $row['step'] .'</em></td>
                <td scope="col" style="width: 20%">
                  <select class="form-control" disabled="true">
                    <option></option>
                    <option>Done</option>
                  </select>
                </td>
                <td scope="col" style="width: 5%%"><button class="btn btn-default btn-md" disabled="true" id="btn[]">Save</button></td>
              </tr>';
              }
               
            }
                        
                      }

                      
                    }
                  }

              ?>

              
              
              
            </tbody>
            
          </table>





        
			</div>
          <!-- top tiles -->
          <div class="row tile_count"></div>
          <!-- /top tiles -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

      </div>
    </div>


    <!-- Custom Theme Scripts -->
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/custom.min.js"></script>

    <script src="js/searchdoc.js"></script>

  </body>
</html>
