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
  }else if($acctype==="instructor"){
    //echo "Instructor ang naka login";

    header("Location: instructordashboard.php");
  }else if($acctype==="student"){
    //echo "student ang naka login";
  }


  ?>





<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Administrator </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/custom.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/dept.css">


</head>

<body class="nav-md">
    <div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view" >
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
					<ul><a href="accesscode.php"> ACCESS CODE </a> </ul>
					<?php
                            $d = Date('Y-m-d');

                            $yr = explode("-", $d);



                            $yr = explode("-", $d);




                            $yr = explode("-", $d);



                            echo '<ul><a href="book_reports.php?title=&dept=&status=&author=&from=0&to=' . $yr[0] . '" target="_blank"> REPORTS </a> </ul>';
                          ?>

          <ul><a class= "dashboard-active" href="dept.php">DEPARTMENT </a> </ul> </br>
					<ul><a href="index.php"> Back to Home </a> </ul>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main" style= "min-height: 950px;>


          <div class="login-page">
            <script>

              function lettersonly(input){
                var regex= /[^ a-z () , .]/gi;
                input.value= input.value.replace(regex,"");
              }
              </script>
              <br/><br/><br/>
<div class="form">
     <!-- adding department for any changes  -->

  <form class="login-form">

    <fieldset>
      <legend>ADD DEPARTMENT</legend>
      <input style="text-transform:capitalize"type="text"name="department" id="department"onkeyup="lettersonly(this)" placeholder="Department" required/>
      <input style="text-transform:capitalize"type="text"name="college" id="college" onkeyup="lettersonly(this)" placeholder="College"/ required>
            <button type="button" id="submit1" >ADD</button>
    </fieldset>
  </form>


    <form class="search-form">

        <fieldset>

          <!-- delete department if needed -->
          <legend>DELETE DEPARTMENT</legend>

    <!--  <input type="search" name="search" placeholder="Search.." autocomplete="off"> -->
      <select id="deldept" style="width:100%; font-size:14pt">
      <option></option>


      <?php
        // connection to database
      include_once 'connection.php';
      $dbconfig=new dbconfig();
      $conn=$dbconfig->getCon();

      $query="SELECT * FROM `department` WHERE 1";

      $result= $conn->query($query);

      if ($result->num_rows>0) {
        while ($row=$result->fetch_assoc()) {

          echo "<option>". $row['cat_name']. "</option>";
        }
      }

        ?>

        </select>

          <br/><br/>
            <button id="btn-del" style="background-color:red; font:12pt;">DELETE</button>
      </fieldset>
  </form>


</div>
</div>




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
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script src="js/searchdoc.js"></script>

  </body>
</html>
