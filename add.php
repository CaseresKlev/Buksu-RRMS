<?php

include 'dbconfig.php';

$title = $_POST['book_title'];
$abstract = $_POST['abstract'];
$pubdate = $_POST['pubdate'];
$category=$_POST['category'];

echo "$title <br>";
echo "$abstract<br>";
echo "$pubdate <br>";

//$title= $abstract= $pubdate= $category="";
//$titleErr= $abstractErr= $pubdateErr= $categoryErr="";





//INSERT INTO `book` (`book_id`, `book_title`, `abstract`, `pub_date`, `category`, `rev_count`, `status`, `enabled`, `views_count`) VALUES (NULL, 'title', 'abstract', '2018-07-02', 'cat', '0', 'unpub', '1', '0')
$query="INSERT INTO `book` (`book_id`, `book_title`, `abstract`, `pub_date`, `category`, `rev_count`, `status`, `enabled`, `views_count`) VALUES (NULL, '$title', '$abstract', '$pubdate', 'cat', '', '$category', '', '')";
$result= mysqli_query($conn,$query);
header ('location: addResearch.php');
 ?>
