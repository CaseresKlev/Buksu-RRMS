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
        <nav id="sidebar" style="position: -webkit-sticky; position: sticky; top: 0">
            <div class="sidebar-header">
                <h4>Research Record Mangement System</h4>
            </div>
            <div class="sidebar-header">
                <h5 style="color: #00004d;"><?php echo strtoupper($accname) ?></h5>
                <h6><?php echo strtoupper($acctype) ?></h6>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="admindashboard.php">Research</a>
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
                <li>
                    <a href="updateAcc.php">Update Account</a>
                </li>
                <li>
                    <a href="accesscode.php" >Access Codes</a>
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

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
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

            <div class="container">
               <div class="row">
                    <div class="col-md-7"><b> Search Documents </b></div>
                    <div class="col-md-5"><b> Filter </b></div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <input class="form-control" type="text" placeholder="Search.." id="search-key" name="search">
                    </div>
                    <br>
                    <br>
                    <div class="col-sm-1">
                        <button type="button" class="btn btn-primary" id="btn-search"> Search </button>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                      <select class="form-control">
                        <option>On-Process</option>
                        <option>Finished</option>

                      </select>
                    </div>
                </div>
           </div>
           <div class="container">
               <table class="table">
                <thead>
                  <tr>
                    <td scope="col" style="font-weight: bold; font-size: 15pt">Tittle</td>
                    <td scope="col" style="font-weight: bold; font-size: 15pt">Author</td>
                    <td scope="col" style="font-weight: bold; font-size: 15pt">Research Type</td>
                  </tr>
                  
                </thead>
                <tbody>
                <?php
                  $key = "";
                 


                  if(isset($_GET['search'])){
                    $key =  $_GET['search'];
                  }
                      


                      include_once 'connection.php';
                      $dbconfig = new dbconfig();
                      $conn = $dbconfig->getCon();
                      $query = "SELECT book_id, book_title, cited, enabled FROM `book` WHERE book_title LIKE '%$key%'";
                      $result = $conn->query($query);
                      if($result->num_rows>0){
                        while ($row = $result->fetch_assoc()) {
                          $str =  '
                          <tr>
                    <td scope="col" style="width: 50%"><a href="view-stat.php?book_id='. $row['book_id'] .'">'. $row['book_title'] .'</a></td>';

                      //for author
                      
                                  $query = "SELECT author.a_id, CONCAT(author.a_lname, ', ' , SUBSTRING(author.a_fname, 1, 1), ';') as 'author' FROM author INNER JOIN junc_authorbook on junc_authorbook.aut_id = author.a_id WHERE junc_authorbook.book_id=" . $row['book_id'];
                                  $result2 = $conn->query($query);
                                  if($result2->num_rows>0){
                                     $autors_all = "";
                                    while($row2=$result2->fetch_assoc()){
                                      $autors_all .= $row2['author'] . " ";
                                    }
                                    $str .= '<td scope="col" style="width: 25%">'. $autors_all .'</td>'
                                    ;

                                  }


                                  $query = "SELECT `type` FROM `account` INNER JOIN groupdoc on groupdoc.accid = account.id WHERE groupdoc.book_id = " . $row['book_id'];
                                  $result2 = $conn->query($query);
                                  if($result2->num_rows>0){
                                     $autors_all = "";
                                    while($row2=$result2->fetch_assoc()){

                                      if($row2['type'] ==="INSTRUCTOR"){
                                        $str .= '
                                    <td scope="col" style="width: 25%">Instructor Research</td>
                              </tr>';
                                      }else{
                                        $str .= '
                                    <td scope="col" style="width: 25%"Student Research</td>
                              </tr>';
                                      }
                                      
                                    }
                                    

                                  }


                            echo $str;
                        }
                      }else{
                        
                        echo '<tr><td scope="col" style="width: 100%" colspan="3" ><center style="color:red; font-size: 18pt">No result Found</center></td></tr>';
                      }

                  
                      
                ?>
                  
                </tbody>
                
              </table>
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