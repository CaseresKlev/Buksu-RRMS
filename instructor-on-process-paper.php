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
            <ul class="list-unstyled components" style="margin-left: 10%">
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
                <div class="row">
                    <h3 style="padding-left: 15px;">My On-Process Research</h3>
                </div>
                <br>
                <div class="row">
                    <table class="table">
                        <thead>
                          <tr>
                            <td scope="col" style="border-bottom: 1px solid black; border-collapse: collapse; font-size: 15pt; font-weight: bold; ">Research Title</td>
                            <td scope="col" style="border-bottom: 1px solid black; border-collapse: collapse; font-size: 15pt; font-weight: bold; ">Latest Status</td>
                          </tr>
                        </thead>
                        <tbody >
                            <?php

                              include_once 'connection.php';
                              $dbconfig = new dbconfig();
                              $conn = $dbconfig->getCon();
                              $query = "SELECT book.book_id, book.book_title FROM book INNER JOIN groupdoc on book.book_id = groupdoc.book_id WHERE groupdoc.accid = $uid and book.enabled='0'";
                              $result = $conn->query($query);


                              if($result->num_rows>0){
                                while ($row=$result->fetch_assoc()) {
                                  $str =  '<td scope="col">
                                    <a href="paper-status.php?book_id='. $row['book_id'] .'" style="text-decoration: underline; font-size: 15pt;">

                                                <em>'. $row['book_title'] .'</em>
                                    </a>
                                </td>';

                                  $strstat = '<td scope="col" style="font-weight: bold; font-size: 15pt;>Conceptualized</td>
                                          </tr>';
                                  $dbconfig = new dbconfig();
                                  $conn = $dbconfig->getCon();
                                  $query2 = "SELECT CONCAT('Step ' , paper_stat.id , ': ' , paper_stat.title) as 'stat' FROM paper_trail INNER JOIN paper_stat on paper_trail.p_sat_id = paper_stat.id WHERE paper_trail.book_id = " . $row['book_id'];
                                  $result2 = $conn->query($query2);
                                  while($rowstat = $result2->fetch_assoc()){
                                    $strstat = '<td scope="col" style="font-size: 15pt;">'. $rowstat['stat'] .'</td></tr>';
                                  }

                                   $str .= $strstat;
                                   echo $str;
                                }
                              }

                            ?>

                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="row">
                    <button type="submit" id= "instructor-btn-addnew" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModaladdNew"
                style= "padding: 1% 2% 1% 2%; border-radius: 5%; font-weight: bold;" onclick="window.location.replace('add-new-on-process.php')"> ADD NEW </button>
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
