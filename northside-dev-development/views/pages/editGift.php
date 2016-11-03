<div class='content'>
<a href='?controller=order&action=manageorders'><input type='button' class = 'blueButton' value='Back'/></a>
<h3>Manage Orders - Edit Gift Order</h3>

<h4>Editing Gift ID <?php echo $gift_id; ?></h4>
<form action="?controller=order&action=updateGift" method = "post">
	<!--<label> Customer Last Name <input type = "text" name="customerLName"></label>-->
	<label> Recipient First Name <input value="<?php echo $gifts[0]['rec_first_name'];?>" type = "text" name="recFName"></label><br>
	<label> Recipient Last Name <input value="<?php echo $gifts[0]['rec_last_name'];?>" type = "text" name="recLName"></label>
	<br>
	<h4>Recipient Address</h4>
	<label> Street Number <input type = "text" name="streetNumber" value="<?php echo $gifts[0]['street_number']?>"></label>
		<?php if(!empty($errorMessage['streetNumberError'])) echo $errorMessage['streetNumberError'];?>
	<br>
	<label> Street Name <input type = "text" name="streetName" value="<?php echo $gifts[0]['street_name']?>"></label><br>
	<label> Street Type <input type = "text" name="streetType" value="<?php echo $gifts[0]['street_type']?>"></label><br>
	<label> Address Type <select name='addressType'><option>House</option><option>Apartment</option></select></label><br>
	<label> City <input type = "text" name="city" value="<?php echo $gifts[0]['major_municipality']?>"></label><br>
	<label> State <input type = "text" name="state" value="<?php echo $gifts[0]['governing_district']?>"></label><br>
	<label> Zip <input type = "text" name="zip" value="<?php echo $gifts[0]['zip']?>"></label>
		<?php if(!empty($errorMessage['zipError'])) echo $errorMessage['zipError'];?>
	<br>
	<label> Country <input type = "text" name="country" value="<?php echo $gifts[0]['iso_country_code']?>"></label><br><br>

	<label> Customer First Name <input value="<?php echo $gifts[0]['first_name'];?>" type = "text" name="firstName"></label><br>
	<label> Customer Last Name <input value="<?php echo $gifts[0]['last_name'];?>" type = "text" name="lastName"></label>
	<br>
	<input type='hidden' name='gift_id' value='<?php echo $gift_id;?>'>
	<input type='hidden' name='address_id' value='<?php echo $gifts[0]['address_id'];?>'>
	<input type='hidden' name='customer_id' value='<?php echo $gifts[0]['customer_id'];?>'>

	
	<input type="submit" class="button blueButton" value="Update">
	
</form>
</div>