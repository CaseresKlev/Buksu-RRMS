<?php
//Book Details
echo "hello";
if(isset($_POST['submit'])){
    ///----FINAL VALUE----///
    $FileFullpath;
    $CoverFullpath;
    $title = $_POST['title'];
    $abstract = $_POST['abstract'];
    $pubdate= $_POST['pubdate'];
    $dept =  $_POST['department'];
    $keywords = $_POST['keywords'];
    $ref = $_POST['reference'];
   /*
    $html = str_get_html('add-research.php');
    echo $html;
    */
    ///array of keywords perline
    $keywordsArray = explode("\n", $keywords);

    //array of reference perline
    $refAr = explode("\n", $ref);

    //authur array ///
    


    ///------------------///
    ///----FILE DOCX-----///
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $error = $_FILES['file']['error'];
    $filesize = $_FILES['file']['size'];
    $fileext = explode(".",$filename);
    $extension = strtolower(end($fileext));
    $allowedFile = array('docx', 'doc');
    if(in_array($extension, $allowedFile)){
            if($error===0){
                //45MB Allowed
                if($filesize<45000000){
                    $newFileName = uniqid('',true) . "." . $extension;
                    $serverPath = "book/" . $newFileName;
                    
                    $FileFullpath = $serverPath;
                    echo "Book: " . $FileFullpath . "<br/>";
                }else{
                    echo "File Exceeded in Maximu File size"; 
                }
            }else{
                echo "There was error Uploading your File!";
            }
    }else{
        echo "File is Not Valid!";
    }
    ///-----------------///
    ///----COVER FILE----///
    $Cover = $_FILES['cover'];
    $Covername = $_FILES['cover']['name'];
    $Coversize = $_FILES['cover']['size'];
    $Covertype = $_FILES['cover']['type'];
    $Covererror = $_FILES['cover']['error'];
    $Coversize = $_FILES['cover']['size'];
    $Coverext = explode(".",$Covername);
    $Coverextension = strtolower(end($Coverext));
    $allowedCover = array('jpg', 'png', 'jpeg');
    if(in_array($Coverextension, $allowedCover)){
        if($Covererror===0){
            //45MB Allowed
            if($Coversize<45000000){
                $newCoverName = uniqid('',true) . "." . $Coverextension;
                $serverPath = "cover/" . $newCoverName;
                
                $CoverFullpath = $serverPath;
                echo "Cover: " . $CoverFullpath . "<br/>";
            }else{
                echo "Cover Exceeded in Maximu File size"; 
            }
        }else{
            echo "There was error Uploading your Cover!";
        }
    }else{
    echo "Cover is Not Valid!";
    }
    ///-----------------///
    ///----Author----///
    /*
    $autFname = $_POST['aut_fname'];
    $autMname = $_POST['aut_mname'];
    $autlname = $_POST['aut_lname'];
    $suff = $_POST['aut_suffix'];
    $authadd = $_POST['aut_contact'];
    $autemail = $_POST['aut_email'];
    */

    ///-------------///
    echo "Title: " . $title . "<br/>";
    echo "Abstract: " . $abstract . "<br/>";
    echo "pubdate: " . $pubdate . "<br/>";
    echo "Department: " . $dept . "<br/>";
    echo "Keywords:  ";
    print_r($keywordsArray);
    echo "<br/>";
    echo "Refrence:  ";
    print_r($refAr);
    echo "<br/>";
    
}
    
?>