<?php

  session_start();


  if(isset($_SESSION['uid'])){
    //print_r($_SESSION);
  }else{
    header("Location: index.php");
  }


  $accname = $_SESSION['gname'];
  $acctype = $_SESSION['type'];
  $uid = $_SESSION['uid'];
  if($acctype==="admin"){
    //echo "Admin ANG NAKALOGIN";
    header("Location: admindashboard.php");
  }else if($acctype==="INSTRUCTOR"){
    //echo "Instructor ang naka login";

    //header("Location: instructordashboard1.php");
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
              <i class="fas fa-user-circle fa-3x"></i>
                <span style="position: absolute; margin-left: 10px">
                  <h5 style="color: #BDB5B5;"><?php echo strtoupper($accname) ?></h5>
                  <h6><?php echo strtoupper($acctype) ?></h6>
                </span>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Research
                      <i class="fas fa-circle fa-xs" style="color:red"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="instructordashboard.php">Finished Reserch</a>
                        </li>
                        <li>
                            <a href="instructor-on-process-paper.php">On-Process Research</a>
                        </li>

                    </ul>
                </li>
                <li class="active">
                    <a href="accesscode_instruct.php" class="dropdown-toggle">Access Codes</a>
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

            <nav class="navbar navbar-expand-lg" style="background: #CDCDD8">
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
                          <li class="nav-item hover">
                              <a class="nav-link" href="index.php">Home</a>
                          </li>
                          <li class="nav-item hover">
                              <a class="nav-link" href="inbox.php">
                                  <i class="fas fa-envelope fa-lg"> </i>
                                  Inbox
                                  <i class="fas fa-circle fa-xs" style="color:red"></i>
                              </a>
                          </li>
                          <li class="nav-item hover">
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
               <div class="row">
                   <center><b> GENERATE ACCESS CODE </b></center>
                   <div class="line"></div>

               </div>
               <div class="row">
<!--                   <table style="width= 100%">-->
					<tr>
						<td><b> Number of Access Code:  &nbsp </td>
						<td> <input type="number" placeholder="0" id="access-count" name="number" min="0" required>  &nbsp</td>
						<button type="button" id= "instructor-frm-generate" class="btn btn-primary"> Generate </button>
					</tr>
<!--				</table>-->
               </div>
            </div>
            <div class="line"></div>
            <div class="container">
                	<div id="printtable">
				<table style="width:100%"border="1" cellpadding="3" id="tbl-accescodes"  style="font-size: 15px; " >
					<center><h4> Available Student Codes </h4></center>
					<tr class="access-tr-head">
						<th id="access-th">Count</th>
						<th id="access-th">Access Codes</th>
						<th id="access-th">Type</th>
					</tr>
					<?php
                        $id = $_SESSION['uid'];
						include_once 'connection.php';
						$dbconfig = new dbconfig();
						$conn = $dbconfig->getCon();
						$query = "SELECT * FROM `acesskey` WHERE used=0 and type='STUDENT' and ins_id = $id";
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

                <div class="row">
                    <div class="col-sm-6">
                     <button type="button" id= "instructor-btn-print" class="btn btn-primary"
			style= "font-size: 12pt; font-weight: bold; padding: 1% 2% 1% 2%; border-radius: 10%;" onclick="printDiv()"> PRINT </button>
                </div>
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

<!--    <script src="js/searchdoc.js"></script>-->
     <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/accesscode.js"></script>
    <script>
		function printDiv() {

			 window.frames["print_frame"].document.body.innerHTML = "jmhngfvdvgbhkj,mhgfvdgbhjkkmhngf" + document.getElementById("printtable").innerHTML;
			 alert(window.frames["print_frame"].document.body.innerHTML = document.getElementById("printtable").innerHTML);
			 window.frames["print_frame"].window.focus();
			 window.frames["print_frame"].window.print();
		 }
		</script>


</body>
</html>
