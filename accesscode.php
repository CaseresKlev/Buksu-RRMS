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
<html ">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> RESEARCH RECORD MANAGEMENT SYSTEM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/custom.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/button.css">
		<link rel="stylesheet" href="css/temp.css">


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
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <div class="nav side-menu">
					<ul><a href="admindashboard.php"> MY RESEARCH </span></a></ul>
					<ul><a href="updateAcc.php"> UPDATE ACCOUNT </a></ul>
					<ul><a class= "dashboard-active" href="#code"> ACCESS CODE </a> </ul>
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
				<center><h1> GENERATE ACCESS CODE </h1></center>
			<hr></br>
			<script>

			
				function numbersonly(input){
					var numall= /[^0-9]/gi;
					input.value= input.value.replace(numall, "");
				}
			</script>
			<form id= "admin-frm-generatepass" class= "frm-generatepass" >
				<table style="font-size: 15px">
					<tr>
						<td> <b> Number of Access Code: </b> </td>
						<td> <input type="number" placeholder="0"  class="form-control" name="number" min="0" value="0" id="access-count" onkeyup="numbersonly(this)" style= "width: 50%" required> </td>
						<td> <button type="button" id="admin-btn-generate" class="btn  btn-primary"> GENERATE </button> </td>
					</tr>
				</table>
			</form></br></br>
			<hr>
			</br> <center><h2> Available Accesskey </h2></center>
			<form id= "admin-frm-generatepass" class= "frm-generatepass" action="/action_page.php">
				<div id="printtable">
				<table style="width:100%"border="1" cellpadding="3" id="tbl-accescodes" style="font-size: 15px" >

					<tr class="access-tr-head">
						<th id="access-th">Count</th>
						<th id="access-th">Access Codes</th>
						<th id="access-th">Type</th>
					</tr>
					<?php
						include_once 'connection.php';
						$dbconfig = new dbconfig();
						$conn = $dbconfig->getCon();
						$query = null;
						if($_SESSION['type']=="INSTRUCTOR"){
							$query = "SELECT * FROM `acesskey` WHERE used=0 and type='student'";
						}else{
							$query = "SELECT * FROM `acesskey` WHERE used=0 and type='instructor' and ins_id = 0";
						}

						$result = $conn->query($query);
						if($result->num_rows>0){
							$i=1;
							while($row=$result->fetch_assoc()){
								echo "<tr class=\"access-tr-head\">
										<th id=\"access-th\">$i</th>
											<th id=\"access-th\">" . $row['acesskey'] . "</th>
												<th id=\"access-th\">" . $row['type'] . "</th>
										</tr>";
										$i++;
							}
						}


					?>
				</table>
			</div>
				<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
			</form></br>

			<hr>
			<span style="float: left;">

  	<!--	<button onclick="printContent('tbl-accescodes')">Print</button> -->
		<!--<button class="print-button" onclick="printDiv()"><span class="print-icon"></button>-->
			<button onclick="printDiv()" style="width: 100px; font-size: 13pt">Print</button>

		<script>
		function printDiv() {
			 window.frames["print_frame"].document.body.innerHTML = document.getElementById("printtable").innerHTML;
			 window.frames["print_frame"].window.focus();
			 window.frames["print_frame"].window.print();
		 }
		</script>

			</span>
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
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Custom Theme Scripts -->
    
    <script src="js/accesscode.js"></script>

  </body>
</html>
