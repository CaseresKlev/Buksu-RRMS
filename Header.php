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

<link rel="stylesheet" href= "css/header.css">
<link rel="stylesheet" href= "css/search2.css">

</head>

<body class= "header_body">
<div class="header" style= "width= 70%; margin: auto;" >
	<table width=100%>
		<tr>
			<td width="10%"><img width="100%" height="40%" style="display:block" src="img/1.png" ></td>
			<td width="15%"> <img width="100%" style="display:block" src="img/BukSU Logo.png"></td>
			<td> <div class="header_banner" ><span><mark> Research Record Management System </mark></span></div></td>
		</tr>
	</table>
	<br>
  <div class="header_nav1">

			<ul id= "nav-ul">
				<li><a href="index.php">Home</a></li>
				<li><a href="http://research.buksu.edu.ph/index.php" target="_blank">BukSU Journal</a></li>
				<!--<li><a href="#plagiarism">Plagiarism</a></li>
				<li style="float:right"><a class= "user-dropdown">User</a></li>-->
				<div class="dropdown" style="float:right">
					<a class="dropbtn" id="userli" >User</a>
					<?php
					echo "<div class="."\"dropdown-content\"" . ">";

						if(isset($_SESSION['uid'])){
							if($acctype==="INSTRUCTOR" || $acctype==="admin"){
								echo "<a href=" . "\"admindashboard.php\"" . "> My Dashboard </a>";
							}else{
								echo "<a href=". "\"groupdoclist.php?gid=" . $_SESSION['uid'] . "\"" . "> My Research </a>";
								echo "<a href=". "\"userchangepass.php\"" . "> Change Password </a>";
							}
								echo "<a href=". "\"logout.php\"" . ">LOGOUT</a>";
					} ?>
					</div>
		</div>
				<li style="float:right;" id="btnLoginOut" ><a href="new-login.php">Login</a></li>
				<li style="float:right;" id="searchbtn">Search</li>
			</ul>


	<!--<u><a href="#username" style= "color: white;"> username </a></u>
	<a class="header_login" href="#login">Login</a>
	<button class= "header_btn"> Search </button>-->
  </div>
  <!--<div style= "display: none;" class="header_search-container" id="search-container">-->
  	<div style= "display: none;"  id="modal">

		<form action="searchcontent.php">
		<div class= "form-container" 
		style= "padding: 3%; background-color: rgba(102, 131, 154, 0.51); width: 100%; padding: 3%;">
		<span class="close" 
		style= "float: right; cursor: pointer; padding: 2px 6px 0px 5px; border-radius: 50%;" 
		onclick="document.getElementById('modal').style.display='none'"> &times; </span>
		<table id="tbl_search" style= "margin: auto;">
			<tr>
				<td> </td>
				<td> </td>
				<td> </td>
			</tr>
			<tr>
				<td> </td>
				<td style= "width: 85%"> <input type="text" placeholder="Search.." name="search" id="skey" style= "width: 95%; padding-bottom: 3%; padding-top: 3%;"> </td>
				<td> <button type="button" id="btn-search-home" style= "font-family: helvetica; padding: 15%; border-radius: 10%;"> Search </button> </td>
			</tr>
			<tr>
				<td></td>
				<td style= "padding-top: 8%;">

					<label class="tbl-search_container"> Title
						<input type="radio" checked="checked" name="radio" id="search_title">
						<span class="tbl-search_checkmark"></span>
					</label>
				</td>
			<tr>
				<td></td>
				<td>
					<label class="tbl-search_container" id="search_key" style= "float: left;"> Keywords
						<input type="radio" name="radio" id="search_kw">
						<span class="tbl-search_checkmark"></span>
					</label>
				</td>
				<td></td>
			</tr>
			<tr>
					<td></td>
				<td class="fordate" colspan="2">
				Date: </br>
                    <input type="number" width="100%"  name="pubdate" id="filterdate" placeholder="" style= "padding: 2%">
				</td>
			</tr>

			</tr>
		</table>
		</div>
		</form>
  </div>
</div>
<script type= "text/javascript" src= "js/jquery-3.3.1.js"></script>
<script type= "text/javascript" src= "js/header.js"></script>
<?php if(!isset($_SESSION['uid'])){
	echo "<script>
			$('#btnLoginOut').show();
			$('#userli').hide();
		</script>";
	//print_r($_SESSION);
}else{
	echo "<script>
			$('#btnLoginOut').hide();
			$('#userli').html(\"" . $_SESSION['gname'] . "\");
			$('#userli').css(\"color\", \"yellow\");
		</script>";
} ?>

</body>
</html>
<!--TAPAYAN -->
