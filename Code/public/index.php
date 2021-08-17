<?php
include "../app/core/App.php";
session_start();


 define('CONTROLLER', 	'../app/controllers/');
 define('CORE', 			'../app/core/');
 define('MODELS', 		'../app/models/');
 define('CONFIG', 		'../app/core/config/');
//getting the root url for reference in the head for the css files

$rootUrl = $_SERVER['REQUEST_SCHEME'] . "://" .  $_SERVER['SERVER_NAME'] .  $_SERVER['PHP_SELF'];

$rootUrl = str_replace("index.php", "", $rootUrl);

 define('ROOT', $rootUrl);
 define('ASSETS', $rootUrl . "assets/");


if(!function_exists('classAutoLoader')){
	function classAutoLoader($class){
		
		$docClasses = array(CONTROLLER, CORE, MODELS, CONFIG);
		
		foreach($docClasses as $d){
			
			if(file_exists("$d".$class.".php")){
				include "$d".$class.".php";	
			}
		}		
	}
}

spl_autoload_register('classAutoLoader');



$app = new App();
 



?>