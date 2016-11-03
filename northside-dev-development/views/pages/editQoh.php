<div class='content'>
<a href='?controller=inventory&action=recordinventory'><input type='button' class = 'blueButton' value='Back'/></a>

<h3>Editing Item <?php echo $itemID . ': '  . $item[0]['name']?> </h3>

<form action = "?controller=inventory&action=updateQoh" method = "post">
	<label>Quantity on Hand <input type="text" name="qoh" value='<?php echo $item[0]['qoh'];?>'></label><?php if(!empty($errorMessage['qohError'])) echo $errorMessage['qohError'];?>
	<?php if(!empty($errorMessage['qohError'])) echo $errorMessage['qohError']; ?>
	<br>
	<label>Calculated Quantity on Hand: <?php echo $item[0]['calculated_qoh'];?></label>
	<input type='hidden' name='item_id' value='<?php echo $itemID;?>'><br>

	<a href="?controller=inventory&action=recordinventory"><input type = "button" value="Cancel" class = "button redButton"></a>

		
	<input type = "submit" value="Update" class = "button blueButton">
</form>
</div>