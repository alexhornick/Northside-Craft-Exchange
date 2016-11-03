
<div class='content'>
<a href='?controller=suppliers&action=managesuppliers'><input type='button' class = 'blueButton' value='Back'/></a><h3>Editing Supplier ID <?php echo $supplierID;?> </h3>
<form action = "?controller=suppliers&action=updateSupplier" method = "post">
	<label>Company Name <input type="text" name="companyName" value='<?php echo $supplier[0]['company_name'];?>'></label><br>
	<label>Company Phone Number <input type="text" name="phone" value='<?php echo $supplier[0]['company_phone'];?>'></label><?php if(!empty($errorMessage['phoneError'])) echo $errorMessage['phoneError'];?><br>
	<label>Contact Name <input type="text" name="contactName" value='<?php echo $supplier[0]['contact_name'];?>' ></label><br>
	<label>Contact Phone Number <input type="text" name="contactPhone" value='<?php echo $supplier[0]['contact_phone'];?>'></label><?php if(!empty($errorMessage['contactPhoneError'])) echo $errorMessage['contactPhoneError'];?><br>
	<label>Contact Job Title <input type="text" name="contactJobTitle" value='<?php echo $supplier[0]['contact_job_title'];?>'></label><br>
	<label>Contact Email <input type="text" name="contactEmail" value='<?php echo $supplier[0]['email'];?>'></label><?php if(!empty($errorMessage['contactEmailError'])) echo $errorMessage['contactEmailError'];?><br>
	<input type = 'hidden' value='<?php echo $supplierID;?>' name='supplier_id'>
	<input type= 'hidden' value='<?php echo $supplier[0]['address_id'];?>' name='address_id'>
	
	<?php SuppliersController::editAddressForm($supplierID); ?>

	

	<?php if(!empty($errorMessage['streetNumberError']) || !empty($errorMessage['zipError']))
				{
					print "<h3>Address Errors</h3>";

					if(!empty($errorMessage['streetNumberError']))
					{
						print $errorMessage['streetNumberError']."<br>";
					}

					if(!empty($errorMessage['zipError']))
					{
						print $errorMessage['zipError']."<br>";
					}
				} ?>
	<br><a href="?controller=suppliers&action=managesuppliers"><input type = "button" value="Cancel" class = "button redButton"></a>
	<input type = "submit" value="Update" class = "button blueButton">
</form>


			
</div>	
