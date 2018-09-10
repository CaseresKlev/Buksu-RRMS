<?php

class Book{
     function __construct($file, $cover, $title, $abstract, $pubdate, $department, $keywords, $ref){
        $this->file = $file;
        $this->title = $title;
        $this->abstract = $abstract;
        $this->pubdate = $pubdate;
        $this->department = $department;
        $this->keywords = $keywords;
        $this->ref = $ref;
    }
    
}
?>