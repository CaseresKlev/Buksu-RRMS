
<?php

if(isset($_GET['paper_trail'])){
  $trail_id = $_GET['paper_trail'];
  $origin = "";
  $author = "";
  $book_title = "";



  include_once 'connection.php';
  $dbconfig = new dbconfig();
  $conn = $dbconfig->getCon();
  $query = "SELECT comments.parts, comments.comments, comments.origin, comments.page, book.book_title, (SELECT concat('',(GROUP_CONCAT((select concat( author.a_lname, ',', SUBSTRING(author.a_fname, 1,1))) SEPARATOR '; '))) as authors FROM junc_authorbook INNER JOIN author on author.a_id = junc_authorbook.aut_id WHERE junc_authorbook.book_id = book.book_id) AS 'authors' from comments INNER JOIN paper_trail on paper_trail.id = comments.trail_id INNER JOIN book on book.book_id = paper_trail.book_id where paper_trail.id = 36";
  $result = $conn->query($query);
  if($result->num_rows>0){
    while ($row=$result->fetch_assoc()) {
      //echo "string";
      $origin = $row['origin'];
      $author = $row['authors'];
      $book_title = $row['book_title'];
    }
  }


}
//echo $origin;
?>




<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Comment Reports </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-min-4.1.0.css">
    <script defer src="js/solid.js"></script>
    <script defer src="js/fontawesome.js"></script>


          <style type="text/css">

            #annecomment {
              width: 130%;
            }

            #buksulogo {
              max-width:100%;
              max-height:100%;
              padding-top: 15px;
            }

            #anneheader1 {
              width: 100%;
              text-align: center;
              font-size: 25pt;
            }

            #anneheader2 {
              width: 100%;
              text-align: center;
              font-size: 15pt;
            }

            #anneheader3 {
              width: 100%;
              text-align: center;
              font-size: 14pt;
            }

            #tabletwo {
              border:1px solid black;
              text-align: center;
              margin: auto;
            }

            #tabletextfield {
              border:1px solid black;
              margin: auto;
              padding: 10%;
            }

            hr {
              display: block;
              height: 1px;
              border: 0;
              border-top: 1px solid #ccc;
              margin: 1em 0;
              padding: 0;
              border-color: inherit;
              width: 70%;
            }

            p {
              font-size: 90%;
            }

            #footer {
              position: fixed;
              bottom: 0px;
              width: 100%;
              margin-left: auto;
              margin-right: auto;
              margin-top: auto;
              margin-bottom: auto;
            }


            /*@page{
              margin: .3cm;
              margin-left: 10mm;
              margin-top: 5mm;
              margin-bottom: 30mm;
              /*@bottom-center {
                content: element(footer);
              }
            }*/


            /*@bottom-center {
              content: element(footer);
            }*/

            /*@page {
              @bottom-center {
                content: element(footer);
              }
            }*/

            @media print {
              @bottom-center {
                content: element(footer);
              }


            }


          </style>
</head>
<body>
  <div id="header" style="position: fixed; top: 0; left: 0; width: 100%;  height: 50px;">

  </div>
  <br>
  <br>
  <br>
    <div class="container" id="printable">

        <div class="row" style="padding-left: 30px; margin-left: auto; margin-right:auto;">

              <div class="col-sm-2" style="">
                  <img id="buksulogo" src="img/BukSU Logo.png">
              </div>
              <div class="col-md-8" style="text-align:justify;">

                      <h4 id="anneheader1"> BUKIDNON STATE UNIVERSITY </h4>


                      <p id="anneheader2">Malaybalay City, Bukidnon 8700</p>


                      <p id="anneheader3"> Tel (088) 813-5661 to 5663; TeleFax (088) 813-2717, <a href="#"> www.buksu.edu.ph </a> </p>

                  <h4 style="text-align:center; width:100%;"> SUMMARY OF COMMENTS AND SUGGESTIONS </h4>
              </div>
        </div>
        <br>
        <br>


        <div class="row">
            <h6> Originator: </h6>
        </div>
        <div class="row">
          <table width="100%" id="tablefirst" class="table" style="border:1px solid black;">
                
                <tr>
                    <td scope="col" style="height: 60px; border:1px solid black;">
                      <i class="fas fa-square-full" style="color:<?php if($origin==="Research Committee"){ echo "#3399ff"; }else{ echo "white"; }  ?>;"></i>
                      Research Committee
                    </td>
                    <td scope="col" style="height: 60px; border:1px solid black;">
                      <i class="fas fa-square-full" style="color:<?php if($origin==="Internal Reviewers"){ echo "#3399ff"; }else{ echo "white"; }  ?>;"></i>
                      Internal Reviewers
                    </td>
                    <td scope="col" style="height: 60px; border:1px solid black;">
                      <i class="fas fa-square-full" style="color:<?php if($origin==="Panel of Experts"){ echo "#3399ff"; }else{ echo "white"; }  ?>;"></i>
                      Panel of Experts
                    </td>
                    <td scope="col" style="height: 60px; border:1px solid black;">
                      <i class="fas fa-square-full" style="color:<?php if($origin==="External Reviewers"){ echo "#3399ff"; }else{ echo "white"; }  ?>;"></i>
                      External Reviewers
                    </td>
                    <td scope="col" style="height: 60px; border:1px solid black;">
                      <i class="fas fa-square-full" style="color:<?php if($origin==="Research Ethics Commit"){ echo "#3399ff"; }else{ echo "white"; }  ?>;"></i>
                      Research Ethics Committee
                    </td>
                </tr>

          </table>
        </div>

            <br>
            <br>

            <div class="row">
                <h5> Title of Research:   <?php echo $book_title ?></h5>
            </div>
              <div class="row">
                  <h5> Proponents:   <?php echo $author ?></h5>
              </div>

              <br>

                        <div class="row">
                            <table width="100%" id="tablefirst" class="table" style="border:1px solid black;">
