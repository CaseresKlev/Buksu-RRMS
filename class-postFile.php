<?php

class PostFie{

	var $file;
	var $bookid;
     function __construct($file){
        $this->file = $file;
        print_r($this->file);  
    }


    public function getBookId($book_id){
    	$this->bookid = $book_id;
    	echo $this->book_id;
    }
    
}
?>