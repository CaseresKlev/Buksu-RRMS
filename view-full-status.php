<?php
session_start();

  $book_id = "";
  $trail_id = "";
  if(isset($_SESSION['uid']) && $_GET['trail']){
   // print_r($_SESSION);
    $book_id = $_GET['book_id'];
    $trail_id = $_GET['trail'];
    //echo "Trail $trail_id";
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

  include_once 'connection.php';
  $dbconfig = new dbconfig();
  $conn = $dbconfig->getCon();
  $query = "SELECT  paper_trail.p_sat_id, paper_trail.file_loc, paper_trail.requirements, paper_trail.isdone, paper_stat.hasrequired FROM paper_trail INNER JOIN paper_stat on paper_trail.p_sat_id = paper_stat.id WHERE paper_trail.id = $trail_id";
  $fileLoc = "";
  $required = "";
   $step_z = "";
   $result = $conn ->query($query);
   if($result->num_rows>0){
      $row0 = $result->fetch_assoc();
      $fileLoc = $row0['file_loc'];
      $required = $row0['hasrequired'];
      $step_z = $row0['p_sat_id'];
   }
   $str = explode("/", $fileLoc);
   //echo "$fileLoc $required";
 //echo $step_z;
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

            <?php
          $paper_stat = "";
          $date = "";
          $desc = "";
          //$trail_id = "";
          $origin = "";
          include_once 'connection.php';
          $dbconfig = new dbconfig();
          $conn = $dbconfig->getCon();
          $query = "SELECT paper_trail.id, book.book_title, paper_stat.title, paper_stat.Description, isdone, date FROM paper_trail INNER JOIN book on book.book_id = paper_trail.book_id INNER JOIN paper_stat on paper_stat.id = paper_trail.p_sat_id WHERE paper_trail.id = " . $trail_id;
          //echo $query;
          $result = $conn ->query($query);
          if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $paper_stat = $row['title'];
            $date = $row['date'];
            $desc = $row['Description'];
            $trail_id = $row['id'];
            $book_title = $row['book_title'];
            //$origin = $row['origin'];
          }

        ?>

           <div class="container">
            <div class="row" style="padding-left: 15px;"> <h2><em><?php echo $book_title ?></em></h2> </div>
            <div class="row" style="padding-left: 15px;">
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
                        <a href="author.php?aut_id=<?php echo $row1['a_id']; ?>" style="font-weight: bold; font-size: 14pt">  <?php echo $row1['a_lname'] . ", " . $row1['a_fname'] . "; ";?>
                          </a>
                    <?php }
                  } ?>
                </b>
            </div>
            <br>
            <br>

            <div class="row">
              <table class="table">
                <thead>
                  <tr>
                    <td scope="col" colspan="2"><h3><?php
                    //$date =  date('l d F Y');
                    $long = strtotime($date);
                    $date = date('F d, Y', $long);
                    $time = date('h:i:s a', $long);

                    echo 'Paper status: <em style="font-size: 18pt; font-weight: bold">' . $paper_stat . '</em>' ?></h3></td>
                    <td scope="col">
                        <div class="col-md-3">
                        <button type="button" id="viewall-instructor" name="<?php echo $book_id ?>" class="btn btn-info">
                            <i class="fas fa-eye"></i>
                            <span>View all status</span>
                        </button>
                    </div>
                    </td>

                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td scope="col" style="width: 15%" >Date</td>
                    <td scope="col" style="width: 85%" colspan="2"><?php echo $date . " at " . $time ?></td>
                  </tr>
                  <tr>

                    <td scope="col" >Description</td>
                    <td scope="col" ><?php echo($desc)?></td>
                  </tr>

                  <?php


                  ?>



                </tbody>
                <th></th>
              </table>
          </div>

          <div class="row">
              <?php
                if($required!==""){

                  if($required==="paper"){

                    if($fileLoc===""){

                        echo '<p id="fileloc" style="display: none;">'. $fileLoc .'</p>
          <p id="trail_id" style="display: none;">'. $trail_id .'</p>';

                        if($step_z!=="9"){
                            echo '<div class="container">
                    <div class="row">
                      <div class="col-md-12" style="font-size: 18pt; font-weight: bold;">
                        Paper Revision <em style="color: red">*Required</em>
                      </div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                       <br>
                      <div class="col-md-12">
                        <button class="btn btn-primary btn-sm" id="submit-paper" data-toggle="modal" data-target="#modalsubmit">Submit paper</button>
                      </div>


                    </div>
                  </div><br>';
                        }else{
                            echo '<div class="container">
                    <div class="row">
                      <div class="col-md-12" style="font-size: 18pt; font-weight: bold;">
                        Paper Revision <em style="color: red">*Required</em>
                      </div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                       <br><br>
                      <div class="col-md-12"><em style="font-size: 15pt; font-weight: bold; "><a style="color: red" href="'. 'submitfinal.php?book_id='. $book_id .'">--> Submit your final paper Here <--</a></em></div>


                    </div>
                  </div><br>';
                        }

                }else{
                  echo '<div class="container">
                    <div class="row">
                      <div class="col-md-12" style="font-size: 18pt; font-weight: bold;">
                        Paper Revision
                      </div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                       <br>
                      <div class="col-md-12">
                        <table class="table">
                          <thead>
                            <tr">
                              <td scope="col" style="width: 100%">Revision : <em id="fileloc" style="display: none;">'. $fileLoc .'</em> <em id="trail_id" style="display: none;">'. $trail_id .'</em> <a href="'. $fileLoc .'"><em>'. $str[1] .'</em></a></td>
                              <td scope="col">
                                <button class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#modaladdnew">Change Submitted Paper</button>
                              </td>
                            </tr>
                          </thead>
                        </table>
                      </div>

                    </div>
                  </div><br>';
                }

                  }elseif ($required==="pub") {
                    $con= $dbconfig -> getCon();
                    $query= "SELECT book.book_title, published.issn, published.journal, published.type, published.date FROM published INNER JOIN book ON book.book_id = published.book_id WHERE published.book_id = $book_id";
                    //echo $query;
                    $result = $con -> query($query);
                    if($result->num_rows>0){
                      echo '<div class="container">
                    <div class="row">
                      <div class="col-md-12" style="font-size: 18pt; font-weight: bold;">
                        Paper Publication
                      </div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                       <br><br>
                      <div class="col-md-12" >
                        <table class="table">
                          <thead style="font-size: 14pt; font-weight: bold">
                            <tr">
                              <td scope="col">Research Tittle</td>
                              <td scope="col">ISSN</td>
                              <td scope="col">Journal</td>
                              <td scope="col">Journal Type</td>
                              <td scope="col">Date</td>
                            </tr>
                          </thead><tbody>';
                      while($rowpub =$result->fetch_assoc()){
                        echo '<tr>
                              <td scope="col">'. $rowpub['book_title'] .'</td>
                              <td scope="col">'. $rowpub['issn'] .'</td>
                              <td scope="col">'. $rowpub['journal'] .'</td>
                              <td scope="col">'. $rowpub['type'] .'</td>
                              <td scope="col">'. $rowpub['date'] .'</td>
                            </tr>';

                      }
                      echo '</tbody></table>
                      </div>

                    </div>
                  </div><br>
              <br>';

                    }else{
                      echo '<div class="container">
                    <div class="row">
                      <div class="col-md-12" style="font-size: 18pt; font-weight: bold;">
                        Paper Publication <em style="color: red">*Required</em>
                      </div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                       <br>
                      <div class="col-md-12" >
                        <em style="color: red;">Please provide publication information to the research unit.</em>
                      </div>

                    </div>
                  </div><br><br>';
                    }

                  }elseif ($required==="dis"){
                    echo '<p id="book_id" style="display: none">'. $book_id .'</p>';
                    $con= $dbconfig -> getCon();
                    $query= "SELECT book.book_title, disseminated.type, disseminated.convension, disseminated.location, disseminated.date FROM `disseminated` inner JOIN book on disseminated.book_id = book.book_id WHERE disseminated.book_id = $book_id";
                    $result = $con -> query($query);

                     if($result->num_rows>0){
                      echo '<div class="container">
                    <div class="row">
                      <div class="col-md-12" style="font-size: 18pt; font-weight: bold;">
                        Paper Dissemination Information
                      </div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                       <br><br>
                      <div class="col-md-12">
                        <table class="table">
                          <thead style="font-size: 14pt; font-weight: bold">
                            <tr">
                              <td scope="col">Research Tittle</td>
                              <td scope="col">Dissemination Type</td>
                              <td scope="col">Convention</td>
                              <td scope="col">Location</td>
                              <td scope="col">Date</td>
                            </tr>
                          </thead><tbody>';

                          while ($rowdis= $result->fetch_assoc()) {
                            echo '   <td scope="col">'. $rowdis['book_title'] .'</td>
                              <td scope="col">'. $rowdis['type'] .'</td>
                              <td scope="col">'. $rowdis['convension'] .'</td>
                              <td scope="col">'. $rowdis['location'] .'</td>
                              <td scope="col">'. $rowdis['date'] .'</td>
                            </tr>';
                          }
                          echo '</tbody></table>
                      </div>

                    </div>
                  </div><br>
              <br>';
                  }

                }elseif ($required==="awards"){
                    ///echo "string";
                    $con= $dbconfig -> getCon();
                    $query= "SELECT book.book_title, awards.awards, awards.parties, awards.location, awards.description, awards.date from awards INNER JOIN book on book.book_id = awards.book_id WHERE awards.book_id = $book_id";
                    $result = $con -> query($query);

                     if($result->num_rows>0){
                      echo '<div class="container">
                    <div class="row">
                      <div class="col-md-12" style="font-size: 18pt; font-weight: bold;">
                        Paper Awards
                      </div>

                       <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                       <br><br>
                      <div class="col-md-12">
                        <table class="table">
                          <thead style="font-size: 14pt; font-weight: bold">
                            <tr">
                              <td scope="col">Research Tittle</td>
                              <td scope="col">Awards</td>
                              <td scope="col">Giving Parties</td>
                              <td scope="col">Location</td>
                              <td scope="col">Description</td>
                              <td scope="col">Date</td>
                            </tr>
                          </thead><tbody>';

                          while ($rowdis= $result->fetch_assoc()) {
                            echo '   <td scope="col">'. $rowdis['book_title'] .'</td>
                              <td scope="col">'. $rowdis['awards'] .'</td>
                              <td scope="col">'. $rowdis['parties'] .'</td>
                              <td scope="col">'. $rowdis['location'] .'</td>
                              <td scope="col">'. $rowdis['description'] .'</td>
                              <td scope="col">'. $rowdis['date'] .'</td>
                            </tr>';
                          }
                          echo '</tbody></table>
                      </div>

                    </div>
                  </div><br>
              <br>';
                  }else{
                    echo '<div class="container">
                    <div class="row">
                      <div class="col-md-12" style="font-size: 18pt; font-weight: bold;">
                        Paper Awards
                      </div>

                       <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                       <div class="col-md-12">
                       <br>
                       No awards receive yet.
                       </div>';
                  }

                }elseif ($required==="util"){
                    ///echo "string";
                    $con= $dbconfig -> getCon();
                    $query= "SELECT book.book_title, utilize.orgname, utilize.orgaddress, utilize.date from utilize INNER JOIN book on book.book_id = utilize.book_id WHERE utilize.book_id = $book_id";
                    $result = $con -> query($query);

                     if($result->num_rows>0){
                      echo '<div class="container">
                    <div class="row">
                      <div class="col-md-12" style="font-size: 18pt; font-weight: bold;">
                        Paper Utilization Information
                      </div>

                       <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                       <br><br>
                      <div class="col-md-12">
                        <table class="table">
                          <thead style="font-size: 14pt; font-weight: bold">
                            <tr">
                              <td scope="col">Research Tittle</td>
                              <td scope="col">Organization</td>
                              <td scope="col">Address</td>
                              <td scope="col">date</td>

                            </tr>
                          </thead><tbody>';

                          while ($rowdis= $result->fetch_assoc()) {
                            echo '   <td scope="col">'. $rowdis['book_title'] .'</td>
                              <td scope="col">'. $rowdis['orgname'] .'</td>
                              <td scope="col">'. $rowdis['orgaddress'] .'</td>
                              <td scope="col">'. $rowdis['date'] .'</td>

                            </tr>';
                          }
                          echo '</tbody></table>
                      </div>

                    </div>
                  </div><br>
              <br>';
                  }

                }

                }

              ?>
          </div>
              <br>







              <?php
                      $dbconfig= new dbconfig();
                      $con= $dbconfig -> getCon();
                      $query= "SELECT * FROM `comments` WHERE `trail_id` = $trail_id";
                      $result = $con -> query($query);
                      $row = $result->fetch_assoc();
                      $origin = $row['origin'];

              ?>
              <br>
              <div class="container">
                <div class="row">
                  <div class="col-md-7" style="font-size: 18pt; font-weight: bold;">Summary of Comments and Suggestion</div>
                  <div class="col-md-5" style="height: 35px; font-size: 15pt">Originator: <em><?php if($origin===""){echo "Not Available";}else{echo $origin; } ?></em></div>
                  <table class="table" style="border: 1px solid black; border-collapse: collapse;">

                    <tbody>
                      <?php
                      $dbconfig= new dbconfig();
                      $con= $dbconfig -> getCon();
                      $query= "SELECT * FROM `comments` WHERE `trail_id` = $trail_id";
                      $result = $con -> query($query);
                      if($result->num_rows>0){
                        echo '<thead>
                      <tr>
                        <td scope="col" style="width: 30%; border: 1px solid black; border-collapse: collapse;" ><b>Parts of Manuscript</b></td>
                        <td scope="col" style="width: 50%; border: 1px solid black; border-collapse: collapse;"><b>Comments / Suggestion</b></td>
                        <td scope="col" style="width: 15%; border: 1px solid black; border-collapse: collapse;"><b>Page</b></td>
                        <td scope="col" style="width: 5%; border: 1px solid black; border-collapse: collapse;"><b>Action</b></td>
                        </tr>
                    </thead><tbody>';
                        while ($rowCom = $result->fetch_assoc()) {

                          echo '<tr><td scope="col" style=" border: 1px solid black; border-collapse: collapse;">'. $rowCom['parts'] .'</td>
                      <td scope="col" style=" border: 1px solid black; border-collapse: collapse;">'. $rowCom['comments'] .'
                      </td>
                      <td scope="col" style=" border: 1px solid black; border-collapse: collapse;"> <input class="form-control input-md" id="pageno-'. $rowCom['id'] .'" type="text" style="font-weight: bold; pattern="[0-9-]{3}" name="'. $rowCom['id'] .'"readonly value="'. $rowCom['page'] .'"></td>
                      <td scope="col" style="width: 5%; border: 1px solid black; border-collapse: collapse;"><button class="btn btn-danger btn-md" id="page-edit[]" name="'. $rowCom['id'] .'">Edit</button></td></tr>';
                        }
                        echo "</tbody>";
                      }else{
                        echo '<thead>
                      <tr>
                        <td scope="col" style="width: 100%; border: 1px solid black; border-collapse: collapse;" ><center>No Comments yet.</center></td>
                        </tr>
                    </thead>';
                      }
                    ?>

                    </tbody>
                </table>
                 <a href="comment_reports.php?paper_trail=<?php echo $trail_id  ?>" target="_blank">
                <div class="btn btn-success">
                  Print Comments
                </div>
             </a>
                </div>
                <br>

                     <?php
                    $con= $dbconfig -> getCon();
                  $query= "SELECT `documents`, `orig_name` FROM `documents` WHERE `book_id` = $book_id LIMIT 5 ";
                  $result2 = $con -> query($query);
                  if($result2->num_rows>0){
                    echo '<br><br><div class="row">
                      <div class="col-md-12" style="font-size: 18pt; font-weight: bold;">
                       Files and Certificates
                      </div>

                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                        <br>

                        <div class="col-md-12">
                          <em style="color: red;">
                              <ul>';
                    while ($row=$result2->fetch_assoc()) {
                      echo '<li><a href="'. $row['documents'] .'">'. $row['orig_name'] .'</a></li>';
                    }
                    echo '</ul>
                          </em>

                        </div>
                        <div class="col-md-12" style="font-weight: bold; font-size: 14pt; padding-left: 30px; color: #0052cc; "><a style="text-decoration: underline;" href="documents.php?book_id='. $book_id .'">View all Documents of this paper</a></div>

                    </div>

                  </div><br>';
                  }

                  ?>


              </div>

                <br>
                <br>
                <br>
            </div>
           </div>

            <!--addnew  modal-->
                <div class="modal fade" id="modaladdnew" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">

                          <h4 class="modal-title" id="modal-title">Change Revision 1</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form id="fileForm-change">

                              <div class="form-group" style="">

                                <input type="file" class="form-control-file" id="file-change"  name="file">

                              </div>

                          </form>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-success" id="change">Submit</button>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="modal fade" id="modalsubmit" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">

                          <h4 class="modal-title" id="modal-title">Upload Revision </h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form id="fileForm-upload">

                              <div class="form-group" style="">

                                <input type="file" class="form-control-file" id="file-upload"  name="file-upload">

                              </div>

                          </form>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-success" id="uploadpaper">Submit</button>
                        </div>
                      </div>

                    </div>
                  </div>

                  <!--dissemination modal-->
                  <div class="modal fade" id="modaldis" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">

                          <h4 class="modal-title" id="modal-title-dis">Supporting Documents:</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form id="dis-form">

                            <div class="form-group">
                              <input type="file" name="myFile[]" id="dis-cert" class="form-control"
                                style= "font-size: 15px; font-weight: bold;" multiple>
                            </div>


                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" id="instructor-btn-dis-save" class="btn btn-success" style="float: right">SAVE</button>
                        </div>
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
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script src="js/searchdoc.js"></script>
    <script src="js/jquery.form.min.js"></script>
    <!-- Bootstrap -->
    <!--<script src="js/bootstrap.min.js"></script>-->
    <script type="text/javascript" src="js/on-process.js"></script>
    <script type="text/javascript" src="js/upload-revision.js"></script>


</body>
</html>
