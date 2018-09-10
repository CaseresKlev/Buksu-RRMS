// ANNE

<?php


			$fname = $_POST['a_fname'];
			$mname = $_POST['a_mname'];
			$lname = $_POST['a_lname'];
			$suffix = $_POST['a_suffix'];
			$address = $_POST['a_add'];
			$email = $_POST['a_email'];
			include_once 'connection.php';

			$dbconfig = new dbconfig();
            $conn = $dbconfig->getCon();
            $query= "INSERT INTO author (a_fname,a_mname,a_lname,a_suffix,a_add,a_email)VALUES('$fname','$mname','$lname','$suffix','$add','$email')";


			
