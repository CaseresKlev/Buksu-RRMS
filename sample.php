<?php
include 'dbconfig.php';
        $query = "SELECT * FROM `author`";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["a_id"]. " - Name: " . $row["a_fname"]. " " . $row["a_lname"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();

?>