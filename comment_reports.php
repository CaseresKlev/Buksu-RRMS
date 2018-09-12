
<?php

if(isset($_GET['paper_trail'])){
  $trail_id = $_GET['paper_trail'];
  $origin = "";


  include_once 'connection.php';
  $dbconfig = new dbconfig();
  $conn = $dbconfig->getCon();
  $query = "SELECT comments.parts, comments.comments, comments.origin, comments.page from comments INNER JOIN paper_trail on paper_trail.id = comments.trail_id where paper_trail.id = 36";
  $result = $conn->query($query);
  if($result->num_rows>0){
    while ($row=$result->fetch_assoc()) {
      $origin = $row['origin'];
      //echo $origin;
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
            }

            #anneheader {
              width: 100%;
              text-align: center;
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

            @page{
        margin-left: 10mm;
        margin-top: 0mm;
        margin-bottom: 0mm;
        @bottom-center { content: element(footer)}


      }

      

      @media print{
        -fs-table-paginate: paginate;

      }


          </style>
</head>
<body>
  <div class="" style="position: absolute; top: 0; left: 0; width: 100%; background-color: #ccc; height: 50px; display: none">
    
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

                      <h4 id="anneheader"> BUKIDNON STATE UNIVERSITY </h4>


                      <p id="anneheader">Malaybalay City, Bukidnon 8700</p>


                      <p id="anneheader"> Tel (088) 813-5661 to 5663; TeleFax (088) 813-2717, <a href="#"> www.buksu.edu.ph </a> </p>

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
                <?php
                  if($result->num_rows>0){
                  while ($row=$result->fetch_assoc()) {
                    $origin = $row['origin'];
                    //echo $origin;
                  }
                }

                ?>
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
                <h6> Title of Research:   </h6>
            </div>
              <div class="row">
                  <h6> Proponents:   </h6>
              </div>

              <br>

                        <div class="row">
                            <table width="100%" id="tablefirst" class="table" style="border:1px solid black;">
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
                                            <div class="col-md-3">
                                              <p> Document Code: RU- F-032 </p>
                                            </div>

                                            <div class="col-md-2">
                                              <p> Revision No. : 002 </p>
                                            </div>

                                            <div class="col-md-2">
                                              <p> Issue No. 002 </p>
                                            </div>
                                            <div class="col-md-3">
                                              <p> Issue Date: May 15, 2018 </p>
                                            </div>

                                            <div class="col-md-2">
                                              <p> Page no. 1 of 1 </p>
                                            </div>

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
