
<!DOCTYPE html>
<!-- TAPAYAN -->
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title> User - BUKSU RRMS </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/userchangepass.css">
</head>
<body id="userchangepassbody">
   <?php
        include_once 'header.php';
     ?>
   <?php
   $bookid = $_GET['book_id'];
 ?>
	<div class="userchangepass">
			<form id= "frm-userchangepass" >
				<table style="font-size: 15px" style= "margin: auto">
					<tr>
						<td> Current Password :</td>
						<td> <input type="password" placeholder="Enter Password" name="psw" id="oldpsw" required> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> New Password :</td>
						<td> <input type="password" placeholder="Enter New Password" name="psw" id="npsw" required> </td>
					</tr> </br>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> </td>
						<td> </td>
					</tr>
					<tr>
						<td> Retype New Password :</td>
						<td> <input type="password" placeholder="Re-enter New Password" name="ncpsw" id="ncpsw" required> </td>
					</tr>
				</table>
			</form></br></br>
		<hr>
		<button type="submit" class="btn-userchangepass" id="btn-userchangepass"> SAVE </button>
	</div>
 </body>
 <footer style="padding-top: 5px;">
   <?php include_once 'footer.php' ?>

 </footer>
</html>
