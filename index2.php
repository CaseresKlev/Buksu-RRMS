<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gallery Images</title>
	<link href="css/style(loyd).css" rel="stylesheet"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<header><?php include_once 'header2.php'; ?></header>
<body >
	<div class="container">
				<br>
				<div class="row">
		<?php
			include_once 'connection.php';
			$dbconfig= new dbconfig();
			$con= $dbconfig -> getCon();
			$limit = 2;
			$total = 0;
			$number_of_pages = 0;

			if(isset($_GET['filter'])){
				$filter = $_GET['filter'];
				//if($filter==="student"){
					$query= "SELECT book.book_id, book.book_title, book.cover, book.docloc FROM groupdoc INNER JOIN book on groupdoc.book_id = book.book_id INNER JOIN account ON account.id = groupdoc.accid WHERE book.enabled=1 and account.type = 'STUDENT' ORDER BY book.pub_date ASC limit 20";
					$result = $con -> query($query);
					$total = $result->num_rows;
					//echo $total;
				//}
			}else{
					$query= "SELECT book.book_id, book.book_title, book.cover, book.docloc FROM groupdoc INNER JOIN book on groupdoc.book_id = book.book_id INNER JOIN account ON account.id = groupdoc.accid WHERE book.enabled=1  ORDER BY book.pub_date ASC limit 20";
					$result = $con -> query($query);
					$total = $result->num_rows;
					$number_of_pages = ceil($total / $limit);
					if($result->num_rows>0){
						while ($row=$result->fetch_assoc()) {
							echo '
							'	;
						}
					}
			}
		?>
		
			
							<div class="col-md-3" id="content-det[]" name="1" style="height: 350px;">
								<a href="bookdetails.php?book_id='. $row['book_id'] .'">
									<div class="container" style="margin: auto;">
										<div class="row">
											<img id="image[]" src="images/8.jpg" width="100%" height="300px" alt="">
											<div class="middle">
										   		<div class="text">Abstract:<br>
										   			jshrfbghrgnjd hsgsrfsjnfe gfsyehfnse vusyegfysefs hsefyse hegfysef egfyseufsef hvbsyuefhse vsueyfse hefvsueufgsef fvsuefgy
										   		</div>
										 	</div>
										</div>
										
										<div class="row"style="overflow: hidden;">
											Hellow Worlds hehehehehehe
										</div>
									</div>
								</a>
							</div>
							<div class="col-md-3" id="content-det[]" value="2" style="height: 350px;">
								<a href="bookdetails.php?book_id='. $row['book_id'] .'">
									<div class="container" style="margin: auto;">
										<div class="row">
											<img id="" src="images/8.jpg" width="100%" height="300px" alt="">
											<div class="middle">
										   		<div class="text">Abstract:<br>
										   			jshrfbghrgnjd hsgsrfsjnfe gfsyehfnse vusyegfysefs hsefyse hegfysef egfyseufsef hvbsyuefhse vsueyfse hefvsueufgsef fvsuefgy
										   		</div>
										 	</div>
										</div>
										
										<div class="row"style="overflow: hidden;">
											Hellow Worlds hehehehehehe
										</div>
									</div>
								</a>
							</div>
			
		</div>
		
		<br>
		<br>
		<div class="row">
			<div class="container" style="width: 200px;">
				<div class="row">
					<nav aria-label="...">
					  <ul class="pagination">
					    <li class="page-item disabled">
					      <span class="page-link">Previous</span>
					    </li>
					    <?php
					    $page = 1;
					    if(!isset($_GET['page'])){
					    	$page = 1;
					    }else{
					    	$page= $_GET['page'];
					    }

					    for($i=$page; $i<=$number_of_pages; $i++){
					    	echo '<li class="page-item"><a class="page-link" href="index2.php?page='. $i .'">'. $i .'</a></li>';
					    }
					    ?>
					    
					    <li class="page-item">
					      <a class="page-link" href="#">Next</a>
					    </li>
					  </ul>
					</nav>
				</div>
			</div>
		</div>
	</div>




<br>
<?php include_once 'footer.php'; ?>


</body>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript">
	/*$(".text").mouseover(function(){
		$(".image").css('opacity', '0.2');
		$(".image").css('border', '2px solid red');
		
	})

	$(".text").mouseout(function(){
		$(".image").css('opacity', '1');
		$(".image").css('border', 'none');
		
	}) */

	$("div[id='content-det[]").mouseover(function(){
		alert(this.value);
		
	})

	//"button[id='btn[]"

	/*$("#image").mouseout(function(){
		$(this).css('opacity', '1');
		$(this).css('border', 'none');
		
	})*/

</script>



</html>
