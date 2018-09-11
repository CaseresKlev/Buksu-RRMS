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
    <!--bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-min-4.1.0.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- scrollbar -->
    <link rel="stylesheet" href="css/custom_scroll.css">

    <script defer src="js/solid.js"></script>
    <script defer src="js/fontawesome.js"></script>

</head>
<body>
	<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>Research Record Mangement System</h4>
            </div>
            <div class="sidebar-header">
                <h5 style="color: #00004d;"><?php echo strtoupper($accname) ?></h5>
                <h6><?php echo strtoupper($acctype) ?></h6>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="admindashboard.php"class="dropdown-toggle">Research</a>
                    <!--<ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>-->
                </li>
                <li>
                    <a href="updateAcc.php">Update Account</a>
                </li>
                <li>
                    <a href="accesscode.php" class="dropdown-toggle">Access Codes</a>
                    <!--<ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>-->
                </li>
                <li>
                    <a href="book_reports.php?title=&dept=&status=&author=&from=0&to=2018">Reports</a>
                </li>
                <li>
                    <a href="dept.php">Department</a>
                </li>
            </ul>

            <!--<ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>-->
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="new-login.php">Logout</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </nav>
           

           <!---- PLACE YOUR DIVS HERE --->
           <div class="container">
               <div class="col-md-12" style="font-size: 22pt"><b><i> <?php echo $book_title ?></i> </b></div>
                 <?php
                  $dbconfig = new dbconfig();
                  $conn = $dbconfig->getCon();
                  $query = "SELECT author.a_id, CONCAT(author.a_lname, ', ' , SUBSTRING(author.a_fname, 1, 1), ';') as 'author' FROM author INNER JOIN junc_authorbook on junc_authorbook.aut_id = author.a_id WHERE junc_authorbook.book_id=" . $row['book_id'];
                  $result = $conn->query($query);
                  if($result->num_rows>0){
                      $row = $result->fetch_assoc();
                      echo'<div class="col-md-12" ><b style="color: gray"> '. $row['author'] .' </b></div>';
                  }
                 ?>
               <br>
               <br>
               <div class="row">
                    <div class="col-md-12" ><b style="font-size: 20pt"><center>Status</center></b></div>
                </div>
           </div>

           <div class="container">
               <div class="row">
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
           </div>













           <!---- AYAW NAG LAPAS DIRI --->
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min-4.1.0.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <script src="js/searchdoc.js"></script>
       
	  
</body>
</html>