<?php

//session_start();
$book_id = $_GET['book_id'];
if(!isset($_GET['book_id'])){
  header("Location: index.php");
}
//$accid = $_GET['gid'];
//echo $gid;

  include_once 'connection.php';

  $dbconfig = new dbconfig();
  $conn = $dbconfig->getCon();
  $query = "SELECT book_title FROM `book` WHERE book_id = $book_id";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();
  $title = strtoupper($row['book_title']);



  $dbconfig = new dbconfig();
  $conn = $dbconfig->getCon();
  $query = "SELECT author.a_id, CONCAT(author.a_lname, ', ' , author.a_fname, ' ' , SUBSTRING(author.a_mname, 1,1) , '.' ) as 'authors' FROM `author` INNER JOIN junc_authorbook on junc_authorbook.aut_id = author.a_id WHERE junc_authorbook.book_id = $book_id";
  $result = $conn->query($query);
  $author = array();

  while($row = $result->fetch_assoc()){
    array_push($author, strtoupper($row['a_id'] . "-" .$row['authors']));
  }
  //echo $title;
  //print_r($author);

?>


<!DOCTYPE html>
<!-- ANNE -->
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>Author - BUKSU RRMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/groupdoclist.css">
</head>
<body id="annegroupbody" >
  <div class="historydiv" style="background-color:white;">
   <?php
        include_once 'header2.php';
     ?>
   <?php

 ?>
   <div class="annegroup">

  </div>
        <!--  <div class="annegroupbook"> -->
		<table class="subtable" style="width:100%; padding: 10px">
            <tr>
                <td style="width:50%; text-align:left; font-family: helvetica"> <h2 style="color: darkblue"><i> <?php echo $title ?> </i></h2>
					<h3 style="text-align:left; font-family: helvetica"> AUTHORS: </h3>
				</td>
            </tr>
			<tr>
                <td style="text-align:left; font-family: helvetica; font-size: 14pt">
                  <?php
                    foreach ($author as $key ) {
                      $str = explode("-", $key);
                      echo "<li style= \"margin-left: 5%\"><a href=\"author.php?aut_id=$str[0]\" target=\"_blank\">
                      $str[1];
                      </a> </li>";
                    }

                  ?>
					         <!--<li style= "margin-left: 5%"> Gonzales, Loyd </li>-->

				        </td>

            </tr>
        </table>
		</br>
        <br>
        <br>
                 <b style="font-size: 14pt; padding: 10px">RESEARCH HISTORY </b>

                <hr>
      <!--    </div> -->
             <div class="annegrouplist">



                    <table class="grouptable" style="width:100%; margin-left: 2%">
						          <tr>
							           <td style="width:50%; text-align:left; font-family: helvetica">

                          <?php

                            include_once 'connection.php';

                            $dbconfig = new dbconfig();
                            $conn = $dbconfig->getCon();
                            $query = "SELECT * FROM `bookhistory` WHERE book_id = $book_id ORDER by id DESC";
                            //`id`, `book_id`, `book_stat`, `date`
                            $result = $conn->query($query);

                            if($result->num_rows>0){
                              while ($row = $result->fetch_assoc()) {




                          //<!--- FOR UNPUBLISHED, PROPOSED, COMPLETED ---->
                                if($row['book_stat']==="Unpublished" || $row['book_stat']==="Proposed" || $row['book_stat']==="Completed"){

                                  echo "<table id=\"pub\" style=\"\">
                                    <tr>
                                      <td rowspan=\"2\"><span id=\"circle\" style=\"background: black; width: 10px; height: 50px; float: left;\"></span></td>
                                      <td colspan=\"5\"><em style=\"font-weight: bold; font-size: 14pt\">UNPUBLISHED</em></td>
                                    </tr>
                                    <tr>
                                      <td>Date:</td>
                                      <td><em>8-20-2018</em></td>
                                    </tr>

                                  </table>
                                  <br>";

                                }else if($row['book_stat']==="Published"){
                                  //<!--- FOR PUBLISHED ---->

                                   $dbconfig = new dbconfig();
                                    $conn = $dbconfig->getCon();
                                    $query = "SELECT * FROM `published` WHERE book_id = $book_id";
                                    //`id`, `book_id`, `issn`, `journal`, `type`, `date`
                                    $resultpub = $conn->query($query);
                                    if($resultpub->num_rows>0){
                                      while ($rowpub = $resultpub->fetch_assoc()) {

                                     echo "<table id=\"pub\" style=\"\">
                                      <tr>
                                        <td rowspan=\"6\"><span id=\"circle\" style=\"background: black; width: 10px; height: 120px; float: left;\"></span></td>
                                        <td colspan=\"5\"><em style=\"font-weight: bold; font-size: 14pt\">PUBLISHED</em></td>
                                      </tr>
                                      <tr>
                                        <td>Date:</td>
                                        <td><em>" . $rowpub['date'] ."</em></td>
                                      </tr>
                                        <td>Journal Name:</td>
                                        <td><em>". $rowpub['journal'] ."</em></td>
                                      <tr>
                                      <tr>
                                        <td>ISSN:</td>
                                        <td><em>". $rowpub['issn'] ."</em></td>
                                      </tr>
                                      <tr>
                                        <td>Journal Type:</td>
                                        <td><em>". $rowpub['type'] ."</em></td>
                                    </table>
                                    <br>";

                                      }
                                    }

                                }else if($row['book_stat']==="Disseminated / Presented"){
                                   //<!--- FOR DISSEMINATED / PRESENTED ---->

                                    $dbconfig = new dbconfig();
                                    $conn = $dbconfig->getCon();
                                    $query = "SELECT * FROM `disseminated` WHERE book_id = $book_id";
                                    //`id`, `book_id`, `type`, `convension`, `location`, `date`
                                    $resultpub = $conn->query($query);
                                    if($resultpub->num_rows>0){
                                      while ($rowpub = $resultpub->fetch_assoc()) {

                                   echo "<table id=\"pub\" style=\"\">
                                    <tr>
                                      <td rowspan=\"6\"><span id=\"circle\" style=\"background: black; width: 10px; height: 120px; float: left;\"></span></td>
                                      <td colspan=\"5\"><em style=\"font-weight: bold; font-size: 14pt\">DISSEMINATED / PRESENTED</em></td>
                                    </tr>
                                    <tr>
                                      <td>Date:</td>
                                      <td><em>". $rowpub['date'] ."</em></td>
                                    </tr>
                                      <td>Convention:</td>
                                      <td><em>". $rowpub['convension'] ."</em></td>
                                    <tr>
                                    <tr>
                                      <td>Convention Type:</td>
                                      <td><em>". $rowpub['type'] ."</em></td>
                                    </tr>
                                    <tr>
                                      <td>Location:</td>
                                      <td><em>". $rowpub['location'] ."</em></td>
                                    </tr>

                                    </tr>
                                  </table>

                                  <br>";
                                    }
                                  }

                                }else{
                                  //<!--- FOR UTILIZE ---->

                                    $dbconfig = new dbconfig();
                                    $conn = $dbconfig->getCon();
                                    $query = "SELECT * FROM `utilize` WHERE book_id = $book_id";
                                    //`id`, `book_id`, `orgname`, `orgaddress`, `date`
                                    $resultpub = $conn->query($query);
                                    if($resultpub->num_rows>0){
                                      while ($rowpub = $resultpub->fetch_assoc()) {
                                   echo "<table id=\"pub\" style=\"\">
                                    <tr>
                                      <td rowspan=\"6\"><span id=\"circle\" style=\"background: black; width: 10px; height: 110px; float: left;\"></span></td>
                                      <td colspan=\"5\"><em style=\"font-weight: bold; font-size: 14pt\">UTILIZED</em></td>
                                    </tr>
                                    <tr>
                                      <td>Date:</td>
                                      <td><em>". $rowpub['date'] ."</em></td>
                                    </tr>
                                      <td>Organization / Institution Name:</td>
                                      <td><em>". $rowpub['orgname'] ."</em></td>
                                    <tr>
                                    <tr>
                                      <td>Address:</td>
                                      <td><em>". $rowpub['orgaddress'] ."</em></td>
                                    </tr>

                                    </tr>
                                  </table>";

                            }
                          }
                        }
                      }
                    }

                            ?>

							           </td>
						          </tr>

                    </table>
                      <br/>




                  </div>


                  <hr>
                </div>
 </body>
 <footer style="padding-top: 5px;">
   <?php include_once 'footer.php' ?>

 </footer>
</html>
