<?php
if(isset($_GET['book_id'])){
  include_once 'connection.php';
    $dbconfig = new dbconfig();
    $conn = $dbconfig->getCon();
    $id = $_GET['book_id'];
    $query = "select * from book where book_id = $id";
    $result = $conn->query($query);
    if($result->num_rows>0){
      $row = $result->fetch_assoc();
      if($row['enabled']==="0"){
        header("Location: index.php");
      }
    }
}
    

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    
     <link rel="stylesheet" type="text/css" href="css/bootstrap-min-4.1.0.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- scrollbar -->
    <link rel="stylesheet" href="css/custom_scroll.css">

    <script defer src="js/solid.js"></script>
    <script defer src="js/fontawesome.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bookdet.css">
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
  <header>
    <?php include_once 'header2.php';?>
  </header>
<body>
  <div class="container">
    <?php

    if(isset($_GET['book_id'])){
      include_once 'connection.php';
      $dbconfig = new dbconfig();
      $conn = $dbconfig->getCon();

      $book;
      $author;
      $id = $_GET['book_id'];
      $query = "select * from book where book_id = $id";
      $result = $conn->query($query);
      if($result-> num_rows > 0 && $id!==""){
        $book = $result->fetch_assoc();

        $query = 'SELECT DISTINCT(a_id), CONCAT(a_lname, ", ", SUBSTRING(a_fname, 1, 1), ". " , SUBSTRING(a_mname, 1, 1), ". ", "; ") as "aname" FROM author INNER JOIN junc_authorbook on author.a_id = junc_authorbook.aut_id WHERE junc_authorbook.book_id = ' . $id;
        $result2 = $conn->query($query);
         //echo $query;
        $straut = "";
        if($result2->num_rows>0){
          while($author = $result2->fetch_assoc()){
            $straut .= ' <a href="author.php?aut_id='. $author['a_id'] .'"><em>'. $author['aname'] .'</em></a> ';
           // echo $straut;
            $straut .= " ";
          }
        }

            $dbconfig3= new dbconfig();
            $con3= $dbconfig3 -> getCon();
            $kw = "";
            $query3= 'SELECT GROUP_CONCAT(key_words SEPARATOR ", ") as kw FROM keywords INNER JOIN junc_bookkeywords ON keywords.id=junc_bookkeywords.keywords_id WHERE junc_bookkeywords.book_id=' . $id;
            $result3 = $con3-> query($query3);
            if($result3->num_rows>0){
              $kw = $result3->fetch_assoc();
            }

            $dbconfig6= new dbconfig();
            $con6= $dbconfig6 -> getCon();
            $query6= "SELECT referencekey.refkey FROM `referencekey` WHERE referencekey.book_id = $id";
            $result6 = $con6 -> query($query6);
            $row6 = $result6->fetch_assoc();


            //$ref;
            $dbconfig= new dbconfig();
            $con= $dbconfig -> getCon();
            $query= "SELECT ref.id, ref.reftitle, ref.link FROM ref INNER JOIN junk_bookref ON ref.id = junk_bookref.webref_id WHERE book_id = $id";
            $result = $con -> query($query);
            $strref = "";
            if ($result->num_rows>0) {
              while ($row2=$result->fetch_assoc()) {
               /* if($row['link']!==""){
                  echo "<a style=\"text-decoration: none; padding: 10px; font-size: 12pt\" <?php echo "href=" . $row2['link']  .  " target=" . "\"_blank\"";  ?> ><li><b><em><?php echo $row2['reftitle']; ?></em></em><b></br><?php echo $row2['link'];?></li></a>";
                } */
                $str = $row2['link'];
                $str2 = "http";

                if(strpos($row2['link'], "http")!==false){
                  $strref .= "<li style='padding: 10px; font-size: 11pt;'><b><em>" .$row2['reftitle']."<br><a href='".$row2['link'] ."' target='_blank'>". $row2['link'] ."</a></em></b></li>";
                }else{
                  $strref .= "<li style='padding: 10px; font-size: 11pt;'><b><em>" .$row2['reftitle']."<br><a href='http://".$row2['link'] ."' target='_blank'>". $row2['link'] ."</a></em></b></li>";
                }
              }
            }

            $strstat = "";
            if($book['status']==="Disseminated / Presented"){
                              //echo "fccgvhbnjffffffffffff";
                                    include_once 'connection.php';
                                    $dbconfig = new dbconfig();
                                    $conn = $dbconfig->getCon();
                                    $query = "SELECT * FROM `disseminated` WHERE book_id = $id ORDER BY id DESC";
                                    //echo $query;
                                    //`id`, `book_id`, `type`, `convension`, `location`, `date`
                                    $resultpub = $conn->query($query);
                                    if($resultpub->num_rows>0){
                                      //print_r($resultpub);
                                      $rowpub = $resultpub->fetch_assoc();

                                           $strstat .= "<table id=\"pub\" style=\"padding-left:60px;\">
                                            <tr>
                                              
                                            </tr>
                                            <tr>
                                              <td>Date:</td>
                                              <td><em>". $rowpub['date'] ."</em></td>
                                            </tr>
                                              <td>Convention:</td>
                                              <td><em>". $rowpub['convension'] ."</em></td>
                                            <tr>
                                            <tr>
                                              <td>Convention Type:</td>
                                              <td><em>". $rowpub['type'] ."</em></td>
                                            </tr>
                                            <tr>
                                              <td>Location:</td>
                                              <td><em>". $rowpub['location'] ."</em></td>
                                            </tr>

                                            </tr>
                                          </table>

                                          ";
                                    
                                  }
                            }else if($book['status']==="Published"){
                              //<!--- FOR PUBLISHED ---->

                                   $dbconfig = new dbconfig();
                                    $conn = $dbconfig->getCon();
                                    $query = "SELECT * FROM `published` WHERE book_id = $id ORDER BY id DESC";
                                    //`id`, `book_id`, `issn`, `journal`, `type`, `date`
                                    $resultpub = $conn->query($query);
                                    if($resultpub->num_rows>0){
                                     $rowpub = $resultpub->fetch_assoc();

                                      $strstat .= "<table id=\"pub\" style=\"padding-left:60px\">
                                    
                                      <tr>
                                        <td>Date:</td>
                                        <td><em>" . $rowpub['date'] ."</em></td>
                                      </tr>
                                        <td>Journal Name:</td>
                                        <td><em>". $rowpub['journal'] ."</em></td>
                                      <tr>
                                      <tr>
                                        <td>ISSN:</td>
                                        <td><em>". $rowpub['issn'] ."</em></td>
                                      </tr>
                                      <tr>
                                        <td>Journal Type:</td>
                                        <td><em>". $rowpub['type'] ."</em></td>
                                    </table>
                                    ";

                                    }

                            }else if($book['status']==="Utilized"){
                              //<!--- FOR UTILIZE ---->

                                    $dbconfig = new dbconfig();
                                    $conn = $dbconfig->getCon();
                                    $query = "SELECT * FROM `utilize` WHERE book_id = $id ORDER BY id DESC";
                                    //`id`, `book_id`, `orgname`, `orgaddress`, `date`
                                    $resultpub = $conn->query($query);
                                    if($resultpub->num_rows>0){
                                      while ($rowpub = $resultpub->fetch_assoc()) {
                                    $strstat .= "<table id=\"pub\" style=\"padding-left: 60px\">
                                    
                                    <tr>
                                      <td>Date:</td>
                                      <td><em>". $rowpub['date'] ."</em></td>
                                    </tr>
                                      <td>Organization / Institution Name:</td>
                                      <td><em>". $rowpub['orgname'] ."</em></td>
                                    <tr>
                                    <tr>
                                      <td>Address:</td>
                                      <td><em>". $rowpub['orgaddress'] ."</em></td>
                                    </tr>

                                    </tr>
                                  </table>";

                            }
                          }
                            }


                           // echo "$strstat";
            if($book['dowloadable']===1){
                        echo '
                  <div class="row">
                    <div class="col-md-3" style="height: 350px;">
                      <img src="'. $book['cover'] .'" width="100%" height="300px" >
                    </div>
                    <div class="col-md-9" style="padding-left: 25px; font-size: 14pt; overflow: auto;">
                      <div class="row">
                        <h2><i><b>'. $book['book_title'] .'</b></i></h2>
                      </div>
                      <hr>
                      <div class="row">
                        <b>Authors:</b>&nbsp;<b>'. $straut .'</b><em></em>
                      </div>
                      <div class="row">
                        <b>Date Submitted:</b>&nbsp; <em>'. $book['pub_date'] .'</em>
                      </div>
                      <div class="row">
                        <b>Status:</b>&nbsp; <em>'. $book['status'] .'</em>
                      </div>
                      <div class="row">'. $strstat .'
                      </div>
                      <div class="row">
                        <b>Keywords:</b>&nbsp; <em>'. $kw['kw'] .'</em>
                      </div>
                      <div class="row" style="">
                       <b>Citation Key:</b>&nbsp; <em>' . $row6['refkey'] .'</em>
                      </div>
                      <div class="row">
                       <a href="'. $book['docloc'] .'"><span class="fas fa-download"></span> Download</a>
                      </div>
                    </div>
                  </div>
                  <br>

              <div class="row">
                <div class="col-md-12">
                  <h3><i>Abstract</i></h3><hr>
                </div>
                <hr class="style2">
                <div class="col-md-12" style="text-align: justify; font-size: 15pt;">
                  &nbsp; &nbsp; &nbsp; '. $book['abstract'] .'.
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <h3><i>References:</i></h3><hr>
                </div>
                <hr class="style2">
                <div class="col-md-12" style="text-align: justify;">
                 <ul>
                   '.$strref.'
                 </ul>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <h3><i>Research History</i></h3><hr>
                </div>
                <hr class="style2">
                <a href="history.php?book_id= '. $id .'" style="margin-left: 3%">View Research History</a>
              </div>
              <br>
              <br>
              ';
            }else{
                      echo '
                <div class="row">
                  <div class="col-md-3" style="height: 350px;">
                    <img src="'. $book['cover'] .'" width="100%" height="300px;" >
                  </div>
                  <div class="col-md-9" style="padding-left: 25px; font-size: 14pt; overflow: auto;">
                    <div class="row">
                      <h2><i><b>'. $book['book_title'] .'</b></i></h2>
                    </div>
                    <hr>
                    <div class="row">
                      <b>Authors:</b>&nbsp;<b>'. $straut .'</b><em></em>
                    </div>
                    <div class="row">
                      <b>Date Submitted:</b>&nbsp; <em>'. $book['pub_date'] .'</em>
                    </div>
                    <div class="row">
                      <b>Status:</b>&nbsp; <em>'. $book['status'] .'</em>

                      
                    </div>
                    <div class="row">'. $strstat .'
                      </div>
                    <div class="row">
                      <b>Keywords:</b>&nbsp; <em>'. $kw['kw'] .'</em>
                    </div>
                    <div class="row" style="">
                     <b>Citation Key:</b>&nbsp; <em>' . $row6['refkey'] .'</em>
                    </div>
                  </div>
                </div>
                <br>

            <div class="row">
              <div class="col-md-12">
                <h3><i>Abstract</i></h3><hr>
              </div>
              <hr class="style2">
              <div class="col-md-12" style="text-align: justify; font-size: 15pt;">
                &nbsp; &nbsp; &nbsp; '. $book['abstract'] .'.
              </div>
            </div>
            <br>
            <div class="row" style="overflow: hidden">
              <div class="col-md-12">
                <h3><i>References:</i></h3><hr>
              </div>
              <hr class="style2">
              <div class="col-md-12" style="text-align: justify;">
               <ul>
                 '. $strref .'
               </ul>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <h3><i>Research History</i></h3><hr>
              </div>
              <hr class="style2">
              <a href="history.php?book_id= '. $id .'" style="margin-left: 3%">View Research History</a>
            </div>
            <br>
            <br>
            ';
            }
        
        
      }else{
        echo '<div class="row" style="padding-left: 25%">
     <h4><em style="color: red;">The Page you are looking for is not found.</em></h4>
   </div><br><br>';
      }
    }else{
       echo '<div class="row" style="padding-left: 25%">
     <h4><em style="color: red;">The Page you are looking for is not found.</em></h4>
   </div><br><br>';
    }
    
   ?>
   



    
  </div>
  
    <?php include_once 'Footer.php'?>
  
  


</body>

</html>
