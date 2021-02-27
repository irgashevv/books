<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture01 
{
	private $conn;

	private $data = 
	[
		[
			'id' => 'null',
			'title' => 'Яблоко',
			'picture' =>'01.jpg',
			'preview' =>'Яблоко',
			'content' =>'Яблоко',
			'price' =>'1',
			'status' =>'1',
			'created' =>'2021-01-01 23:59:59',
			'updated' =>'2021-01-01 23:59:59'
		],
		[
			'id' => 'null',
			'title' => 'Груша',
			'picture' =>'02.jpg',
			'preview' =>'Груша',
			'content' =>'Груша',
			'price' =>'2',
			'status' =>'2',
			'created' =>'2021-01-01 23:59:59',
			'updated' =>'2021-01-01 23:59:59'
		],
		[
			'id' => 'null',
			'title' => 'Виноград',
			'picture' =>'03.jpg',
			'preview' =>'Виноград',
			'content' =>'Виноград',
			'price' =>'3',
			'status' =>'3',
			'created' =>'2021-01-01 23:59:59',
			'updated' =>'2021-01-01 23:59:59'
		],
		[
			'id' => 'null',
			'title' => 'Лимон',
			'picture' =>'04.jpg',
			'preview' =>'Лимон',
			'content' =>'Лимон',
			'price' =>'4',
			'status' =>'4',
			'created' =>'2021-01-01 23:59:59',
			'updated' =>'2021-01-01 23:59:59'
		],
		[
			'id' => 'null',
			'title' => 'Апельсин',
			'picture' =>'05.jpg',
			'preview' =>'Апельсин',
			'content' =>'Апельсин',
			'price' =>'5',
			'status' =>'5',
			'created' =>'2021-01-01 23:59:59',
			'updated' =>'2021-01-01 23:59:59'
		],	
		[
			'id' => 'null',
			'title' => 'Яблоко',
			'picture' =>'01.jpg',
			'preview' =>'Яблоко',
			'content' =>'Яблоко',
			'price' =>'1',
			'status' =>'1',
			'created' =>'2021-01-01 23:59:59',
			'updated' =>'2021-01-01 23:59:59'
		],
		[
			'id' => 'null',
			'title' => 'Груша',
			'picture' =>'02.jpg',
			'preview' =>'Груша',
			'content' =>'Груша',
			'price' =>'2',
			'status' =>'2',
			'created' =>'2021-01-01 23:59:59',
			'updated' =>'2021-01-01 23:59:59'
		],
		[
			'id' => 'null',
			'title' => 'Виноград',
			'picture' =>'03.jpg',
			'preview' =>'Виноград',
			'content' =>'Виноград',
			'price' =>'3',
			'status' =>'3',
			'created' =>'2021-01-01 23:59:59',
			'updated' =>'2021-01-01 23:59:59'
		],
		[
			'id' => 'null',
			'title' => 'Лимон',
			'picture' =>'04.jpg',
			'preview' =>'Лимон',
			'content' =>'Лимон',
			'price' =>'4',
			'status' =>'4',
			'created' =>'2021-01-01 23:59:59',
			'updated' =>'2021-01-01 23:59:59'
		],
		[
			'id' => 'null',
			'title' => 'Апельсин',
			'picture' =>'05.jpg',
			'preview' =>'Апельсин',
			'content' =>'Апельсин',
			'price' =>'5',
			'status' =>'5',
			'created' =>'2021-01-01 23:59:59',
			'updated' =>'2021-01-01 23:59:59'
		],
	];

	public function __construct(DBConnector $conn)
	{
		$this->conn = $conn->connect();
	}

	public function run()
	{
		foreach ($this->data as $product) 
		{
			copy( __DIR__ . "/../../fixtures_pics/" . $product['picture'], __DIR__ . "/../../../uploads/products/" . $product['picture']);
			$result = mysqli_query($this->conn, "INSERT INTO products VALUES (
				" . $product['id'] . ",
				'" . $product['title'] . "',
				'" . $product['picture'] . "',
				'" . $product['preview'] . "',
				'" . $product['content'] . "',
				'" . $product['price'] . "',
				'" . $product['status'] . "',
				'" . $product['created'] . "',
				'" . $product['updated'] . "')");
					if (!$result)
					{
						print mysqli_error($this->conn) . PHP_EOL;
					}
		}
	}
}