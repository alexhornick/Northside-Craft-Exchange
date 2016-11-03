<!--The enter Order screen was consolidated into one screen with 3 tabs for ease of use.-->
 <?php

?>
				<script>
					$().ready(function() {
						$("#giftForm").validate({
							rules: {
								number: {
									digits:true,
									decimal:true
								},
								zip: {
									minlength:5,
									maxlength:5,
									digits:true
								},
								recZip: {
									minlength:5,
									maxlength:5,
									digits:true
								},
								phoneNumber: {
									phoneUS:true
								},
								'quantity[]': {
									minlength:1,
									maxlength:5,
									digits:true
								}

							}
						}),
						$("#customForm").validate({
							rules: {
								number: {
									digits:true,
									decimal:true
								},
								zip: {
									minlength:5,
									maxlength:5,
									digits:true
								},
								recZip: {
									minlength:5,
									maxlength:5,
									digits:true
								},
								phone: {
									phoneUS:true
								},
								'quantity': {
									minlength:1,
									maxlength:5,
									digits:true
								}

							}
						}),
						$("#saleForm").validate({
							rules: {
								'quantity[]': {
									minlength:1,
									maxlength:5,
									digits:true
								}

							}
						})
					});
				</script>
  <div id="tabs">
  <ul>
    <li><a href="#tabs-1">Sale</a></li>
    <li><a href="#tabs-2">Custom Order</a></li>
	<li><a href="#tabs-3">Gift Order</a></li>
  </ul>
  
  <div id="tabs-1">
				<?php $_SESSION['orderType'] = 'sale'; $i=1; ?>
				<form id='saleForm'class="enterOrder" action = '?controller=order&action=submitForm' method='post'>
				<h3>Sale Order</h3><br>
				<input type='hidden' name='orderType' value='sale'>
				<label tabindex='1'; 	class='selectItems'>Select Item&nbsp;
				<select name = 'item[]'>
					<?php foreach($items as $item) { ?>
					<option value='<?php echo $item['item_id'];?>'><?php echo $item['name']; ?></option>
					<?php } ?>
				</select>
				
				<label for='quantity[]'>
				&emsp;&emsp;Quantity&nbsp; <input type='text' name='quantity[]' value= 1 ><br> 
				</label></label><br><br>
				<input style='float:left; margin-left: 75px;' id='quantity' name="add" type='button'  class='button blueButton' value='Add Item +'/>

				<input style='float:left;' id='quantity' name="delete" type='button'  class='button redButton' value='Delete Item -'/>


				<br><br><br>
				<a href="?controller=menus&action=mainMenu&subMenu=Order"><input style="margin-right:60px;" class = 'button blueButton' type='submit' value='Next' /><input type='button' class = "redButton" accessKey='q' value='Cancel'/></a>  
				</form>
				

  </div>
  <div id="tabs-2">
				
				<?php $_SESSION['orderType'] = 'custom'; ?>

				<form id='customForm' class="customOrder" action = '?controller=order&action=submitForm' method='post'>
				<h3>Custom Order</h3><br>
				<h4>Select Materials to be Used:</h4>
				<input type='hidden' name='orderType' value='custom'>
				<label class='selectItems'><br>Material Name&nbsp;
				<select name = 'material[]'>
					<?php foreach($materials as $material) { ?>
						<option value="<?php echo $material['material_id'];?>"><?php echo $material['name']; ?></option>
					<?php } ?>
				</select>

				<label for='quantity[]'>&emsp;&emsp;Quantity&nbsp;</label><input id = 'quantity'  type='text' name='quantity' value=1 required> 
				</label><br><br><br>
				<input style="float:left;" name="add" type='button' class="button blueButton" id='addNew' value='Add New +'/>
				
				<input style='float:left;' id='quantity' name="delete" type='button'  class='button redButton' value='Delete -'/><br><br>
				<label>Name of Custom Craft&nbsp;</label><input type="text" name="itemName"><label>&emsp;&emsp;Quantity&nbsp;</label><input type='text' name='itemQuantity' value=1><br><br>
				<label>Custom Craft Comments </label><br><br><textarea name='comment' rows="5" columns = "10" required></textarea>
				<br>
				<label>Estimated Minimum Price needed for Profit:&nbsp;<input type='text' name='estimatedPrice'></label><br><br>
				<h3>Customer Information</h3><br>
				<label>First Name <input style="margin-left:100px;" type='text' name='firstName' required></label><br>
				<label>Last Name <input style="margin-left:100px;" type='text' name='lastName' required></label><br>
				<label>Address Number <input style="margin-left:63px;" type='text' name='streetNumber' required></label><br>
				<label>Address Street <input style="margin-left:77px;" type='text' name='streetName' required></label><br>
				<label>Address Road Type <input style="margin-left:46px;" type='text' name="streetType" required></label><br>



				<label>Address Type </label>
				<select class="address" style="margin-left:85px;" name="addressType">
					<option value='House'>House</option>
					<option value='Apartment'>Apartment</option>
				</select><br>

				<label>City <input style="margin-left:145px;" id='city' type='text' name='city' required></label><br>
				<label>State <input style="margin-left:137px;"id='state' type='text' name='state' required></label><br>
				<label>Zip <input style="margin-left:150px;" id='zip'type='text' name='zip' required></label><br>
				<br><br><br>


				
				<a href="?controller=menus&action=mainMenu&subMenu=Order"><input style="margin-right:35px;" class="button blueButton" type='submit' value='Next'/><input type='button' class = "button redButton" accessKey='q' value='Cancel'/></a>

				</form>
				
  </div>
  
  
  <div id="tabs-3">
	
				
				<?php $_SESSION['orderType'] = 'gift'; ?>

				<form class="giftOrder" action = '?controller=order&action=submitForm' method='post' id='giftForm'autocomplete='on'>
				<h3>Gift Order</h3>
				<input type='hidden' name='orderType' value='gift'>
				<label class='selectItems'>Select Items&nbsp;
				<select name = 'item[]'>
					<?php foreach($items as $item) { ?>
					<option value='<?php echo $item['item_id'];?>'><?php echo $item['name']; ?></option>
					<?php } ?>
				</select>
				


				<label for='quantity[]'>&emsp;&emsp;Quantity&nbsp;</label><input id='quantity'type='text' name='quantity[]' value=1><br> 
				</label><br><br>
				<input style="float:left;" name= "add" type='button' class="button blueButton" accessKey='a' value='Add Item +'/>
				<input style='float:left;' id='quantity' name="delete" type='button'  class='button redButton' value='Delete Item -'/>
				<br><br>
				
				<h3>Customer Information</h3>
				

				<label>First Name <input style="margin-left:100px;" type='text' name='firstName' required></label><br>
				<label>Last Name <input style="margin-left:100px;"type='text' name='lastName' required></label><br>
				<label>Phone Number<input style="margin-left:80px;" type='text' name='phone' required></label><br>
				<label>Email<input style="margin-left:138px;" type='email' name='email'></label><br>
				<label>Address Number <input style="margin-left:63px;" type='text' name='streetNumber' required></label><br>
				<label>Address Street <input style="margin-left:77px;" type='text' name='streetName' required></label><br>
				<label>Address Road Type <input style="margin-left:46px;" type='text' name="streetType" required></label><br>

				<label>Address Type </label>
				<select class="address" style="margin-left:85px;" name='addressType'>
					<option value="House">House</option>
					<option value="Apartment">Apartment</option>
				</select><br>

				<label>City <input style="margin-left:145px;" type='text' name='city' required></label><br>
				<label>State <input style="margin-left:137px;" type='text' name='state' required></label><br>
				<label for='zip'>Zip <input style="margin-left:150px;" type='text' name='zip' required></label><br> 
				
				<h3>Recipient Information</h3>
				
				<label>First Name <input style="margin-left:100px;" type='text' name='recFirstName' required></label><br>
				<label>Last Name <input style="margin-left:100px;" type='text' name='recLastName' required></label><br>
				<label>Address Number <input style="margin-left:63px;" type='text' name='recStreetNumber' required></label><br>
				<label>Address Street <input style="margin-left:77px;" type='text' name='recStreetName' required></label><br>
				<label>Address Road Type <input style="margin-left:46px;" type='text' name="recStreetType" required></label><br>



				<label>Address Type </label>
				<select class='address' style="margin-left:85px;" name='recAddressType'>
					<option value="House">House</option>
					<option value="Apartment">Apartment</option>
				</select><br>
				<label>City <input type='text' style ="margin-left:145px;" name='recCity' required></label><br>
				<label>State <input type='text' style ="margin-left:135px;" name='recState' required></label><br>
				<label for="recZip">Zip <input id='recZip' style="margin-left:150px;" type='text' name='recZip' required></label><br>

				<br>
				<input class="button blueButton" type='submit' value='Next'/>
				<a href="?controller=menus&action=mainMenu&subMenu=Order"><input type='button' class = "button redButton" accessKey='q' value='Cancel'/></a>  
				
				
				
				</form>
				

  </div>
  
</div>

