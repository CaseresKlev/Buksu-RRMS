// ANNE

<?php


			$username = $_POST['username'];
			$password = $_POST['password'];
			include_once 'connection.php';

			$dbconfig = new dbconfig();
            $conn = $dbconfig->getCon();
            $query= "SELECT count(id) FROM `authentication` WHERE username='$username' and password='$password'";


			$result = $conn->query($query);

			if($result->num_rows>0){
				while($row=$result->fetch_assoc()) {
					if($row['count(id)']==1){
						header('location: instructordashboard.php');
					}
					else {
						header('location: accessdenied.php');
					}
				}
			}




?>
