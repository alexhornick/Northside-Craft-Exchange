
<div class='content'>
<a href='?controller=inventory&action=manageinventory'><input type='button' class = 'blueButton' value='Back'/></a>


<h3>Add Material</h3>
<form action = "?controller=inventory&action=insertMaterial" method = "post">
	<label>Material Name <input type="text" name="materialName"></label><br>
	
	<label>Select Supplier <select name = "supplier">
		<?php foreach($suppliers as $supplier) { ?>
			<option value="<?php echo $supplier['supplier_id'];?>"><?php echo $supplier['company_name']; ?></option>
		<?php } ?>
	</select></label><br>
	<label>Unit Price <input type="text" name="unitPrice"></label>
		<?php if(!empty($errorMessage['unitPriceError'])) echo $errorMessage['unitPriceError'];?>
	<br>
	
	<h3>Item Information</h3>
	<label>Price <input type="text" name="currentPrice"></label>
		<?php if(!empty($errorMessage['currentPriceError'])) echo $errorMessage['currentPriceError'];?>
	<br>
	<label>Minimum Price <input type="text" name="minPrice"></label>
	<?php if(!empty($errorMessage['minPriceError'])) echo $errorMessage['minPriceError'];?>
	<br>
	<label>Material's Quantity on Hand <input type="text" name="qoh"></label>
		<?php if(!empty($errorMessage['qohError'])) echo $errorMessage['qohError'];?>
	<br>

	<a href="?controller=inventory&action=manageinventory"><input type = "button" value="Cancel" class = "button redButton"></a>

		
	<input type = "submit" value="Add" class = "button blueButton">
</form>

</div>
		