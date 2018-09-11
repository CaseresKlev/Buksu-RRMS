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

    
  }else if($acctype==="STUDENT"){
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
                <h5 style="color: #00004d;"><?php echo strtoupper($accname) ?></h5>
                <h6><?php echo strtoupper($acctype) ?></h6>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Research</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="instructordashboard.php">Finished Reserch</a>
                        </li>
                        <li>
                            <a href="instructor-on-process-paper.php">On-Process Research</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
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
            <div class="container" style="overflow: scroll; height: 60%" id="chat">
                <div class="row" id="sender" style="width: 80%; ">
                    <div class="col-md-12">
                        <h5 style="font-weight: bold;">Research Unit</h5>
                    </div>
                    <div class="col-md-12" style="background-color: #00cccc; height: auto; border-radius: 25px;">
                        <h5>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                        </h5>
                        <div class="row" style="padding-left: 15px;">
                            July 15, 2018 5:56PM
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row" id="sender" style="width: 80%; float: right;">
                    <div class="col-md-12">
                        <h5 style="font-weight: bold; float: right;">Loyd</h5>
                    </div>
                    <div class="col-md-12" style="background-color:  #538cc6; height: auto; border-radius: 25px;">
                        <h5>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                        </h5>
                        <div class="row" style="padding-left: 15px;">
                            July 15, 2018 5:56PM
                        </div>
                    </div>
                </div>
                
                <br>
                
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <textarea cols="50" style="width: 100%; resize: none" rows="4"></textarea>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success btn-md">Send</button>
                    </div>
                    
                </div>
            </div>
            <br>
            <br>


           
            
            












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
    <!--<script type="text/javascript" src="js/inbox.js"></script>-->
       
	  
</body>
</html>