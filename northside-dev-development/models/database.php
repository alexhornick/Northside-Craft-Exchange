<?php
//select($table, $columns, $where)
require_once('connection.php');
class DatabaseObject {
	//protected static $database_db;
	
	public $database_db;
	//public static $database;
	protected $field_set; //array that holds table field associative array
	protected $my_field_set;//holds any necessary appends to the array
	protected $query; //actual query for reciept by medoo
	protected $joinQuery;
	protected $data_set; //returned data set
	protected $join = false; //boolean for innerJoin
	protected $table;
	protected $columns;
	protected $where;
	protected $lastInsertId;
	protected $reciept = [];
	//array to be inserted, each class will define their own, 
	protected $insertArray = [];
	public function __construct(){
		$this->database_db = databaseConnection::getInstance();
	}
	public static function errAlert($errormessage){
		$_POST['error'] = 1;
	}
	public function recieptAdd($lineOfReciept){
		if (is_array($this->reciept)){
			$this->reciept[] = (string)$lineOfReciept;
		}
		else if (!(is_array($this->reciept))){
			$this->reciept = (string)$lineOfReciept;
		}

	}
	public function recieptGet(){
		$returnableReciept = $this->reciept;
		return $returnableReciept;
	}
	public function recieptEcho(){
		if (is_array($this->reciept)){
			foreach($this->reciept as $separateLine){
				echo $separateLine;
			}
		}
		else if (!(is_array($this->reciept))){
			echo $this->$reciept;
		}
	}
	public function getRecords($columns, $where = "") {
		$this->columns = $columns;

		if($this->join){

			$this->data_set = $this->database_db->select($this->table, $this->joinQuery, $columns, $where);
		}
		else if ($where != ""){
			$this->data_set = $this->database_db->select($this->table, $this->columns, $where);
		}
		
		else{
			$this->data_set = $this->database_db->select($this->table, $this->columns);
		}
		return $this->data_set;
	}
	public function setRecords($table, $data) {
		$this->lastInsertId = $this->database_db->insert($table, $data);

	}
	public function setTable($string){
		$this->table = $string;
	}



	public function makeQuery($string)
	{
		$this->data_set = $this->database_db->query($string)->fetchAll();
		return $this->data_set;
	}

	public function updateRecord($data,$where)
	{
		$this->database_db->update($this->table, $data,$where);
	}

	public function getLastInsert()
	{
		return $this->lastInsertId;
	}

	public function deleteRecord($where)
	{
		$this->database_db->delete($this->table,$where);
	}

	public function get_table($string){
		return $this->table;
	}
	public function drawTable(){
		//var_dump($this->field_set);
		$rows = sizeof($this->data_set);
		$cols = sizeof($this->columns);
		echo "<table border='1'>";
		//draw header labels
		foreach($this->columns as $colHeading){
			echo "<th>";
			echo str_replace("Id", "ID", ucwords(str_replace("_", " ",$colHeading)));
			echo "</th>";
		}
		//var_dump($this->data_set);
		for ($tr=1; $tr<=$rows; $tr++){
			echo "<tr>";
				for($td = 1; $td<=$cols;$td++){
					//var_dump($cols);
					echo "<td align='center'>".$this->data_set[$tr-1][$this->columns[$td-1]]."</td>";
				}
			echo "</tr>";
		}
		echo "</table>";
	}

	public function setJoin($join_array){
		$this->join = true;
		$this->joinQuery = $join_array;
	}
	public function unSetJoin($join_array){
		$this->join = false;

	}
}
//1
class OrderDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array( 'order_id', 'customer_id', 'employee_id', 'order_date',
					   'subtotal', 'tax_amount', 'total_price', 'order_type' );
		$this->setTable('order');
	}
}
//2 //the insert will ultimately be for a sale object
class OrderDetailsDatabaseObject extends OrderDatabaseObject {
	
