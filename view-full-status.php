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
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Administrator </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="css/temp.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/custom.min.css">


</head>

  <body class="nav-md" style="background-color: gray">
    <p style="display: none;" id="trail_id"><?php echo $trail_id;?></p>
    <p style="display: none;" id="fileloc"><?php echo $fileLoc;?></p>
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
            <!--/menu profile quick info-->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <div class="nav side-menu">
					<ul><a  href="instructordashboard.php"> MY FINISHED RESEARCH </span></a></ul>
          <ul><a  class= "dashboard-active" href="instructor-on-process-paper.php"> MY On-Process RESEARCH </span></a></ul>
					<ul><a href="accesscode_instruct.php"> ACCESS CODE </a> </ul>
					 <?php
                            $d = Date('Y-m-d');
                            $yr = explode("-", $d);
                            echo '<ul><a href="book_reports.php?title=&dept=&status=&author=&from=0&to=' . $yr[0] . '" target="_blank"> REPORTS </a> </ul>';
                          ?>
					</br>
					<ul><a href="index.php"> Back to Home </a> </ul>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main" style= "min-height: 700px;">
			<div id= "instructor-frm-search" class= "frm-search" style= "font-size: 18px">


        

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
            //$origin = $row['origin'];
          }
          
        ?>
        

				<b style="font-size:24pt;"><?php echo $row['book_title']; ?></b><br>
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
        <br><br><br>
         
				<div id= "instructor-div-voidmain" class= "div-voidmain">
					<div class="container">
            <div class="row">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" colspan="3"><h3><?php 
                    //$date =  date('l d F Y');
                    $long = strtotime($date);
                    $date = date('F d, Y', $long);
                    $time = date('h:i:s a', $long);

                    echo 'Paper status: <em style="font-size: 18pt; font-weight: bold">' . $paper_stat . '</em>' ?></h3></th>
                    
                    
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td scope="col" style="width: 15%">Date</td>
                    <td scope="col" style="width: 85%"><?php echo $date . " at " . $time ?></td>
                  </tr>
                  <tr>
                    
                    <td scope="col">Description</td>
                    <td scope="col"><?php echo($desc)?></td>
                  </tr>
                  
                  <?php

                    
                  ?>

                  
                  
                </tbody>
                <th></th>
              </table>

              <br>
              <?php
                if($required!==""){

                  if($required==="paper"){
                    if($fileLoc===""){
                      echo '<div class="container">
                    <div class="row">
                      <div class="col-md-12" style="font-size: 18pt; font-weight: bold;">
                        Paper Revision <em style="color: red">*Required</em>
                      </div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                       <br><br>
                      <div class="col-md-12"><em style="font-size: 15pt; font-weight: bold; "><a style="color: red" href="'. 'add-research.php' .'">--> Submit your final paper Here <--</a></em></div>
                    
                      
                    </div>
                  </div><br>';
                }else{
                  echo '<div class="container">
                    <div class="row">
                      <div class="col-md-12" style="font-size: 18pt; font-weight: bold;">
                        Paper Revision
                      </div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                       <br><br>
                      <div class="col-md-12">
                        <table class="table">
                          <thead>
                            <tr">
                              <td scope="col" style="width: 100%">Revision 1: <a href="'. $fileLoc .'"><em>'. $str[1] .'</em></a></td>
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
                       <br><br>
                      <div class="col-md-12" >
                        <table class="table">
                          <thead>
                            <tr">
                              <td scope="col" style="width: 100%"><em style="color: red;">Please provide publication information to the research unit.</em></td>
                              
                            </tr>
                          </thead>
                        </table>
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
                  $con= $dbconfig -> getCon();
                  $query= "SELECT `documents`, `orig_name` FROM `documents` WHERE `book_id` = $book_id";
                  $result2 = $con -> query($query);
                  if($result2->num_rows>0){
                    echo '<br><br><div class="row">
                      <div class="col-md-10" style="font-size: 18pt; font-weight: bold;">
                       Files and Certificates
                      </div>
                      <div class="col-md-2"><button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#modaldis">Add Files</button></div>
                      <div class="col-md-12" style="width: 100%; height: 2px; background-color: blue;"></div>
                        <br>
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
          
                    </div>
                    
                  </div><br>';
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
                        Paper Dissemination Information
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
              <br>
              
                          
                            
                          
                        

              <?php
                      $dbconfig= new dbconfig();
                      $con= $dbconfig -> getCon();
                      $query= "SELECT * FROM `comments` WHERE `trail_id` = $trail_id";
                      $result = $con -> query($query);
                      $row = $result->fetch_assoc();
                      $origin = $row['origin'];

              ?>
              
              <div class="container">
                <div class="row">
                  <div class="col-md-7" style="font-size: 18pt; font-weight: bold;">Summary of Comments and Suggestion</div>
                  <div class="col-md-5" style="height: 35px; font-size: 15pt">Originator: <em><?php if($origin===""){echo "Not Available";}else{echo $origin; } ?></em></div>
                </div>
                
              </div>
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
                <br>
                <br>
                <br>
            </div>
            
          </div>
					
				

			 </div>

          <!-- top tiles -->
          <div class="row tile_count"></div>
          <!-- /top tiles -->
            </div>
        </div>
        <!-- /page content -->

      </div>
      <!--addnew  modal-->
                <div class="modal fade" id="modaladdnew" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" id="modal-title">Change Revision 1</h4>
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

                  <!--dissemination modal-->
                  <div class="modal fade" id="modaldis" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" id="modal-title-dis">Supporting Documents:</h4>
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


      <!--- -->
  <!--<div class="modal fade" id="ModaladdNew" role="dialog">
    <div class="modal-dialog">
    
     
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modal-title">Add New Research</h4>
        </div>
        <div class="modal-body">
          <form action="/action_page.php">
            <div class="form-group">
                <label for="fname">Title:</label>
                <input type="text" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="fname">Username:</label>
                <input type="text" class="form-control" id="reg_uname">
            </div>
              <div class="form-group">
                <label for="mname">Password:</label>
                <input type="Password" class="form-control" id="reg_upass">
            </div>
            <div class="form-group">
                <label for="acc_type">Account Type:</label><br>
                <select class="btn btn-primary" id="acc_type">
                  <option class="btn btn-default">User</option>
                  <option class="btn btn-default">Admin</option>
            </select>
              </div>
              <div class="form-group">
                <center>
                  <button type="button" class="btn btn-success" id="btn_login_register">Register</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </center>
                
              </div>
              <!--<div class="form-group">
                <fieldset>
                  <b style="color: red">For Demo Purposes</b><br>
                  Admin login:<br>Username = admin<br>Password = 1234<br><br>User login:<br>Username = loyd<br>Password = 1111
                </fieldset>
                
              </div>-->
              
              
          <!--</form>
        </div>
        <div class="modal-footer">
          <a href="#"><p class="text-center" style="font-weight: bold;" id="reg">Register</p></a>
        </div>
      </div>
      
    </div>
  </div>-->



    </div>

    <!-- jQuery -->

    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery.form.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/jquery.form.min.js"></script>
    <!-- Bootstrap -->
    <!--<script src="js/bootstrap.min.js"></script>-->
    <script type="text/javascript" src="js/on-process.js"></script>
    <script type="text/javascript" src="js/upload-revision.js"></script>
    <!-- Custom Theme Scripts -->
    <!--<script src="js/custom.min.js"></script>-->

  </body>
</html>
