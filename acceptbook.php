<?php

  //session_start();
  //print_r($_SESSION);

?>


<!doctype html>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/indexing(loyd).css">

  <title>Indexing</title>

</head>
  <?php

  include_once 'header.php';

    ?>


<body     style="margin-left: auto;
    margin-right: auto;">

  <?php
    include_once 'connection.php';

    $bookid = $_GET['book_id'];
    //echo $bookid;
    $dbconfig = new dbconfig();
    $conn = $dbconfig->getCon();
    $query= "SELECT * FROM `book` WHERE book_id = $bookid";
    $result = $conn->query($query);
    if($result->num_rows>0){
      while($row=$result->fetch_assoc()){




  ?>
  <div id="container" style="width: 100%">
  <form id="fileForm" enctype="multipart/form-data" style="width: 100%;">
    <div class="rrms">
      <h2><?php echo $row['book_title'];?></h2>
     Date: <?php echo $row['pub_date']; ?>
    </div>

    <div class="auth">
      <h4>Author:
        <i>
        <?php
        $bookid = $_GET['book_id'];
        $dbconfig = new dbconfig();
        $conn = $dbconfig->getCon();
        $query= "SELECT DISTINCT(a_id) as 'a_id' , a_lname as 'a_lname', SUBSTRING(a_fname, 1, 1) as 'a_fname' FROM author INNER JOIN junc_authorbook on author.a_id = junc_authorbook.aut_id WHERE junc_authorbook.book_id = $bookid";
        //echo $query;
        $result = $conn->query($query);
        $authors = "";
        if($result->num_rows>0){
          while($row=$result->fetch_assoc()){



      ?>
      <a href="author.php?a_id=<?php echo $row['a_id']; ?>"><?php echo $row['a_lname'] . "," . $row['a_fname']; ?></a> ; &nbsp;
       <?php }
      }?>

      </i></h4>
    </div>

    <input type="text" id="bookid" name='bookid' value="<?php echo $bookid;?>" readonly style="display: none;">
    <div class="Browse">
      <label for="file">Select file:</label>
      <input type="file" name="file" id="file">
    </div>

   <?php
     }
    }
    ?>

      <label for="cover"><br/>Select Cover (Optional):</label>
      <input type="file" id="cover" name="cover" value="null" accept=".png, .jpg, .jpeg">
    <br/>

    <br/>
    <div class="note">Task: <i id="log"></i></div>


    <div class="progressbar">
        <div id="myProgress">
            <div id="myBar"></div>
        </div>
        <br/>
    </div>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <strong>Note!</strong> Indexing your Files may take sometimes. Please dont close your browser.
</div>
<br/>
<div id="error" style="width: 100%; text-align: center; color: red;  font-size: 14pt; display: none" >kjhgfcdgvhb<br/></div>


  <button type="button" id="submit" style="float: right;">Submit</button>

<br/>
</form>
</div>


<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script src="js/jquery.form.min.js"></script>
  <script type="text/javascript" src="js/indexing.js"></script>
  <!--<textarea id="content" wrap="hard" rows="10" cols="20"></textarea>-->
</body>
<footer>
  <?php
    include_once 'footer.php';
  ?>

</footer>
</html>
