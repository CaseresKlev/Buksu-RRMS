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
            <ul class="list-unstyled components" style="margin-left: 10%">
                <li>
                    <a href="admindashboard.php"class="dropdown-toggle">Research
                      <i class="fas fa-circle fa-xs" style="color:red"></i>
                    </a>
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
                <li class="active">
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
                        <h4> UPDATE ACCOUNT</h4>
                        </div>
                        <div class="line"> </div>

                    <div class="row">
                        	<form id= "admin-frm-updateAcc">
				<table>
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
                            </form>
                    </br></br>
                    </div>

            </div>
                    <br/><br/>
                    <div class="container">

                        <div class="row">

                        	<div id="result" style="text-align: center; color: red; font-weight: bold; display: none;">mnjhgfccvg</div>
                        <input type="text" id="gname" class="gname" style="display: none;" value="<?php echo $_SESSION['gname'];?>" />



                        </div>
                        <div class="row">
                               <button class="btn btn-primary" type="submit" id="btn-update"> UPDATE </button>

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

        <script type="text/javascript" src="js/updateAccount.js"></script>



</body>
</html>
