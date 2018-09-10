<!DOCTYPE html>
<!-- ANNE -->
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <title>Supporting Documents - BUKSU RRMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/supporting.css">
</head>
<header>
   <?php
        include_once 'header.php';
     ?>

</header>
<body id="supportbody">
<div class="annesupport">
  <?php
      $book_id = $_GET['book_id'];

                          include_once 'connection.php';
                          $dbconfig = new dbconfig();
                          $conn = $dbconfig->getCon();
                          $query = "SELECT book_id, book_title FROM `book` WHERE book_id= " . $book_id;
                          $result = $conn->query($query);
                          if($result->num_rows>0){
                            while ($row=$result->fetch_assoc()) {
                              echo "<h1 class=\"annename\">" . $row['book_title'] ." </h1>";
                            }
                          }


  ?>


  <div class="annedocument" >
              <h3> SUPPORTING DOCUMENTS </h3>
                  <hr>


            <div class="supportdocu">
                      <ul class="anneul">

                          <?php
                              $book_id = $_GET['book_id'];

                          include_once 'connection.php';
                          $dbconfig = new dbconfig();
                          $conn = $dbconfig->getCon();
                          $query = "SELECT * FROM `documents` WHERE book_id = " . $book_id;
                          $result = $conn->query($query);
                          if($result->num_rows>0){
                            while ($row=$result->fetch_assoc()) {
                              echo "<li> <a  href=\"". $row['documents'] ."\">Disseminated Certificate </a> </li> <br>";
                            }
                          }


  ?>


                      </ul>
                  </div>
                  <br/>
                  <br/>

                

</div>
</div>

</body>
<footer style="padding-top: 5px;">
  <?php include_once 'footer.php' ?>

</footer>
</html>
