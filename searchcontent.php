<?php

$search = $_GET['search'];
//print_r($search);
$terms = split("-", $search);
//print_r($terms);

$key = $terms[0];
$by = $terms[1];
$date = $terms[2];

include_once 'connection.php';
$dbconfig = new dbconfig();
$conn = $dbconfig->getCon();



?>

<!DOCTYPE html>
<!-- ANNE -->
<html>
<head>
      <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>Search Content - BUKSU RRMS</title>
	         <meta name="viewport" content="width=device-width, initial-scale=1">
	       <link rel="stylesheet" type="text/css" href="css/searchcontent.css">
      </head>
<body>
    <?php
          include('header.php');
      ?>
        <div class="searchh">
      <center>  <h3>Search Results</h3>
      </div>
      <hr>
    <div class="content" style="width:100%">

      <div class="box" style="width:100%">
        <ul style="color:black;"class="lista">


          <?php

          $query ="";
          if($by=="title"){
              $dbconfig = new dbconfig();
              $conn = $dbconfig->getCon();
              $query = "SELECT `book_id`, `book_title` FROM `book` WHERE book_title like '%$key%' and pub_date like '%$date%'";
              $results = $conn->query($query);

              if($results->num_rows>0){
                    while ($row=$results->fetch_assoc()) {
    //print_r($row);
                     echo "<a href=\"bookdetails.php?book_id=" .$row['book_id'] . "\"> <li>" . $row['book_title'] . "</li></a>";
              }
          
              //echo $query;
          }else{
               echo "<center>No Results found!</center>";
          }
        }else{
              $dbconfig = new dbconfig();
              $conn = $dbconfig->getCon();
              $query = "SELECT DISTINCT (book.book_id), book_title FROM book INNER JOIN junc_bookkeywords on book.book_id = junc_bookkeywords.book_id INNER JOIN keywords on junc_bookkeywords.keywords_id = keywords.id WHERE keywords.key_words like '%pacifi%' and book.pub_date like '%2018%'";
              $results = $conn->query($query);

              $id = array();
              if($results->num_rows>0){
                while ($row2=$results->fetch_assoc()) {
                   echo "<a href=\"bookdetails.php?book_id=" .$row2['book_id'] . "\"> <li>" . $row2['book_title'] . "</li></a>";
                }
           
        }else{
           echo "<center>No Results found!</center>";
        }
      }
//$query = "SELECT `book_id`, `book_title` FROM `book` WHERE book_title like '%war%' and pub_date like '%2018%'";

        

          ?>
         
          

        </ul>
        <br>

</div>
</div>




</body>
  <?php  include('footer.php'); ?>
</html>
