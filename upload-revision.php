<?php
//echo $_POST['title'];
    
    ///----FILE DOCX-----///
    include_once 'connection.php';
    if(isset($_GET['trail_id']) && isset($_GET['file']) && isset($_GET['action'])){
        $trail = $_GET['trail_id'];
        $filedel = $_GET['file'];
        $action = $_GET['action'];
        //echo "$action";
        //echo $filedel;
    //echo $trail;
        if($action==="revise"){
            $file = $_FILES['file'];
            $tempfile = $_FILES['file']['tmp_name'];
            //echo "$tempfile";
            $filename = $_FILES['file']['name'];
            $filesize = $_FILES['file']['size'];
            $filetype = $_FILES['file']['type'];
            $error = $_FILES['file']['error'];
            $filesize = $_FILES['file']['size'];
            $fileext = explode(".",$filename);
            $extension = strtolower(end($fileext));
            $allowedFile = array('pdf');


            //cover
            //echo "$filename";
            //


            if(!empty($_FILES['file'])){
                //$coverLoc = "fhrdghj";
                $cover = $_FILES['file'];
                $coverTemp = $_FILES['file']['tmp_name'];
                $covername = $_FILES['file']['name'];
                $coversize = $_FILES['file']['size'];
                $covertype = $_FILES['file']['type'];
                $covererror = $_FILES['file']['error'];
                $coversize = $_FILES['file']['size'];
                $coverext = explode(".",$covername);
                $coverextension = strtolower(end($coverext));
                $coverallowed = array('pdf');
                if(in_array($coverextension, $coverallowed)){
                    if($error===0){
                        //2MB Allowed
                        if($coversize<200000000){
                            $newCoverName = uniqid('',true) . "." . $coverextension;
                            $loc = "revision/" . $newCoverName;
                            if(move_uploaded_file($coverTemp, $loc)){
                              $coverLoc = "revision/" . $newCoverName;

                                $dbconfig = new dbconfig();
                                $conn = $dbconfig->getCon();
                                $query= "UPDATE `paper_trail` SET `file_loc` = '$coverLoc', `requirements` = '1' WHERE `paper_trail`.`id` = $trail";
                                $result = $conn ->query($query);

                                if($result){
                                    if($filedel!==""){
                                        //unlink($filedel);
                                    }
                                    
                                    echo "Success";
                                }
                            }

                        }else{
                            echo "#error-Cover Exceeded 2MB size";
                        }
                    }else{
                        echo "#error-There was error Uploading your Cover!";
                    }
            }else{
                echo "#error-File is not Valid! Upload pdf file only.";
            }
            }else{
                 //$coverLoc = "cover/default-book-cover.png";
            }
        }else if ($action==="save") {
            //alert("saving");
            $file = $_FILES['file-upload'];
            $tempfile = $_FILES['file-upload']['tmp_name'];
            //echo "$tempfile";
            $filename = $_FILES['file-upload']['name'];
            $filesize = $_FILES['file-upload']['size'];
            $filetype = $_FILES['file-upload']['type'];
            $error = $_FILES['file-upload']['error'];
            $filesize = $_FILES['file-upload']['size'];
            $fileext = explode(".",$filename);
            $extension = strtolower(end($fileext));
            $allowedFile = array('pdf');


            //cover
            //echo "$filename";
            //

            //$coverLoc = "fhrdghj";

            if(!empty($_FILES['file-upload'])){
                
                $cover = $_FILES['file-upload'];
                $coverTemp = $_FILES['file-upload']['tmp_name'];
                $covername = $_FILES['file-upload']['name'];
                $coversize = $_FILES['file-upload']['size'];
                $covertype = $_FILES['file-upload']['type'];
                $covererror = $_FILES['file-upload']['error'];
                $coversize = $_FILES['file-upload']['size'];
                $coverext = explode(".",$covername);
                $coverextension = strtolower(end($coverext));
                $coverallowed = array('pdf');

                if(in_array($coverextension, $coverallowed)){

                    if($error===0){

                        //2MB Allowed
                        if($coversize<200000000){

                            $newCoverName = uniqid('',true) . "." . $coverextension;
                            $loc = "revision/" . $newCoverName;

                            if(move_uploaded_file($coverTemp, $loc)){
                                echo "$loc";
                              $coverLoc = "revision/" . $newCoverName;

                                $dbconfig = new dbconfig();
                                $conn = $dbconfig->getCon();
                                $query= "UPDATE `paper_trail` SET `file_loc` = '$coverLoc', `requirements` = '1' WHERE `paper_trail`.`id` = $trail";
                                //echo "$query";
                                $result = $conn ->query($query);

                                if($result){
                                    if($filedel!==""){
                                        //unlink($filedel);
                                    }
                                    
                                    echo "Success";
                                }
                            }

                        }else{
                            echo "#error-Cover Exceeded 2MB size";
                        }
                    }else{
                        echo "#error-There was error Uploading your Cover!";
                    }
            }else{
                echo "#error-File is not Valid! Upload pdf file only.";
            }
            }else{
                 //$coverLoc = "cover/default-book-cover.png";
            }
        
        }

    
    }else{
        //header("location: admindashboard.php");
    }
    



   /* if(in_array($extension, $allowedFile)){
            if($error===0){
                //45MB Allowed
                if($filesize<450000000){
                    $newFileName = uniqid('',true) . "." . $extension;
                    $serverPath = "revision/" . $newFileName;

                    $FileFullpath = $serverPath; /// only for database
                    //echo "Book: " . $FileFullpath . " Cover: " . $coverLoc;
                    //echo "<br/>TempFile: " . $tempfile . "<br/>";
                    //echo "<br/>Book: " . $newFileName . "<br/>";
                    if(move_uploaded_file($tempfile, $FileFullpath)){
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();



                        $query= "UPDATE `book` SET `enabled` = '1', `cover` = '$coverLoc', `docloc` = '$FileFullpath' WHERE `book`.`book_id` = $bookid";
                        echo "$query";
                        //  echo $query;

                        //echo "#log-" . $query;
                        echo "#log-" . $query;

                        //echo "#log-" . $query;

                        //echo "#log-Uploading your document";
                        $result = $conn ->query($query);
                        if($result){
                          echo "#log:Success:Upload Done";
                        }
                    }
                    //echo $FileFullpath . " Book ID: " . $bookid;
                    //startIndexing($FileFullpath);
                }else{
                    echo "#error:Error:File Exceeded in Maximu File size";
                }
            }else{
                echo "#error:Error:There was error Uploading your File!";
            }
    }else{
        //echo "File is Not Valid!";
      echo "#error:Error:File is Not Valid!";
    } */

?>