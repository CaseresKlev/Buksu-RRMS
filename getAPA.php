<?php
	$citkey = null;
	if(isset($_POST)){

		$citkey = $_POST['citkey'];
		$bookid = null;
		$book_title = null;
		//echo "From web" . $citkey;

		include_once 'connection.php';
		$dbconfig = new dbconfig();
		$conn = $dbconfig->getCOn();
		$query = "SELECT book.book_id, book.book_title, SUBSTRING(book.pub_date, 1, 4) as 'date' FROM book INNER JOIN  referencekey on referencekey.book_id = book.book_id WHERE referencekey.refkey  COLLATE latin1_general_cs LIKE '$citkey'";
		
		$result = $conn->query($query);
		if($result->num_rows>0){
			$row = $result->fetch_assoc();
			$book_id = $row['book_id'];
			$book_title = $row['book_title'];
			$book_date = $row['date'];

			$dbconfig = new dbconfig();
			$conn = $dbconfig->getCOn();
			$query ="SELECT GROUP_CONCAT(author.a_lname, \", \" , SUBSTRING(author.a_mname, 1, 1), \". \" , SUBSTRING(author.a_fname, 1, 1), \".\") as 'author' FROM author INNER JOIN junc_authorbook on junc_authorbook.aut_id = author.a_id WHERE junc_authorbook.book_id = $book_id";
			//echo $query;
			$result2 = $conn->query($query);
			if($result2->num_rows>0){
				$row2 = $result2->fetch_assoc();
				$author = $row2['author'];
				//echo $author;
				$state = "SUCCESS--->";
				$link = "bookdetails.php?book_id=$book_id";
				$ref = $state . $author . " " . "(" . $book_date . ")" . "." . " " .$book_title . "\n" . $link;
				ucwords($ref);

				echo $ref;
			}

			
		}else{
			echo "ERROR--->Local Citation key is not found on this Server!";
		}

	}

?>