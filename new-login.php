<?php
  session_start();
  session_unset();
  session_destroy();
  //print_r($_SESSION);
?>
<!DOCTYPE html>
<!-- ANNE -->

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/new-login.css">


    <!-- script for show and hide password  -->
    <script>

        function showPass()
        {
          var password= document.getElementById('password');
          if (document.getElementById('show-password').checked)
          {
            password.setAttribute('type','text');

          }else{

              password.setAttribute('type','password');
          }



        }

      </script>






</head>

<body class="body-login">
    
<!--    delete if not work-->
    <div class="container-fluid">
        
        
  
    <form class="boxx-login">
        <h1>LOGIN</h1>

      
        <!-- input field for username and password -->
        <div class="form-group">
            <input type="text" name="username" id="u_name" required pattern="^[A-Za-z0-9]+" placeholder="USERNAME" autocomplete="off">
        </div>
        
        <input type="password" name="password" id="password" required pattern="^[A-Za-z0-9]+" placeholder="PASSWORD">

        <div class="checkboxx">
            <label for="show-password" class="field-toggle">

                <input type="checkbox" id="show-password" onclick="showPass();" class="field-toggle-input" />
                Show password
            </label>
        </div>
        <input type="button" id="submit" value="Submit">

        <input type="reset" id="reset" value="Clear">
        <br>
        <p id="msg" style="color:red; display:none;"> ERROR </p>
        <br>
        <a href="create_account.php" id="link-login" style="color:white;">Create account</a>


    </form>

  </div>

    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>




</html>