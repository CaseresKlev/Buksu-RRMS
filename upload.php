<?php
//move_uploaded_file($_FILES['file']['tmp_name'],$_FILES['file']['name']);

//echo $_POST['title'];

	///----FILE DOCX-----///
    include_once 'connection.php';

    $bookid = $_POST['bookid'];
    //echo "#log-".$bookid;


    $file = $_FILES['file'];
    $tempfile = $_FILES['file']['tmp_name'];
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $error = $_FILES['file']['error'];
    $filesize = $_FILES['file']['size'];
    $fileext = explode(".",$filename);
    $extension = strtolower(end($fileext));
    $allowedFile = array('pdf');


    //cover

    $coverLoc = "fhrdghj";


    if(!empty($_FILES['cover'])){
        $cover = $_FILES['cover'];
        $coverTemp = $_FILES['cover']['tmp_name'];
        $covername = $_FILES['cover']['name'];
        $coversize = $_FILES['cover']['size'];
        $covertype = $_FILES['cover']['type'];
        $covererror = $_FILES['cover']['error'];
        $coversize = $_FILES['cover']['size'];
        $coverext = explode(".",$covername);
        $coverextension = strtolower(end($coverext));
        $coverallowed = array('jpg', 'png' , 'jpeg');
        if(in_array($coverextension, $coverallowed)){
            if($error===0){
                //2MB Allowed
                if($coversize<2000000){
                    $newCoverName = uniqid('',true) . "." . $coverextension;
                    $loc = "cover/" . $newCoverName;
                    if(move_uploaded_file($coverTemp, $loc)){
                      $coverLoc = "cover/" . $newCoverName;
                    }

                }else{
                    echo "#error-Cover Exceeded 2MB size";
                }
            }else{
                echo "#error-There was error Uploading your Cover!";
            }
    }else{
        echo "#error-Cover is Not Valid!";
    }
    }else{
         $coverLoc = "cover/default-book-cover.png";
    }



    if(in_array($extension, $allowedFile)){
            if($error===0){
                //45MB Allowed
                if($filesize<45000000){
                    $newFileName = uniqid('',true) . "." . $extension;
                    $serverPath = "book/" . $newFileName;

                    $FileFullpath = $serverPath; /// only for database
                    //echo "Book: " . $FileFullpath . " Cover: " . $coverLoc;
                    //echo "<br/>TempFile: " . $tempfile . "<br/>";
                    //echo "<br/>Book: " . $newFileName . "<br/>";
                    if(move_uploaded_file($tempfile, $FileFullpath)){
                        $dbconfig = new dbconfig();
                        $conn = $dbconfig->getCon();



                        $query= "UPDATE `book` SET `enabled` = '1', `cover` = '$coverLoc', `docloc` = '$FileFullpath' WHERE `book`.`book_id` = $bookid";
                        echo "$query";
                        //  echo $query;

                        //echo "#log-" . $query;
                        echo "#log-" . $query;

                        //echo "#log-" . $query;

                        //echo "#log-Uploading your document";
                        $result = $conn ->query($query);
                        if($result){
                          echo "#log:Success:Upload Done";
                        }
                    }
                    //echo $FileFullpath . " Book ID: " . $bookid;
                    //startIndexing($FileFullpath);
                }else{
                    echo "#error:Error:File Exceeded in Maximu File size";
                }
            }else{
                echo "#error:Error:There was error Uploading your File!";
            }
    }else{
        //echo "File is Not Valid!";
      echo "#error:Error:File is Not Valid!";
    }






    //include 'openDocs.php';
	//include 'dbconfig.php';

	function startIndexing($serverFile){

		$kv_texts = kv_read_word($serverFile);

    //echo $kv_texts;

		if($kv_texts !== false) {
    		$temp = nl2br($kv_texts);
    		//$res = split('/<br[^>][" "]*>/i',$temp);
			//$res = preg_split('/\s+/',$temp);
			$noTags = strip_tags($temp);
			$phar = preg_split('[\n]', $noTags);
			//$res = preg_split('/[\s]+/',$noTags); <----------
   			// $res = preg_split('[\n]',$temp);
   			$counter = 0;
   			$pattern = '/[.,]/';

    		foreach($phar as $p){

				//valid paragraphs should only contain > 15 words or greater
				$pharWords = preg_split("/\s+/", $p);

				//if words in pharagraph is >= 15 words then index the words
				if (count($pharWords)>15){
					//echo "<------------>" . $p . "<------------><br />";
					foreach($pharWords as $word){
					//echo $word . " " . strlen($word) . "<br />";
						if (strlen($word)>0){
						//echo $word . " " . strlen($word) . "<br />";

              //--------------------------------------------------------------
							cleanWord($word);
							$counter = $counter + 1;
              //--------------------------------------------------------------
              //echo $word;

						//echo "\tCounts: " . $counter . "<br/>";
						}
					}
				}
				//echo "Sentence: " . $counter++ . " :" . $w;
			}
			echo "<h1>Done</h1>";

		}else {
			echo "#error-Cant Read that file.";
		}


	}


		function kv_read_word($input_file){

    		$kv_strip_texts = '';
        	$kv_texts = '';

   			if(!$input_file || !file_exists($input_file)) return false;

   				$zip = zip_open($input_file);

   			if (!$zip || is_numeric($zip)) return false;


   			while ($zip_entry = zip_read($zip)) {

       			if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

       			if (zip_entry_name($zip_entry) != "word/document.xml") continue;

       			$kv_texts .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

       			zip_entry_close($zip_entry);
   			}

   			zip_close($zip);


   			$kv_texts = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $kv_texts);
   			$kv_texts = str_replace('</w:r></w:p>', "\r\n", $kv_texts);
   			//$kv_strip_texts = nl2br(strip_tags($kv_texts,’‘));
   			$kv_strip_texts = nl2br(strip_tags($kv_texts,''));

   			return $kv_strip_texts;
		}

		Function cleanWord($testWord){
        	//echo $testWord . "<br />";
        	//echo strlen($testWord);
        	//$quot = "\"";
        	include ('dbconfig.php');
        	$pattern = '/[.,!:?]/';
        	//$pattern = "\"";
        	$testWord = str_replace('“',"",$testWord);
        	$testWord = str_replace('”',"",$testWord);
        	$testWord = str_replace("(","",$testWord);
        	$testWord = str_replace(")","",$testWord);
        	$testWord = str_replace("\"","",$testWord);
        	$testWord = str_replace("]","",$testWord);
        	$testWord = str_replace("[","",$testWord);
        	$strlen = strlen($testWord);
        	$cleanEntry = "";

        	$tempAr = preg_split($pattern,$testWord);
        		foreach($tempAr as $letters){
            		$cleanEntry .= $letters;
        		}
            echo $cleanEntry . " ";

        	//$query = "SELECT id FROM `dictionary` WHERE word = '$cleanEntry';";

        /*	if (strlen($cleanEntry)>0){
            	$id = $conn->query($query);

            	if ($id->num_rows > 0){
                	foreach ($id as $idnum){
                    	echo "Word: " . $cleanEntry . "\tFound at id: " . $idnum['id'] . "<br/>";
                	}
            	} else {
                	$query = "INSERT INTO `dictionary` (`id`, `word`, `index_count`) VALUES (NULL, '$cleanEntry', '0')";
                	//echo $query;
                	$result = $conn->query($query);
                	echo $cleanEntry . " Done <br/>";
            	};
        	} */
    	}

?>
