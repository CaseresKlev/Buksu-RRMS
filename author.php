<?php

if(isset($_SESSION['uid'])){
  $auth_id = $_GET['aut_id'];
}else{
  session_start();
  $auth_id = $_GET['aut_id'];
}


$temp_id;
$arrBook = array();
                          
include_once 'connection.php';
$dbconfig = new dbconfig();
$con = $dbconfig->getCon();
$query = "SELECT book.book_id FROM book INNER JOIN junc_authorbook ON book.book_id = junc_authorbook.book_id WHERE junc_authorbook.aut_id = $auth_id";
$result = $con->query($query);
                              
if ($result->num_rows>0) {
    while ($row=$result->fetch_assoc()) {
          $temp_id = $row['book_id'];
          array_push($arrBook, $temp_id);
    }
}

$allowed = 0;
foreach ($arrBook as $key) {
  $dbconfig = new dbconfig();
  $con = $dbconfig->getCon();
  $query = "SELECT `accid` FROM `groupdoc` WHERE `book_id` = $key";
  $result = $con->query($query);
                              
if ($result->num_rows>0) {
    while ($row=$result->fetch_assoc()) {
          if($row['accid']===$_SESSION['uid']){
            $allowed = 1;
          }
          
    }
}
}
//echo "allowed: " . $allowed ;
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
	<link rel="stylesheet" type="text/css" href="css/author-new.css">
</head>
<header>
   <?php
        include_once 'header.php';
     ?>

  <?php

  $auth_id = $_GET['aut_id'];

    ?>
</header>
<?php

  //$accid = $_SESSION['uid'];
  //print_r($arrBook);
  //print_r($_SESSION);

  
?>
<body id="annebody">
<div class="fullauthor">
  <div class="anneauthor">
    <?php
          include_once 'connection.php';
          $dbconfig = new dbconfig();
          $con = $dbconfig->getCon();
          $query = "SELECT * FROM `author` WHERE a_id = $auth_id";
          $result = $con->query($query);

          if ($result->num_rows>0) {
            while ($row=$result->fetch_assoc()) {
              #echo $row['a_id'] . " " . $row['a_fname'] . " " . $row['a_mname'] . " " . $row['a_lname'] . " " . $row['a_suffix'] . " " . $row['a_add'] . " " . $row['a_contact'] . " " . $row['a_email'];

     ?>
      <h2><?php echo $row['a_fname'] . " " . $row['a_mname'] . " " . $row['a_lname'] . " " . $row['a_suffix']; ?></h2>
      <p> <?php echo $row['a_contact']; ?>
      <br> <?php echo $row['a_email']; ?>
      <br> <?php echo $row['a_add']; ?> </p>
    <?php }
  } ?>
  <br>
  </div>
  <h3 style="padding-left: 50px"> Bibliography </h3>
  <hr>

  <?php
   if($allowed ===1){

          $dbconfig = new dbconfig();
          $con = $dbconfig->getCon();
          $query = "SELECT * FROM `bibliography` WHERE `aut_id` = $auth_id";
          //echo $query;
           $result = $con->query($query);
          if ($result->num_rows>0) {
            while ($row=$result->fetch_assoc()) {
              echo '<p style="padding-left:50px; padding-right: 50px; text-align:justify">' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $row['bib'] . '</p>';
            }
          }else{
             echo  '<a href="#" id="add-bib" style="padding: 50px">Add Bibliography</a>';
          }


    
   }else{
    $dbconfig = new dbconfig();
          $con = $dbconfig->getCon();
          $query = "SELECT * FROM `bibliography` WHERE `aut_id` = $auth_id";
          //echo $query;
           $result = $con->query($query);
          if ($result->num_rows>0) {
            while ($row=$result->fetch_assoc()) {
              echo "hhhhhhh";
            }
          }else{
             echo  '<h5 style="padding-left: 50px">No bibliography added.</h5>';
          }
   }

  ?>
  <br><br>
  <div id="addbib" style="width: 100%; padding-left: 50px; height: auto; display: none;">
    Add Bibliography<br>
    <input type="text" id="auth_id" value="<?php echo $auth_id?>" style="display: none;">
    <textarea id="bibText" style="width: 95%" rows="6"></textarea>
    <button id="submitbib">Save</button><br><br>
  </div>
    
  <hr>
  <br>
  <br>
  <div class="annebooks" >
              <h3> AUTHORED RESEARCH PAPER </h3>

  </div>
          <hr>
            <div class="annelist">
                      <ul>
                        <?php
                          include_once 'connection.php';
                          $dbconfig = new dbconfig();
                          $con = $dbconfig->getCon();
                          $query = "SELECT book.book_id, book.book_title FROM book INNER JOIN junc_authorbook ON book.book_id = junc_authorbook.book_id WHERE junc_authorbook.aut_id = $auth_id";
                          $result = $con->query($query);
                              
                              if ($result->num_rows>0) {
                                while ($row=$result->fetch_assoc()) {
                                  $book_id = $row['book_id'];
                           ?>


                        <a  href="bookdetails.php?book_id=<?php echo $row['book_id']; ?>"><li> <?php echo $row['book_title']; ?> </li> </a> <br>

                      <?php }
                    } ?>

                      </ul>
                  </div>
                  <br/>
                  <br/>



</div>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/author.js"></script>
</body>
<footer style="padding-top: 5px;">
  <?php include_once 'footer.php' ?>

</footer>
</html>
