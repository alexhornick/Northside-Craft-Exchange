<?php
class DatabaseModel
{
	private $employee_id;
	private $password;

	public function __construct($employee_id, $password){}

	//handles dropdown box for items and materials
	public static function dropdown($case)
	{
		//Select name from item where item id is not in craft or materials
		$database = dataBaseConnection::getInstance();
		switch($case){
		case 'item':
			$dataset = $database->select("item", "item.name");
		
		break;
		//select item.item_name where item.item_id == material.item_id
		case 'material':
			$dataset = $database->select("item", "item.name", ["item.item_id" => $database->select("material","item_id")]);
		break;
		}
		return $dataset;
	}
	//handles dropdown box for suppliers
	public static function dropdownSuppliers($supplier_id)
	{
		$database = dataBaseConnection::getInstance();
		$dataset = $database->select("item", "item.name", [		"AND" => [
																	  "item.item_id" => $database->select("material","item_id"),
																	  "material.supplier_id" => $supplier_id
																	  ]
															 ]);
		return $dataset;
	}
	
	public static function outputDatabase($arrayOfTables, $password) 
	{
		$database = databaseConnection::getInstance();
		$dataset = $database->select($table, $columns, ['employee_id' => $employee_id]);
		return $dbpassword_hash;
	}
	public static function all() {
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM user');
		foreach($req->fetchAll() as $user){
			$list[] = new Authentication($user['employee_id'], $user['password_hash'], $user['accessLevel']);
	}
		return $list;

		//return new Authentication($user['employee_id'], $user['password_hash']);


	}
}