	<?php 

	class Router{

		private $routes;

		public function __construct(){
			$this->routes = include ROOT."/config/routes.php";


		}


		public function run(){

			// Получить строку запроса
				// удаляем первый и последний слешы
				$url =	trim($_SERVER['REQUEST_URI'],"/");
				
			// Проверить наличие такого запроса в Routes.php

				foreach($this->routes as $uriPattern => $path){
					
					// если прописан маршрут в роутах для адреса
					if(preg_match("~$uriPattern~",$url)){
					

							// Определение внтутреннего пути согластно правилу $uriPattern в роутах
							$internalRoute = preg_replace("~$uriPattern~",$path,$url);
							
							// разбиваем строку в мавссив
							$segments = explode("/",$internalRoute);

							$controllerName = ucfirst(array_shift($segments))."Controller";
							$action = "action".ucfirst(array_shift($segments));

							// если остались параметры 
							if($segments) $params = $segments; 
								else $params = array();
							if(file_exists(ROOT."/controllers/".$controllerName.".php")){

								require_once ROOT."/controllers/".$controllerName.".php";
							
								$controller = new $controllerName();

								
								//$controller->$action($params);
								//print_r($params);
								call_user_func_array(array($controller,$action), $params);
							}
							break; 	

						// https://www.youtube.com/watch?v=aPoNUhUzjg8 
					}
				} // end foreach
				
			// Если есть совпадение определить какой Контроллер и action обрабатывают запрос

			// Подключить файл класса-контроллера

			// Создать объект и вызвать метод т.е. action 

		}
	}

	/*function myFunc(){
		
		foreach(func_get_args() as $param){
			if(!$param) continue;
			
			if($param * 1) echo "int - ".($param *=1) ."<br>";
			if(is_string($param)) echo "string - ".$param."<br>";
	
		}
	}

	myFunc("one","","two",false,3,4,6,"7","hello8");

	*/


 ?>