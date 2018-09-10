<?php
include_once('authour.php');
$obj = new Author("Klevie", "Apo Macote");
echo $obj->name . "<br/>";
echo $obj->address;
?>