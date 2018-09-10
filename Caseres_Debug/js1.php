<!DOCTYPE html>
<html>
<head>
        
<script>
    var n = 1;
    (function () {
        for (i=1; i<=3; i++){
             document.getElementById("page" +i).style.display = "none";
        }
        alert("load");
        showCurrentPage(n, "page" + n);
}());


function setPage(action) {
    if(action == "prev"){
        if(n>1){
            n -=1;
        }
    }else{
        n +=1;
    }
    
    var page = "page" + n;

   for (i=1; i<=3; i++){
    document.getElementById("page" +i).style.display = "none";
   }
   showCurrentPage(n,page);
}

function showCurrentPage(n,page){
    //alert(n);
    document.getElementById(page).style.display = "block";
    if (n==1){
        document.getElementById("btn_prev").style.display = "none";
    }else{
        document.getElementById("btn_prev").style.display = "inline-block";
    }

    if (n==3){
        document.getElementById("btn_next").style.display = "none";
        document.getElementById("btn_submit").style.display = "inline-block";
    }else{
        document.getElementById("btn_next").style.display = "inline-block";
        document.getElementById("btn_submit").style.display = "none";
    }
}


</script>
</head>

<body>

<h1>My Web Page</h1>

    <form>
        <div id = "page1">
            <p id="p1">Page 1</p>
                First name:<br>
                <input type="text" name="firstname"><br>
                Last name:<br>
                <input type="text" name="lastname">
        </div>
        <div id = "page2" style= "display:none">
            <p>Page 2</p>
                First name:<br>
                <input type="text" name="firstname"><br>
                Last name:<br>
                <input type="text" name="lastname">
        </div>
        <div id = "page3" style= "display:none">
            <p>Page 3</p>
                First name:<br>
                <input type="text" name="firstname"><br>
                Last name:<br>
                <input type="text" name="lastname">
        </div>
        
    </form>
<span style="float: right">
    <button type="button" id="btn_prev" onclick="setPage('prev')" style="display: none">Previous</button>
    <button type="button" id="btn_next" onclick="setPage('next')">Next</button>
    <button type="button" id="btn_submit" onclick="" style="display: none">Submit</button>
</span>

</body>
</html>