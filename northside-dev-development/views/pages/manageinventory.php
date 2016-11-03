
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Materials</a></li>
    <li><a href="#tabs-2">Crafts</a></li>
	<li><a href="#tabs-3">Returns</a></li>
  </ul>
  
  <div id="tabs-1">
		<h3>Materials Inventory</h3>
			<form action = "?controller=inventory&action=addMaterial" method="post">
				<input style="width:160px;"class="button blueButton" type="submit" value="Add Material">
			</form>

			<table>
				<th>Edit</th><th>Material ID</th><th>Unit Price</th>
					<?php foreach($materials AS $material)
					{  ?>
					<tr>
						<td>
						<form action="?controller=inventory&action=editMaterial" method="post"><input type="submit" value="Edit" class="button">
							<input name = "material_id" type="hidden" value='<?php echo $material['material_id'] ?>'>
						</form>
					</td>
					<td><?php echo $material['material_id']?></td>
					<td><?php echo $material['unit_price']?></td>
				</tr>
				
			<?php } ?>
			</table>
				

  </div>
  <div id="tabs-2">
  	<!--CRAFTS INVENTORY-->
	<h3>Crafts Inventory</h3>
		<form action = "?controller=inventory&action=addCraft" method="post">
			<input style="width:160px;"class="button blueButton" type="submit" value="Add Craft">
		</form>

		<table>
			<th>Edit</th><th>Craft ID</th><th>Quantity on Hand</th>
			<?php foreach($crafts AS $craft)
			{  ?>
				<tr>
					<td>
					<form action="?controller=inventory&action=editCraft" method="post"><input type="submit" value="Edit" class="button">
						<input type="hidden" name= "craft_id" value='<?php echo $craft['craft_id'] ?>'>
					</form>
					</td>
					<td><?php echo $craft['craft_id']?></td>
					<td><?php echo $craft['calculated_qoh']?></td>
				</tr>
	
			<?php } ?>
		</table>




				
  </div>
  
  
  <div id="tabs-3">
	<h3>Returns Inventory</h3>
		

		<table>
			<th>Edit</th><th>Return ID</th><th>Item ID</th><th>Current Price</th>
			<?php foreach($returns AS $return)
			{  ?>
				<tr>
					<td>
					<form action="?controller=inventory&action=editReturn" method="post"><input type="submit" value="Edit" class="button">
						<input type="hidden" name= "return_id" value='<?php echo $return['return_id'] ?>'>
					</form>
					</td>
					<td><?php echo $return['return_id']?></td>
					<td><?php echo $return['item_id']?></td>

					<td><?php echo number_format($return['current_price'],2)?></td>
				</tr>
	
			<?php } ?>
		</table>



				

  </div>
  
</div>



