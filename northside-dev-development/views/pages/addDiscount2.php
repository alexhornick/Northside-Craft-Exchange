
<div class='content'>
<a href='?controller=inventory&action=managediscounts'><input type='button' class = 'blueButton' value='Back'/></a>

<h4>Select Material</h4>
<form action = "?controller=suppliers&action=insertDiscount" method="post">
	<label>Select Material
	<select name = "material">
		<?php foreach($materials as $material) { 
			$selected = '';
			if($materialID == $material['material_id'])
			{
				$selected='selected = "selected"';
			}
			?>
			<option value="<?php echo $material['material_id'] . ' '. $selected?>"><?php echo $material['material_id']; ?></option>
		<?php } ?>
	</select>
	<br>
	<label>Minimum Quantity Required
		<input required type='text' name='min_qty' value = '<?php if(!empty($minQty))echo $minQty?>'>
	</label>
	<?php if(!empty($errorMessage['min_qtyError'])) echo $errorMessage['min_qtyError'] ?>
	<br> 
	<label>Discount Percent
		<input required type='text' name='discountPct' value='<?php if(!empty($discountPct))echo $discountPct?>'>
		<?php if(!empty($errorMessage['discountPctError'])) echo $errorMessage['discountPctError'] ?>
		<br> 
	</label>		

		
	<br><br>
	<input type = "hidden" name = "supplier_id" value="<?php echo $supplier_id; ?>">
		<a href="?controller=suppliers&action=managediscounts"><input type = "button" value="Cancel" class = "button redButton"></a>
		
	<input type = "submit" value="Submit" class = "button blueButton">
</form>

</div>
