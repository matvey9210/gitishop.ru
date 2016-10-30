<?php 
	


	class News{

		public static function getNewsList(){
			
			$dbh = Db::getDB();

			$sth = $dbh->prepare("SELECT id, title, description, text FROM news ORDER BY id DESC LIMIT 10 ");
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sth->execute();
			$result = $sth->fetchall(PDO::FETCH_OBJ);

		
			/*while($row = $result->fetch(PDO::FETCH_ASSOC)){
				$res[$row['id']]["title"] = $row['title'];
				$res[$row['id']]["description"] = $row['description'];
				$res[$row['id']]["text"] = $row['text'];
				$res[$row['id']]["date"] = $row['date'];
			}*/

			return $result;
			
		}

		public static function getNewsItem($category=false,$id=false){

			$sql = "SELECT id, title, description, text, date FROM news WHERE ";
			if($id) $sql.="id = $id";
			if($category && $id) $sql.=" AND ";
			if($category) $sql.="category = '$category'";
			// сортируем по дате список если не указан id новости 
			if(!$id)$sql.= " ORDER BY date DESC";
			
			$db = DbConnect::getDB();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$result = $db->query($sql);
			
			while($row = $result->fetch(PDO::FETCH_ASSOC)){
				echo $row['id']."<br>";
				echo $row['title']."<br>";
				echo $row['description']."<br>";
				echo $row['text']."<br>";
				echo $row['date']."<br><br><hr>";
			};
		}
	}

 ?>