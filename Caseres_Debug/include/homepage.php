<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="homepage.css" />
    <script src="main.js"></script>
</head>
<body>
        <?php
            include 'dbconfig.php';
            $query = "SELECT * FROM `book` WHERE 1";
            $result = $conn->query($query);
            if($result->num_rows>0){
                while($rows=$result->fetch_assoc()){
            ?>


    <div id="book-content">
        <div id="con-div" class="image">
            
            <div class="img_box">
                <img src="<?php echo $rows['cover'] ?>" id="cover">
            </div>
        </div>
        <div id="con-div" class="title">
        <?php echo $rows['book_title'] ?>
        </div>
        <div id="con-div" class="author">
            Author: Caseres, K; Gonzales, L; Cruz, A; Tapayan, P;
        </div>
        
    </div>
    
    <?php
         }
        }?>
</body>
</html>