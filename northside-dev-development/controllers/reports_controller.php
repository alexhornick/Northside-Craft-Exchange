<?php
	require_once('models/database.php'); 
	class ReportsController 
	{
//This will insert sessionstart into necessary pages
									//This may have to switch to a switch statement for efficiency reasons, but for now let's go with it.
									//Inventory English Field Names
		public $displayNames = array('inventoryMaterialsFirst' 			=> ['Material ID', 'Material Name', 'Quantity', 'Unit Price'], 
						 			 'inventoryCraftsFirst'  			=> ['Craft ID', 'Craft Name', 'Current Price', 'Quantity'],
						 			 'inventoryReturnsFirst' 			=> ['Item ID', 'Item Name', 'Order ID', 'Quantity', 'Current Price'],
						 			 //Sales English Field Names
						 			 'OrderSalesFirst'					=> ['Sale ID','Employee Name','Sale Date','Subtotal','Tax Amount','Total Cost'],
						 			 'OrderCustomFirst'					=> ['Custom Order ID', 'Order ID', 'Employee Name', 'Order Date', 'Estimated Price', 'Total Price'],
						 			 'OrderGiftFirst'					=> ['Gift Order ID','Employee Name','Sale Date','Subtotal','Tax Amount','Total Cost'],
						 			 //View Sale Order
						 			 'OrderSalesView'					=>['Item ID', 'Item Name', 'Item Price', 'Quantity'],
						 			 'OrderCustomView'					=>['Material ID', 'Material Name', 'Unit Price'],

						             );

		public function session($set)
		{
			switch($set)
			{
				case 'start':
					echo 'session_start();';
					break;

				case 'unset':
					echo 'session_unset();<br>';
					break;
			}
		}

		//This function will show all the General Reports for Materials, Crafts, and Returns
		public static function inventory()
		{
			$report = ''; //Makes the general reports defaulted in the html

			$stageDBO = DatabaseObjectFactory::build('Material');
			$stageDBO->SetJoin(['[><]item' => 'item_id', '[><]supplier' => 'supplier_id']);
			$arr = ['material_id','unit_price','name','company_name','calculated_qoh'];
			$materials = $stageDBO->getRecords($arr); 

			//GET GENERAL CRAFT STUFF HERE
			$stageDBO = DatabaseObjectFactory::build('Craft');
			$stageDBO->SetJoin(['[><]item' => 'item_id']);
			$arr = ['craft_id' , 'name' , 'current_price' , 'calculated_qoh'];
			$crafts = $stageDBO->getRecords($arr);


			//GET GENERAL RETURNS STUFF HERE
			$stageDBO = DatabaseObjectFactory::build('returns_inventory');
			$stageDBO->SetJoin(['[><]order' => 'order_id','[><]return_details' => 'return_id', '[><]item' => 'item_id']);
			$arr = ['item_id' , 'name' , 'order_id' , 'calculated_qoh' , 'current_price'];
			$returns = $stageDBO->getRecords($arr);




			require_once('views/pages/inventoryReports.php');

		}

		public static function generateInventoryReport()
		{
			$report = $_POST['reportType'];

			$stageDBO = DatabaseObjectFactory::build('Material');
			$stageDBO->SetJoin(['[><]item' => 'item_id', '[><]supplier' => 'supplier_id']);
			$arr = ['material_id','unit_price','name','company_name','calculated_qoh'];
			$materials = $stageDBO->getRecords($arr);

			//GET GENERAL CRAFT STUFF HERE
			$stageDBO = DatabaseObjectFactory::build('Craft');
			$stageDBO->SetJoin(['[><]item' => 'item_id']);
			$arr = ['craft_id' , 'name' , 'current_price' , 'calculated_qoh'];
			$crafts = $stageDBO->getRecords($arr);


			//GET GENERAL RETURNS STUFF HERE
			$stageDBO = DatabaseObjectFactory::build('returns_inventory');
			$stageDBO->SetJoin(['[><]order' => 'order_id','[><]return_details' => 'return_id', '[><]item' => 'item_id']);
			$arr = ['item_id' , 'name' , 'order_id' , 'calculated_qoh' , 'current_price'];
			$returns = $stageDBO->getRecords($arr);

			

			if($report == 'genMaterials')  //Does the same thing as the inventory function above
			{
				$stageDBO = DatabaseObjectFactory::build('Material');
				$stageDBO->SetJoin(['[><]item' => 'item_id', '[><]supplier' => 'supplier_id']);
				$arr = ['material_id','unit_price','name','company_name','calculated_qoh'];
				$materials = $stageDBO->getRecords($arr);
			}

			else if($report == 'lowStockMaterials')
			{
				$stageDBO = DatabaseObjectFactory::build('Material');
				$stageDBO->SetJoin(['[><]item' => 'item_id', '[><]supplier' => 'supplier_id']);
				$arr = ['material_id','unit_price','name','company_name','calculated_qoh'];

				//Second argument is a where clause with 2 conditions, which requires the AND
				$materials = $stageDBO->getRecords($arr, ["AND" => [
														"calculated_qoh[<]" => 3,
														"calculated_qoh[!]" => 0]]);
			}

			else if($report == 'outStockMaterials')
			{
				$stageDBO = DatabaseObjectFactory::build('Material');
				$stageDBO->SetJoin(['[><]item' => 'item_id', '[><]supplier' => 'supplier_id']);
				$arr = ['material_id','unit_price','name','company_name','calculated_qoh'];

				//Second argument is a where clause with only one condition.
				$materials = $stageDBO->getRecords($arr, ["calculated_qoh" => 0]); 
			}

		
			else if($report == 'genCrafts')  //Does the same thing as the inventory function above
			{
				$stageDBO = DatabaseObjectFactory::build('Craft');
				$stageDBO->SetJoin(['[><]item' => 'item_id']);
				$arr = ['craft_id' , 'name' , 'current_price' , 'calculated_qoh'];
				$crafts = $stageDBO->getRecords($arr);
				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 1 });
						});</script>";
			}

			else if($report == 'lowStockCrafts')
			{
				$stageDBO = DatabaseObjectFactory::build('Craft');
				$stageDBO->SetJoin(['[><]item' => 'item_id']);
				$arr = ['craft_id' , 'name' , 'current_price' , 'calculated_qoh'];
				//Second argument is a where clause with 2 conditions, which requires the AND
				$crafts = $stageDBO->getRecords($arr, ["AND" => [
														"calculated_qoh[<]" => 3,
														"calculated_qoh[!]" => 0]]);
				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 1 });
						});</script>";
			}

			else if($report == 'outStockCrafts')
			{
				$stageDBO = DatabaseObjectFactory::build('Craft');
				$stageDBO->SetJoin(['[><]item' => 'item_id']);
				$arr = ['craft_id' , 'name' , 'current_price' , 'calculated_qoh'];

				//Second argument is a where clause with only one condition.
				$crafts = $stageDBO->getRecords($arr, ["calculated_qoh" => 0]); 
				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 1 });
						});</script>";
			}


			else if($report == 'genReturns')  //Does the same thing as the inventory function above
			{
				$stageDBO = DatabaseObjectFactory::build('returns_inventory');
				$stageDBO->SetJoin(['[><]order' => 'order_id','[><]return_details' => 'return_id', '[><]item' => 'item_id']);
				$arr = ['item_id' , 'name' , 'order_id' , 'calculated_qoh' , 'current_price'];
				$returns = $stageDBO->getRecords($arr);
				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 2 });
						});</script>";
			}

			else if($report == 'lowStockReturns')
			{
				$stageDBO = DatabaseObjectFactory::build('returns_inventory');
				$stageDBO->SetJoin(['[><]order' => 'order_id','[><]return_details' => 'return_id', '[><]item' => 'item_id']);
				$arr = ['item_id' , 'name' , 'order_id' , 'calculated_qoh' , 'current_price'];
				//Second argument is a where clause with 2 conditions, which requires the AND
				$returns = $stageDBO->getRecords($arr, ["AND" => [
														"calculated_qoh[<]" => 3,
														"calculated_qoh[!]" => 0]]);
				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 2 });
						});</script>";
			}

			else if($report == 'outStockReturns')
			{
				$stageDBO = DatabaseObjectFactory::build('returns_inventory');
				$stageDBO->SetJoin(['[><]order' => 'order_id','[><]return_details' => 'return_id', '[><]item' => 'item_id']);
				$arr = ['item_id' , 'name' , 'order_id' , 'calculated_qoh' , 'current_price'];

				//Second argument is a where clause with only one condition.
				$returns = $stageDBO->getRecords($arr, ["calculated_qoh" => 0]); 
				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 2 });
						});</script>";
			}

			require_once('views/pages/inventoryReports.php'); //require the page again for the newly selected report.
		}

		public static function keyindicator()
		{
			$report = '';
			$stageDBO = DatabaseObjectFactory::build('order');			
			$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];
			$daily = $stageDBO->makeQuery("SELECT COUNT(`order`.order_id) AS NumberOfOrders, day(order_date) AS day, SUM(total_price) AS TotalAmt, COUNT(item_id) as items FROM `order`,`order_details` WHERE `order`.order_id = `order_details`.order_id AND month(order_date) = month(current_date) GROUP BY day(order_date) ORDER BY day(order_date)");

			require_once('views/pages/keyIndicator.php');

		}

		public static function generateKeyIndicator()
		{
			$report = $_POST['reportType'];

			if($report == 'Daily')
			{
				$stageDBO = DatabaseObjectFactory::build('order');			
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];
				$daily = $stageDBO->makeQuery("SELECT COUNT(`order`.order_id) AS NumberOfOrders, day(order_date) AS day, SUM(total_price) AS TotalAmt, COUNT(item_id) as items FROM `order`,`order_details` WHERE `order`.order_id = `order_details`.order_id AND month(order_date) = month(current_date) GROUP BY day(order_date) ORDER BY day(order_date)");
			}

			else if($report == 'Weekly')
			{
				$stageDBO = DatabaseObjectFactory::build('order');			
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];
				$weekly = $stageDBO->makeQuery("SELECT COUNT(`order`.order_id) AS NumberOfOrders, DATE_FORMAT(order_date, '%V %M') AS week, SUM(total_price) AS TotalAmt, COUNT(item_id) as items FROM `order`,`order_details` WHERE `order`.order_id = `order_details`.order_id AND year(order_date) = year(current_date) GROUP BY week(order_date) ORDER BY week(order_date)");
			}

			else if($report == 'Monthly')
			{
				$stageDBO = DatabaseObjectFactory::build('order');			
				$monthly = $stageDBO->makeQuery("SELECT COUNT(`order`.order_id) AS NumberOfOrders, month(order_date) AS month, SUM(total_price) AS TotalAmt, COUNT(item_id) as items FROM `order`,`order_details` WHERE `order`.order_id = `order_details`.order_id AND year(order_date) = year(current_date) GROUP BY month(order_date) ORDER BY month(order_date)");
			}

			else if($report == 'Annual')
			{
				$stageDBO = DatabaseObjectFactory::build('order');			
				$annual = $stageDBO->makeQuery("SELECT COUNT(`order`.order_id) AS NumberOfOrders, year(order_date) AS year, SUM(total_price) AS TotalAmt, COUNT(item_id) as items FROM `order`,`order_details` WHERE `order`.order_id = `order_details`.order_id  GROUP BY year(order_date) ORDER BY year(order_date)");
			}

			require_once('views/pages/keyIndicator.php');
			
		}

		public static function orders()
		{
			$report = ''; //Makes the general reports defaulted in the html

			$stageDBO = DatabaseObjectFactory::build('order');

			$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];
			$sales = $stageDBO->getRecords($arr,['order_type' => 'sale']);

			$stageDBO = DatabaseObjectFactory::build('custom_order');
			$stageDBO->SetJoin(['[><]order' => 'order_id', '[><]employee' => 'employee_id']);
			$arr = ['custom_order_id','order_id','employee_id','order_date','total_price','price_estimation','first_name','last_name'];
			$customs = $stageDBO->getRecords($arr);


			$stageDBO = DatabaseObjectFactory::build('order');
			$arr = ['gift_id', 'order.order_id', 'rec_last_name','rec_first_name','order_date','last_name','first_name','total_price'];
			$stageDBO->SetJoin(['[><]gift_order' => 'order_id', '[><]customer' => 'customer_id']);
			$gifts = $stageDBO->getRecords($arr);

			require_once('views/pages/orderReports.php');

		}

		public static function viewSale()
		{
			$orderID = $_POST['order_id'];
			$stageDBO = DatabaseObjectFactory::build('order');
			$stageDBO->SetJoin(['[><]order_details' => 'order_id', '[><]item' => 'item_id', '[><]employee'=>'employee_id']);
			$arr = ['order_id','employee_id', 'first_name', 'last_name','order_date','subtotal','tax_amount','total_price', 'name', 'item_id','item_price', 'qty'];
			$sales = $stageDBO->getRecords($arr,['order_id' => $orderID]);

			$stageDBO = DatabaseObjectFactory::build('item');
			$stageDBO->SetJoin(['[><]order_details' => 'item_id', '[><]order' => 'order_id']);
			$arr = ['order_id', 'name', 'item_id','item_price', 'qty'];
			$items = $stageDBO->getRecords($arr,['order_id' => $orderID]);

			require_once('views/pages/viewSale.php');			

		}

		public static function viewGift()
		{
			$giftID = $_POST['gift_id'];


			$stageDBO = DatabaseObjectFactory::build('gift_order');
			$arr = ['gift_id', 'order.order_id','street_type', 'street_name', 'street_number','shipping_cost','major_municipality','governing_district','zip', 'rec_last_name','rec_first_name','order_date','last_name','first_name','total_price'];
			$stageDBO->SetJoin(['[><]order' => 'order_id', '[><]address' => 'address_id', '[><]customer' => 'customer_id', '[><]gift_shipping' => 'gift_id','[><]ship_cost' => 'ship_id']);
			$gifts = $stageDBO->getRecords($arr,['gift_id' => $giftID]);


			$stageDBO = DatabaseObjectFactory::build('item');
			$stageDBO->SetJoin(['[><]order_details' => 'item_id', '[><]order' => 'order_id']);
			$arr = ['order_id', 'name', 'item_id','item_price', 'qty'];
			$items = $stageDBO->getRecords($arr,['order_id' => $gifts[0]['order_id']]);

			require_once('views/pages/viewGift.php');
		}

		public static function viewCustom()
		{
			$customOrderID = $_POST['custom_order_id'];
			$stageDBO = DatabaseObjectFactory::build('order');
			$stageDBO->SetJoin(['[><]custom_order' => 'order_id', '[><]customer' => 'customer_id','[><]order_details' => 'order_id','[><]item'=>'item_id']);
			$arr = ['custom_order_id','comment','order_id','employee_id','order_date','total_price','price_estimation','qty','name','first_name','last_name','total_price','phone_number'];
			$customs = $stageDBO->getRecords($arr,['custom_order_id' => $customOrderID]);

			$stageDBO = DatabaseObjectFactory::build('item');

			$materials = $stageDBO->makeQuery("SELECT  `material`.unit_price, `material`.material_id FROM `item`, `material`, `craft`, `craft_materials`, `order`, `order_details`, `custom_order` WHERE custom_order_id = $customOrderID AND `order_details`.item_id = `item`.item_id AND `item`.item_id = `craft`.item_id AND `custom_order`.order_id = `order`.order_id AND `craft`.craft_id = `craft_materials`.craft_id AND `material`.material_id = `craft_materials`.material_id AND `order_details`.order_id = `order`.order_id" );	

			require_once('views/pages/viewCustom.php');			

		}

		public static function generateOrderReports()
		{
			$report = $_POST['reportType'];
			//print_r($_POST);
			$stageDBO = DatabaseObjectFactory::build('order');
			$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];
			$sales = $stageDBO->getRecords($arr,['order_type' => 'sale']);

			$stageDBO = DatabaseObjectFactory::build('custom_order');
			$stageDBO->SetJoin(['[><]order' => 'order_id', '[><]employee' => 'employee_id']);
			$arr = ['custom_order_id','order_id','employee_id','order_date','total_price','price_estimation','first_name','last_name'];
			$customs = $stageDBO->getRecords($arr);

			$stageDBO = DatabaseObjectFactory::build('order');
			$arr = ['gift_id', 'order.order_id', 'rec_last_name','rec_first_name','order_date','last_name','first_name','total_price'];
			$stageDBO->SetJoin(['[><]gift_order' => 'order_id', '[><]customer' => 'customer_id']);
			$gifts = $stageDBO->getRecords($arr);

			if($report == 'GeneralSales')
			{
				$stageDBO = DatabaseObjectFactory::build('order');
				//$stageDBO->SetJoin(['[><]item' => 'item_id', '[><]supplier' => 'supplier_id']);
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];
				$sales = $stageDBO->getRecords($arr,['order_type' => 'sale']);

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 0 });
						});</script>";
			}

			else if($report == 'DailySales')
			{
				$stageDBO = DatabaseObjectFactory::build('order');			
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];
				$dailySales = $stageDBO->makeQuery("SELECT COUNT(order_id) AS NumberOfOrders, day(order_date) AS day, SUM(total_price) AS TotalAmt FROM `order` WHERE order_type = 'sale' GROUP BY day(order_date)");
				//$DBO = DatabaseConnection::getInstance();
				//$dailySales = $DBO->query("SELECT COUNT(order_id) AS NumberOfOrders, day(order_date) AS day, SUM(total_price) AS TotalAmt FROM `order` WHERE order_type = 'sale' GROUP BY day(order_date)");
				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 0 });
						});</script>";
			}




			else if($report == 'WeeklySales')
			{
				$stageDBO = DatabaseObjectFactory::build('order');			
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];
				$weeklySales = $stageDBO->makeQuery("SELECT COUNT(order_id) AS NumberOfOrders, WEEK(order_date) AS week, SUM(total_price) AS TotalAmt FROM `order` WHERE order_type = 'sale' GROUP BY WEEK(order_date)");
				//$DBO = DatabaseConnection::getInstance();
				//$dailySales = $DBO->query("SELECT COUNT(order_id) AS NumberOfOrders, WEEK(order_date) AS week, SUM(total_price) AS TotalAmt FROM `order` WHERE order_type = 'sale' GROUP BY WEEK(order_date)");
				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 0 });
						});</script>";
			}

			else if($report == 'MonthlySales')
			{
				$stageDBO = DatabaseObjectFactory::build('order');			
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];
				$monthlySales = $stageDBO->makeQuery("SELECT COUNT(order_id) AS NumberOfOrders, month(order_date) AS month, SUM(total_price) AS TotalAmt FROM `order` WHERE order_type = 'sale' GROUP BY MONTH(order_date)");

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 0 });
						});</script>";
			}

			else if($report == 'AnnualSales')
			{
				$stageDBO = DatabaseObjectFactory::build('order');			
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];
				$annualSales = $stageDBO->makeQuery("SELECT COUNT(order_id) AS NumberOfOrders, year(order_date) AS year, SUM(total_price) AS TotalAmt FROM `order` WHERE order_type = 'sale' GROUP BY year(order_date)");

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 0 });
						});</script>";
			}

			else if($report == 'SalesByEmployee')
			{
				$stageDBO = DatabaseObjectFactory::build('order');			
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price','first_name','last_name'];
				$stageDBO->SetJoin(['[><]employee' => 'employee_id']);
				$employeeSales = $stageDBO->makeQuery("SELECT employee.employee_id, COUNT(order_id) AS NumberOfOrders, SUM(total_price) AS TotalAmt, employee.first_name, employee.last_name  FROM `order`, `employee` WHERE order_type = 'sale' AND order.employee_id = employee.employee_id AND month(order_date) = month(current_date) GROUP BY employee.employee_id");

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 0 });
						});</script>";
			
			}

			else if($report == 'GeneralCustoms')
			{
				$stageDBO = DatabaseObjectFactory::build('custom_order');
				$stageDBO->SetJoin(['[><]order' => 'order_id', '[><]employee' => 'employee_id']);
				$arr = ['custom_order_id','order_id','employee_id','order_date','total_price','price_estimation','first_name','last_name'];
				$customs = $stageDBO->getRecords($arr);

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 1 });
						});</script>";
			}

			else if($report == 'DailyCustoms')
			{
				$stageDBO = DatabaseObjectFactory::build('custom_order');		
				$stageDBO->SetJoin(['[><]order' => 'order_id', '[><]employee' => 'employee_id']);	
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];

				$customs = $stageDBO->makeQuery("SELECT COUNT(order.order_id) AS NumberOfOrders, day(order.order_date) AS day, SUM(order.total_price) AS TotalAmt FROM `order` WHERE order_type = 'custom' AND year(order.order_date) = year(current_date) GROUP BY day(order.order_date)");

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 1 });
						});</script>";
			}

			else if($report == 'WeeklyCustoms')
			{
				$stageDBO = DatabaseObjectFactory::build('custom_order');		
				$stageDBO->SetJoin(['[><]order' => 'order_id', '[><]employee' => 'employee_id']);	
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];

				$customs = $stageDBO->makeQuery("SELECT COUNT(order_id) AS NumberOfOrders, WEEK(order_date) AS week, SUM(total_price) AS TotalAmt FROM `order` WHERE order_type = 'custom' AND year(order_date) = year(current_date) GROUP BY WEEK(order_date)");

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 1 });
						});</script>";
			}

			else if($report == 'MonthlyCustoms')
			{
				$stageDBO = DatabaseObjectFactory::build('custom_order');		
				$stageDBO->SetJoin(['[><]order' => 'order_id', '[><]employee' => 'employee_id']);	
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];

				$customs = $stageDBO->makeQuery("SELECT COUNT(order_id) AS NumberOfOrders, month(order_date) AS month, SUM(total_price) AS TotalAmt FROM `order` WHERE order_type = 'custom' AND year(order_date) = year(current_date) GROUP BY month(order_date)");

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 1 });
						});</script>";
			}

			else if($report == 'AnnualCustoms')
			{
				$stageDBO = DatabaseObjectFactory::build('custom_order');		
				$stageDBO->SetJoin(['[><]order' => 'order_id', '[><]employee' => 'employee_id']);	
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];

				$customs = $stageDBO->makeQuery("SELECT COUNT(order_id) AS NumberOfOrders, year(order_date) AS year, SUM(total_price) AS TotalAmt FROM `order` WHERE order_type = 'custom'  GROUP BY year(order_date)");

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 1 });
						});</script>";
			}

			else if($report == 'GeneralGifts')
			{
				$stageDBO = DatabaseObjectFactory::build('order');
				$arr = ['gift_id', 'order.order_id', 'rec_last_name','rec_first_name','order_date','last_name','first_name','total_price'];
				$stageDBO->SetJoin(['[><]gift_order' => 'order_id', '[><]customer' => 'customer_id']);
				$gifts = $stageDBO->getRecords($arr);

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 2 });
						});</script>";
			}

			else if($report == 'DailyGifts')
			{
				$stageDBO = DatabaseObjectFactory::build('custom_order');		
				$stageDBO->SetJoin(['[><]order' => 'order_id', '[><]employee' => 'employee_id']);	
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];
				$gifts = $stageDBO->makeQuery("SELECT COUNT(order_id) AS NumberOfOrders, day(order_date) AS day, SUM(total_price) AS TotalAmt FROM `order` WHERE order_type = 'gift' AND year(order_date) = year(current_date) GROUP BY day(order_date)");

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 2 });
						});</script>";
			}

			else if($report == 'WeeklyGifts')
			{
				$stageDBO = DatabaseObjectFactory::build('custom_order');		
				$stageDBO->SetJoin(['[><]order' => 'order_id', '[><]employee' => 'employee_id']);	
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];
				$gifts = $stageDBO->makeQuery("SELECT COUNT(order_id) AS NumberOfOrders, WEEK(order_date) AS week, SUM(total_price) AS TotalAmt FROM `order` WHERE order_type = 'gift' AND year(order_date) = year(current_date) GROUP BY WEEK(order_date)");

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 2 });
						});</script>";
			}

			else if($report == 'MonthlyGifts')
			{
				$stageDBO = DatabaseObjectFactory::build('custom_order');		
				$stageDBO->SetJoin(['[><]order' => 'order_id', '[><]employee' => 'employee_id']);	
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];
				$gifts = $stageDBO->makeQuery("SELECT COUNT(order_id) AS NumberOfOrders, month(order_date) AS month, SUM(total_price) AS TotalAmt FROM `order` WHERE order_type = 'gift' AND year(order_date) = year(current_date) GROUP BY month(order_date)");

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 2 });
						});</script>";
			}

			else if($report == 'AnnualGifts')
			{
				$stageDBO = DatabaseObjectFactory::build('custom_order');		
				$stageDBO->SetJoin(['[><]order' => 'order_id', '[><]employee' => 'employee_id']);	
				$arr = ['order_id','employee_id','order_date','subtotal','tax_amount','total_price'];
				$gifts = $stageDBO->makeQuery("SELECT COUNT(order_id) AS NumberOfOrders, year(order_date) AS year, SUM(total_price) AS TotalAmt FROM `order` WHERE order_type = 'gift'  GROUP BY year(order_date)");

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 2 });
						});</script>";
			}

			else if($report == 'GiftShipping')
			{
				$gifts = $stageDBO->makeQuery("SELECT gift_order.gift_id, street_number, street_name, street_type, major_municipality, governing_district, zip, shipping_cost, first_name, last_name
					FROM gift_order, address, gift_shipping, ship_cost, customer,`order`
					WHERE gift_order.gift_id = gift_shipping.gift_id AND gift_order.address_id = address.address_id
					AND gift_order.order_id = `order`.order_id AND `order`.customer_id = `customer`.customer_id and `gift_shipping`.ship_id = `ship_cost`.ship_id");

				print "<script>$(document).ready(function() {
      				  $( '#tabs' ).tabs({ active: 2 });
						});</script>";
			}



			require_once('views/pages/orderReports.php'); //require the page again for the newly selected report.
			
		}

		
		public static function suppliers()
		{
			$report = '';
			$stageDBO = DatabaseObjectFactory::build('Supplier');
			$arr = ['supplier_id','company_name','contact_name','contact_job_title','company_phone' , 'contact_phone' , 'address_id' , 'email'];
			
			//USES THE makeQuery function in database.php to utilize the count function
			$suppliers = $stageDBO->makeQuery("SELECT COUNT(material_id) AS COUNT, `supplier`.supplier_id, company_name,contact_name,contact_job_title,company_phone , contact_phone , address_id , email FROM `material`, `supplier` WHERE `material`.supplier_id = `supplier`.supplier_id GROUP BY supplier_id, company_name,contact_name,contact_job_title,company_phone , contact_phone , address_id , email");

			require_once('views/pages/suppliersReport.php');

		}

	
		public static function generateSupplierReport()
			{
				$report = $_POST['reportType'];

				$stageDBO = DatabaseObjectFactory::build('Supplier');
				$arr = ['supplier_id','company_name','contact_name','contact_job_title','company_phone' , 'contact_phone' , 'address_id' , 'email'];
				$suppliers = $stageDBO->getRecords($arr);



			if($report == 'genSuppliers')  //Does the same thing as the inventory function above
			{
				$stageDBO = DatabaseObjectFactory::build('supplier');
				$arr = ['supplier_id','company_name','contact_name','contact_job_title','company_phone' , 'contact_phone' , 'address_id' , 'email'];
				
				//USES THE makeQuery function in database.php to utilize the count function
				$suppliers = $stageDBO->makeQuery("SELECT COUNT(material_id) AS COUNT, `supplier`.supplier_id, company_name,contact_name,contact_job_title,company_phone , contact_phone , address_id , email FROM `material`, `supplier` WHERE `material`.supplier_id = `supplier`.supplier_id GROUP BY supplier_id, company_name,contact_name,contact_job_title,company_phone , contact_phone , address_id , email");
			}

			else if($report == 'recentSupplierOrders')
			{
				//Use the Supplier_Order table, and join the employee table for the employee name
				$stageDBO = DatabaseObjectFactory::build('supplier_order');
				$stageDBO->SetJoin(['[><]employee' => 'employee_id']);
				$arr = ['supplier_order_id','supplier_id','first_name','last_name','order_date','total_price', 'total_discount'];
				$suppliers = $stageDBO->getRecords($arr,["ORDER" => ['supplier_order_id DESC']]);

				//Second argument is a where clause with 2 conditions, which requires the AND
				//$suppliers = $stageDBO->getRecords($arr, ["AND" => [
														//"calculated_qoh[<]" => 3,
														//"calculated_qoh[!]" => 0]]);
			}

			else if($report == 'discountedOrders')
			{
				$stageDBO = DatabaseObjectFactory::build('order_materials');

				$stageDBO->SetJoin(['[><]supplier_order' => 'supplier_order_id']);
				$arr = ['supplier_order_id','material_id','qty','discount_amount'];
				$suppliers = $stageDBO->getRecords($arr,['discount_amount[>]' => 0]);

				

				
			}

			require_once('views/pages/suppliersReport.php');
			
		}

		public static function viewSupplyOrder()
		{
			$supplierOrderID = $_POST['supplier_order_id'];

			$stageDBO = DatabaseObjectFactory::build('supplier_order');
			$stageDBO->SetJoin(['[><]order_materials' => 'supplier_order_id']);
			$arr = ['supplier_order_id','material_id','qty','discount_amount'];
			$orderDetails = $stageDBO->getRecords($arr,['supplier_order_id' => $supplierOrderID]);


			print "<div class='content'>Supplier Order Details<br><table>";
			print "<th>Supplier Order ID</th><th>Material ID</th><th>Quantity</th><th>Discount Amount</th>";
			foreach($orderDetails AS $order)
			{
				print "<tr><td>".$order['supplier_order_id']."</td><td>".$order['material_id']."</td><td>".$order['qty']."</td><td>" . $order['discount_amount']."</td></tr>";
			}


			print "</div>";



		}

}