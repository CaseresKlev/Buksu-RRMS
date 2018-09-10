<?php

class dbconfig{
        private $server = "localhost";
        private $uname = "root";
        private $upass = "";
        private $dbName = "db_rrms";
        private $conn = null;

   public function __construct(){
        
        $this->conn = new mysqli($this->server, $this->uname, $this->upass,$this->dbName);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }     
    }

    public function getCon(){
        return $this->conn;
    }
}

$dbconfig = new dbconfig();
$conn = $dbconfig->getCon();
$query = "SELECT * FROM `book`";
$result = $conn->query($query);
if($result->num_rows>0){
    while($rows=$result->fetch_assoc()){
        echo $rows['book_title'] . "<br/>";
    }
}

?>