<!DOCTYPE html>
<!-- ANNE -->
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search - BUKSU RRMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>


<div class="main-con">
  <div class="search-container">
      <form action="searchcontent.php">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit">Submit</button>
      </form>
        <label class="container" id="title">Title
            <input type="radio" checked="checked" name="radio">
            <span class="checkmark"></span>
        </label>
        <label class="container" id="content">Content
            <input type="radio" name="radio">
            <span class="checkmark"></span>
        </label>
        <label class="container" id="key">Keywords
            <input type="radio" name="radio">
            <span class="checkmark"></span>
        </label>
  </div>
</div>

    <!-- <div class="radio">
      <form action="">
        <input type="radio" name="title" value="title">Title
        <input type="radio" name="content" value="content">Content
        <input type="radio" name="keywords" value="keywords">Keywords
      </form>

    </div> -->



</body>
</html>
