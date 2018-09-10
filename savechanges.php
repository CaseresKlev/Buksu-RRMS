<?php
	

	if(isset($_POST)){
		//echo "Connected";
		

		$book_id = $_POST['book_id'];
		$status = $_POST['status'];
		$date = $_POST['date'];

			include 'connection.php';
			$dbconfig = new dbconfig();
			$conn = $dbconfig->getCon();
			$query = "UPDATE `book` SET `status` = '$status' WHERE `book`.`book_id` = $book_id";
			//echo $query;
			$result = $conn->query($query);


			if($result){
				$conn = $dbconfig->getCon();
        		$query = "INSERT INTO `bookhistory` (`id`, `book_id`, `book_stat`, `date`) VALUES (NULL, '$book_id', '$status', '$date')";
        		$result = $conn->query($query);

				echo "Save Changes Done.";
			}else{
				echo "No changes has been made.";
			}

		/*
		if($status==="Disseminated"){
			$disloc = $_POST['disLoc'];
			$disdesc = $_POST['disDesc'];

			include 'connection.php';
			$dbconfig = new dbconfig();
			$conn = $dbconfig->getCon();
			$query = "UPDATE `book` SET `status` = '$status', `cited` = '$cited' WHERE `book`.`book_id` = $book_id";
			$result = $conn->query($query);
			//echo $query;
			if($result){

				$dbconfig2 = new dbconfig();
				$conn2 = $dbconfig2->getCon();
				$query2 = "SELECT COUNT(id) AS'COUNT' FROM `disseminated` WHERE book_id=$book_id";
				$result2 = $conn2->query($query2);
				$row2 = mysqli_fetch_assoc( $result2 );
				$count = $row2['COUNT'];
				//if($count)
				//echo $count;
				if($count==0){
					$query2 = "INSERT INTO `disseminated` (`id`, `book_id`, `location`, `description`) VALUES ('', '$book_id', '$disloc', '$disdesc')";
				//echo $query;
					$result2 = $conn2->query($query2);
				//echo $result2;
					if($result2){
						echo "Changes Save Successfully!";
						//header("Location:admindashboard.php");
					}else{
						echo "Theres problem saving changes.";
						
					}
				}else{
					$dbconfig3 = new dbconfig();
					$conn3 = $dbconfig3->getCon();
					$query3 = "UPDATE `disseminated` SET `location` = '$disloc', `description` = '$disdesc' WHERE `disseminated`.`id` = $book_id";
					$result3 = $conn3->query($query3);
				//echo $result2;
					if($result3){
						echo "Changes Save Successfully!";
						//header("Location: admindashboard.php");
					}else{
						echo "Theres problem saving changes.";
						
					}
					

				}
				
			}else{
				echo "Theres problem saving changes.";
			}

			//echo $query;


			//echo "true";
		}else if($status==="Published"){
			//echo "Pub";
			$isdn = $_POST['isdn'];
			$journal = $_POST['journal'];

			include 'connection.php';
			$dbconfig = new dbconfig();
			$conn = $dbconfig->getCon();
			$query = "UPDATE `book` SET `status` = '$status', `cited` = '$cited' WHERE `book`.`book_id` = $book_id";
			$result = $conn->query($query);
			if($result){
				$dbconfig2 = new dbconfig();
				$conn2 = $dbconfig2->getCon();
				$query2 = "SELECT COUNT(id) AS 'COUNT' FROM `published` WHERE book_id=$book_id";
				$result2 = $conn2->query($query2);
				$row2 = mysqli_fetch_assoc( $result2 );
				$count = $row2['COUNT'];

				if($count==0){
					$query2 = "INSERT INTO `published` (`id`, `book_id`, `issn`, `journal`) VALUES (NULL, '$book_id', '$isdn', '$journal')";
				//echo $query;
					$result2 = $conn2->query($query2);
				//echo $result2;
					if($result2){
						echo "Changes Save Successfully!";
						//header("Location: admindashboard.php");
					}else{
						echo "Theres problem saving changes.";
					}
				}else{
					$dbconfig3 = new dbconfig();
					$conn3 = $dbconfig3->getCon();
					$query3 = "UPDATE `published` SET `issn` = '$isdn', `journal` = '$journal' WHERE `published`.`book_id` = $book_id";
					echo $query3;
					$result3 = $conn3->query($query3);
				//echo $result2;
					if($result3){
						echo "Changes Save Successfully!";
						//header("Location: admindashboard.php");

					}else{
						echo "Theres problem saving changes.";
					}
					

				}
			}else{
				echo "Theres problem saving changes.";
			}
		}else{
			include 'connection.php';
			$dbconfig = new dbconfig();
			$conn = $dbconfig->getCon();
			$query = "UPDATE `book` SET `status` = '$status', `cited` = '$cited' WHERE `book`.`book_id` = $book_id";
			$result = $conn->query($query);
			if($result){
				echo "Changes Save Successfully!";
				//header("Location: admindashboard.php");
			}else{
				echo "Theres problem saving changes.";
			}
			//echo "string";
		}
		*/
	}

?>