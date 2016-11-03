
<div class='content'>
<a href='?controller=suppliers&action=managesuppliers'><input type='button' class = 'blueButton' value='Back'/></a>

<h3>Add Supplier</h3>
<form action = "?controller=suppliers&action=insertSupplier" method = "post">
	<label>Company Name <input required type="text" name="companyName" value = '<?php if(!empty($companyName))echo $companyName?>'></label><br>

	<label>Company Phone Number <input required type="text" name="phone" value = '<?php if(!empty($phoneNumber))echo $phoneNumber?>'></label> <?php if(!empty($errorMessage['phoneError'])) { print $errorMessage['phoneError']; } 	?>

	<br>

	<label>Contact Name <input required type="text" name="contactName" required value = '<?php if(!empty($contactName))echo $contactName?>'></label><br>

	<label>Contact Phone Number <input required type="text" name="contactPhone" value = '<?php if(!empty($contactPhoneNumber))echo $contactPhoneNumber?>'></label> 
	<?php if(!empty($errorMessage['contactPhoneError'])) { print $errorMessage['contactPhoneError']; } 	?>
	<br>

	<label>Contact Job Title <input type="text" name="contactJobTitle" value = '<?php if(!empty($jobTitle))echo $jobTitle?>'></label><br>

	<label>Contact Email <input type="text" name="contactEmail"value = '<?php if(!empty($contactEmail))echo $contactEmail?>'></label>
	<?php if(!empty($errorMessage['contactEmail'])) { print $errorMessage['contactEmail']; } 	?>
	<br>
	
	<!--This will will print out the address form, and keep the previous data for when there are input errors -->
	<?php print "<h4>Address</h4>";

				for($index = 0; $index < count(FormsController::$AddressForm); $index++)
				{
					if(FormsController::$AddressForm[$index]['element'] == 'input')  //FOR INPUT TAGS
					{	
						if(empty($name[$index]))
						{
							$name[$index] = ''; //for first time visits, value will be blank
						}
						print "<label>" . FormsController::$AddressForm[$index]['label'] . " <input type = '". FormsController::$AddressForm[$index]['type'] . "'name = '".FormsController::$AddressForm[$index]['name'] . "' value = '" .$name[$index] ."'></label>";

						if(FormsController::$AddressForm[$index]['name'] == 'streetNumber' && !empty($errorMessage['streetNumberError']))
						{
							print $errorMessage['streetNumberError'];
						}

						if(FormsController::$AddressForm[$index]['name'] == 'zip' && !empty($errorMessage['zipError']))
						{
							print $errorMessage['zipError'];
						}
						print "<br>";
					}
					else if(FormsController::$AddressForm[$index]['element'] == 'select') //IF THE ELEMENT IS A SELECT
					{	

						print "<label>Address Type </label><br><select name='" . FormsController::$AddressForm[$index]['name'] . "'>"; 
							for($i = 0; $i < count(FormsController::$AddressForm[$index]['options']); $i++)
							{
								$selected='';
								if(FormsController::$AddressForm[$index]['options'][$i] == $name[$index])
								{
									$selected='selected = "selected"';
								}
								print "<h3>THE SELECTED OPTION IS </h3>". $name[$index];
 								print "<option ".$selected.">" .FormsController::$AddressForm[$index]['options'][$i] ."</option>"; 
							}	

							print "</select><br><br>";		
					}
				}?>


	<a href="?controller=suppliers&action=managesuppliers"><input type = "button" value="Cancel" class = "button redButton"></a>

		
	<input type = "submit" value="Add" class = "button blueButton">
</form>



</div>
