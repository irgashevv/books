<?php 

include_once __DIR__ . "/../Model/Basket.php";
include_once __DIR__ . "/../Model/BasketItem.php";
include_once __DIR__ . "/Interfaces/BasketInterface.php";

class BasketService implements BasketInterface
{
		
	public static function getBasketByUserId($userId)
	{
		$basket = new Basket($userId);

		if ($basket->getFromDB() == null) {
			$basket->userId = $userId;
			$basket->save();
		}
		return $basket->getFromDB();
	}

	public function	updateBasketItem($basket_id, $product_id, $qty)
	{
		(new BasketItem($basket_id, $product_id, $qty))->update();
	}

	public function	deleteBasketItem($basket_id, $product_id)
	{
		(new BasketItem())->deleteProductByBasketId($product_id, $basket_id);
	}

	public function createBasketItem($basket_id, $product_id, $qty)
	{
		$item = new BasketItem();
		$item->basket_id = $basket_id;
		$item->product_id = $product_id;
		$item->quantity = $qty;
		
		$item->save();
	}

	public function getBasketProducts($basket_id)
	{
		return (new BasketItem())->getByBasketId($basket_id);
	}
}