	function __construct(){
		parent::__construct();
		$this->my_field_set = array('order_id','item_id', 'item_price', 'qty');
		$this->setTable('order_details');
	}
}
//3
class GiftOrderDatabaseObject extends OrderDatabaseObject {
	function __construct(){
		parent::__construct();
		$this->my_field_set = array('gift_id','order_id','rec_last_name','rec_first_name','address_id');
		$this->setTable('gift_order');
	}
}
//base object is no my_field_set
//3
class AddressDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('address_id', 'street_number', 'street_suffix', 'street_name',
								 'street_type','street_direction','address_type',
								 'address_type_identifier','minor_municipality','major_municipality',
								 'governing_district','zip', 'iso_country_code');
		$this->setTable('address');
	}
}
//4
class CustomerDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('customer_id','last_name','first_name','phone_number','email','address_id');
		$this->setTable('customer');
	}
}
//5
class EmployeeDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('employee_id','last_name','first_name','hire_date','address_id','phone_number');
		$this->setTable('employee');
	}
}
//6
class LocalVendorsDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('vendor_id','last_name','first_name','vendor_name','phone_number', 'address_id','email');
	}
}
//7
class SupplierOrderDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('supplier_order_id','employee_id', 'supplier_id', 'order_date', 'subtotal', 'tax_amount','total_discount', 'total_price');
		$this->setTable('supplier_order');
	}
}
//8
class OrderMaterialsDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('material_id','supplier_order_id', 'qty', 'discount_amount');
		$this->setTable('order_materials');
	}
}
//9
class SupplierDiscountDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('material_id','supplier_id', 'min_qty', 'discount_percent');
		$this->setTable('supplier_discount');
	}
}
//10
class SupplierDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('supplier_id','company_name','contact_name','contact_job_title','company_phone','contact_phone','address_id','email');
		$this->setTable('supplier');
	}
}
//11
class ItemDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('item_id', 'qoh','calculated_qoh','name','original_price','current_price','min_price');
		$this->setTable('item');
	}
}
//12
class ReturnDetailsDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('return_id','item_id','qty');
		$this->setTable('return_details');
	}
}
//13
class ReturnsInventoryDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('return_id','order_id','return_date');
		$this->setTable('returns_inventory');
	}
}
//14
class CraftDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('craft_id','item_id');
		$this->table = 'craft';
	}
}
//15
class CraftMaterialsDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('material_id','craft_id');
		$this->setTable('craft_materials');
	}
}
//16
class UserDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('employee_id','password_hash', 'accessLevel');
		$this->setTable('user');
	}
}
//17
class ShipCostDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('ship_cost_id','ship_distance', 'ship_id', 'shipping_cost');
		$this->setTable('ship_cost');
	}
}
//18
class GiftShippingDatabaseObject extends DatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('ship_id','address_id', 'gift_id');

		$this->setTable('gift_shipping');
	}
}
//19
class CustomOrderDatabaseObject extends OrderDatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('custom_order_id','order_id', 'comment', 'price_estimation');
		$this->setTable('custom_order');

	}
}
//20
class MaterialDatabaseObject extends ItemDatabaseObject {
	function __construct(){
		parent::__construct();
		$this->field_set = array('material_id','supplier_id', 'item_id', 'item_price','unit_price');
		$this->setTable('material');
	}
}

