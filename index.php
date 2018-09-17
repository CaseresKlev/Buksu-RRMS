<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gallery Images</title>
	<link href="css/style(loyd).css" rel="stylesheet"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<header><?php include_once 'header2.php'; ?></header>
<body class="index-body">

	<div class="title">

	</div>
	<div class="content">
		<?php
		include_once 'connection.php';
		$dbconfig= new dbconfig();
		$con= $dbconfig -> getCon();
		$limit = 12;

		if(isset($_GET['filter'])){
			$filter = $_GET['filter'];

			if($filter==="student"){
				$query= "SELECT book.book_id, book.book_title, book.cover, book.docloc FROM groupdoc INNER JOIN book on groupdoc.book_id = book.book_id INNER JOIN account ON account.id = groupdoc.accid WHERE book.enabled=1 and account.type = 'STUDENT' ORDER BY book.pub_date ASC";
		$result = $con -> query($query);
		if ($result->num_rows>0) {
			while ($row=$result->fetch_assoc()) {
				//echo $row['book_title'];
		?>
	<div class="responsive">
		<div class="gallery">
			<a href="bookdetails.php?book_id= <?php echo $row['book_id']; ?>">
				<img src="<?php echo $row['cover']; ?>"alt="1"/>
			</a>
			<div class="title"><strong><?php echo $row['book_title'];?></strong></div>

			<div class="title">

				<?php
				//for author
				$book_id = $row['book_id'];
				$dbconfig2= new dbconfig();
				$con2= $dbconfig2 -> getCon();
				$query2= "SELECT DISTINCT(a_id) as 'a_id' , a_lname as 'a_lname', SUBSTRING(a_fname, 1, 1) as 'a_fname' FROM author INNER JOIN junc_authorbook on author.a_id = junc_authorbook.aut_id where junc_authorbook.book_id = " . $row['book_id'] . "";
				$result2 = $con2 -> query($query2);
				$autorList ="";
				if($result2->num_rows>0){
					while ($row2 = $result2->fetch_assoc()) {
						$autorList .= $row2['a_lname'] . ", " . $row2['a_fname'] . "; ";
						// use this ---> echo $row['a_lname'] . ", " . $row['a_fname'] . ";";;
					}
				}
				//end for authors
				//echo $autorList;
				$splitArr = explode(";", $autorList);
				?>
				 <i><?php
				 if(count($splitArr)>2){
					 echo $splitArr[0] . " et. al";
				 }else{
					 echo $splitArr[0];
				 }
				 ?></i>

			 </div>
		</div>
		<hr>
	</div>

	<?php }
}
}else{
	$query= "SELECT book.book_id, book.book_title, book.cover, book.docloc FROM groupdoc INNER JOIN book on groupdoc.book_id = book.book_id INNER JOIN account ON account.id = groupdoc.accid WHERE book.enabled=1 and account.type = 'INSTRUCTOR' ORDER BY book.pub_date ASC";
		$result = $con -> query($query);
		if ($result->num_rows>0) {
			while ($row=$result->fetch_assoc()) {
				//echo $row['book_title'];
		?>
	<div class="responsive">
		<div class="gallery">
			<a href="bookdetails.php?book_id= <?php echo $row['book_id']; ?>">
				<img src="<?php echo $row['cover']; ?>"alt="1"/>
			</a>
			<div class="title"><strong><?php echo $row['book_title'];?></strong></div>

			<div class="title">

				<?php
				//for author
				$book_id = $row['book_id'];
				$dbconfig2= new dbconfig();
				$con2= $dbconfig2 -> getCon();
				$query2= "SELECT DISTINCT(a_id) as 'a_id' , a_lname as 'a_lname', SUBSTRING(a_fname, 1, 1) as 'a_fname' FROM author INNER JOIN junc_authorbook on author.a_id = junc_authorbook.aut_id where junc_authorbook.book_id = " . $row['book_id'] . "";
				$result2 = $con2 -> query($query2);
				$autorList ="";
				if($result2->num_rows>0){
					while ($row2 = $result2->fetch_assoc()) {
						$autorList .= $row2['a_lname'] . ", " . $row2['a_fname'] . "; ";
						// use this ---> echo $row['a_lname'] . ", " . $row['a_fname'] . ";";;
					}
				}
				//end for authors
				//echo $autorList;
				$splitArr = explode(";", $autorList);
				?>
				 <i><?php
				 if(count($splitArr)>2){
					 echo $splitArr[0] . " et. al";
				 }else{
					 echo $splitArr[0];
				 }
				 ?></i>

			 </div>
		</div>
		<hr>
	</div>

	<?php }
}
}

		}else{


		$query= "SELECT book_id, book_title, cover, docloc FROM `book` WHERE enabled=1 ORDER BY pub_date ASC;";
		$result = $con -> query($query);
		if ($result->num_rows>0) {
			while ($row=$result->fetch_assoc()) {
				//echo $row['book_title'];
		?>
	<div class="responsive">
		<div class="gallery">
			<a href="bookdetails.php?book_id= <?php echo $row['book_id']; ?>">
				<img src="<?php echo $row['cover']; ?>"alt="1"/>
			</a>
			<div class="title"><strong><?php echo $row['book_title'];?></strong></div>

			<div class="title">

				<?php
				//for author
				$book_id = $row['book_id'];
				$dbconfig2= new dbconfig();
				$con2= $dbconfig2 -> getCon();
				$query2= "SELECT DISTINCT(a_id) as 'a_id' , a_lname as 'a_lname', SUBSTRING(a_fname, 1, 1) as 'a_fname' FROM author INNER JOIN junc_authorbook on author.a_id = junc_authorbook.aut_id where junc_authorbook.book_id = " . $row['book_id'] . "";
				$result2 = $con2 -> query($query2);
				$autorList ="";
				if($result2->num_rows>0){
					while ($row2 = $result2->fetch_assoc()) {
						$autorList .= $row2['a_lname'] . ", " . $row2['a_fname'] . "; ";
						// use this ---> echo $row['a_lname'] . ", " . $row['a_fname'] . ";";;
					}
				}
				//end for authors
				//echo $autorList;
				$splitArr = explode(";", $autorList);
				?>
				 <i><?php
				 if(count($splitArr)>2){
					 echo $splitArr[0] . " et. al";
				 }else{
					 echo $splitArr[0];
				 }
				 ?></i>

			 </div>
		</div>
		<hr>
	</div>

	<?php }
}}?>
<br>
</div>
<br>
<br>





</div>
<br>
<?php include_once 'footer.php'; ?>


</body>



</html>
