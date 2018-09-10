<?php

  session_start();


  if(isset($_SESSION['uid'])){
    //print_r($_SESSION);
  }else{
    header("Location: index.php");
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
            <div class="col-md-7"><b> Search Documents </b></div>
            <div class="col-md-5"><b> Filter </b></div>
          </div>
          <div class="row">
            <div class="col-md-5"><input class="form-control" type="text" placeholder="Search.." id="search-key" name="search"></div>
            <div class="col-sm-1"><button type="button" class="btn btn-primary" id="btn-search"> Search </button></div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
              <select class="form-control">
                <option>On-Process</option>
                <option>Finished</option>

              </select>
            </div>
          </div>
        </div>
				<br>
				<hr>

				<div id= "admin-div-voidmain" class= "container">
          

          <table class="table">
            <thead>
              <tr>
                <td scope="col" style="font-weight: bold; font-size: 15pt">Tittle</td>
                <td scope="col" style="font-weight: bold; font-size: 15pt">Author</td>
                <td scope="col" style="font-weight: bold; font-size: 15pt">Research Type</td>
              </tr>
              
            </thead>
            <tbody>
            <?php
              $key = "";
             


              if(isset($_GET['search'])){
                $key =  $_GET['search'];
              }
                  


                  include_once 'connection.php';
                  $dbconfig = new dbconfig();
                  $conn = $dbconfig->getCon();
                  $query = "SELECT book_id, book_title, cited, enabled FROM `book` WHERE book_title LIKE '%$key%'";
                  $result = $conn->query($query);
                  if($result->num_rows>0){
                    while ($row = $result->fetch_assoc()) {
                      $str =  '
                      <tr>
                <td scope="col" style="width: 50%"><a href="view-stat.php?book_id='. $row['book_id'] .'">'. $row['book_title'] .'</a></td>';

                  //for author
                  
                              $query = "SELECT author.a_id, CONCAT(author.a_lname, ', ' , SUBSTRING(author.a_fname, 1, 1), ';') as 'author' FROM author INNER JOIN junc_authorbook on junc_authorbook.aut_id = author.a_id WHERE junc_authorbook.book_id=" . $row['book_id'];
                              $result2 = $conn->query($query);
                              if($result2->num_rows>0){
                                 $autors_all = "";
                                while($row2=$result2->fetch_assoc()){
                                  $autors_all .= $row2['author'] . " ";
                                }
                                $str .= '<td scope="col" style="width: 25%">'. $autors_all .'</td>'
                                ;

                              }


                              $query = "SELECT `type` FROM `account` INNER JOIN groupdoc on groupdoc.accid = account.id WHERE groupdoc.book_id = " . $row['book_id'];
                              $result2 = $conn->query($query);
                              if($result2->num_rows>0){
                                 $autors_all = "";
                                while($row2=$result2->fetch_assoc()){

                                  if($row2['type'] ==="INSTRUCTOR"){
                                    $str .= '
                                <td scope="col" style="width: 25%">Instructor Research</td>
                          </tr>';
                                  }else{
                                    $str .= '
                                <td scope="col" style="width: 25%"Student Research</td>
                          </tr>';
                                  }
                                  
                                }
                                

                              }


                        echo $str;
                    }
                  }else{
                    
                    echo '<tr><td scope="col" style="width: 100%" colspan="3" ><center style="color:red; font-size: 18pt">No result Found</center></td></tr>';
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
