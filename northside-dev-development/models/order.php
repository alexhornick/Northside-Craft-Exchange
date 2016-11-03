<!--This whole model might just get deleted, but keeping it for now so I can reference some of the queries I used-->

<?php
require_once('models/database.php'); 
class Order
{
	//This function inserts sale orders into the database, as well as all the order details
	/*
	public function confirm(){
		if ($_SESSION['orderType'] == 'sale'){
			self::insertSale();
		}
		else if ($_SESSION['orderType'] == 'gift'){
			self::insertGiftOrder();
		}
		else if ($_SESSION['orderType'] == 'custom'){
			self::insertCustomOrder();
		}
	}
	*/

	public function getItems()
	{
		$stageDBO = DatabaseObjectFactory::build('item');
		$arr = ['item_id','name','current_price'];
		$items = $stageDBO->getRecords($arr);
		
		return $items;
	}
	
	public function getPrice($item_id)
	{
		$stageDBO = DatabaseObjectFactory::build('item');
		$arr = ['current_price'];
		$itemPrice = $stageDBO->getRecords($arr,['item_id' => $item_id]);
		return $itemPrice[0]['current_price'];
		
	}
	
	public function getMaterials()
	{

		$stageDBO = DatabaseObjectFactory::build('material');
		$stageDBO->setJoin("'[>]item' => 'item_id'");
		$arr = ['material_id','name'];
		$materials = $stageDBO->getRecords($arr);
		//print_r($materials);


		/*include('../../connection.php');
		$database = databaseConnection::getInstance(); 
		$dataset = array();
		$dataset = $database->query("SELECT name, material.material_id, item.item_id FROM Material, Item WHERE Material.item_id = Item.item_id
									ORDER BY name ASC")->fetchAll();*/
		return $materials;
	}
	
	public static function insertSale() 
	{
		//create new insert object
		$insertDBO = InsertObjectFactory::build('sale');
		$insertDBO->setOrderInsert($_SESSION['order']);
		$insertDBO->setOrderDetailsInsert($_SESSION['order_details']);
		$insertDBO->commitInsert();
		return $insertDBO->recieptGet();

	}
	
	public static function insertGiftOrder()
	{
		$insertDBO = InsertObjectFactory::build('gift');
		$insertDBO->setOrderInsert($_SESSION['order']);
		$insertDBO->setOrderDetailsInsert($_SESSION['order_details']);
		$insertDBO->setCustomerAddressInsert($_SESSION['customerAddress']);
		$insertDBO->setRecipientAddressInsert($_SESSION['recipientAddress']);
		$insertDBO->setGiftOrderInsert($_SESSION['gift_order']);
		$insertDBO->setGiftShippingInsert($_SESSION['gift_shipping']);
		$insertDBO->setShipCostInsert($_SESSION['ship_cost']);
		$insertDBO->setCustomerInsert($_SESSION['customer']);
		$insertDBO->commitInsert();
		return $insertDBO->recieptGet();
	}
	public static function insertCustomOrder()
	{
		$insertDBO = InsertObjectFactory::build('custom');
		$insertDBO->setMaterials($_SESSION['materials']);
		$insertDBO->setCustomerAddressInsert($_SESSION['customerAddress']);
		$insertDBO->setCustomerInsert($_SESSION['customer']);
		$insertDBO->setOrderInsert($_SESSION['order']);
		$insertDBO->setOrderDetailsInsert($_SESSION['order_details']);
		$insertDBO->setCustomOrderInsert($_SESSION['custom_order']);
		$insertDBO->setItemInsert($_SESSION['item']);
		$insertDBO->commitInsert();
		return $insertDBO->recieptGet();
	}
}
