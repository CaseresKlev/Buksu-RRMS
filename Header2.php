<?php



if(isset($_SESSION['uid'])){
   //print_r($_SESSION);
	//print_r($_SESSION);
  $accname = $_SESSION['gname'];
  $acctype = $_SESSION['type'];
  //echo($acctype);

  }else{
    //header("Location: index(loyd).php");
    session_start();
    if(isset($_SESSION['uid'])){
    	$accname = $_SESSION['gname'];
  	$acctype = $_SESSION['type'];
    }
    
    //print_r($_SESSION);
  //$accname = $_SESSION['gname'];
  //$acctype = $_SESSION['type'];
  //echo($acctype);
  }
//print_r($_SESSION);


?>

<!DOCTYPE html>
<html>
<title> Header </title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap-min-4.1.0.css">
<link rel="stylesheet" type="text/css" href="css/header2.css">

<script defer src="js/solid.js"></script>
<script defer src="js/fontawesome.js"></script>

</head>

<body>
<div class="container-fluid" id="header-bg">
	<div class="row"  >
		<!--<div class="col-md-4">
			<img src="img/1.png" width="100px;" height="160px;" style="padding-top: 15px;">
			<img src="img/BukSU Logo.png" width="140px;" height="135px;">
		</div>
		<div class="col-md-8">
			<p>Bukidnon State University<br>Research Record System</p>
		</div>-->
		<table class="table" style="width: 100%">
		<tr>
			<td width="12%"><img width="100%" height="60%" style="display:block" src="img/1.png" ></td>
			<td width="15%"> <img width="100%" style="display:block" src="img/BukSU Logo.png"></td>
			<td> <div class="header_banner" ><span><mark><h1> Research Record Management System</h1> </mark></span></div></td>
		</tr>
	</table>
	</div>
	
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#" id="brand" style="display: none">BukSU-RRMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Researches
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php">All</a>
        	<a class="dropdown-item" href="index.php?filter=instructor">Instructort Research</a>
        	<a class="dropdown-item" href="index.php?filter=student">Student Research</a>
       	</div>
       
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://research.buksu.edu.ph/index.php">BukSU Journal</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    	 <form class="form-inline my-3 my-lg-0" style="padding-right: 40px;">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" id="skey" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" id="btn-search-home" type="button">Search</button>
	    </form>
	    <!--<li class="nav-item active" id="userli" style="padding-left: 20px; padding-right: 20px;">
	    	<div class="row">
	    			<a class="nav-link" href="#" style="color: yellow;"><i class="fas fa-user fa-lg" style="color: white;" ></i>&#9; Login</a>
	    	</div>
      	</li>-->
      	<li class="nav-item dropdown">


      	<?php
      		if(isset($_SESSION['uid'])){
      			echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: yellow"><i class="fas fa-user fa-lg" style="color: white;" ></i>&#9;' . $accname . '
     	 </a>';
      		}else{
      			echo '<a class="nav-link" href="new-login.php" id="navbarDropdown" role="button"  style="color: yellow"><i class="fas fa-user fa-lg" style="color: white;" ></i>&#9;Login
     	 </a>';
      		}
      	?>
          

         <div class="dropdown-menu " aria-labelledby="navbarDropdown">
        	<?php
					

						if(isset($_SESSION['uid'])){
							if($acctype==="INSTRUCTOR" || $acctype==="admin"){
								echo '<a class="dropdown-item" href="admindashboard.php">My Dashboard</a>';
							}else{
								echo '<a class="dropdown-item" href="groupdoclist.php?gid='. $_SESSION['uid'] .'">My Research</a>';
								echo '<a class="dropdown-item" href="userchangepass.php">Change Password</a>';
							}
								echo '<a class="dropdown-item" href="logout.php">LOGOUT</a>';
					} ?>
        </div>
        		

        
        	
          	
          	
          	
       
      </li>
    </ul>

   

  </div>
</nav>
<div class="con">
	
</div>

 <script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/bootstrap.min-4.1.0.js"></script>
<script type= "text/javascript" src= "js/header.js"></script>
<script type="text/javascript">
		if($( window ).width()<800){
			$("#header-bg").hide();
			$("#brand").show();
		}else{
			$("#header-bg").show();
			$("#brand").hide();
		}
	$( window ).resize(function(){
		//alert($( window ).width());
		var wd = $( window ).width();
		if(wd<700){
			$("#header-bg").hide();
			$("#brand").show();
		}else{
			$("#header-bg").show();
			$("#brand").hide();
		}
		
	})
</script>


</body>
</html>
<!--TAPAYAN -->
