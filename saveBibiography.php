<?php
	
	$aut_id = $_POST['auth_id'];
	$bib = $_POST['bib'];

	//echo "$aut_id $bib";
			include_once 'connection.php';
          $dbconfig = new dbconfig();
          $con = $dbconfig->getCon();
          $query = "INSERT INTO `bibliography` (`id`, `aut_id`, `bib`) VALUES (NULL, '$aut_id', '$bib')";
          $result = $con->query($query);
          if($result){
          	echo "Success";
          }
          //header("Location: author.php?aut_id=$auth_id");
?>