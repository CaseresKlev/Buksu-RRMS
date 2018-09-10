
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

    <script type="text/javascipt">
        $(document).ready(function(){
            $('gg').on('click', function(){
                alert(this);
            })

        })

    </script>
</head>
<body>
    <div>
        <p><input placeholder="Book title" oninput="this.className = ''" name="book_title"></p>
        <p><textarea rows="6" cols="102" placeholder="Abstract" oninput="this.className = ''" name="abstract"></textarea></p>
        <p><input type="date" name="pubdate" placeholder="">  </p>
        <p><select name="category"></p><br/><br/>
        
    </div>
    <br/>
    <p><input type="submit" name="gg"></p>
<body/>
</html>

</html>