class DatabaseObjectFactory {
	public static function build($tableName) {
		$tableName = ucwords(str_replace("_", " ", $tableName));
		$DatabaseObject = str_replace(" ","", $tableName."DatabaseObject");
		//var_dump($DatabaseObject);
		if (class_exists($DatabaseObject)) {
			return new $DatabaseObject;
		}
		else {
			throw new Exception("Error in Database Object Factory. Tablename doesn't exist.");
		}
	}
}
class SaleInsertObject extends OrderDetailsDatabaseObject {
	//setting up the tables we are gonna mess with
	protected $insertArray = [];
	protected $orderNumber;
	public function __construct(){
		parent::__construct();
		$this->insertArray = array(
									'order' => array(),
									'order_details' => array(),
							);
	}
	public function setOrderInsert($orderInsertArray){
		$this->insertArray['order'] = $orderInsertArray;
		//print_r($insertArray);
	}
	public function setOrderDetailsInsert($orderDetailsInsertArray){
		//$i = 0;
		//count returns a number based on 0, sql counts from 1
		//
		$data = $this->database_db->select("order","order_id",[ "ORDER" => "order.order_id DESC"]);
		$this->orderNumber = $data[0];
		//echo $this->orderNumber;
		$this->insertArray['order_details'] = $orderDetailsInsertArray;

  		//echo "<pre><br>===============================insertArray<br>";
		//print_r($this->insertArray['order_details']);
		//echo "</pre>"; 

	}
	public function commitInsert(){
		$_SESSION['order']            = NULL;
		$_SESSION['order_details']    = NULL;
		//$this->database_db->pdo->beginTransaction();
		try{
		$this->database_db->insert('order', $this->insertArray['order']);
		$i = 0;
		$data = $this->database_db->select("order","order_id",[ "ORDER" => "order.order_id DESC"]);
		$this->orderNumber = $data[0];
		$this->recieptAdd('Thank you, your Order ID is :'.$data[0].'!');
		//echo 'thisordernumber='.$this->orderNumber;
		foreach ($this->insertArray['order_details'] as $separateInsert){
			$separateInsert['order_id'] = $this->orderNumber;
			$data2 = $this->database_db->select('item', 'calculated_qoh', ['item_id' => $separateInsert['item_id']]);
			$itemQOH = $data2[0];
			$itemQOH =  $itemQOH - $separateInsert['qty'];
			$this->database_db->update('item', ['calculated_qoh' => $itemQOH], ['item_id' => $separateInsert['item_id']]);
			$this->database_db->insert('order_details', $separateInsert);
			

		}
		//$this->database_db->pdo->commit();

		}
		catch(PDOException $e){
			$this->database_db->pdo->rollback();
			DatabaseObject::errAlert($e.'inside of commitInsert()');

		}

	}
}
//order and order details are taken care of by parent
class GiftInsertObject extends SaleInsertObject {
		public function __construct(){
		parent::__construct();
		$this->recipientAddressID = NULL;
		$this->customerAddressID = NULL;
		$this->insertArray = array(
									'order'            => array(),
									'order_details'    => array(),
									'gift_order'       => array(),
									'customerAddress'  => array(),
									'recipientAddress' => array(),
									'gift_shipping'    => array(),
									'ship_cost'        => array(),
									'customer'         => array(),
							);
	}
	public function setOrderInsert($orderInsertArray){$this->insertArray['order'] = $orderInsertArray;}
	public function setOrderDetailsInsert($orderDetailsInsertArray){

		$data = $this->database_db->select('order','order_id',[ 'ORDER' => 'order_id DESC']);
		$this->insertArray['order_details'] += $orderDetailsInsertArray;
  		//echo "<pre><br>===============================insertArray<br>";
		//print_r($this->insertArray['order_details'][0]);
		//echo "</pre>"; 
		//var_dump($insertArray);

	}
	public function setCustomerAddressInsert($addressInsertArray){$this->insertArray['customerAddress'] = $addressInsertArray;}

	public function setRecipientAddressInsert($addressInsertArray){$this->insertArray['recipientAddress'] = $addressInsertArray;}

	public function setGiftOrderInsert($giftOrderInsertArray){
		$this->insertArray['gift_order'] = $giftOrderInsertArray;
		$this->insertArray['gift_order']['order_id'] = $this->orderNumber;
	}
	public function setGiftShippingInsert($giftShippingInsertArray){$this->insertArray['gift_shipping'] = $giftShippingInsertArray;}

	public function setShipCostInsert($shipCostInsertArray){$this->insertArray['ship_cost'] = $shipCostInsertArray;}

	public function setCustomerInsert($customerInsertArray){$this->insertArray['customer'] = $customerInsertArray;}

