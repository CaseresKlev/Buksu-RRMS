<?php
        session_start();

        if(isset($_GET['book_id'])){

            echo "string";
            include_once 'connection.php';

            $book_id = $_GET['book_id'];
            $abs = $_POST['abstract'];
            //$abs = "\"". $abs . "\"";
            //echo "abstract: $abs </br>";
            $pubdate = date("Y-m-d");
            
            //echo "pubdate: $pubdate </br>";

            //echo "Department: $dept </br>";
            $keywordsArray = $_POST['kw'];
            //echo "Array of Keywords: ";
            //print_r($keywordsArray);
            //echo "<br/>";
            $referencesArray=$_POST['ref'];
            //print_r($referencesArray);
            //echo "Array of References: ";
            //print_r($referencesArray);
            //echo "<br/>";




            ///////////////////// ADD KEYWORDS ////////////////////////////////////
             $kw = array();
            foreach ($keywordsArray as $key ) {
                //echo "Keywords: " . $key;
                //valid keywords isf existed///
                $query = "SELECT id FROM `keywords` WHERE key_words='$key'";
                $dbconfig = new dbconfig();
                $conn = $dbconfig->getCon();
                $result = $conn ->query($query);
                if($result->num_rows>0){
                    //if found. get the keywords id and put into array.
                    while($row = $result->fetch_assoc()){
                        array_push($kw, $row['id']);
                    }
                    //echo "keywords: " . $key . " Found! <br/>";
                }else{
                    // else not found then load to db and get the keywords i.d
                    //load to kewords table
                    $query = "INSERT INTO `keywords` (`id`, `key_words`) VALUES (NULL, '$key')";
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $result = $conn ->query($query);
                    //if load to db then get id then push to aray
                    if($result){
                        $query = "SELECT id FROM `keywords` WHERE key_words='$key'";
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();
                        $result = $conn ->query($query);
                        while($row1 = $result->fetch_assoc()){
                            array_push($kw, $row1['id']);
                        }
                        //echo "keywords done";
                    }

                }
                //echo "Loaded <br/>";
            }

            foreach ($kw as $key) {
                //echo "keywords id: "+$key;
                        $query = "INSERT INTO `junc_bookkeywords` (`id`, `book_id`, `keywords_id`) VALUES (NULL, '$book_id', '$key')";
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();
                        $result = $conn ->query($query);

            }







                ///////////////////////////// ADD REFERENCE ////////////////////////////////////
                $refID = array();
            //$i=0;
            $len =  count($referencesArray);
            for($i=0; $i<$len-1; $i++ ){
                $reftemp = split("\n", $referencesArray[$i]);
                //print_r($temparr);
                if($reftemp[0]===""){
                    echo "empty";
                }else{
                    //check references if existed///
                $query = "SELECT id FROM `ref` WHERE reftitle='$reftemp[0]'";
                //echo $query;
                $dbconfig = new dbconfig();
                $conn = $dbconfig->getCon();
                $result = $conn ->query($query);
                if($result->num_rows>0){
                     while($row = $result->fetch_assoc()){
                        array_push($refID, $row['id']);
                    }
                }else{
                     // else not found then load to db and get the reference i.d
                    //load to ref table

                        $query = "INSERT INTO `ref` (`id`, `reftitle`, `link`) VALUES (NULL, '$reftemp[0]','$reftemp[1]')";
                        //echo $query;
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();
                        $result = $conn ->query($query);
                        //if load to db then get id then push to aray
                        if($result){
                            $query = "SELECT id FROM `ref` WHERE reftitle='$reftemp[0]'";
                            $dbconfig = new dbconfig();
                            $conn = $dbconfig->getCon();
                            $result = $conn ->query($query);
                            while($row1 = $result->fetch_assoc()){
                                array_push($refID, $row1['id']);
                        }
                    }
                    else{
                        echo "Fail to add References";
                    }

                }
                }


            }
            foreach ($refID as $key) {
                        $query = "INSERT INTO `junk_bookref` (`id`, `book_id`, `webref_id`) VALUES (NULL, '$book_id', '$key')";
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();
                        $conn ->query($query);

            }


            //////////////////////////// INSERT LOCAL CITATION KEY ///////////////////////////////////
                    $refkey = getRandomString(32);
                    $query = "INSERT INTO `referencekey` (`id`, `book_id`, `refkey`) VALUES ('', '$book_id', '$refkey')";
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $result = $conn ->query($query);



        /////////////////////////// UPDATE BOOK STATUS ///////////////////////////////////////
                    $query = "UPDATE `book` SET `abstract` = '$abs', `pub_date` = '$pubdate' WHERE `book`.`book_id` = 1";
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $result = $conn ->query($query);

                    if($result){
                        echo "success";
                    }

        }else{
            echo "pppp";
        }


        function getRandomString($length) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $string = '';

            for ($i = 0; $i < $length; $i++) {
                $string .= $characters[mt_rand(0, strlen($characters) - 1)];
            }

            return $string;
        }

?>
