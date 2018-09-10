<?php
	session_start();
if(isset($_SESSION['uid'])){
    //print_r($_SESSION);
  }else{
    header("Location: index.php");
  }

  $accname = $_SESSION['gname'];
  $acctype = $_SESSION['type'];
  //echo $acctype;
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
    <link rel="stylesheet" type="text/css" media="screen" href="css/custom.min.css">

</head>

<header>

</header>



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
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <div class="nav side-menu">
					<ul><a href="admindashboard.php"> MY RESEARCH </span></a></ul>
					<ul><a class= "dashboard-active" href="#update"> UPDATE ACCOUNT </a></ul>
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
        <div class="right_col" role="main" style="min-height: 712px;">
			<div id= "admin-frm-container" class="frm-container" style="margin: auto; width: 80%">
				<center><h1> UPDATE ACCOUNT </h1></center>
			<hr></br>
			<form id= "admin-frm-updateAcc">
				<table style="font-size: 15px">
					<tr>
						<td> Current Password :</td>
						<td> <input type="password" placeholder="Enter Password" name="psw" id="oldpsw" required> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> New Password :</td>
						<td> <input type="password" placeholder="Enter New Password" name="psw" id="npsw" required> </td>
					</tr> </br>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> Re-enter New Password :</td>
						<td> <input type="password" placeholder="Re-enter New Password" name="ncpsw" id="ncpsw" required> </td>
					</tr>
				</table>
			</form></br></br>
			<hr>
			<div id="result" style="text-align: center; color: red; font-weight: bold; display: none;">mnjhgfccvg</div>
			<input type="text" id="gname" class="gname" style="display: none;" value="<?php echo $_SESSION['gname'];?>" />
			<button type="submit" class="btn-update" id="btn-update"> UPDATE </button>
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

    <!-- jQuery -->

    <!--<script type="text/javascript" src="js/jquery.min.js"></script>-->

    <!-- Bootstrap -->
    <!--<script src="js/bootstrap.min.js"></script>-->

    <!-- Custom Theme Scripts -->
   <!-- <script src="js/custom.min.js"></script>-->
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/updateAccount.js"></script>

  </body>
</html>
