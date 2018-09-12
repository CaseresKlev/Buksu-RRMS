<?php

  session_start();
  //print_r($_SESSION);

  if(isset($_SESSION['uid'])){
    //print_r($_SESSION);
  }else{
    header("Location: index.php");
  }

  $accname = $_SESSION['gname'];
  $acctype = $_SESSION['type'];
  $uid = $_SESSION['uid'];
  if($acctype==="STUDENT"){
    header("Location: index,php");
  }
  /*
  if($acctype==="admin"){
    //echo "Admin ANG NAKALOGIN";
    header("Location: admindashboard.php");
  }else if($acctype==="INSTRUCTOR"){
    //echo "Instructor ang naka login";


  }else if($acctype==="STUDENT"){
    header("Location: index.php");
  }

*/
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
            <?php
              if ($acctype==="INSTRUCTOR") {
                echo '<ul class="list-unstyled components">
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

                </ul>';
              } else {
                echo '<ul class="list-unstyled components" style="margin-left: 10%">
                    <li class="active">
                        <a href="admindashboard.php">Research
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
                        <a href="book_reports.php?title=&dept=&status=&author=&from=0&to=2018" target="_blank">Reports</a>
                    </li>
                    <li>
                        <a href="dept.php">Department</a>
                    </li>
                </ul>'
              }


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
           <p id="receiver_id" style="display: none">0</p>
           <div class="container">
               <div class="row" style="padding-left: 15px;">
                   <h2>My Inbox</h2>
               </div>
               <hr>
               <div class="row">
                   <div class="col-md-4">
                     <label for="contact-list">Select Contact</label>
                        <select class="form-control input-xs" id="contact-list">
                            <option></option>
                        <?php
                        include_once 'connection.php';
                            $dbocnfig = new dbconfig();
                            $con = $dbocnfig->getCon();
                            //$receiver_name = "";
                            if(isset($_GET['search'])){

                            }
                            $query = 'SELECT `id`, `g_name` FROM `account` WHERE type = "INSTRUCTOR" or type = "admin"';
                            $result = $con->query($query);
                            if($result->fetch_assoc()){
                                while ($row=$result->fetch_assoc()) {
                                    echo $row['g_name'];
                                   if($uid!==$row['id']){
                                    echo '<option value="' . $row['id'] . '-'. $row['g_name'] .'">'. $row['g_name'] .'</option>';
                                   }
                                }
                            }
                        ?>


                        </select>
                   </div>
                   <div class="col-md-2" style="padding-top: 32px;">

                       <button class="btn btn-primary" id="contact-selected" style="float: left;">Select</button>
                   </div>
                   <div class="col-md-4">
                    <label for="contact-list">Search Contact</label>
                       <input type="text" placeholder="journal name" id="contact-search" name="contac-search" class="form-control">
                   </div>
                   <div class="col-md-2" style="padding-top: 32px;">

                       <button class="btn btn-primary" style="float: left;" id="btn-search-contact">Search</button>
                   </div>

               </div>
           </div>
           <br>
           <br>

           <div class="container" id="msg-msg-list">
            <?php
                include_once 'connection.php';
                $dbocnfig = new dbconfig();
                $con = $dbocnfig->getCon();
                $receiver_name = "";
                $query = "SELECT account.id, account.g_name as 'sender', messages.sender, messages.receiver, messages.msg, messages.date, messages.seen FROM `messages` INNER JOIN account on account.id = messages.sender WHERE `sender` = 1 or `receiver` = 1 ORDER BY messages.date ASC LIMIT 20";
                $result = $con->query($query);

                $inboxlist = array();
                if($result->num_rows>0){
                    while ($row=$result->fetch_assoc()) {

                        if($row['sender']!==$uid){
                            if(!in_array($row['sender'], $inboxlist)){
                                array_push($inboxlist, $row['sender']);
                            }

                        }
                        if($row['receiver']!==$uid){
                            //echo $row['receiver'] . "!";
                            if(!in_array($row['receiver'], $inboxlist)){
                                array_push($inboxlist, $row['receiver']);
                            }
                        }



                        /*if($row['id']!==$uid){
                            echo '<div class="col-md-12" id="msg-block[]" name="'. $row['id'] .'-'. $row['sender'] .'" style="background-color: #1affa3">

                    <a href="#" name="'. $row['id'] .'">
                    <i class="fas fa-envelope fa-lg" id="msg-list" style="float: left;"></i>
                    <h5 style="padding-left: 30px;"> '. $row['sender'] .' </h5>
                    </a>
                </div>';*/
                        }
                        $dbocnfig = new dbconfig();
                        $con = $dbocnfig->getCon();
                        $receiver_name = "";
                        $query = "SELECT `id`, `g_name` FROM `account` WHERE ";

                        $strr = "";
                        $count = 0;
                        foreach ($inboxlist as $key) {
                            if($count===0){
                                $strr .= "id = " . $key;
                                $count = 1;
                            }else{
                                $strr .= " or id = " . $key;
                            }

                        }

                        $query .= $strr;
                        //echo $query;

                        $result = $con->query($query);
                        if($result->num_rows>0){
                            while ($row=$result->fetch_assoc()) {
                                echo '<div class="col-md-12" id="msg-block[]" name="'. $row['id'] .'-'. $row['g_name'] .'" style="background-color: #1affa3">

                    <a href="#" name="'. $row['id'] .'">
                    <i class="fas fa-envelope fa-lg" id="msg-list" style="float: left;"></i>
                    <h5 style="padding-left: 30px;"> '. $row['g_name'] .' </h5>
                    </a>
                </div>';
                            }
                        }


                    }


            ?>


           </div>
           <br>
           <h4 style="display: none; padding-left: 15px;" id="txt-selcted-contact">Reading Conversation with <em id="talking-to" style="font-weight: bold;"></em></h4>
            <div class="container" style="overflow-y: auto; height: 300px; border: 1px solid #009999; display: none; margin-left: 15px;" id="chat">
                <br>
                <div class="container" id="messagewindow">
                    <div class="row">
                        <h3 style="color: red">Loading Please Wait</h3>
                    </div>
                </div>
                <div class="container" id="buffer" style="width: 80%; float: right; display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 style="font-weight: bold; float: right;"><?php echo "$accname"; ?></h5>
                        </div>
                        <div class="col-md-12" id="buff-msg-block" style="background-color:  #538cc6; height: auto; border-radius: 25px; padding-left: 25px;">
                            <h5 id="buff-msg">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                            </h5>
                            <div class="row" style="padding-left: 15px;">
                            <em style="color: red">sending...</em>
                            </div>
                        </div>
                    </div>

                </div>


</div>


                    <!--
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


                    -->



            </div>
            <br>
            <div class="container" id="chat-input" style="display: none; padding-left: 30px;">
                <div class="row">
                    <div class="col-md-10">
                        <textarea cols="50" style="width: 100%; resize: none" rows="4" id="txt-msg"></textarea>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success btn-md" id="btn-send-msg">Send</button>
                    </div>

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
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script src="js/searchdoc.js"></script>
    <script type="text/javascript" src="js/inbox.js"></script>
    <!--<script type="text/javascript" src="js/inbox.js"></script>-->
       <script type="text/javascript">
           $(document).ready(function(){

});
       </script>




</body>
</html>
