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
					<ul><a  href="instructordashboard.php"> MY FINISHED RESEARCH </span></a></ul>
          <ul><a  class= "dashboard-active" href="instructor-on-process-paper.php"> MY On-Process RESEARCH </span></a></ul>
					<ul><a href="accesscode_instruct.php"> ACCESS CODE </a> </ul>

					 <?php
                            $d = Date('Y-m-d');
                            $yr = explode("-", $d);
                            echo '<td><ul><a href="book_reports.php?title=&dept=&status=&author=&from=0&to=' . $yr[0] . '" target="_blank"> REPORTS </a> </ul></td>';
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

				<b style="font-size:2em;"> My On-Process Research </b>
				<hr>
				<div id= "instructor-div-voidmain" class= "div-voidmain">
					<form id= "instructor-frm-documents" class= "frm-documents" action="/action_page.php">
						<table class="table" width= "100%">
              <thead >
              <tr>
                <td scope="col" style="border-bottom: 1px solid black; border-collapse: collapse; width: ">Research Title</td>
                <td scope="col" style="border-bottom: 1px solid black; border-collapse: collapse; width: ">Latest Status</td>
              </tr>
            </thead>
            <tbody>
                <?php
                  include_once 'connection.php';
                  $dbconfig = new dbconfig();
                  $conn = $dbconfig->getCon();
                  $query = "SELECT book.book_id, book.book_title FROM book INNER JOIN groupdoc on book.book_id = groupdoc.book_id WHERE groupdoc.accid = $uid and book.enabled='0'";
                  $result = $conn->query($query);
                  if($result->num_rows>0){
                    while ($row=$result->fetch_assoc()) {
                      $str =  "
                      <tr><td class=\"col\"> <a href=\"paper-status.php?book_id=" . $row['book_id'] . "\" ><li>" . $row['book_title'] . "</li></td>";

                      $strstat = "<td class=\"col\">Conceptualized</td>
                              </tr>";
                      $dbconfig = new dbconfig();
                      $conn = $dbconfig->getCon();
                      $query2 = "SELECT CONCAT('Step ' , paper_stat.id , ': ' , paper_stat.title) as 'stat' FROM paper_trail INNER JOIN paper_stat on paper_trail.p_sat_id = paper_stat.id WHERE paper_trail.book_id = " . $row['book_id'];
                      $result2 = $conn->query($query2);
                      while($rowstat = $result2->fetch_assoc()){
                        $strstat = "<td class=\"col\">". $rowstat['stat'] ."</td></tr></a>";
                      }

                       $str .= $strstat;
                       echo $str;
                    }
                  }

                ?>
            </tbody>
						</table>
					</form>
					<hr>
				<button type="submit" id= "instructor-btn-addnew" class="btn btn-primary" data-toggle="modal" data-target="#ModaladdNew"
				style= "padding: 1% 2% 1% 2%; border-radius: 5%; font-weight: bold;" onclick="window.location.replace('add-new-on-process.php')"> ADD NEW </button>

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
