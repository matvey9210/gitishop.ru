<?php 


	return array(
		"^/?$" => "site/index",
		// новость по категории и id
		"^news/([a-z]+)/([0-9]+)$" => "news/view/$1/$2",
		// последние новости категории
		"^news/([a-z]+)$" => "news/view/$1",
		// последние новости раздела новости
		"^news$" => "news/index",
		"^products$" => "product/index"
		);
 ?>