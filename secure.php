<?php
	

class mySession{
	$id =null;
	$group = null;
	$activate = null;
	$type = null;
     function __construct($id, $group, $activate, $type){
        $this->id = $fname;
        $this->group = $group;
        $this->activate = $activate;
        $this->type = $type;
        
        /*$_SESSION["id"] = $id;
  		$_SESSION["g_name"] = $group;
  		$_SESSION["activate"] = $activate;
  		$_SESSION["type"] = $type;*/
    }


    public function getSessionId(){
    	return $this->id;
    }

    public function getSessionGroup(){
    	return $this->group;
    }
    public function getSessionActivate(){
    	return $this->activate;
    }



    
}

?>