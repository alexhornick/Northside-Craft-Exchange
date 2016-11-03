
<?php
	require_once('forms_controller.php');
	require_once('models/database.php'); 
	class InventoryController 
	{	
		
		public static $TAX_RATE = 0.095; //used when ordering materials

		public static function ordermaterials()
		{	
			//This function gets all the SupplierIDs and Company names to be used on the order materials page.
			$stageDBO = DatabaseObjectFactory::build('supplier');
			$arr = ['supplier_id','company_name'];
			$suppliers = $stageDBO->getRecords($arr);
			require_once('views/pages/orderMaterials.php');
		}
		
		public static function getMaterials()
		{
			//GRAB THE SUPPLIER ID TO BE USED IN WHERE CLAUSE
			$supplier_id = $_POST['supplierID'];
			
			$stageDBO = DatabaseObjectFactory::build('material');
			$arr = ['material_id','supplier_id','unit_price','name'];
			$stageDBO->SetJoin(['[><]item' => 'item_id']);
			$materials = $stageDBO->getRecords($arr, ['supplier_id' => $supplier_id]);

			$stageDBO = DatabaseObjectFactory::build('supplier_discount');
			$arr = ['material_id','supplier_id','min_qty','discount_percent'];
			$discounts = $stageDBO->getRecords($arr, ['supplier_id' => $supplier_id]);


			require_once('views/pages/orderMaterials2.php');
		}
			
		public static function submitOrder()
		{
			$errorMessage = array();
			$supplier_id = $_POST['supplierID'];
			$stageDBO = DatabaseObjectFactory::build('material');
			$arr = ['material_id','unit_price'];
			$materials = $stageDBO->getRecords($arr, ['supplier_id' => $supplier_id]);


		
			$supplyOrder['material'] = $_POST['material'];

			for($index = 0; $index < count($supplyOrder['material']); $index++)
			{
				$unitPrice = $stageDBO->getRecords($arr, ['material_id' => $supplyOrder['material'][$index]]);
				$supplyOrder['unitPrice'][$index] = $unitPrice[0]['unit_price'];

			}
			
			$supplyOrder['quantity'] = $_POST['quantity'];
			$supplyOrder['supplier_id'] = $_POST['supplierID'];

			//FIND DUPLICATE MATERIAL ENTRIES
			$duplicates = array_count_values($supplyOrder['material']);

			for($index = 0; $index < count($duplicates); $index++)
			{
				if($duplicates[$supplyOrder['material'][$index]] > 1)
				{
					$errorMessage['duplicates'] = 'ERROR: Duplicate Materials.';
				}
			}


			
			if(count($errorMessage) > 0)
			{
				require_once('views/pages/orderMaterials2.php');
			}
			
			
			else if(count($errorMessage) == 0)
			{
				$stageDBO = DatabaseObjectFactory::build('supplier_discount');
				$arr = ['material_id','supplier_id','min_qty','discount_percent'];
				$subtotal = 0;
				$discountTotal = 0;
				$discountAmount;
				
				for($index = 0; $index < count($supplyOrder['material']); $index++)
				{
					$discount = $stageDBO->getRecords($arr, ["AND" => [
												"supplier_id" => $supplier_id,
												"material_id" => $supplyOrder['material'][$index]
											]]);
					
					//if(!empty($discount) && count($discount[0]) > 0)
					if(!empty($discount) && $supplyOrder['quantity'][$index] >= $discount[$index]['min_qty'])
					{

						$discountAmount[$index] = ($discount[0]['discount_percent']/100) * ($supplyOrder['unitPrice'][$index] * $supplyOrder['quantity'][$index]);
						$discountTotal += $discountAmount[$index];
						
					}

					else $discountAmount[$index] = 0.00;

					$subtotal += $supplyOrder['unitPrice'][$index] * $supplyOrder['quantity'][$index];


				}

				$taxAmount = (self::$TAX_RATE * $subtotal);
				$total = $subtotal - $discountTotal + $taxAmount;

				print "<div class='content'><br>Materials Ordered for Supplier " . $supplier_id;
				for($i = 0; $i < count($supplyOrder['material']); $i++)
				{
					print "<br> Material ID " . $supplyOrder['material'][$i] . ", Unit Price: " . $supplyOrder['unitPrice'][$i] . ', Qty: ' . $supplyOrder['quantity'][$i];
				}

				print "<br><br>SUBTOTAL: $" . number_format($subtotal,2);
				print "<br>DISCOUNT AMOUNT: $" . number_format($discountTotal,2);
				print "<br>TAX AMOUNT: $" . number_format($taxAmount,2);
				print "<br>TOTAL: $" . number_format($total,2);
				print "<br><input type='button' class='button' value='Print'>";

				print "<a href='?controller=inventory&action=ordermaterials'><input type='button' class='button' value='Back to Order Materials'></a></div>";

				//INSERT DATA HERE
				$supplierOrderData['supplier_order_id'] = NULL;
				$supplierOrderData['employee_id'] = $_SESSION['employee_id'];
				$supplierOrderData['supplier_id'] = $supplier_id;
				$supplierOrderData['order_date'] = date("Y-m-d");
				$supplierOrderData['subtotal'] = $subtotal;
				$supplierOrderData['tax_amount'] = $taxAmount;
				$supplierOrderData['total_discount'] = $discountTotal;
				$supplierOrderData['total_price'] = $total;

				$stageDBO = DatabaseObjectFactory::build('supplier_order');
				$stageDBO->setRecords('supplier_order', $supplierOrderData);
				$supplierID = $stageDBO->getLastInsert();

				for($index = 0; $index < count($supplyOrder['material']); $index++)
				{
					$orderData['material_id'] = $supplyOrder['material'][$index];
					$orderData['supplier_order_id'] = $supplierID;
					$orderData['qty'] = $supplyOrder['quantity'][$index];
					$orderData['discount_amount'] = $discountAmount[$index];

					$stageDBO = DatabaseObjectFactory::build('order_materials');
					$stageDBO->setRecords('order_materials', $orderData);
				}




				
			}
		}
		
		public static function InsertOrder()
		{
			//Just for testing, not implemented yet.
			for($i = 0; $i < count($_SESSION['material']); $i++)
			{
			echo $_SESSION['material'][$i] ."<br>". $_SESSION['supplier_id']."<br>";
			}
			
		}
		
		public static function manageinventory()
		{
			//This function gets craft, material, and return information for the manageinventory page.
			$stageDBO = DatabaseObjectFactory::build('Material');
			$arr = ['material_id','unit_price'];
			$materials = $stageDBO->getRecords($arr);
			
			$stageDBO = DatabaseObjectFactory::build('craft');
			$arr = ['craft_id','calculated_qoh'];
			$stageDBO->SetJoin(['[><]item' => 'item_id']);
			$crafts = $stageDBO->getRecords($arr);

			$stageDBO = DatabaseObjectFactory::build('return_details');
			$stageDBO->SetJoin(['[><]item' => 'item_id']);
			$arr = ['return_id','item_id','qty','current_price'];
			$returns = $stageDBO->getRecords($arr);

			include('views/pages/manageinventory.php');
		}

		public static function displayinventorysheet()
		{
			
			$stageDBO = DatabaseObjectFactory::build('item');
			$arr = ['item_id','name','qoh','calculated_qoh'];
			$items = $stageDBO->getRecords($arr);
			include('views/pages/inventorySheet.php');
		}

		public static function recordinventory()
		{
			//GET ITEMS
			$stageDBO = DatabaseObjectFactory::build('item');
			$arr = ['item_id','name','qoh','calculated_qoh'];
			$items = $stageDBO->getRecords($arr);

			//GET SUPPLIERS
			$stageDBO = DatabaseObjectFactory::build('supplier');
			$arr = ['supplier_id', 'company_name'];
			$suppliers = $stageDBO->getRecords($arr);

			//GET MATERIALS
			$stageDBO = DatabaseObjectFactory::build('material');
			$arr = ['material_id','supplier_id','name'];
			$stageDBO->SetJoin(['[><]item' => 'item_id']);
			$materials = $stageDBO->getRecords($arr);

			include('views/pages/recordInventory.php');
		}

		public static function editQoh()
		{
			$itemID = $_POST['item_id'];

			//GET QOH INFORMATION ABOUT ITEM
			$stageDBO = DatabaseObjectFactory::build('item');
			$arr = ['item_id','name','calculated_qoh','qoh'];
			$item = $stageDBO->getRecords($arr,['item_id' => $itemID]);

			require_once('views/pages/editQoh.php');
		}

		public static function updateQoh()
		{
			$errorMessage = array();
			$qoh = $_POST['qoh'];
			$itemID = $_POST['item_id'];

			if(filter_input(INPUT_POST, 'qoh', FILTER_VALIDATE_INT) === false)
			{
				$errorMessage['qohError'] = 'Quantity must be an int.';
			}

			//WHEN ERRORS, RETURN TO EDITQOH.PHP
			if(count($errorMessage) > 0)
			{
				require_once('views/pages/editQoh.php');
			}

			else
			{
				//UPDATE ITEM QUANTITIES
				$stageDBO = DatabaseObjectFactory::build('item');
				$itemUpdates['qoh'] = $qoh;
				$itemUpdates['calculated_qoh'] = $qoh;
				$stageDBO->updateRecord($itemUpdates,['item_id' => $itemID]);


				$successMessage = "Item " . $itemID . ' was successfully updated.';
				$back = '?controller=inventory&action=recordinventory';
				require_once('views/pages/success.php');
			}



		}

		public static function updateItemInventory()
		{
			//ORIGIN: RECORD INVENTORY
			$errorMessage = array();
			$materialID = $_POST['material'];
			$supplierID = $_POST['supplier_id'];
			$quantity = $_POST['quantity'];

			if(filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT) === false)
			{
				$errorMessage['quantityError'] = 'Quantity must be an int.';
			}

			$stageDBO = DatabaseObjectFactory::build('material');
			$stageDBO->SetJoin(['[><]item' => 'item_id']);
			$arr = ['item_id','calculated_qoh','name'];
			$item = $stageDBO->getRecords($arr, ['material_id' => $materialID]);
			$qoh = $item[0]['calculated_qoh'];

			$qoh += $quantity;
			$itemID = $item[0]['item_id'];

			$itemUpdates['qoh'] = $qoh;
			$itemUpdates['calculated_qoh'] = $qoh;

			$stageDBO = DatabaseObjectFactory::build('item');
			$stageDBO->updateRecord($itemUpdates,['item_id' => $itemID]);


			$successMessage =  $item[0]['name']. ' has a new quantity of ' . $qoh;
			require_once('views/pages/success.php');

		}
		
		public static function addCraft()
		{
			//ADD CRAFT TO CRAFT/ITEM TABLES
			$stageDBO = DatabaseObjectFactory::build('material');
			$arr = ['material_id','unit_price','name'];
			$stageDBO->SetJoin(['[><]item' => 'item_id']);
			$materials = $stageDBO->getRecords($arr);
			include('views/pages/addCraft.php');
		}

		public static function insertCraft()
		{
			$errorMessage = array();

			//FIND ERRORS
			if(filter_input(INPUT_POST, 'currentPrice', FILTER_VALIDATE_FLOAT) === false)
			{
				$errorMessage['currentPriceError'] = 'Price must be a decimal type.';
			}

			
		
			//GRAB ALL INSERT VALUES FOR THE ITEM TABLE
			$qoh = $_POST['qoh'];
			$name = filter_input(INPUT_POST,'craftName', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			$price = $_POST['currentPrice'];
			$minPrice = $_POST['minPrice'];

			//GET ITEM DATA TO BE INSERTED
			$itemData['item_id'] = NULL;
			$itemData['qoh'] = $qoh;
			$itemData['calculated_qoh'] = $qoh;
			$itemData['name'] = $name;
			$itemData['original_price'] = $price;
			$itemData['current_price'] = $price;
			$itemData['min_price'] = $minPrice;

			//GET ALL THE ITEMS AND ASSOCIATED QUANTITIES IN PARALLEL ARRAY
			$items = $_POST['material'];
			$quantities = $_POST['quantity'];

			//VALIDATE PRICE
			if(!empty($itemData['min_price']))
			{	if(filter_input(INPUT_POST, 'minPrice', FILTER_VALIDATE_FLOAT) === false)
				{
					$errorMessage['minPriceError'] = 'Price must be a decimal type.';
				}
			}

			
			//FIND DUPLICATE MATERIAL ENTRIES
			$duplicates = array_count_values($items);

			for($index = 0; $index < count($duplicates); $index++)
			{

				if($duplicates[$items[$index]] > 1)
				{
					$errorMessage['duplicates'] = 'ERROR: Duplicate Materials.';
				}
			}
			
			
			

			
			//WHEN ERRORS, RETURN TO ADDCRAFT.PHP
			if(count($errorMessage) > 0)
			{
				$stageDBO = DatabaseObjectFactory::build('material');
				$arr = ['material_id','unit_price','name'];
				$stageDBO->SetJoin(['[><]item' => 'item_id']);
				$materials = $stageDBO->getRecords($arr);
				require_once('views/pages/addCraft.php');
			}

			else if(count($errorMessage) == 0)
			{
				$stageDBO = DatabaseObjectFactory::build('item');
				$stageDBO->setRecords('item', $itemData);


				//GRAB THE ITEM ID THAT WAS INSERTED
				$itemID = $stageDBO->getLastInsert();	

				//MATERIAL DATA
				$craftData['craft_id'] = NULL;
				$craftData['item_id'] = $itemID;

				$stageDBO = DatabaseObjectFactory::build('craft');
				$stageDBO->setRecords('craft', $craftData);
				$craftID = $stageDBO->getLastInsert();

				for($i = 0; $i < count($items); $i++)
				{
					$craftMaterialsData['craft_id'] = $craftID;
					$craftMaterialsData['material_id'] = $items[$i];
					$stageDBO->setRecords('craft_materials', $craftMaterialsData);

				}

				$successMessage = 'Craft successfully added.';
				require_once('views/pages/success.php');
				
			}



		}
		
		public static function addMaterial()
		{
			$stageDBO = DatabaseObjectFactory::build('supplier');
			$arr = ['supplier_id','company_name'];
			$suppliers = $stageDBO->getRecords($arr);
			include('views/pages/addMaterial.php');
		}

		public static function insertMaterial()
		{
			$errorMessage = array();

			//FIND ERRORS
			if(filter_input(INPUT_POST, 'unitPrice', FILTER_VALIDATE_FLOAT) === false)
			{
				$errorMessage['unitPriceError'] = 'Unit Price must be a decimal type.';
			}

			if(filter_input(INPUT_POST, 'currentPrice', FILTER_VALIDATE_FLOAT) === false)
			{
				$errorMessage['currentPriceError'] = 'Price must be a decimal type.';
			}

			if(filter_input(INPUT_POST, 'minPrice', FILTER_VALIDATE_FLOAT) === false)
			{
				$errorMessage['minPriceError'] = 'Price must be a decimal type.';
			}

		
			//GRAB ALL INSERT VALUES FOR THE ITEM TABLE
			$qoh = $_POST['qoh'];
			$name = filter_input(INPUT_POST,'materialName', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			$price = $_POST['currentPrice'];
			$minPrice = $_POST['minPrice'];

			//ITEM DATA TO BE INSERTED
			$itemData['item_id'] = NULL;
			$itemData['qoh'] = $qoh;
			$itemData['calculated_qoh'] = $qoh;
			$itemData['name'] = $name;
			$itemData['original_price'] = $price;
			$itemData['current_price'] = $price;
			$itemData['min_price'] = $minPrice;
			
			
			

			
			//WHEN ERROR MESSAGE GO BACK TO ADDMATERIAL.PHP
			if(count($errorMessage) > 0)
			{
				$stageDBO = DatabaseObjectFactory::build('supplier');
				$arr = ['supplier_id','company_name'];
				$suppliers = $stageDBO->getRecords($arr);
				require_once('views/pages/addMaterial.php');
			}

			else if(count($errorMessage) == 0) //INSERT ITEM DATA
			{
				$stageDBO = DatabaseObjectFactory::build('item');
				$stageDBO->setRecords('item', $itemData);


				//GRAB THE ITEM ID THAT WAS INSERTED
				$itemID = $stageDBO->getLastInsert();		

				//MATERIAL DATA
				$materialData['material_id'] = NULL;
				$materialData['item_id'] = $itemID;
				$materialData['supplier_id'] = $_POST['supplier'];
				$materialData['unit_price'] = $_POST['unitPrice'];

				$stageDBO = DatabaseObjectFactory::build('material');
				$stageDBO->setRecords('material', $materialData);


				$successMessage = 'Material was successfully added. ';
				$back = '?controller=inventory&action=manageinventory';
				require_once('views/pages/success.php');
			}



		}

		public static function editMaterial()
		{
			//Grab the material id passed by the Edit button
			$materialID = $_POST['material_id'];


			//GRAB MATERIAL INFO BASED ON MATERIAL ID LISTED ABOVE
			$stageDBO = DatabaseObjectFactory::build('material');
			$arr = ['material_id', 'name','unit_price','current_price','min_price'];
			$stageDBO->SetJoin(["[><]item" => "item_id"]);
			$materials = $stageDBO->getRecords($arr, ['material_id' => $materialID] );
			require_once('views/pages/editMaterial.php');


		}

		public static function updateMaterial()
		{
			//INITIALIZE ERRORS AND UPDATES AND GET THE MATERIAL ID
			$errorMessage = array();
			$itemUpdates = array();
			$materialUpdates = array();
			$materialID = $_POST['material_id'];

			$success = false;

			//GET DATA FROM DATABASE TO COMPARE TO EDIT FORM
			$stageDBO = DatabaseObjectFactory::build('material');
			$arr = ['item_id','material_id', 'name','unit_price','current_price','min_price'];
			$stageDBO->SetJoin(["[><]item" => "item_id"]);
			$materials = $stageDBO->getRecords($arr, ['material_id' => $materialID] );

			//GET FORM DATA
			$itemData['name'] = $_POST['materialName'];
			$itemData['current_price'] = $_POST['currentPrice'];
			$itemData['min_price'] = $_POST['minPrice'];
			$materialData['unit_price'] = $_POST['unitPrice'];

			//FIND CHANGED DATA
			if($materials[0]['name'] != $itemData['name'])
			{
				$itemUpdates['name'] = $itemData['name'];
			}

			if($materials[0]['unit_price'] != $materialData['unit_price'])
			{
				$materialUpdates['unit_price'] = $materialData['unit_price']; 
			}

			if($materials[0]['current_price'] != $itemData['current_price'])
			{
				$itemUpdates['current_price'] = $itemData['current_price'];
			}

			if($materials[0]['min_price'] != $itemData['min_price'])
			{
				$itemUpdates['min_price'] = $itemData['min_price'];
			}


			//IF ITEM DATA IS NEW, UPDATE IT
			if(count($itemUpdates) > 0 && count($errorMessage) == 0)
			{
				$stageDBO = DatabaseObjectFactory::build('item');
				$stageDBO->updateRecord($itemUpdates, ['item_id' => $materials[0]['item_id']]);
				$success = true;
			}

			//WHEN ERROR MESSAGES, SEND BACK TO FILE
			if(count($errorMessage) > 0)
			{

				require_once('views/pages/editMaterial.php');
			}

			//IF MATERIAL DATA IS NEW, UPDATE IT
			if(count($materialUpdates) > 0 && count($errorMessage) ==0)
			{
				$stageDBO = DatabaseObjectFactory::build('material');
				$stageDBO->updateRecord($materialUpdates, ['material_id' => $materialID]);

				$success = true;

			}

			//IF NOTHING CHANGED, PRINT NO CHANGES MADE
			else if(count($itemUpdates) == 0 && count($materialUpdates) == 0)
			{

				print "<div class='content'>No changes were made.</div>";
			}

			if($success == true)
			{
				$successMessage = 'Material was successfully updated.';
				$back = '?controller=inventory&action=manageinventory';
				require_once('views/pages/success.php');
			}

		}

		public static function editCraft()
		{
			//Grab the craft id passed by the Edit button
			$craftID = $_POST['craft_id'];

			$stageDBO = DatabaseObjectFactory::build('craft');
			$arr = ['craft_id','item_id', 'name','current_price','min_price'];
			$stageDBO->SetJoin(["[><]item" => "item_id"]);
			$craft = $stageDBO->getRecords($arr, ['craft_id' => $craftID] );

			$stageDBO = DatabaseObjectFactory::build('craft_materials');
			$arr = ['material_id', 'name','unit_price'];
			$stageDBO->SetJoin(["[><]material" => "material_id", "[><]item" => "item_id"]);
			$materials = $stageDBO->getRecords($arr, ['craft_id' => $craftID] );

			$stageDBO = DatabaseObjectFactory::build('material');
			$arr = ['material_id', 'name'];
			$stageDBO->SetJoin(["[><]item" => "item_id"]);
			$craftMaterials = $stageDBO->getRecords($arr);


			require_once('views/pages/editCraft.php');

		}

		public static function deleteMaterial()
		{
			$craftID = $_POST['craft_id'];
			$materialID = $_POST['material_id'];
			$errorMessage = array();

			$stageDBO = DatabaseObjectFactory::build('craft_materials');
			$arr = ['craft_id','material_id'];
			$craft = $stageDBO->getRecords($arr, ['craft_id' => $craftID] );

			//MAKE SURE THAT THE CRAFT HAS AT LEAST ONE MATERIAL
			if(count($craft) == 1)
			{
				$errorMessage['materialError'] = 'Crafts must have at least one material.';

				$stageDBO = DatabaseObjectFactory::build('craft');
				$arr = ['craft_id','item_id', 'name','current_price','min_price'];
				$stageDBO->SetJoin(["[><]item" => "item_id"]);
				$craft = $stageDBO->getRecords($arr, ['craft_id' => $craftID] );

				$stageDBO = DatabaseObjectFactory::build('craft_materials');
				$arr = ['material_id', 'name','unit_price'];
				$stageDBO->SetJoin(["[><]material" => "material_id", "[><]item" => "item_id"]);
				$materials = $stageDBO->getRecords($arr, ['craft_id' => $craftID] );

				$stageDBO = DatabaseObjectFactory::build('material');
				$arr = ['material_id', 'name'];
				$stageDBO->SetJoin(["[><]item" => "item_id"]);
				$craftMaterials = $stageDBO->getRecords($arr);
				require_once('views/pages/editCraft.php');
			}

			//DELETE MATERIAL FROM CRAFT_MATERIALS TABLE
			else
			{
				$stageDBO = DatabaseObjectFactory::build('craft_materials');
				$stageDBO->deleteRecord( ["AND" => [
												"craft_id" => $craftID,
												"material_id" => $materialID
											]]);

				$successMessage = 'Material successfully removed from craft.';
				require_once('views/pages/success.php');
			}
		}

		public static function addCraftMaterial()
		{
			$craftID = $_POST['craft_id'];
			$materialID = $_POST['material_id'];

			//WHEN A CRAFT GETS A MATERIAL ADDED, CHECK IF MATERIAL ALREADY EXISTS
			$stageDBO = DatabaseObjectFactory::build('craft_materials');
			$arr = ['craft_id','material_id'];
			$alreadyExists = $stageDBO->getRecords($arr, ["AND" => [
												"craft_id" => $craftID,
												"material_id" => $materialID
											]]);

			if(count($alreadyExists) == 1)
			{
				print "<div class='content'>This material is already part of this craft. </div>";
				//require_once('views/pages/editCraft.php');
			}

			//WHEN MATERIAL DOESN'T EXIST IN CRAFT MATERIALS, INSERT IT
			else
			{
				$craftMaterialsData['craft_id'] = $craftID;
				$craftMaterialsData['material_id'] = $materialID;
				$stageDBO->setRecords('craft_materials',$craftMaterialsData);

				$successMessage = 'Material successfully added to craft.';
				$back = '?controller=inventory&action=manageinventory';
				require_once('views/pages/success.php');
			}
		}

		public static function updateCraft()
		{
			//INITIALIZE ERRORS AND UPDATES AND GET THE MATERIAL ID
			$errorMessage = array();
			$itemUpdates = array();
			$craftID = $_POST['craft_id'];


			//GET DATA FROM DATABASE TO COMPARE TO EDIT FORM
			$stageDBO = DatabaseObjectFactory::build('craft');
			$arr = ['craft_id','item_id', 'name','current_price','min_price'];
			$stageDBO->SetJoin(["[><]item" => "item_id"]);
			$craft = $stageDBO->getRecords($arr, ['craft_id' => $craftID] );


			//GET FORM DATA
			$itemData['name'] = $_POST['craftName'];
			$itemData['current_price'] = $_POST['currentPrice'];
			$itemData['min_price'] = $_POST['minPrice'];
			

			//FIND CHANGED DATA
			if($craft[0]['name'] != $itemData['name'])
			{
				$itemUpdates['name'] = $itemData['name'];
			}

			if($craft[0]['current_price'] != $itemData['current_price'])
			{
				$itemUpdates['current_price'] = $itemData['current_price'];
			}

			if($craft[0]['min_price'] != $itemData['min_price'])
			{
				$itemUpdates['min_price'] = $itemData['min_price'];
			}


			//IF ITEM DATA IS NEW, UPDATE IT
			if(count($itemUpdates) > 0 && count($errorMessage) == 0)
			{
				$stageDBO = DatabaseObjectFactory::build('item');
				$stageDBO->updateRecord($itemUpdates, ['item_id' => $craft[0]['item_id']]);

				$successMessage = 'Successfully Updated' . ' ' . $itemData['name'] . ', Item ID: '  .$craft[0]['item_id'];
				$back = '?controller=inventory&action=manageinventory';
				require_once('views/pages/success.php');
			}

			//WHEN ERROR MESSAGES, SEND BACK TO FILE
			if(count($errorMessage) > 0)
			{

				require_once('views/pages/editCraft.php');
			}

			//IF NOTHING CHANGED, PRINT NO CHANGES MADE
			else if(count($itemUpdates) == 0)
			{
				print "No changes were made.";
			}

		}


		public static function editReturn()
		{
			//Grab the craft id passed by the Edit button
			$returnID = $_POST['return_id'];

			$stageDBO = DatabaseObjectFactory::build('return_details');
			$arr = ['current_price', 'min_price','item_id'];
			$stageDBO->SetJoin(["[><]item" => "item_id"]);
			$return = $stageDBO->getRecords($arr, ['return_id' => $returnID] );




			require_once('views/pages/editReturn.php');

		}

		public static function updateReturn()
		{
			//INITIALIZE ERRORS AND UPDATES AND GET THE MATERIAL ID
			$errorMessage = array();
			$itemUpdates = array();
			$returnID = $_POST['return_id'];
			$itemID = $_POST['item_id'];
			

			//GET DATA FROM DATABASE TO COMPARE TO EDIT FORM
			$stageDBO = DatabaseObjectFactory::build('return_details');
			$arr = ['current_price', 'min_price','item_id'];
			$stageDBO->SetJoin(["[><]item" => "item_id"]);
			$return = $stageDBO->getRecords($arr, ['return_id' => $returnID] );


			//GET FORM DATA
			$itemData['current_price'] = $_POST['currentPrice'];
			$itemData['min_price'] = $_POST['minPrice'];
			

			//FIND CHANGED DATA
			if($return[0]['current_price'] != $itemData['current_price'])
			{
				$itemUpdates['current_price'] = $itemData['current_price'];
			}

			if($return[0]['min_price'] != $itemData['min_price'])
			{
				$itemUpdates['min_price'] = $itemData['min_price'];
			}


			//IF ITEM DATA IS NEW, UPDATE IT
			if(count($itemUpdates) > 0 && count($errorMessage) == 0)
			{
				$stageDBO = DatabaseObjectFactory::build('item');
				$stageDBO->updateRecord($itemUpdates, ['item_id' => $return[0]['item_id']]);

				$back = '?controller=inventory&action=manageinventory';
				$successMessage = 'Return successfully updated.';
				require_once('views/pages/success.php');
			}

			//WHEN ERROR MESSAGES, SEND BACK TO FILE
			if(count($errorMessage) > 0)
			{

				require_once('views/pages/editCraft.php');
			}

			//IF NOTHING CHANGED, PRINT NO CHANGES MADE
			else if(count($itemUpdates) == 0)
			{
				print "No changes were made.";
			}
		} 
		
			
			
	}