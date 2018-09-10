<?php
	if(isset($_SESSION)){
    print_r($_SESSION);
  }else{
    echo "Not Login";
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Accounts </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- Custom Theme Style -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/custom.min.css">

</head>

  <body class="nav-md">
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
                <span> USERNAME </span>
                <h2> Instructor </h2>
              </div>
            </div>
            <!--/menu profile quick info-->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <div class="nav side-menu">
				          <ul>
                    <a href= "MyDocx.php"> MY DOCUMENTS </a>
                  </ul>
                  <ul>
                    <a href= "accounts.php"> ACCOUNTS </a>
                  </ul>
                  <ul class="nav child_menu">
						          <a class= "dashboard-active" href= "activateAcc.php"> Activate Accounts </a>
                  </ul>
                </br>
                  <ul>
                    <button id= "btn-logout"><strong> <a href="#Logout"> LOGOUT </a></strong>
                  </button></ul>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
			<div class= "frm-search">
				
				<b> Search Accounts </b>
				<input type="text" placeholder="Search.." name="search"><button type="submit"> Search </button> </br></br>
				<hr></br></br>
				<div class= "div-voidmain">
					<table style= "width: 60%">
						<tr style= "width: 100%">
							<td> VOIDMAIN </td>
							<td style= "float: right"> 
								<select style="width:150px">
									<option > select </option>
									<option value="volvo">Volvo</option>
									<option value="saab">Saab</option>
								</select>
							</td>
							<td> <button type="submit"> Submit </button> </td>
						</tr>
					</table>
			</div>
          <!-- top tiles -->
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

  </body>
</html>
