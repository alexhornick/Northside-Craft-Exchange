
<div class='content'>
<a href='?controller=suppliers&action=managediscounts'><input type='button' class = 'blueButton' value='Back'/></a>
<h3>Editing Discount for Supplier ID <?php echo $supplierID;?> and Material ID <?php echo $materialID; ?> </h3>

<form action = "?controller=suppliers&action=updateDiscount" method = "post">
	<label>Minimum Quantity Required <input type="text" name="minQty" value='<?php echo $discount[0]['min_qty'];?>'></label><?php if(!empty($errorMessage['min_qtyError'])) echo $errorMessage['min_qtyError'];?><br>
	<label>Discount Percent <input type="text" name="discountPct" value='<?php echo $discount[0]['discount_percent'];?>'></label><?php if(!empty($errorMessage['discountPctError'])) echo $errorMessage['discountPctError'];?><br>
	<input type='hidden' name='supplier_id' value='<?php echo $supplierID;?>'>
	<input type='hidden' name='material_id' value='<?php echo $materialID;?>'>

	<a href="?controller=suppliers&action=managediscounts"><input type = "button" value="Cancel" class = "button redButton"></a>

		
	<input type = "submit" value="Update" class = "button blueButton">
</form>

</div>

