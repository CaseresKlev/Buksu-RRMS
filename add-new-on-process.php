

<!DOCTYPE html>
<html style="width=70%">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/add-research.css" />

</head>

<body class="add-body" style="width: 70%; margin-left: auto; margin-right: auto;" >
    <?php
        include "header.php";
    ?>

    <?php

    //print_r($_SESSION);
if(isset($_SESSION['uid'])){
    //print_r($_SESSION);
  }else{
    header("Location: index.php");
  }
?>
    <h1>Add New Research</h1>

<form  method="POST" enctype="multipart/form-data" id="entry" style="width: 100%; margin-left: auto; margin-right: auto;">
    <div id="enclosure" style="margin-bottom: 10px; margin-top: 20px; font-family: Raleway;
    min-width: 300px;
    text-align: left;">
        <div id = "page1" style="height=500px">

              <!-- research paper details input  -->

            <div id="bookDet">
                <p class="para">
                Research Title
                  <input style="text-transform: capitalize" type="text" placeholder="Research title" id="title" name="title">
                </p>
                
                <p class="para">
                    Category:
                    <select name="department" id="department">
                        <option>Faculty</option>
                        
                    </select>
                </p>
                
                
                <p class="para">
                    Status:
                    <select name="status" id="status">
                      <?php
                          if ($_SESSION['type']=="STUDENT") {
                              echo
                              "<option>Unpublished</option>
                              <option>Published</option>
                              <option>Utilized</option>";
                          }else {
                            echo
                            "<option>Conceptualized</option>";

                          }


                       ?>


                    </select>
                </p>
            </div>
        <fieldset>
            <legend>Authors Info</legend>
                <table name="aut_list" id="aut_list" style="display: none;">

                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Suffix</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th></th>

                    <tr id="row">

                        <script>

                          function lettersonly(input){
                            var regex= /[^ a-z]/gi;
                            input.value= input.value.replace(regex,"");
                          }
                          function numbersonly(input){
                            var numall= /[^0-9]/gi;
                            input.value= input.value.replace(numall, "");
                          }
                        </script>
                        <td><input style="text-transform: capitalize" type="text" placeholder="First Name" oninput="this.className = ''" id="fname" name="fname[]" onkeyup="lettersonly(this)"></td>
                        <td><input style="text-transform: capitalized" type="text" placeholder="Middle name" oninput="this.className = ''" id="mname" name="mname[]" onkeyup="lettersonly(this)"></td>
                        <td><input style="text-transform: capitalized" type="text" placeholder="Last name" oninput="this.className = ''" id="lname" name="lname[]" onkeyup="lettersonly(this)"></td>
                        <td style="width: 70px;">
                            <select id="sufname" name="suf[]">
                                <option></option>
                                <option>JR</option>
                                <option>IV</option>
                                <option>III</option>
                             </select>
                        </td>
                        <td><input style="text-transform: capitalized" type="text" placeholder="Address" oninput="this.className = ''" id="add" name="add[]"></td>
                        <td><input type="text" placeholder="Contact" oninput="this.className = ''" id="con" name="contact[]" onkeyup="numbersonly(this)"></td>
                        <td><input type="text" placeholder="Email" oninput="this.className = ''" id="email" name="email[]"></td>
                    </tr>

                </table>
                <p>
                    <table>
                        <tr>
                            <td>
                                <button type="button" id="addField">Add Fields</button>
                            </td>
                        </tr>

                    </table>

                </p>
        </fieldset>
        </div>

    <div id = "page2" style="display:none">
        
    <br/>
    </div>
    <!-- <div id = "page3" style="display:none">
        <center><h3>Add Instructor Information</h3></center>
                    <p>
                        First Name:<br/>
                        <input type="text"placeholder="First name" oninput="this.className = ''" id="adv_fname">
                    </p>
                    <p>
                      Middle Name:<br/>
                        <input type="text" placeholder="Middle name" oninput="this.className = ''" id="adv_mname">
                    </p>
                    <p>
                        Last Name:<br/>
                        <input type="text" placeholder="Last name" oninput="this.className = ''" id="adv_lname">
                    </p>
                    <p>
                        Suffix:<br/>
                        <select name="status" id="adv_suff">
                            <option></option>
                            <option>JR</option>
                            <option>IV</option>
                            <option>III</option>
                        </select>
                    </p>
                    <p>
                        Email:<br/>
                        <input type="text" placeholder="Email" oninput="this.className = ''" id="adv_email">
                    </p>
                    <p>
                      <center> <input type="checkbox" id="download" name="vehicle3" value="Boat" checked> I want others download my file.</center><br><br>
                    </p>
    </div> -->
    <br>

    <span style="float: right">
        <button type="button" id="submit">Submit</button>
        <br/>
    </span>

</div>
    <div id="debug" style="text-align: center; font-weight: bold; font-size: 14pt; color: red; width: 100%;"></div>
        <br/>
    </div>
  </form>



<script src="js/jquery-3.3.1.js"></script>
<script src="js/add-new-on-process.js"></script>

<?php
    include 'footer.php';
?>
</body>

</html>