	public function commitInsert(){
		$_SESSION['order']            = NULL;
		$_SESSION['order_details']    = NULL;
		$_SESSION['gift_order']       = NULL;
		$_SESSION['custom_order']     = NULL;
		$_SESSION['customer']         = NULL;
		$_SESSION['gift_shipping']    = NULL;
		$_SESSION['ship_cost']        = NULL;
		$_SESSION['customerAddress']  = NULL;
		$_SESSION['recipientAddress'] = NULL;
		$this->database_db->pdo->beginTransaction();
		//pray that none of this fails.
		try
		{
		//a customer address must exist before we can grab a customer_id for the order
		$this->database_db->insert('address', $this->insertArray['customerAddress']);
		//now we must grab that address id for our customer insert
		$data = $this->database_db->select('address','address_id',['ORDER' => 'address.address_id DESC']);
		$customerAddressID = $data[0];
		//before we create an order/order_details insert we must grab a customer id
		// which means we must insert a customer then grab that id
		$this->insertArray['customer']['address_id'] = $customerAddressID;
		$this->database_db->insert('customer', $this->insertArray['customer']);
		$data = $this->database_db->select('customer','customer_id', ['ORDER' => 'customer.customer_id DESC'] );
		$custID = $data[0];//['customer_id'];
		//now that we have a customer and therefore an address for that customer we can update the order array before the insert with
		//a customer id
		$this->insertArray['order']['customer_id'] = $custID;
		//$this->database_db->insert['order']
		$this->database_db->insert('order', $this->insertArray['order']);
		//now we can grab an order id for our order details
		$data = $this->database_db->select('order','order_id',['ORDER' => 'order.order_id DESC']);
		$orderID = $data[0];
		$this->orderNumber = $orderID;
		$this->recieptAdd('Thank you, your Order ID is :'.$orderID.'!');
		//now that we have an order, we can do our order_details inserts
		//and just to be dirty we'll decrement item.qoh here
		foreach ($this->insertArray['order_details'] as $separateInsert){
			//echo "<br>===============================separateInsert<br>";
			$separateInsert['order_id'] = $orderID;
			//$this->insertArray['order_details']['order_id'] = $orderID;
			//print_r($separateInsert);
			$data = $this->database_db->select('item', 'calculated_qoh', ['item_id' => $separateInsert['item_id']]);
			$itemQOH = $data[0];
			$itemQOH =  $itemQOH - $separateInsert['qty'];
			$this->database_db->update('item', ['calculated_qoh' => $itemQOH], ['item_id' => $separateInsert['item_id']]);
			$this->database_db->insert('order_details', $separateInsert);
		}
		//now before we can insert a gift order, we need to have an address_id, and an order_id
		//to get an address_id id we have to insert the recipients address
		$this->database_db->insert('address', $this->insertArray['recipientAddress']);
		//now we can pull the address id for gift_order
		$data = $this->database_db->select('address','address_id',['ORDER' => 'address.address_id DESC']);
		$recipientAddressID = $data[0];//['address_id'];
		//now we pull the order_id for gift_order
		//$data = $this->database_db->select('order','order_id');
		//$giftOrderId = $data[0];//['order_id'];
		//now we update our gift order array with order_id and address_id
		$this->insertArray['gift_order']['order_id'] = $orderID;
		$this->insertArray['gift_order']['address_id'] = $recipientAddressID;
		//now we can push her on in
		$this->database_db->insert('gift_order', $this->insertArray['gift_order']);
		//cool now we need to prepare gift_shipping, we need recipients address_id and a gift id from our gift_order
		//we still have the recipients address, so all we need is the gift id
		$data = $this->database_db->select('gift_order', 'gift_id',['ORDER' => 'gift_order.gift_id DESC']);
		$giftID = $data[0];//['gift_id'];
		//now that we've got the gift id we can start preparing gift_shipping
		$this->insertArray['gift_shipping']['gift_id'] = $giftID;
		//changing//$this->insertArray['gift_shipping']['address_id'] = $recipientAddressID;
		//now we can roll in the gift_shipping record
		$this->database_db->insert('gift_shipping', $this->insertArray['gift_shipping']);
		//now that we have a gift_shipping record we can start preparing ship_cost
		//which means we need a ship id
		$data = $this->database_db->select('gift_shipping', 'ship_id', ['ORDER' => 'gift_shipping.ship_id DESC']);
		$shipID = $data[0];//['ship_id'];
		//got it, so now we'll prepare ship cost
		$this->insertArray['ship_cost']['ship_id'] = $shipID;
		//now we can push it
		$this->database_db->insert('ship_cost',$this->insertArray['ship_cost']);
		//now that we've gotten this far we should update "item";
		//echo "<pre>";
		//echo "THIS IS THE FINAL INSERT ARRAY->"."<br>";
		//print_r($this->insertArray);
		//echo "</pre>";
		$this->database_db->pdo->commit();

		}

		catch(PDOException $e)
		{
			$this->database_db->pdo->rollback();
			ErrorHandler($e);
			DatabaseObject::errAlert($e.'inside of insertCommit()2');
			//require_once($footer_inc);
			exit;
		}

	}

}

class CustomInsertObject extends SaleInsertObject{
		public function __construct(){
		parent::__construct();
		$this->insertArray = array(
									'order'            => array(),
									'order_details'    => array(),
									'custom_order'	   => array(),
									'customerAddress'  => array(),
									'customer'         => array(),
									'item'			   => array(),
									'craft'			   => array(),
									'materials'		   => array(),
							);
	}
	public function setCustomerAddressInsert($addressInsertArray){$this->insertArray['customerAddress'] = $addressInsertArray;}

	public function setCustomerInsert($customerInsertArray){$this->insertArray['customer'] = $customerInsertArray;}

	public function setOrderInsert($orderInsertArray){$this->insertArray['order'] = $orderInsertArray;}

	public function setOrderDetailsInsert($orderDetailsInsertArray){$this->insertArray['order_details'] = $orderDetailsInsertArray;}

