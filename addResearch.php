<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" type="text/css" href="indexing(loyd).css">
    <title>Add Research Document - BUKSU RRMS</title>
</head>
<body>
    <div id="Nav-Bar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Browse Research.php">Browse Research</a></li>
            <li><a href= "Plagiarism.php">Plagiarism</a></li>
            <li><a href = "Login.php">Login</a></li>
        </ul>
    </div>

    <form id="regForm" action="add.php" method="post">

      <!-- One "tab" for each step in the form: -->

      <div class="tab">
          <h1>Book Details:</h1>
        <div class="Browse">
          <input type="file" id="myFile" accept="image/*">


    <script>
    function myFunction() {
        var x = document.getElementById("myFile");

        x.disabled = true;
    }
    </script>

        </div>
        <div class="Browse">
          <input type="file" id="myFile">


    <script>
    function myFunction() {
        var x = document.getElementById("myFile");
        x.disabled = true;
    }
    </script>

        </div>
        <p><input placeholder="Book title" oninput="this.className = ''" name="book_title"></p>
        <p><textarea rows="6" cols="102" placeholder="Abstract" oninput="this.className = ''" name="abstract"></textarea></p>
        <p><input type="date" name="pubdate" placeholder="">  </p>
        <p><select name="category"></p>
          <?php include 'dbconfig.php';
          $query= "SELECT * FROM category";
          $result= $conn->query($query);

          if ($result->num_rows > 0) {
            // code...
            while ($row=$result->fetch_assoc()) { ?>
              <option><?php echo $row["cat_name"]; ?>   </option>
              // code...
              <?php
            }
          }
  ?>
  </select>


      </div>
   <div class="tab"><h1>Add Author:</h1>
      <!--  <p><input placeholder="First name" oninput="this.className = ''" name="fname"></p>
        <p><input placeholder="Middle name" oninput="this.className = ''" name="mname"></p>
        <p><input placeholder="Last name" oninput="this.className = ''" name="lname"></p>
        <p><input placeholder="Suffix" oninput="this.className = ''" name="suffix"></p>
        <p><input placeholder="Address" oninput="this.className = ''" name="add"></p>
        <p><input placeholder="Email" oninput="this.className = ''" name="email"></p>-->
      <!--  <table width="100%">
          <th>FIRST NAME</th>
            <th>MIDDLE NAME</th>
              <th>LAST NAME</th>
                <th>SUFFIX</th>
                <th>ADDRRESS</th>
                <th>CONTACT</th>
                <th>EMAIL</th>
        </table><br><br>

            <p>Insert Author details</p>
            <p><input placeholder="First name" oninput="this.className = ''" name="fname"></p>
            <p><input placeholder="Middle name" oninput="this.className = ''" name="mname"></p>
            <p><input placeholder="Last name" oninput="this.className = ''" name="lname"></p>
            <p><input placeholder="Suffix" oninput="this.className = ''" name="suffix"></p>
            <p><input placeholder="Address" oninput="this.className = ''" name="add"></p>
            <p><input placeholder="Email" oninput="this.className = ''" name="email"></p>-->
            <div style="background-color:#0F0F8C ;height:45px">
                <h2 style="color: white">LOGO</h2>
            </div>
            <div>
                <button id="myBtn">&emsp;+ Add Author &emsp;</button>
            </div>
            <div>
                <table id="tasksTable">
                    <thead>
                        <tr style="background-color:rgba(201, 196, 196, 0.86)">
                            <th style="width: 150px;">Name</th>
                            <th style="width: 250px;">Desc</th>
                            <th style="width: 120px">Date</th>
                            <th style="width: 120px class=fa fa-trash"></th>
                        </tr>

                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-header">

                        <span class="close">&times;</span>
                        <h3> Insert author</h3>
                    </div>

                    <div class="modal-body">
                        <table style="padding: 28px 50px">
                            <tr>
                                <td style="width:150px">Name:</td>
                                <td><input type="text" name="name" id="taskname" style="width: -webkit-fill-available"></td>
                            </tr>
                            <tr>
                                <td>
                                    Desc:
                                </td>
                                <td>
                                    <textarea name="desc" id="taskdesc" cols="60" rows="10"></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" value="submit" style="float: right;" onclick="addTasks()">SUBMIT</button>
                        <br>
                        <br>
                        <br>
                    </div>

                </div>
            </div>

            <script>
                var tasks = [];
                var descs = [];

                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal
                btn.onclick = function () {
                    modal.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
                var rowCount = 1;
                function addTasks() {
                    var temp = 'style .fa fa-trash';
                    tasks.push(document.getElementById("taskname").value);
                    descs.push(document.getElementById("taskdesc").value);
                    var table = document.getElementById("tasksTable");
                    var row = table.insertRow(rowCount);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    cell1.innerHTML = tasks[rowCount - 1];
                    cell2.innerHTML = descs[rowCount - 1];
                    cell3.innerHTML = getDate();
                    cell4.innerHTML='<td class="fa fa-trash"></td>';
                    rowCount++;
                    modal.style.display = "none";
                }


                function getDate() {
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1; //January is 0!

                    var yyyy = today.getFullYear();

                    if (dd < 10) {
                        dd = '0' + dd;
                    }
                    if (mm < 10) {
                        mm = '0' + mm;
                    }
                    var today = dd + '-' + mm + '-' + yyyy.toString().slice(2);
                    return today;
                }
            </script>





        <button type="button" id="btnAdd" onclick="">ADD</button>

      </div>
      </div>
      </div>
      </div>
      </div>

      <!--    <div class="tab">Birthday:
    <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
        <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
        <p><input type ="date"placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
      </div>
      <div class="tab">Login Info:
        <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
        <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
      </div>-->
      <div style="overflow:auto;">
        <div style="float:right;">

          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
          <button type="button"name="btn-submit" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
      </div>
      <!-- Circles which indicates the steps of the form: -->
      <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
          <span class="step"></span>
           <span class="step"></span>
        <!-- <span class="step"></span>
        <span class="step"></span> -->
      </div>
    </form>

  <script>
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the crurrent tab

  function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";

    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }

    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
      }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }

  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }
  </script>

</body>
</html>
