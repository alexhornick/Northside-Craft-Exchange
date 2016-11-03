
<div class="addEmployee">

<br>
<h3>Add Employee</h3>
<form action='?controller=employees&action=insertEmployee' method='post'>
<h4>Employee Information</h4>
<input required type="radio" name="accessLevel" value="1" <?php if(!empty($accessLevel)) if($accessLevel==1)echo 'checked';?>>  Administrator <br>
<input required type="radio" name="accessLevel" value="3" <?php if(!empty($accessLevel)) if($accessLevel==3)echo 'checked';?> > Sales Employee <br><br>

<script>
	$(function() {
			$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
	});
</script>
<label>First Name <input required type = 'text'name = 'firstName' required value= '<?php if(!empty($firstName)) echo $firstName;?>'></label><br>
<label>Last Name <input required type = 'text'name = 'lastName' required value= '<?php if(!empty($lastName)) echo $lastName;?>'></label><br>
<label>Hire Date <input id = 'datepicker' type = 'text' name = 'hireDate' required value= '<?php if(!empty($hireDate)) echo $hireDate;?>'></label><br>
<label>Phone Number <input required type = 'text'name = 'phone' required value= '<?php if(!empty($phoneNumber)) echo $phoneNumber;?>'></label> <?php if(!empty($errorMessage['phoneError'])) echo $errorMessage['phoneError'];?><br>
<!-- <label>Employee ID <input required type = 'text'name = 'employeeID' required value= '<?php if(!empty($employeeID)) echo $employeeID;?>'></label> <?php if(!empty($errorMessage['employeeIDError'])) echo $errorMessage['employeeIDError'];?><br> -->
<label>Password <input required type = 'text'name = 'password' required value = '<?php if(!empty($password)) echo $password;?>'></label><br>


<h4>Address</h4>
<label>Street Number <input required type = 'text'name = 'streetNumber'value = '<?php if(!empty($streetNumber)) echo $streetNumber;?>'></label> <?php if(!empty($errorMessage['streetNumberError'])) echo $errorMessage['streetNumberError'];?><br>
<label>Street Name <input required type = 'text' name = 'streetName'value = '<?php if(!empty($streetName)) echo $streetName;?>'></label><br>
<label>Street Type <input required type = 'text' name = 'streetType'value = '<?php if(!empty($streetType)) echo $streetType;?>'></label><br>
<label>Address Type </label>
<select name='addressType'>
	<option>House</option>
	<option>Apartment</option>
</select><br>
<label>City <input required type = 'text'name = 'city' value = '<?php if(!empty($city)) echo $city;?>'></label><br>
<label>State <input required type = 'text'name = 'state' value = '<?php if(!empty($state)) echo $state;?>'></label><br>
<label>Zip <input required type = 'text'name = 'zip'value = '<?php if(!empty($zip)) echo $zip;?>'></label> <?php if(!empty($errorMessage['zipError'])) echo $errorMessage['zipError'];?><br>
<label>Country <input required type = 'text'name = 'country' value = '<?php if(!empty($country)) echo $country;?>'></label><br>
<a href="?controller=menus&action=mainMenu"><input type='button' class = 'button redButton' value='Cancel'/></a> <input class='button blueButton' type='submit' value='Add'/></form><br><br>
</div>
				
		