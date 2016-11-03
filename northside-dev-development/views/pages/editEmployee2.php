
<div class='content'>
<a href='?controller=employees&action=editemployee'><input type='button' class = 'blueButton back' value='Back'/></a>

<h3>Editing Employee ID <?php echo $employeeID;?> </h3>


<form action = "?controller=employees&action=updateEmployee" method = "post">
	<h4>Access Level</h4>
	<label>Administrator<input type="radio" value='1' name="accessLevel" <?php if($employee[0]['accessLevel'] == 1) echo "checked";?>></label>
	<label>Sales Employee<input type="radio" value='3' name="accessLevel" <?php if($employee[0]['accessLevel'] == 3) echo "checked";?>></label><br>
	<label>First Name <input type="text" value='<?php echo $employee[0]['first_name'];?>' name="firstName"></label><br>
	<label>Last Name <input type="text" value='<?php echo $employee[0]['last_name'];?>' name="lastName"></label><br>
	<label>Hire Date <input type="text" value='<?php echo $employee[0]['hire_date'];?>' name="hireDate"></label><br>
	<label>Phone Number <input type="text" value='<?php echo $employee[0]['phone_number'];?>' name="phoneNumber"></label><br>
	<label>New Password <input type="text" value='' name="password"></label><br>
	<input type = 'hidden' value='<?php echo $employeeID;?>' name='employee_id'>
	<input type = 'hidden' value='<?php echo $employee[0]['address_id'];?>' name='address_id'>

	
	
	<?php EmployeesController::drawAddressForm($employeeID); ?> 
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


	

		
	
	<a href="?controller=employees&action=editemployee"><input type = "button" value="Cancel" class = "button redButton"></a>
	<input type = "submit" value="Update" class = "button blueButton"><br>
</form>
</div>
