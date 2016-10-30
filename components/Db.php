<?php 

	class Db{
		public static function getDb(){
			$host = "localhost";
			$dbname = "gitishop";
			$user = "root";
			$pass = "";

			$db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
			return $db;
		}

		
	}

 ?>