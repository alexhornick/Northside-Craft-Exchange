<?php
	function call($controller, $action) {
	//Pull in the file that matches the controller name
		require_once('controllers/' . $controller .  '_controller.php');
	//Here is where we create many different controller objects
	/*
	PagesController: Creates a basic page object
	ReportsController: Creates a basic ReportsController object
	FormsController: Creates a basic FormsController object

	Each basic object must have an entry in the $controllers array, and have corresponding actions
	Controllers and Actions are sent in <a> tags as $_GET variables
	*/
		switch($controller) {
			case 'pages' :
				$controller = new PagesController();
			break;

			case 'reports' :
				$controller = new ReportsController();
			break;

			case 'forms' :
				$controller = new FormsController();
			break;

			case 'menus' :
				$controller = new MenusController();
			break;
			//Group Page Controllers
			case 'order' :
				$controller = new OrdersController();
				break;
			case 'employees' :
				$controller = new EmployeesController();
			break;
			case 'inventory' :
				$controller = new InventoryController();
				break;
			case 'suppliers' :
				$controller = new SuppliersController();
		}

		//call the action
		$controller->{ $action }();
	}
	//$controllers = array('pages' 	=> ['login', 'errors', 'menu','success', 'startSession', 'verify', 'stage']);

	//just a list of the controllers we have and their actions
	//actions are "pages", but also functions that might be needed within the page class
	//for example startSession is not a page, but is included on pages to keep a user's session alive
	//
	//
	$controllers = array('pages' 	=> ['login', 'errors', 'menu','success', 'startSession', 'verify', 'stage', 'logout'], 
						 'reports' 	=> ['makeReport','orders','inventory','generateOrderReports','generateInventoryReport','keyindicator','generateKeyIndicator','viewSale','viewCustom','suppliers','generateSupplierReport','viewGift','viewSupplyOrder'],
						 'forms' 	=> [],
						 'menus' 	=> ['mainMenu', 'subMenu', 'makeMenu', 'makeEmployeeMenu'],
						 'order'	=> ['enterorder', 'lookuporder', 'findorder', 'returnorder', 'submitForm','confirm','manageorders','editGift', 'editCustom','viewOrder','updateGift','updateCustomOrder','returnItem', 'filter'],
						 'employees' => ['addemployee','editemployee','getEmployee','insertEmployee','updateEmployee'],
						'inventory' => ['ordermaterials', 'getMaterials','submitOrder','InsertOrder','manageinventory','addCraft','addMaterial','editMaterial','editCraft','editReturn','displayinventorysheet','recordinventory','updateMaterial','insertMaterial','updateCraft','deleteMaterial','insertCraft','addCraftMaterial','updateReturn','updateItemInventory','editQoh','updateQoh'],
						'suppliers' => ['managesuppliers','addSupplier','editSupplier','managediscounts','addDiscount','editDiscount','getMaterials','insertSupplier','insertDiscount','updateSupplier','updateDiscount','deleteDiscount']
						

						);
	/*
	else if ($_SESSION["user"] == 3){
		$controllers = array(
								'order' => ['enterorder', 'lookuporder', 'findorder', 'returnorder', 'submitForm','confirm','manageorders','editGift'],

								'menus' => ['makeMenu', 'mainMenu', 'subMenu', 'chooseMenu', 'makeEmployeeMenu'],
							);
	}*/
//}



	//Check if action and controller are allowed
	//with failure redirect to error page

	if (array_key_exists($controller, $controllers)) 
	{
		if (in_array($action, $controllers[$controller])) 
		{
			call($controller, $action);
		}
		else 
		{
			call('pages', 'login');
		}
	}
	else
	{
		call('pages', 'login');
	}
?>