<<<<<<< HEAD
                              
                                <?php
                                include_once 'connection.php';
                                  $dbconfig = new dbconfig();
                                  $conn = $dbconfig->getCon();
                                  $query = "SELECT comments.parts, comments.comments, comments.origin, comments.page, book.book_title, (SELECT concat('',(GROUP_CONCAT((select concat( author.a_lname, ',', SUBSTRING(author.a_fname, 1,1))) SEPARATOR '; '))) as authors FROM junc_authorbook INNER JOIN author on author.a_id = junc_authorbook.aut_id WHERE junc_authorbook.book_id = book.book_id) AS 'authors' from comments INNER JOIN paper_trail on paper_trail.id = comments.trail_id INNER JOIN book on book.book_id = paper_trail.book_id where paper_trail.id = 36";
                                  $result = $conn->query($query);

                                    if($result->num_rows>0){

                                    while ($row=$result->fetch_assoc()) {

                                      //$origin = $row['origin'];
                                      echo '
                                <tr style="border:1px solid black;">
                                  <th id="tabletwo">'. $row['parts'] .'</th>
                                  <th id="tabletwo"> '.  $row['comments'] .' </th>
                                  <th id="tabletwo"> '. $row['page'] .' </th>
                                </tr>';
                                    }
                                  }else{
                                    echo "string";
                                  }

                                  ?>
                                  
                              

                              
=======
                              <tr style="border:1px solid black;">
                                  <th id="tabletwo"> Part of the Manuscript </th>
                                  <th id="tabletwo"> Comments and Suggestions </th>
                                  <th id="tabletwo"> Pages </th>
                              </tr>

                              <tr style="border:1px solid black; height:50%;">
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                              </tr>

                              <tr style="border:1px solid black; height:50%;">
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                              </tr>

                              <tr style="border:1px solid black; height:50%;">
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                              </tr>

                              <tr style="border:1px solid black; height:50%;">
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                              </tr>

                              <tr style="border:1px solid black; height:50%;">
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                              </tr>

                              <tr style="border:1px solid black; height:50%;">
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                              </tr>

                              <tr style="border:1px solid black; height:50%;">
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                              </tr>

                              <tr style="border:1px solid black; height:50%;">
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                                  <td id="tabletextfield">  </th>
                              </tr>
                                <tr style="border:1px solid black; height:50%;">
                                    <td id="tabletextfield">  </th>
                                    <td id="tabletextfield">  </th>
                                    <td id="tabletextfield">  </th>
                                </tr>

                                <tr style="border:1px solid black; height:50%;">
                                    <td id="tabletextfield">  </th>
                                    <td id="tabletextfield">  </th>
                                    <td id="tabletextfield">  </th>
                                </tr>

                                <tr style="border:1px solid black; height:50%;">
                                    <td id="tabletextfield">  </th>
                                    <td id="tabletextfield">  </th>
                                    <td id="tabletextfield">  </th>
                                </tr>

                                <tr style="border:1px solid black; height:50%;">
                                    <td id="tabletextfield">  </th>
                                    <td id="tabletextfield">  </th>
                                    <td id="tabletextfield">  </th>
                                </tr>

                                <tr style="border:1px solid black; height:50%;">
                                    <td id="tabletextfield">  </th>
                                    <td id="tabletextfield">  </th>
                                    <td id="tabletextfield">  </th>
                                </tr>
>>>>>>> 57613a361b4ebe53dc623ee40937430d283b145e
                            </table>
                        </div>

                        <br>
                        <br>


                                  <div class="row">
                                      <div class="col-md-6">
                                          <h5> Summarized by: </h5>
                                          <br>
                                          <hr>
                                      </div>

                                      <div class="col-md-6">
                                          <h5> Reviewed and approved by: </h5>
                                          <br>
                                          <hr>
                                      </div>
                                  </div>

                                  <br>
                                  <br>
                                  <br>
                                  <br>
                                  <br>
                                  <br>

                                        <div class="row" id="footer">

                                          <table class="table" >
                                            <tr>
                                            <td scope="col">
                                              <em> Document Code: RU- F-032 </em>
                                            </td>
                                            <td scope="col">
                                              <em> Revision No. : 002 </em>
                                            </td>
                                            <td scope="col">
                                              <em> Issue No. 002 </em>
                                            </td>
                                            <td scope="col">
                                              <em> Issue Date: May 15, 2018 </em>
                                            </td>
                                            <td scope="col">
                                              <em> Page no. 1 of 1 </em>
                                            </td>
                                          </tr>
                                          </table>

                                        </div>


              </div>
              <br>
              <br>
              <br>
              <div class="container">
                <div class="row">
                  <button class="btn  btn-success btn-md" id="print">Print Reports</button>

                </div>

              </div>
              <br>
              <br>
              <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript">
      $("#print").click(function(){
      $(this).hide();
      //$("#printable").hide();
      window.print();

    });
      window.onafterprint = function(){
       $("#filter-div").show();
       $("#print").show();
    }
    </script>
</body>
</html>
