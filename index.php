<?php 

	// FRONT CONTROLLER

	// 1. Общие настройки
	ini_set("display_errors",1);
	error_reporting(E_ALL);
        
	// 2. Подключение файла конфигурации
	include dirname(__FILE__)."/config/config.php";
	
	include ROOT."/components/Autoload.php";



	// 4. Вызов Router

	$router = new Router();
	$router->run();



 ?>