<?php
session_start();


  if(isset($_SESSION['uid'])){
   // print_r($_SESSION);
  }else{
    header("Location: index(loyd).php");
  }

  $accname = $_SESSION['gname'];
  $acctype = $_SESSION['type'];
  $uid = $_SESSION['uid'];

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
					<ul><a class= "dashboard-active" href="instructordashboard.php"> MY FINISHED RESEARCH </span></a></ul>
          <ul><a  href="instructor-on-process-paper.php"> MY On-Process RESEARCH </span></a></ul>
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
        <div class="right_col" role="main" style= "min-height: 700px; float: right">
			<div id= "instructor-frm-search" class= "frm-search" style= "font-size: 18px">

				<b style="font-size:2em;"> My Finished Research </b>
				<hr>
				<div id= "instructor-div-voidmain" class= "div-voidmain">
					<form id= "instructor-frm-documents" class= "frm-documents" action="/action_page.php">
						<table style="font-size: 15px" width= "100%">

                <?php
                  include_once 'connection.php';
                  $dbconfig = new dbconfig();
                  $conn = $dbconfig->getCon();
                  $query = "SELECT book.book_id, book.book_title FROM book INNER JOIN groupdoc on book.book_id = groupdoc.book_id WHERE groupdoc.accid = $uid and book.enabled=1";
                  $result = $conn->query($query);
                  if($result->num_rows>0){
                    while ($row=$result->fetch_assoc()) {
                      echo "<tr>
                              <td> <a href=\"bookdetails.php?book_id=" . $row['book_id'] . "\" ><li>" . $row['book_title'] . "</li> </td>
                              <td style=\"float: right\"> <a  href=\"supporting.php?book_id=" . $row['book_id'] . "\"> My supporting document </td>
                              <td> <a href=revision.php?book_id=" . $row['book_id'] ." <u style= \"cursor: pointer; float: right\"> Submit Revision </u> </td></a>
                            </tr>";
                    }
                  }

                ?>

						</table>
					</form></br></br>


			</div>
          <!-- top tiles -->
          <div class="row tile_count"></div>
          <!-- /top tiles -->
            </div>
        </div>
        <!-- /page content -->

      </div>
    </div>

    <!-- jQuery -->

    <script type="text/javascript" sr="js/jquery-3.3.1.js"></script>
    <!-- Bootstrap -->
    <!--<script src="js/bootstrap.min.js"></script>-->
    <script type="text/javascript" src=""></script>
    <!-- Custom Theme Scripts -->
    <!--<script src="js/custom.min.js"></script>-->

  </body>
</html>
