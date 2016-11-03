
<div class='content'>
<a href='?controller=inventory&action=ordermaterials'><input type='button' class = 'blueButton' value='Back'/></a>




<!--Once a supplier is selected, this screen will show up for them to select the materials-->
<h3>Order Materials</h3>

<h4>Select Materials</h4><br>
<form action = "?controller=inventory&action=submitOrder" method="post">
	<label class='selectItems'>Select Materials<br>
	<select name = "material[]">
		<?php $index = 0; foreach($materials as $material) { ?>
			<option value="<?php echo $material['material_id'];?>"><?php echo $material['material_id']; ?></option>
		<?php } ?>
	</select>
	
	<label>Quantity</label>
		<input required type='text' name='quantity[]' value='<?php if(!empty($supplyOrder['quantity']))   $supplyOrder['quantity'][0];?>'> 
		<?php if(!empty($errorMessage['qtyError'])) echo $errorMessage['qtyError'];?>
		
		<br> 
	</label>
		<?php if(count($materials) >1){ ?>

			 <input name="otherAdd" type='button' class="blueButton button" id='addNew' value='Add New +'/>

		<?php } ?>
	<br>
	<?php if(!empty($errorMessage['duplicates'])) echo $errorMessage['duplicates'];?><br>
	<input type = "hidden" name = "supplierID" value="<?php echo $supplier_id; ?>">
	<a href="?controller=menus&action=mainMenu&subMenu=Inventory"><input type = "button" value="Cancel" class = "button redButton"></a><input type = "submit" value="Confirm" class = "button blueButton">
</form>

<?php if(!empty($discounts)){ ?>
	<h4>Available Discounts</h4>
		<?php foreach($discounts as $discount)
		{ ?>
			<p>Material <?php echo $discount['material_id'];?> needs a minimum quantity of <?php echo $discount['min_qty'];?> to get a discount percent of <?php echo $discount['discount_percent'];?></p>
		<?php } }
else{
	?>
	<p>No discounts are available for this material.</p>
	<?php } ?>

</div>

