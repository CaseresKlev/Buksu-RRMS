<?php
        session_start();
        include_once 'connection.php';
        
        $title = $_POST['title'];

        $pubdate = date("Y-m-d");
        //echo "pubdate: $pubdate </br>";
        $dept = $_POST['dept'];
        
        $stat = $_POST['stat'];
        //echo "Status: $stat </br>";
        $fname = $_POST['firstname'];
        //echo "Author Fname: ";
        //print_r($fname);
        //echo "<br/>";
        $mname = $_POST['middlename'];
        //echo "Author middlename: ";
        //print_r($mname);
        //echo "<br/>";
        $lname = $_POST['lastname'];
        //echo "Author lastname: ";
        //print_r($lname);
        //echo "<br/>";
        $suf = $_POST['suffix'];
        //echo "Author Suffix: ";
        //print_r($suf);
        //echo "<br/>";
        $add = $_POST['address'];
        //echo "Author address: ";
        //print_r($add);
        //echo "<br/>";
        $contact = $_POST['contact'];
        //echo "Author Contact: ";
        //print_r($contact);
        //echo "<br/>";
        $email = $_POST['email'];

        //get the department id
        $query = "SELECT id FROM `department` WHERE cat_name = \"$dept\"";
        $dbconfig = new dbconfig();
        $conn = $dbconfig->getCon();
        $result = $conn->query($query);
        $deptid = null;
        if($result->num_rows>0){
            while ($row=$result->fetch_assoc()) {
                $deptid = $row['id'];
            }
            
        }
        
        ////--------------Book Insertion--------------------////
        //check if tittle already existed
        $query = "SELECT book_id FROM `book` WHERE book_title = '$title'";
        $dbconfig = new dbconfig();
        $conn = $dbconfig->getCon();
        $result = $conn ->query($query);
        $book_id = null;
        //if not on db then load to db and return id
        if($result->num_rows>0){
            echo "error:Book Already Exsist!";
        }else{
            //query for book details insertion
            //$query = "INSERT INTO `book` (`book_id`, `book_title`, `abstract`, `pub_date`, `department`, `rev_count`, `status`, `enabled`, `views_count`, `cover`, `docloc`) VALUES (NULL, '$title', '$abs', '$pubdate', '$deptid', '0', '$stat', '0', '0', '', '', '$dl')";
            $query = "INSERT INTO `book` (`book_id`, `book_title`,  `abstract`, `pub_date`, `department`, `rev_count`, `status`, `enabled`, `views_count`, `cited`, `cover`, `docloc`, `dowloadable`) VALUES (NULL, '$title', '', '$pubdate', '$deptid', '0', '$stat', '0', '0', '0', '', '', '0')";
            //echo $query;
            //echo $query;
       // echo "<br/>" . $query;
            $dbconfig = new dbconfig();
            $conn = $dbconfig->getCon();
            $result = $conn ->query($query);

            $query = "SELECT book_id FROM `book` WHERE book_title = '$title'";
            $dbconfig = new dbconfig();
            $conn = $dbconfig->getCon();
            $result = $conn ->query($query);
            if($result->num_rows>0){
                while ($row=$result->fetch_assoc()) {
                    $book_id = $row['book_id'];


                    ///-----------INSERT TO HISTORY-----------////
                    if($stat==="Published"){
                            $query = "INSERT INTO `published` (`id`, `book_id`, `issn`, `journal`, `type`, `date`) VALUES (NULL, '$book_id', '$issn', '$journal', '$journaltype', '$pubdate')";
                            $dbconfig = new dbconfig();
                            $conn = $dbconfig->getCon();
                            $result20 = $conn ->query($query);
                    }else if($stat==="Utilized"){
                            $query = "INSERT INTO `utilize` (`id`, `book_id`, `orgname`, `orgaddress`, `date`) VALUES (NULL, '$book_id', '$org', '$orgadd', '$orgdate')";
                            $dbconfig = new dbconfig();
                            $conn = $dbconfig->getCon();
                            $result20 = $conn ->query($query);
                    }
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    date_default_timezone_set('Asia/Manila');
                    
                    $dateTime = date('Y-m-d H:i:s');
                   

                    $query = "INSERT INTO `paper_trail` (`id`, `book_id`, `p_sat_id`, `file_loc`, `requirements`, `isdone`, `Date`) VALUES (NULL, '$book_id', '1', '', '1', '1', '$dateTime')";
                    $result20 = $conn ->query($query);
                    
                    //echo $query;
                }
            }
            //echo "Done Inserting Book Details <br/>";

            ////--------------Author Insertion--------------------////
            //LOAD THE AUTHORS IF THE BOOK IS VALID ELSE DONT LOAD THE AUTHOR //
            //prepare the arrays of authors//
            $autorID = array();
            for($i=0; $i<count($fname); $i++){
                
                $query = "SELECT a_id FROM `author` WHERE a_fname = '$fname[$i]' and a_mname ='$mname[$i]' and a_lname='$lname[$i]' and a_suffix='$suf[$i]'";

                $dbconfig = new dbconfig();
                $conn = $dbconfig->getCon();
                $result = $conn ->query($query);

                    //check if author ailready existed, then get the Id
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                    
                        $conn->query($query);
                        array_push($autorID, $row['a_id']);
                        }
                    }else{
                        //insert author then get id
                        $query = "INSERT INTO `author` (`a_id`, `a_fname`, `a_mname`, `a_lname`, `a_suffix`, `a_add`, `a_contact`, `a_email`, `a_pic`) VALUES (NULL, '$fname[$i]', '$mname[$i]', '$lname[$i]', '$suf[$i]', '$add[$i]', '$contact[$i]', '$email[$i]', '')";
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();
                        $result = $conn ->query($query);
                        if($result){
                            $query = "SELECT a_id FROM `author` WHERE a_fname = '$fname[$i]' and a_mname ='$mname[$i]' and a_lname='$lname[$i]' and a_suffix='$suf[$i]'";
                                $dbconfig = new dbconfig();
                                $conn = $dbconfig->getCon();
                                $result = $conn ->query($query);

                                    
                                if($result->num_rows>0){
                                         while($row=$result->fetch_assoc()){
                    
                                            $conn->query($query);
                                            array_push($autorID, $row['a_id']);
                                        }
                                }
                    }else{
                        echo "Insert Author Fail";
                    }    
                }
            }



             //echo "Done Inserting Author <br/>";

            //insert junction Author Book
            foreach ($autorID as $key){
            
                $query = "INSERT INTO `junc_authorbook` (`id`, `book_id`, `aut_id`) VALUES (NULL, $book_id, $key)";
                // echo $query;
                $dbconfig = new dbconfig();
                $conn = $dbconfig->getCon();
                $conn ->query($query);
               // echo "Done setting constraint on AuthorBook <br/>";
            }
            ///------------END OF AUTHOR INSERTION-----------///



            ///------------START OF KEYWORDS INSERTION-------///
            /*
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
                    }
   
                }
                //echo "Loaded <br/>";
            }*/
            //echo "Done Inserting Keywords <br/>";


            //insert book and key on junction table
            /*
            foreach ($kw as $key) {
                //echo "keywords id: "+$key;
                        $query = "INSERT INTO `junc_bookkeywords` (`id`, `book_id`, `keywords_id`) VALUES (NULL, '$book_id', '$key')";
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();
                        $result = $conn ->query($query);
                        
            }*/
            //echo "Done setting constraint Book-Keywords <br/>";
            ///------------END OF Keywords INSERTION--------///
            
            ///--------------START OF REFERENCES INSERTION------------///
            /*
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
                

            }*/

            //insert book and refernce on junction table
            /*
            foreach ($refID as $key) {
                        $query = "INSERT INTO `junk_bookref` (`id`, `book_id`, `webref_id`) VALUES (NULL, '$book_id', '$key')";
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();
                        $conn ->query($query);
                        
            }*/
            //echo "Done setting constraint Book-References <br/>";
            
            ///-----------END OF REFERNCES INSERTION----------------////


            ///-----------START OF ADVISER INSERTION----------------///

            /*
            $adv_id = $_SESSION['adviser'];
            
            $query = "INSERT INTO `junc_advicerbook` (`id`, `book_id`, `adv_id`) VALUES (NULL, '$book_id', '$adv_id')";
            $dbconfig = new dbconfig();
            $conn = $dbconfig->getCon();
            $result = $conn ->query($query);
            */
            /*
            $adv_id = null;
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $adv_id = $row['adv_id'];
                    $query = "INSERT INTO `junc_advicerbook` (`id`, `book_id`, `adv_id`) VALUES (NULL, '$book_id', '$adv_id')";
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $conn ->query($query);
                }
            }else{
                $query = "INSERT INTO `adviser` (`adv_id`, `adv_fname`, `adv_midName`, `adv_Lname`, `adv_suff`, `adv_email`) VALUES (NULL, '$adv_fname', '$adv_mname', '$adv_lname', '$adv_suff', '$adv_email')";
                $dbconfig = new dbconfig();
                $conn = $dbconfig->getCon();
                $result = $conn ->query($query);

                if($result){
                    $query = "SELECT `adv_id` FROM `adviser` WHERE  adv_fname='$adv_fname' and adv_midName = '$adv_mname' and adv_Lname = '$adv_lname' and adv_suff = '$adv_suff'";
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $result = $conn ->query($query);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                        $adv_id = $row['adv_id'];
                        $query = "INSERT INTO `junc_advicerbook` (`id`, `book_id`, `adv_id`) VALUES (NULL, '$book_id', '$adv_id')";
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();
                        $conn ->query($query);
                }
            }

                }

            }
            */

             ///-----------END OF ADVISER INSERTION------------------///


            ///------------DOCUMENT PER GROUP INSERTION-------------///
                    $accid = $_SESSION['uid'];
                    $query = "INSERT INTO `groupdoc` (`id`, `accid`, `book_id`) VALUES (NULL, '$accid', '$book_id')";
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $result = $conn ->query($query);

                    //insert citation key
                    /*
                    $refkey = getRandomString(32);
                    $query = "INSERT INTO `referencekey` (`id`, `book_id`, `refkey`) VALUES ('', '$book_id', '$refkey')";
                    $dbconfig = new dbconfig();
                    $conn = $dbconfig->getCon();
                    $result = $conn ->query($query);
                    */

            ///------------END DOCUMENT PER GROUP INSERTION-------------///



                    //echo "success:Done:$book_id";



           

            
            
            }
        ////--------------End of Book Insertion--------------------////
        
        





        function getRandomString($length) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $string = '';

            for ($i = 0; $i < $length; $i++) {
                $string .= $characters[mt_rand(0, strlen($characters) - 1)];
            }

            return $string;
        }
    
?>