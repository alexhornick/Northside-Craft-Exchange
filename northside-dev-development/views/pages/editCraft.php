
<div class='content'>
<a href='?controller=inventory&action=manageinventory'><input type='button' class = 'blueButton' value='Back'/></a>

<!--This page allows the user to edit a craft for the Edit button that they clicked for a particular craft-->
<h3>Editing Craft ID <?php echo $craftID;?> </h3>
<form action = "?controller=inventory&action=updateCraft" method = "post">
	<label>Craft Name <input type="text" name="craftName" value='<?php echo $craft[0]['name'];?>'></label><br>
	

		<h3>Item Information</h3>
			<label>Price <input type="text" name="currentPrice" value='<?php echo number_format($craft[0]['current_price'],2); ?>'></label><br>
			<label>Minimum Price <input type="text" name="minPrice" value='<?php echo number_format($craft[0]['min_price'],2); ?>'></label><br>
			<input type = 'hidden' value = '<?php echo $craftID;?>' name = 'craft_id'>

		<a href="?controller=inventory&action=manageinventory"><input type = "button" value="Cancel" class = "button redButton"></a>

		
	<input type = "submit" value="Update" class = "button blueButton">
</form>		
	
	
	<h3>Materials Used</h3>
	<?php if(!empty($errorMessage['materialError'])) echo $errorMessage['materialError']; ?>
	<table>
	<th>Delete</th><th>Material Name</th><th>Unit Price</th>
	<?php foreach($materials as $material)
	{
		echo "<tr><td>
		<form action='?controller=inventory&action=deleteMaterial' method='post'><input class='button redButton' type='submit' value='Delete'>
			<input type='hidden' name='material_id' value='".$material['material_id']."'>
			<input type='hidden' name='craft_id' value='".$craftID."'>
		</form>	

		<td>".$material['name']."</td><td>".$material['unit_price']."</td></tr>";
	}?>
	</table> 


	<h3>Add materials to craft</h3>
	
	
		<form action='?controller=inventory&action=addCraftMaterial' method='post'>
			<label>Select a material </label><select name='material_id'>
				<?php foreach($craftMaterials as $material){?>
					<option value='<?php echo $material['material_id'];?>'>
						<?php echo $material['name'];?>
					</option>
				<?php } ?>

			</select><br>
			<input class='button' type='submit' value='Add to Craft'>
			<input type='hidden' name='craft_id' value='<?php echo$craftID;?>'>
		</form>	

</div>
	
