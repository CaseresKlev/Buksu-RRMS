<?php
//$input_file = "read.doc";
function doc_to_text($input_file){
	$file_handle = fopen($input_file, "r"); //open the file
	$stream_text = @fread($file_handle, filesize($input_file));
	$stream_line = explode(chr(0x0D),$stream_text);
	$output_text = "";
	foreach($stream_line as $single_line){
		$line_pos = strpos($single_line, chr(0x00));
		if(($line_pos !== FALSE) || (strlen($single_line)==0)){
			$output_text .= "";
		}else{
			$output_text .= $single_line." ";
		}
	}
	$output_text = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/", "", $output_text);
   //echo $output_text;
    return $output_text;
    
}

echo doc_to_text("read.doc");
?>