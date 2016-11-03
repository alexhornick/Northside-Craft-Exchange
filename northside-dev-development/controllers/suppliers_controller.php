
<?php
	require_once('models/database.php');
	require_once('controllers/forms_controller.php');  
	class SuppliersController 
	{	
					
		public static function managesuppliers()
		{	
			$stageDBO = DatabaseObjectFactory::build('supplier');
			$arr = ['supplier_id','company_name'];
			$suppliers = $stageDBO->getRecords($arr);
			require_once('views/pages/manageSuppliers.php');
		}

		public static function addSupplier()
		{	
			require_once('views/pages/addSupplier.php');

		}

		public static function insertSupplier()
		{
			$errorMessage = array();
			//Grab all the Values for the Supplier Address and Validate them.
			if(filter_input(INPUT_POST, 'streetNumber', FILTER_VALIDATE_INT) === false)
			{
				$errorMessage['streetNumberError'] = 'Street Number must be an integer.';
			}

			if(filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT) === false)
			{
				$errorMessage['zipError'] = 'Zip Code must consist of numbers.';
			}

			$streetNumber = $_POST['streetNumber'];
			$streetName = filter_input(INPUT_POST,'streetName', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			$streetType = filter_input(INPUT_POST,'streetType', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			$addressType = $_POST['addressType'];
			$city = filter_input(INPUT_POST,'city', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			$state = filter_input(INPUT_POST,'state', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			$zip = $_POST['zip'];
			$country = filter_input(INPUT_POST,'country', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			

			//Grab the Supplier information
			$companyName = filter_input(INPUT_POST,'companyName', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);

			$regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";  //phone number validation
			$phoneNumber = $_POST['phone'];

			if(!preg_match( $regex, $phoneNumber ))
			{
				$errorMessage['phoneError'] = 'Invalid Phone Number';
			}

			$contactName = filter_input(INPUT_POST,'contactName', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			$contactPhoneNumber = $_POST['contactPhone'];


			if(!preg_match( $regex, $contactPhoneNumber ))
			{
				$errorMessage['contactPhoneError'] = 'Invalid Phone Number';
			}

			$jobTitle = filter_input(INPUT_POST,'contactJobTitle', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);

			if(filter_input(INPUT_POST, 'contactEmail', FILTER_VALIDATE_EMAIL) === false)
			{
				$errorMessage['contactEmail'] = 'Not a valid email address.';
			}

			$contactEmail = $_POST['contactEmail'];

			//Save the values on the address form in case there are errors (so user doesn't have to retype)
			for($index = 0; $index < count(FormsController::$AddressForm); $index++)
				{
					$name[$index] = $_POST[FormsController::$AddressForm[$index]['name']];
				}

			if(count($errorMessage) > 0) //when there are errors, send user back to the addSupplier screen.
			{
				require_once('views/pages/addSupplier.php');
			}

			else if(count($errorMessage == 0)) //When the input is all validated (no error messages), insert the supplier
			{
					//INSERT DATA HERE
					$addressData['address_id'] = NULL;
					$addressData['street_number'] = $streetNumber;
					$addressData['street_suffix'] = NULL;
					$addressData['street_direction'] = NULL;
					$addressData['street_name'] = $streetName;
					$addressData['street_type'] = $streetType;
					$addressData['address_type'] = $addressType;
					$addressData['major_municipality'] = NULL;
					$addressData['major_municipality'] = $city;
					$addressData['governing_district'] = $state;
					$addressData['zip'] = $zip;
					$addressData['iso_country_code'] = $country;
 					
					$stageDBO = DatabaseObjectFactory::build('address');
					$stageDBO->setRecords('address', $addressData);
					$addressID = $stageDBO->getLastInsert(); 	
	

					$supplierData['supplier_id'] = NULL;
					$supplierData['company_name'] = $companyName;
					$supplierData['company_phone'] = $phoneNumber;
					$supplierData['contact_phone'] = $contactPhoneNumber;
					$supplierData['contact_name'] = $contactName;
					$supplierData['contact_job_title'] = $jobTitle;
					$supplierData['address_id'] = $addressID;
					$supplierData['email'] = $contactEmail;

					$stageDBO = DatabaseObjectFactory::build('supplier');
					$stageDBO->setRecords('supplier', $supplierData);


					$successMessage = 'Supplier was successfully created. ';
					require_once('views/pages/success.php');

			}
		}

		public static function editSupplier()
		{	
			$supplierID = $_POST['supplier_id'];
			$stageDBO = DatabaseObjectFactory::build('supplier');
			$arr = ['supplier_id','company_name','address_id','contact_name','contact_job_title','company_phone','contact_phone','email'];
			$supplier = $stageDBO->getRecords($arr, ['supplier_id' => $supplierID]);
			require_once('views/pages/editSupplier.php');
		}

		public static function updateSupplier()
		{
			$errorMessage = array();
			$supplierID = $_POST['supplier_id'];

			$success = false;

			$stageDBO = DatabaseObjectFactory::build('supplier');
			$arr = ['address_id','company_name','company_phone','contact_name','contact_phone','email','contact_job_title'];
			$supplier = $stageDBO->getRecords($arr, ['supplier_id' => $supplierID]);


			$form['company_name'] = filter_input(INPUT_POST,'companyName', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			
			$form['company_phone'] = $_POST['phone'];
			$regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";  //phone number validation
			if(!preg_match( $regex, $form['company_phone'] ))
				{
					$errorMessage['phoneError'] = 'Invalid Phone Number';
				}
			$form['contact_name'] = filter_input(INPUT_POST,'contactName', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			$form['contact_phone'] = $_POST['contactPhone'];
			if(!preg_match( $regex, $form['contact_phone'] ))
				{
					$errorMessage['contactPhoneError'] = 'Invalid Phone Number';
				}
			$form['email'] = $_POST['contactEmail'];

			if(filter_input(INPUT_POST, 'contactEmail', FILTER_VALIDATE_EMAIL) === false)
			{
				$errorMessage['contactEmailError'] = 'Not a valid email address.';
			}

			$form['contact_job_title'] = filter_input(INPUT_POST,'contactJobTitle', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);

			$updates = array();

			if($supplier[0]['company_name'] != $form['company_name'])
			{
				$updates['company_name'] = $form['company_name'];
			}

			if($supplier[0]['company_phone'] != $form['company_phone'])
			{
				$updates['company_phone'] = $form['company_phone'];
			}

			if($supplier[0]['contact_name'] != $form['contact_name'])
			{
				$updates['contact_name'] = $form['contact_name'];
			}

			if($supplier[0]['contact_phone'] != $form['contact_phone'])
			{
				$updates['contact_phone'] = $form['contact_phone'];
			}

			if($supplier[0]['contact_job_title'] != $form['contact_job_title'])
			{
				$updates['contact_job_title']= $form['contact_job_title'];
			}

			if($supplier[0]['email'] != $form['email'])
			{
				$updates['email']= $form['email'];
			}


			$stageDBO = DatabaseObjectFactory::build('address');
			$arr = ['street_number','street_name','street_type','address_type','major_municipality','governing_district','zip','iso_country_code'];
			$address = $stageDBO->getRecords($arr, ['address_id' => $_POST['address_id']]);

	

			//ADDRESS DATA, VALIDATION, AND ERROR HANDLING
			$addressData['address_id'] = $_POST['address_id'];
			$addressData['street_number'] = $_POST['streetNumber'];
			$addressData['street_name'] = filter_input(INPUT_POST,'streetName', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			$addressData['street_type'] = filter_input(INPUT_POST,'streetType', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			$addressData['address_type'] = $_POST['addressType'];
			$addressData['major_municipality'] = filter_input(INPUT_POST,'city', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			$addressData['governing_district'] = filter_input(INPUT_POST,'state', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
			$addressData['zip'] = $_POST['zip'];
			$addressData['iso_country_code'] = filter_input(INPUT_POST,'country', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);

			if(filter_input(INPUT_POST, 'streetNumber', FILTER_VALIDATE_INT) === false)
			{
				$errorMessage['streetNumberError'] = 'Street Number must be an integer.';
			}

			if(filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT) === false)
			{
				$errorMessage['zipError'] = 'Zip Code must consist of numbers.';
			}


			$addressUpdates = array();

			if($address[0]['street_number'] != $addressData['street_number'])
			{
				$addressUpdates['street_number'] = $addressData['street_number'];
			}

			if($address[0]['street_name'] != $addressData['street_name'])
			{
				$addressUpdates['street_name'] = $addressData['street_name'];
			}

			if($address[0]['street_type'] != $addressData['street_type'])
			{
				$addressUpdates['street_type'] = $addressData['street_type'];
			}

			if($address[0]['address_type'] != $addressData['address_type'])
			{
				$addressUpdates['address_type'] = $addressData['address_type'];
			}

			if($address[0]['major_municipality'] != $addressData['major_municipality'])
			{
				$addressUpdates['major_municipality'] = $addressData['major_municipality'];
			}

			if($address[0]['governing_district'] != $addressData['governing_district'])
			{
				$addressUpdates['governing_district'] = $addressData['governing_district'];
			}

			if($address[0]['zip'] != $addressData['zip'])
			{
				$addressUpdates['zip'] = $addressData['zip'];
			}

			if($address[0]['iso_country_code'] != $addressData['iso_country_code'])
			{
				$addressUpdates['iso_country_code'] = $addressData['iso_country_code'];
			}


			if(count($updates) > 0 && count($errorMessage) == 0)
			{
				$stageDBO = DatabaseObjectFactory::build('supplier');
				$stageDBO->updateRecord($updates, ['supplier_id' => $supplierID]);

				$success = true;
			}

			else if(count($errorMessage) > 0)
			{

				require_once('views/pages/editSupplier.php');
			}

			if(count($addressUpdates) > 0 && count($errorMessage) ==0)
			{
				$stageDBO = DatabaseObjectFactory::build('address');
				$stageDBO->updateRecord($addressUpdates, ['address_id' => $addressData['address_id']]);

				$success = true;
			}

			else if(count($addressUpdates) == 0 && count($updates) == 0)
			{

				print "<div class='content'>No changes were made.";
				print "<form action = '?controller=suppliers&action=managesuppliers' method='post'>
							<input style='width:150px;' type='submit' value='Back to Edit Supplier' class='button'>
						</form></div>";
			}

			if($success == true)
			{
			   $successMessage = 'Supplier successfully updated.';
			   require_once('views/pages/success.php');	
			}


		} 

		public static function managediscounts()
		{
			$stageDBO = DatabaseObjectFactory::build('supplier_discount');
			$arr = ['material_id','supplier_id','min_qty','discount_percent'];
			$discounts = $stageDBO->getRecords($arr);
			require_once('views/pages/manageDiscounts.php');
		}

		public static function addDiscount()
		{	
			$stageDBO = DatabaseObjectFactory::build('supplier');
			$arr = ['supplier_id','company_name'];
			$suppliers = $stageDBO->getRecords($arr);
			require_once('views/pages/addDiscount.php');
		}

		public static function getMaterials()
		{
			//GRAB THE SUPPLIER ID TO BE USED IN WHERE CLAUSE
			$supplier_id = $_POST['supplier_id'];
			
			$stageDBO = DatabaseObjectFactory::build('material');
			$arr = ['material_id'];
			$materials = $stageDBO->getRecords($arr, ['supplier_id' => $supplier_id]);
			
			require_once('views/pages/addDiscount2.php');
		}

		public static function insertDiscount()
		{
			$supplier_id = $_POST['supplier_id'];
			$materialID = $_POST['material'];


			$stageDBO = DatabaseObjectFactory::build('material');
			$arr = ['material_id'];
			$materials = $stageDBO->getRecords($arr, ['supplier_id' => $supplier_id]);

			$errorMessage = array();

			//Grab all the discount values and validate them as ints
			if(filter_input(INPUT_POST, 'min_qty', FILTER_VALIDATE_INT) === false)
			{
				$errorMessage['min_qtyError'] = 'Minimum Quantity must be an number.';
			}

			$minQty = $_POST['min_qty'];

			if(filter_input(INPUT_POST, 'discountPct', FILTER_VALIDATE_FLOAT) === false)
			{
				$errorMessage['discountPctError'] = 'Discount Percent must be an number.';
			}

			$discountPct = $_POST['discountPct'];

			if(count($errorMessage) > 0) //when there are errors, send user back to the addDiscount screen.
			{
				require_once('views/pages/addDiscount2.php');
			}

			else if(count($errorMessage == 0)) //When the input is all validated (no error messages), insert the supplier
			{
				//INSERT DATA HERE
				$insertData['supplier_id'] = $supplier_id;
				$insertData['material_id'] = $materialID;
				$insertData['min_qty'] = $minQty;
				$insertData['discount_percent'] = $discountPct;

				$stageDBO = DatabaseObjectFactory::build('supplier_discount');
				$stageDBO->setRecords('supplier_discount', $insertData);

				//header('Location: ?controller=suppliers&action=managediscounts');
				PagesController::redirect('?controller=suppliers&action=managediscounts');
			}
		}

		public static function editDiscount()
		{	
			$supplierID = $_POST['supplier_id'];
			$materialID = $_POST['material_id'];
			$stageDBO = DatabaseObjectFactory::build('supplier_discount');
			$arr = ['supplier_id','material_id','min_qty','discount_percent'];
			$discount = $stageDBO->getRecords($arr, ['AND' => ['supplier_id' => $supplierID, 'material_id' => $materialID]]);

			require_once('views/pages/editDiscount.php');
		}

		public static function deleteDiscount()
		{	
			$supplierID = $_POST['supplier_id'];
			$materialID = $_POST['material_id'];

			$stageDBO = DatabaseObjectFactory::build('supplier_discount');
			$stageDBO->deleteRecord( ["AND" => [
												"supplier_id" => $supplierID,
												"material_id" => $materialID
											]]);

			
		}

		public static function updateDiscount()
		{
			$supplierID = $_POST['supplier_id'];
			$materialID = $_POST['material_id'];
			$stageDBO = DatabaseObjectFactory::build('supplier_discount');
			$arr = ['min_qty','discount_percent'];
			$discount = $stageDBO->getRecords($arr,['AND' => ['supplier_id' => $supplierID, 'material_id' => $materialID]]);

			$discountData['min_qty'] = $_POST['minQty'];
			$discountData['discountPct'] = $_POST['discountPct'];

			$errorMessage = array();

			//Grab all the discount values and validate them as ints
			if(filter_input(INPUT_POST, 'min_qty', FILTER_VALIDATE_INT) === false)
			{
				$errorMessage['min_qtyError'] = 'Minimum Quantity must be an number.';
			}

			if(filter_input(INPUT_POST, 'discountPct', FILTER_VALIDATE_FLOAT) === false)
			{
				$errorMessage['discountPctError'] = 'Discount Percent must be an number.';
			}

			$discountUpdates = array();

			if($discount[0]['min_qty'] != $discountData['min_qty'])
			{
				$discountUpdates['min_qty'] = $discountData['min_qty'];
			}

			if($discount[0]['discount_percent'] != $discountData['min_qty'])
			{
				$discountUpdates['discount_percent'] = $discountData['discountPct'];
			}

			if(count($discountUpdates) > 0 && count($errorMessage) == 0)
			{
				$stageDBO = DatabaseObjectFactory::build('supplier_discount');
				$stageDBO->updateRecord($discountUpdates,['AND' => ['supplier_id' => $supplierID, 'material_id' => $materialID]]);

				$successMessage = 'Discount successfully updated.';
				$back = '?controller=suppliers&action=managediscounts';
			    require_once('views/pages/success.php');	
			}

			else if(count($errorMessage) >0)
			{
				require_once('views/pages/editDiscount.php');
			}


		}


			public static function editAddressForm($supplierID)
			{	
				$stageDBO = DatabaseObjectFactory::build('supplier');
				$arr = ['supplier_id', 'address_id','street_number','street_name','street_type','address_type','major_municipality','governing_district','iso_country_code','zip'];
				$stageDBO->SetJoin(["[><]address" => "address_id"]);
				$supplier = $stageDBO->getRecords($arr, ['supplier_id'=>$supplierID] );

				print "<h4>Address Information</h4>";
				for($index = 0; $index < count(FormsController::$AddressForm); $index++)
				{
					if(FormsController::$AddressForm[$index]['element'] == 'input')  //FOR INPUT TAGS
						print "<label>" . FormsController::$AddressForm[$index]['label'] . " <input type = '". FormsController::$AddressForm[$index]['type'] . "'name = '".FormsController::$AddressForm[$index]['name'] . "' value='" . $supplier[0][FormsController::$AddressForm[$index]['value']]."'></label><br>";
					else if(FormsController::$AddressForm[$index]['element'] == 'select') //IF THE ELEMENT IS A SELECT

					{		print "<label>Address Type </label><br><select name='" . FormsController::$AddressForm[$index]['name'] . "'>"; 
							for($i = 0; $i < count(FormsController::$AddressForm[$index]['options']); $i++)
								print "<option>" .FormsController::$AddressForm[$index]['options'][$i] ."</option>"; 
								
							print "</select><br><br>";		
					}
				}
				

				
			}

			
			
	}