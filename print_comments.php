<?php

  session_start();


  if(isset($_SESSION['uid'])){
    //print_r($_SESSION);
  }else{
    header("Location: index.php");
  }

  $accname = $_SESSION['gname'];
  $acctype = $_SESSION['type'];
 /* if($acctype==="admin"){
    //echo "Admin ANG NAKALOGIN";
    header("Location: admindashboard.php");
  }else if($acctype==="INSTRUCTOR"){
    //echo "Instructor ang naka login";

    
  }else if($acctype==="STUDENT"){
    header("Location: index.php");
  }*/


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
               <div class="container" id="printable">

        <div class="row" style="padding-left: 30px; margin-left: auto; margin-right:auto;">

              <div class="col-sm-2" style="">
                  <img id="buksulogo" src="img/BukSU Logo.png">
              </div>
              <div class="col-md-8" style="text-align:justify;">

                      <h4 id="anneheader"> BUKIDNON STATE UNIVERSITY </h4>


                      <p id="anneheader">Malaybalay City, Bukidnon 8700</p>


                      <p id="anneheader"> Tel (088) 813-5661 to 5663; TeleFax (088) 813-2717, <a href="#"> www.buksu.edu.ph </a> </p>

                  <h4 style="text-align:center; width:100%;"> SUMMARY OF COMMENTS AND SUGGESTIONS </h4>
              </div>
        </div>
        <br>
        <br>


        <div class="row">
            <h6> Originator: </h6>
        </div>
        <div class="row">
          <table width="100%" id="tablefirst" class="table" style="border:1px solid black;">

                <tr>
                    <td scope="col" style="height: 60px; border:1px solid black;">
                      <i class="fas fa-square-full" style="color:#3399ff;"></i>
                      Research Committee
                    </td>
                    <td scope="col" style="height: 60px; border:1px solid black;">
                      <i class="fas fa-square-full" style="color:#3399ff;"></i>
                      Internal Reviewers
                    </td>
                    <td scope="col" style="height: 60px; border:1px solid black;">
                      <i class="fas fa-square-full" style="color:#3399ff;"></i>
                      Panel of Experts
                    </td>
                    <td scope="col" style="height: 60px; border:1px solid black;">
                      <i class="fas fa-square-full" style="color:#3399ff;"></i>
                      External Reviewers
                    </td>
                    <td scope="col" style="height: 60px; border:1px solid black;">
                      <i class="fas fa-square-full" style="color:#3399ff;"></i>
                      Research Ethics Committee
                    </td>
                </tr>

          </table>
        </div>

            <br>
            <br>

            <div class="row">
                <h6> Title of Research:   </h6>
            </div>
              <div class="row">
                  <h6> Proponents:   </h6>
              </div>

              <br>

                        <div class="row">
                            <table width="100%" id="tablefirst" class="table" style="border:1px solid black;">
                              <tr style="border:1px solid black;">
                                  <th id="tabletwo"> Part of the Manuscript </th>
                                  <th id="tabletwo"> Comments and Suggestions </th>
                                  <th id="tabletwo"> Pages </th>
                              </tr>

                              <tr style="border:1px solid black; height:50%;">
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                              </tr>

                              <tr style="border:1px solid black; height:50%;">
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                              </tr>

                              <tr style="border:1px solid black; height:50%;">
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                              </tr>
                            </table>
                        </div>

                        <br>
                        <br>


                                  <div class="row">
                                      <div class="col-md-6">
                                          <h5> Summarized by: </h5>
                                          <br>
                                          <hr>
                                      </div>

                                      <div class="col-md-6">
                                          <h5> Reviewed and approved by: </h5>
                                          <br>
                                          <hr>
                                      </div>
                                  </div>

                                  <br>
                                  <br>
                                  <br>
                                  <br>
                                  <br>
                                  <br>



                                        <div class="row">
                                            <div class="col-md-3">
                                              <p> Document Code: RU- F-032 </p>
                                            </div>

                                            <div class="col-md-2">
                                              <p> Revision No. : 002 </p>
                                            </div>

                                            <div class="col-md-2">
                                              <p> Issue No. 002 </p>
                                            </div>
                                            <div class="col-md-3">
                                              <p> Issue Date: May 15, 2018 </p>
                                            </div>

                                            <div class="col-md-2">
                                              <p> Page no. 1 of 1 </p>
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

    <script src="js/searchdoc.js"></script>
       
	  
</body>
</html>