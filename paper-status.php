<?php

  session_start();

  $book_id = "";
  if(isset($_SESSION['uid'])){
    //print_r($_SESSION);
    $book_id = $_GET['book_id'];
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
              <i class="fas fa-user-circle fa-3x"></i>
                <span style="position: absolute; margin-left: 10px">
                  <h5 style="color: #BDB5B5;"><?php echo strtoupper($accname) ?></h5>
                  <h6><?php echo strtoupper($acctype) ?></h6>
                </span>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
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
                    <a href="book_reports.php?title=&dept=&status=&author=&from=0&to=2018" target="_blank">Reports</a>
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
                <?php

                  include_once 'connection.php';
                  $dbconfig = new dbconfig();
                  $conn = $dbconfig->getCon();
                  $query = "SELECT book.book_title, paper_stat.title, isdone, date FROM paper_trail INNER JOIN book on book.book_id = paper_trail.book_id INNER JOIN paper_stat on paper_stat.id = paper_trail.p_sat_id WHERE book.book_id = $book_id";
                  $result = $conn ->query($query);
                  if($result->num_rows>0){
                    $row = $result->fetch_assoc();
                  }

                ?>

               <div class="row"  style="padding-left: 15px">
                   <em><h2><?php echo $row['book_title']; ?><h2></em>
               </div>
               <div class="row"  style="padding-left: 15px">
                   <b style="font-size:12pt;"> Author:
                        <?php
                          $dbconfig= new dbconfig();
                          $con= $dbconfig -> getCon();
                          $query= "SELECT DISTINCT(a_id) as 'a_id' , a_lname as 'a_lname', SUBSTRING(a_fname, 1, 1) as 'a_fname' FROM author INNER JOIN junc_authorbook on author.a_id = junc_authorbook.aut_id WHERE junc_authorbook.book_id =$book_id";
                          $result = $con -> query($query);
                          $autorList ="";
                          if($result->num_rows>0){
                            while ($row1 = $result->fetch_assoc()) {
                            //  $autorList .= $row['a_lname'] . ", " . $row['a_fname'] . "; ";
                            ?>
                            <a href="author.php?aut_id=<?php echo $row1['a_id']; ?>" style="font-weight: bold; font-size: 14pt; text-decoration: underline;">  <?php echo $row1['a_lname'] . ", " . $row1['a_fname'] . "; ";?>
                              </a>
                        <?php }
                      } ?>
                    </b>
               </div>
               <br>
               <br>
               <div class="row" style="padding-left: 15px">
                   <h3>Paper Status</h3>
               </div>
               <div class="row">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Step</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>

                  </tr>
                </thead>

                <tbody>
                  <?php

                    include_once 'connection.php';
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $query = "SELECT paper_trail.id, paper_trail.requirements, book.book_title, p_sat_id, paper_stat.title, isdone, date FROM paper_trail INNER JOIN book on book.book_id = paper_trail.book_id INNER JOIN paper_stat on paper_stat.id = paper_trail.p_sat_id WHERE book.book_id =$book_id";
                    $result = $conn ->query($query);
                    if($result->num_rows>0){
                      while($rowDis = $result->fetch_assoc()){

                        if($rowDis['requirements']==="1"){
                           echo '<tr>
                                <th scope="row">' . $rowDis['p_sat_id'] .'</th>
                                <th scope="row"><a href="view-full-status.php?trail=' . $rowDis['id'] . '&book_id=' . $book_id . '"style="text-decoration: underline">' . $rowDis['title'] . '</a></th>
                                <td style="background-color: #66ff66">Done</td>

                              </tr>';
                            }else{
                              echo '<tr>
                                <th scope="row">' . $rowDis['p_sat_id'] .'</th>
                                <th scope="row"><a href="view-full-status.php?trail=' . $rowDis['id'] . '&book_id=' . $book_id . '" style="text-decoration: underline">' . $rowDis['title'] . '</a></th>
                                <td style="background-color: #ffb84d">Some requirements are missing.</td>

                              </tr>';
                            }

                    }
                  }

                  ?>



                </tbody>
                <th></th>
              </table>
            </div>
               <hr>
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
