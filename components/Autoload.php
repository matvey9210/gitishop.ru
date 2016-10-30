<?php 
	
	function __autoload($class_name){
		$derictories = array("components","controllers","models");
		foreach($derictories as $derictory){

			if(file_exists(ROOT."/".$derictory."/".$class_name.".php")){
				require_once ROOT."/".$derictory."/".$class_name.".php";
			}
		}
	
	}

 ?>