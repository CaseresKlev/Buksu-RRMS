
 <!DOCTYPE html>

<html>

 <head>


 </head>

 <body>
   <?php
   include_once 'connection.php';
   $dbconfig = new dbconfig();
   $conn = $dbconfig->getCon();
   $id = $_GET['book_id'];
   $query = "select * from book where book_id = $id";
   $result = $conn->query($query);
   if($result-> num_rows > 0){
     while ($row = $result->fetch_assoc()) {

    ?>
    <p><a href="<?php echo "loadimage.php?book_id=2"?>"><?php echo $row['book_title'];?></a></p>
   <img src="<?php echo $row['cover']; ?>">

 <?php }
} ?>
 </body>


 </html>
