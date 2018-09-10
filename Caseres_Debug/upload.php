<?php
    $temp_name = $_FILES['fileup']['tmp_name'];
    $uploadname = $_FILES['fileup']['name'];
    $ext = pathinfo($uploadname, PATHINFO_EXTENSION);
    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $savedate = date("mdy-hms-u".$micro, $t);
    
    //$newfilename = "./uploads/".basename($savedate."-".$uploadname);
    $newfilename = "./uploads/".basename($savedate.".".$ext);
    echo $newfilename."<br>";
    
    if(move_uploaded_file($temp_name,$newfilename)){
        echo "File Uploaded!";
    }else{
        echo "Error in Uploading file";
    }
?>