

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
    <h1>Add Research Information</h1>

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
                    Abstract:<br>
                    <textarea style="text-transform: capitalize"rows="6" cols="102" placeholder="Abstract" name="abstract" id="abstract"></textarea>
                </p>
                <p class="para">
                    Submitted Date
                    <input type="date" width="100%" name="pubdate" id="pubdate" placeholder="">
                </p>
                <p class="para">
                    Category:
                    <select name="department" id="department">
                        <option></option>
                    <?php include_once 'connection.php';
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();
                        $query= "SELECT DISTINCT * FROM department;";
                        $result= $conn->query($query);
                         if ($result->num_rows > 0) {
                             while ($row=$result->fetch_assoc()) { ?>
                            <option><?php echo $row["cat_name"]; ?></option>
                        <?php
                             }
                         }
                         ?>
                    </select>
                </p>
                <p id="para">
                    Key Words:<strong style="color:red">&emsp;One keyword per line</strong></note>
                    <textarea style="text-transform: capitalize"rows="6" cols="102" placeholder="Key Words" name="keywords" id="keywords"></textarea><br/>
                </p>
                <div class="ref-container">
                <fieldset>
                  <legend> References</legend>

                <p id="para">
                <br/>&ensp;Title: (APA Format) <br/>
                    <!--<textarea style="text-transform: capitalize"rows="1" cols="102" id="reftitle" placeholder="Input reference title (Ex. Satalkar, B. (2010, July 15). Water aerobics)"></textarea>-->
                    <input style="text-transform: capitalize;" type="text" id="reftitle" placeholder="Input reference title (Ex. Satalkar, B. (2010, July 15). Water aerobics)">
                </p>

                <p id="para">
              &ensp;Weblinks<br/>
                    <!--<textarea style="text-transform: capitalize"rows="1" cols="102" id="refweb" placeholder="Input Weblinks (Ex. HTTPS://www.Reference.com)" ></textarea><br/>-->
                    <input type="text" id="refweb" placeholder="Input Weblinks (Ex. HTTPS://www.Reference.com)">
                </p>

                <p id="para">
              &ensp;Local Research Reference key (if available)
                    <!--<textarea style="text-transform: capitalize"rows="1" cols="102" placeholder="Input Local Reference Key" name="reference" id="locref" style="text-transform:capitalized;"></textarea>-->
                    <input type="text" id="locref" width="100%" placeholder="Input local reference key (Ex. Dt6BYByKXVEmPt0VpGr4oDAK9671NNdc)">
                </p>
                <div class="add">
                <button type="button" id="addref" style="display: block;padding: 10px 15px;vertical-align:middle; text-align:center; display:inline-block; float:left;">ADD</button>
              </div>
              <br>
                <p id="para">
                <br/><br/> <br/>References: &ensp;
                    <textarea style="text-transform: capitalize"rows="6" cols="102" placeholder="" name="reference" id="reference" value="" readonly></textarea><br/>
                </p>

              </fieldset>
            </div>
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
                            "<option>Proposed</option>";

                          }


                       ?>


                    </select>
                </p>
            </div>
        </div>


        <fieldset class= "fieldset-published" style= "width: 100%; color:white; display:none; ">
          <legend style="color:white;"><i> Fill Published Details</i></legend>
          <form id="form-published">
            ISSN:&emsp;
            <input type="text/number" placeholder="serial number" id="isdn" name="serial" style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold;"></br></br>

            Name of Journal:
            <input type="text" placeholder="journal name" id="journal" name="journal">
  

          Type of Journal:
            <input type="text" placeholder="journal type" name="type" id="type"
  style= "width: 100%; font-family: Century Gothic; font-size: 15px; font-style: italic; font-weight: bold;">


</form>

</fieldset>




    <div id = "page2" style="display:none">
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
    </fieldset><br/>
    <fieldset>
      <legend>Terms of Use</legend>
      <style>
/* The container */
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 16px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>


<h3><center>Terms Conditions and Policy</center></h3>
      <label class="container">The content of the pages of this website is for your general information and use only. It is subject to change without notice.
          <input type="checkbox" required>
              <span class="checkmark"></span>
            </label>
            <label class="container"> Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any information available through this website meet your specific requirements.
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
                  <label class="container">The information you uploaded in this website is for reference only, it is your choice if your paper can be downloaded or not.
          <input type="checkbox">
          <span class="checkmark"></span>
                </label>
                  <label class="container">By submitting, I agree that all info entered was done accurately & truthfully.
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>


    </fieldset>

    <p>
      <center> <input type="checkbox" id="download" name="vehicle3" value="Boat"> I want others download my file.</center><br><br>
    </p>
    <br/>
    </div>
    <div id = "page3" style="display:none">


<!-- <h3>Terms of Use</h3> -->
<!-- <label class="container">The content of the pages of this website is for your general information and use only. It is subject to change without notice.
    <input type="checkbox" required>
      <span class="checkmark"></span>
        </label>
        <label class="container">Two
          <input type="checkbox">
          <span class="checkmark"></span>
        </label>
        <label class="container">Three
          <input type="checkbox">
          <span class="checkmark"></span>
        </label>
        <label class="container">Four
          <input type="checkbox">
          <span class="checkmark"></span>
        </label> -->

        <!-- <form>
      <input type="checkbox" name="q" id="a-0" required autofocus>
      <label for="a-0">a-1</label>
      <br>

      <input type="checkbox" name="q" id="a-1" required>
      <label for="a-1">a-2</label>
      <br>

      <input type="checkbox" name="q" id="a-2" required>
      <label for="a-2">a-3</label>
      <br>

      <input type="submit">
  </form>

    </fieldset> -->

    </div>
    <br>
    <div style="text-align:center">
        <span class="dot1"></span>
        <span class="dot2"></span>
          <!-- <span class="dot3"></span> -->
    </div>
    <span style="float: right">
        <button type="button" id="prev">Previous</button>
        <button type="button" id="next">Next</button>
        <button type="button" id="submit">Submit</button>
        <br/>
    </span>

</div>
    <div id="debug" style="text-align: center; font-weight: bold; font-size: 14pt; color: red; width: 100%;"></div>
        <br/>
    </div>
  </form>



<script src="js/jquery-3.3.1.js"></script>
<script src="js/add-research.js"></script>

<?php
    include 'footer.php';
?>
</body>

</html>
