<?php
        if(isset($_FILES['myFile'])){

            $files = $_FILES['myFile'];
            $count = count($_FILES['myFile']['tmp_name']);
            //echo "$count";
            $book_id = $_GET['book_id'];
            for($i=0;$i<$count;$i++) {
                $file_name = $_FILES['myFile']['name'][$i];
                //echo "$file_name";
                $fileTemp = $_FILES['myFile']['tmp_name'][$i];
                $file_type = $_FILES['myFile']['type'][$i];
                $file_error = $_FILES['myFile']['error'][$i];
                $file_size = $_FILES['myFile']['size'][$i];


                $fileext = explode(".",$file_name);
                $extension = strtolower(end($fileext));
                $finalname = "documents/" . uniqid('',true) . "." . $extension;
                if(move_uploaded_file($fileTemp, $finalname)){

                    include_once 'connection.php';
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $query = "INSERT INTO `documents` (`id`, `book_id`, `documents`, `orig_name`) VALUES (NULL, '$book_id', '$finalname', '$file_name')";
                    //echo $query;
                    $result = $conn->query($query);

                    

                      echo "Upload Done";
                }

                //echo "File: " . $i . ": " . $finalname ;
            }
        }

?>