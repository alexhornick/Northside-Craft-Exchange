
<div class='content'>
<a href='?controller=inventory&action=manageinventory'><input type='button' class = 'blueButton' value='Back'/></a>
<!--This is the page for the Add Craft form, which is located on the Manage Inventory page-->
<h3>Add Craft</h3>
<form action = "?controller=inventory&action=insertCraft" method = "post">
	<label>Craft Name <input required type="text" name="craftName" value='<?php if(!empty($itemData['name']))echo $itemData['name'];?>'></label><br>
	
	<label class='selectItems'>Add Craft Materials

	<select name = "material[]">
		<?php foreach($materials as $material) { ?>
			<option value="<?php echo $material['material_id'];?>"><?php echo $material['name']; ?></option>
		<?php } ?>
	</select>
	
 <br> 
<?php if(!empty($errorMessage['duplicates'])) echo $errorMessage['duplicates']; ?>
	<input name = "otherAdd" type='button' class="button" id='addNew' value='Add New +'/><br><!--The name attribute on this input is important for the addItem.js -->
	
	<h3>Item Information</h3>
	<label>Price <input required type="text" name="currentPrice" value='<?php if(!empty($itemData['current_price']))echo $itemData['current_price'];?>'></label>
	<?php if(!empty($errorMessage['currentPriceError'])) echo $errorMessage['currentPriceError'];?>
	<br>
	<label>Minimum Price <input type="text" name="minPrice"value='<?php if(!empty($itemData['min_price']))echo $itemData['min_price'];?>'></label>
	<?php if(!empty($errorMessage['minPriceError'])) echo $errorMessage['minPriceError'];?><br>
	<label>Quantity on Hand <input required type="text" name="qoh" value='<?php if(!empty($itemData['qoh']))echo $itemData['qoh'];?>'></label>
	<?php if(!empty($errorMessage['qohError'])) echo $errorMessage['qohError'];?>
	<br>

	<a href="?controller=inventory&action=manageinventory"><input type = "button" value="Cancel" class = "button redButton"></a>

		
	<input  type = "submit" value="Add" class = "button blueButton">
</form>		
</div>
		