	public function setCustomOrderInsert($customOrderInsertArray){$this->insertArray['custom_order'] = $customOrderInsertArray;}

	public function setItemInsert($itemInsertArray){$this->insertArray['item'] = $itemInsertArray;}

	public function setCraftInsert($insertCraftArray){$this->insertArray['craft'] = $itemInsertArray;}

	public function setMaterials($materialsArray){$this->insertArray['materials'] = $materialsArray;}

	public function commitInsert(){
			$_SESSION['order']            = NULL;
			$_SESSION['order_details']    = NULL;
			$_SESSION['gift_order']       = NULL;
			$_SESSION['custom_order']     = NULL;
			$_SESSION['customer']         = NULL;
			$_SESSION['gift_shipping']    = NULL;
			$_SESSION['ship_cost']        = NULL;
			$_SESSION['customerAddress']  = NULL;
			$_SESSION['recipientAddress'] = NULL;
		$this->database_db->pdo->beginTransaction();
		try{
			//a customer address must exist before we can grab a customer_id for the order
			$this->database_db->insert('address', $this->insertArray['customerAddress']);
			//now we must grab that address id for our customer insert
			$data = $this->database_db->select('address','address_id',['ORDER' => 'address.address_id DESC']);
			$customerAddressID = $data[0];
			//now we set up a customer for insertion
			$this->insertArray['customer']['address_id'] = $customerAddressID;
			//now we can insert a customer
			$this->database_db->insert('customer', $this->insertArray['customer']);
			//now that we have a customer, we can grab a customer id
			$data = $this->database_db->select('customer','customer_id',['ORDER' => 'customer.customer_id DESC']);
			$customerID = $data[0];
			//now that we have a customer id we can prepare order
			$this->insertArray['order']['customer_id'] = $customerID;
			//now we can fully insert our prepared order
			$this->database_db->insert('order',$this->insertArray['order']);
			//now we can grab our order_id for order_details and custom_order
			$data = $this->database_db->select('order', 'order_id',['ORDER' => 'order.order_id DESC']);
			//store it
			$orderID = $data[0];
			$this->orderNumber = $orderID;
			$this->recieptAdd($this->orderNumber);
			//now we can prepare order_details and custom_order
			//now we'll prepare custom order
			$this->insertArray['custom_order']['order_id'] = $orderID;
			//now we can push it
			$this->database_db->insert('custom_order', $this->insertArray['custom_order']);
			//ok now we have to enter an item record for the new item we created
			//it has no dependencies, so we're ready to push
			$this->database_db->insert('item', $this->insertArray['item']);
			//now we need to pull the item_id to make a craft and an order_details record
			$data = $this->database_db->select('item', 'item_id', ['ORDER' => 'item.item_id DESC']);
			$itemID = $data[0];
			//now we can prepare craft and order_details
			$this->insertArray['order_details']['order_id'] = $orderID;
			$this->insertArray['order_details']['item_id'] = $itemID;
			$this->insertArray['craft']['item_id'] = $itemID;
			//now we can push order_details
			$this->database_db->insert('order_details', $this->insertArray['order_details']);
			//now we can push the prepared craft entry
			$this->database_db->insert('craft',$this->insertArray['craft']);
			//now that we have a craft entry, we can pull our craft_id
			$data = $this->database_db->select('craft','craft_id', ['ORDER' => 'craft.craft_id DESC']);
			$craftID = $data[0];
			//now we can prepare and insert craft_materials, there will be multiple entries for each material used in the craft
			//echo "<pre>separateMaterials";
			//print_r($this->insertArray['materials']);
			//echo "</pre>";
			$this->database_db->pdo->commit();

			foreach($this->insertArray['materials'] as $separateMaterial){
				$separateMaterial['craft_id'] = $craftID;
				//grab the material id of the item we're using
				//now push each craft_materials record
				//print_r($separateMaterial);
				$this->database_db->insert('craft_materials', $separateMaterial);
			}

		}

		catch(PDOException $e){
			$this->database_db->pdo->rollback();
			$this->errAlert($e.'inside of commitInsert3()');
		}

	}
}

class InsertObjectFactory {

		public static function build($tableName) {
		$tableName = ucwords(str_replace("_", " ", $tableName));
		$InsertObject = str_replace(" ","", $tableName."InsertObject");
		//var_dump($DatabaseObject);
		if (class_exists($InsertObject)) {
			return new $InsertObject;
		}
		else {
			throw new Exception("Error in InsertObject Factory. Tablename doesn't exist.");
		}
	}
}
?>