
<?php
	require_once('forms_controller.php');
	require_once('models/database.php');
	
	class EmployeesController 
	{	
					
			public static function addemployee()
			{
				require_once('views/pages/addemployee.php');
			}

			public static function editemployee()
			{
				$stageDBO = DatabaseObjectFactory::build('employee');
				$arr = ['employee_id', 'first_name','last_name','hire_date','phone_number'];
				$stageDBO->SetJoin(["[><]user" => "employee_id"]);
				$admins = $stageDBO->getRecords($arr, ['accessLevel' => 1] );

				$stageDBO = DatabaseObjectFactory::build('employee');
				$arr = ['employee_id', 'first_name','last_name','hire_date','phone_number'];
				$stageDBO->SetJoin(["[><]user" => "employee_id"]);
				$employees = $stageDBO->getRecords($arr, ['accessLevel' => 3] );

				require_once('views/pages/editEmployee.php');
			}

			public static function insertEmployee()
			{
				$errorMessage = array();
				$accessLevel = $_POST['accessLevel'];
				$firstName = filter_input(INPUT_POST,'firstName', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
				$lastName = filter_input(INPUT_POST,'lastName', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
				$hireDate = filter_input(INPUT_POST,'hireDate', FILTER_SANITIZE_STRING);
				$phoneNumber = $_POST['phone'];
				$password = $_POST['password'];

				$regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";  //phone number validation



				if(!preg_match( $regex, $phoneNumber))
				{
					$errorMessage['phoneError'] = 'Invalid Phone Number';
				}



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

				//Save the values on the address form in case there are errors (so user doesn't have to retype)
				for($index = 0; $index < count(FormsController::$EmployeeForm); $index++)
					{
						$name[$index] = $_POST[FormsController::$EmployeeForm[$index]['name']];
					}

				if(count($errorMessage) > 0) //when there are errors, send user back to the addemployee screen.
				{
					require_once('views/pages/addemployee.php');
				}

				else if(count($errorMessage == 0)) //When the input is all validated (no error messages), insert the employee
				{

					//ADDRESS DATA
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


					//EMPLOYEE INFORMATION
					$employeeData['employee_id'] = NULL;
					$employeeData['last_name'] = $lastName;
					$employeeData['first_name'] = $firstName;
					$employeeData['hire_date'] = $hireDate;
					$employeeData['address_id'] = $addressID;
					$employeeData['phone_number'] = $phoneNumber;

					$stageDBO = DatabaseObjectFactory::build('employee');
					$stageDBO->setRecords('employee', $employeeData);
					$employeeID = $stageDBO->getLastInsert(); 

					//USER TABLE INSERTS
					$userData['employee_id'] = $employeeID;
					$userData['password_hash'] = password_hash($password,PASSWORD_DEFAULT);
					$userData['accessLevel'] = $accessLevel;

					$stageDBO = DatabaseObjectFactory::build('user');
					$stageDBO->setRecords('user', $userData);


					$successMessage = 'Employee ' . $employeeData['first_name'] . ' ' . $employeeData['last_name'] . ' was successfully added. <br> Employee ID is ' . $employeeID;
					
					require_once('views/pages/success.php');
				}
			}
			
			public static function drawForm()
			{	
			
				print "<h4>Address</h4>";
				for($index = 0; $index < count(FormsController::$AddressForm); $index++)
				{
					if(FormsController::$AddressForm[$index]['element'] == 'input')  //FOR INPUT TAGS
						print "<label>" . FormsController::$AddressForm[$index]['label'] . " <input type = '". FormsController::$AddressForm[$index]['type'] . "'name = '".FormsController::$AddressForm[$index]['name'] . "'></label><br>";
					else if(FormsController::$AddressForm[$index]['element'] == 'select') //IF THE ELEMENT IS A SELECT
					{		print "<label>Address Type </label><select name='" . FormsController::$AddressForm[$index]['name'] . "'>"; 
							for($i = 0; $i < count(FormsController::$AddressForm[$index]['options']); $i++)
								print "<option>" .FormsController::$AddressForm[$index]['options'][$i] ."</option>"; 
								
							print "</select><br>";		
					}
				}
				print "<input type='button' class = 'button redButton' value='Cancel'/> <input class='button blueButton' type='submit' value='Add'/>";
				print "</form>";
			}

			public static function drawAddressForm($employeeID)
			{	
				$stageDBO = DatabaseObjectFactory::build('employee');
				$arr = ['employee_id', 'address_id','street_number','street_name','street_type','address_type','major_municipality','governing_district','iso_country_code','zip'];
				$stageDBO->SetJoin(["[><]address" => "address_id"]);
				$employee = $stageDBO->getRecords($arr, ['employee_id'=>$employeeID] );

				print "<h4>Address Information</h4>";
				for($index = 0; $index < count(FormsController::$AddressForm); $index++)
				{
					if(FormsController::$AddressForm[$index]['element'] == 'input')  //FOR INPUT TAGS
						print "<label>" . FormsController::$AddressForm[$index]['label'] . " <input type = '". FormsController::$AddressForm[$index]['type'] . "'name = '".FormsController::$AddressForm[$index]['name'] . "' value='" . $employee[0][FormsController::$AddressForm[$index]['value']]."'></label><br>";
					else if(FormsController::$AddressForm[$index]['element'] == 'select') //IF THE ELEMENT IS A SELECT
					{		print "<label>Address Type </label><select name='" . FormsController::$AddressForm[$index]['name'] . "'>"; 
							for($i = 0; $i < count(FormsController::$AddressForm[$index]['options']); $i++)
								print "<option>" .FormsController::$AddressForm[$index]['options'][$i] ."</option>"; 
								
							print "</select><br>";		
					}
				}
			
			
			}



			public static function getEmployee()
			{
				$employeeID = $_POST['employee_id'];


				$stageDBO = DatabaseObjectFactory::build('employee');
				$arr = ['employee_id', 'address_id', 'first_name', 'accessLevel','last_name','hire_date','phone_number'];
				$stageDBO->SetJoin(["[><]user" => "employee_id"]);
				$employee = $stageDBO->getRecords($arr, ['employee_id'=>$employeeID] );
				require_once('views/pages/editEmployee2.php');

			}

			public static function updateEmployee()
			{
				$employeeID = $_POST['employee_id'];

				$success = false;

				$stageDBO = DatabaseObjectFactory::build('employee');
				$arr = ['first_name','last_name','hire_date','phone_number','address_id','accessLevel'];
				$stageDBO->SetJoin(["[><]user" => "employee_id"]);
				$employee = $stageDBO->getRecords($arr,['employee_id' => $employeeID]);

				$regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";  //phone number validation
				$errorMessage = array();


				//FILTERING DATA
				$employeeData['first_name'] = filter_input(INPUT_POST,'firstName', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
				$employeeData['last_name'] = filter_input(INPUT_POST,'lastName', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
				$employeeData['hire_date'] = filter_input(INPUT_POST,'hireDate', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
				$employeeData['phone_number'] = $_POST['phoneNumber'];

				$userData = array();
				if($employee[0]['accessLevel'] != $_POST['accessLevel'])
				{	
					$userData['accessLevel'] = $_POST['accessLevel'];
				}
				if(!empty($_POST['password']))
				{
					$userData['password_hash'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
				}
				//ERROR CATCHING
				
				if(!preg_match( $regex, $employeeData['phone_number'] ))
				{
					$errorMessage['phoneError'] = 'Invalid Phone Number';
				}

				$employeeUpdates = array();

				if($employee[0]['first_name'] != $employeeData['first_name'])
				{
					$employeeUpdates['first_name'] = $employeeData['first_name'];
				}

				if($employee[0]['last_name'] != $employeeData['last_name'])
				{
					$employeeUpdates['last_name'] = $employeeData['last_name'];
				}

				if($employee[0]['hire_date'] != $employeeData['hire_date'])
				{
					$employeeUpdates['hire_date'] = $employeeData['hire_date'];
				}

				if($employee[0]['phone_number'] != $employeeData['phone_number'])
				{
					$employeeUpdates['phone_number'] = $employeeData['phone_number'];
				}

				if(count($employeeUpdates) > 0)
				{
					$stageDBO = DatabaseObjectFactory::build('employee');
					$stageDBO->updateRecord($employeeUpdates, ['employee_id' => $employeeID]);

					$success = true;
				}

				if(count($userData) > 0)
				{
					$stageDBO = DatabaseObjectFactory::build('user');
					$stageDBO->updateRecord($userData, ['employee_id' => $employeeID]);

					$success = true;
				}


			$stageDBO = DatabaseObjectFactory::build('address');
			$arr = ['street_number','street_name','street_type','address_type','major_municipality','governing_district','zip','iso_country_code'];
			$address = $stageDBO->getRecords($arr, ['address_id' => $_POST['address_id']]);	

				//ADDRESS DATA
			$addressData['address_id'] = $_POST['address_id'];
			$addressData['street_number'] = $_POST['streetNumber'];
			$addressData['street_name'] = $_POST['streetName'];
			$addressData['street_type'] = $_POST['streetType'];
			$addressData['address_type'] = $_POST['addressType'];
			$addressData['major_municipality'] = $_POST['city'];
			$addressData['governing_district'] = $_POST['state'];
			$addressData['zip'] = $_POST['zip'];
			$addressData['iso_country_code'] = $_POST['country'];

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

			if(count($errorMessage) > 0)
			{
				require_once('views/pages/editEmployee2.php');
			} 

			if(count($addressUpdates) > 0 && count($errorMessage) == 0)
			{
				$stageDBO = DatabaseObjectFactory::build('address');
				$stageDBO->updateRecord($addressUpdates, ['address_id' => $addressData['address_id']]);

				$success = true;
			}

			else if(count($addressUpdates) == 0 && count($employeeUpdates) == 0 && count($userData) == 0)
			{

				print "<div class='content'>No changes were made.<br>";
				print "<form action = '?controller=employees&action=getEmployee' method='post'>
							<input type='hidden'  name = 'employee_id' value= '".$employeeID."'>
							<input type='submit' value='Back to Edit' class='button'>
						</form></div>";
			}

			if($success == true)
				{
					$successMessage = 'Employee ' . $employee[0]['first_name'] . ' ' . $employee[0]['last_name'] . ' was successfully updated. <br> Employee ID is ' . $employeeID;
					
					require_once('views/pages/success.php');
				}

			}
	}