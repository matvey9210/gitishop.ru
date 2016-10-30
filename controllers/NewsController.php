<?php 
	// подключение модели
	require_once ROOT."/models/News.php";
	
	class NewsController{

		public function __construct(){

		}

		public function actionIndex(){
			
			//получение последних добавленных новостей
			$newsList = News::getNewsList();

			foreach($newsList as $news){
				echo $news->title."<br>";
				echo $news->description."<br>";
				echo $news->text."<br>";
				echo $news->date."<br><br><hr>";
			}
		}


		public function actionView($category,$id=false){
					
			$news = News::getNewsItem($category,$id);
			
		}
	}

 ?>