
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Materials</a></li>
    <li><a href="#tabs-2">Crafts</a></li>
	<li><a href="#tabs-3">Returns</a></li>
  </ul>
  
  <div id="tabs-1">
		<h3>Materials Inventory</h3>
			<form action="?controller=reports&action=generateInventoryReport" method='post'>
			<select name = 'reportType'>
				<option value='genMaterials'>General Materials Report</option>
				<option value='lowStockMaterials' <?php if ($report == 'lowStockMaterials') echo 'selected="selected"'; ?> >Low Stock Materials Report</option>
				<option value='outStockMaterials' <?php if ($report == 'outStockMaterials') echo 'selected="selected"'; ?>>Out of Stock Materials Report</option>

			</select><br><br>
			<input type ='submit' value='Generate' class='blueButton'>
			</form><br><br>


			<?php if(!empty($materials))
			{ ?>

				<table>
					<th>Material ID</th><th>Material Name</th><th>Supplier Name</th><th>Quantity</th><th>Unit Price</th>
						<?php foreach($materials AS $material)
						{  ?>
						<tr>
							
						<td><?php echo $material['material_id']?></td>
						<td><?php echo $material['name']?></td>
						<td><?php echo $material['company_name']?></td>
						<td><?php echo $material['calculated_qoh']?></td>

						<td><?php echo number_format($material['unit_price'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php }
			else { ?>
				<p>No results found</p>
			<?php } ?>				

  </div>
  <div id="tabs-2">
  	<!--CRAFTS INVENTORY-->
	<h3>Crafts Inventory</h3>
		<form action="?controller=reports&action=generateInventoryReport" method='post'>
			<select name = 'reportType'>
				<option value='genCrafts'>General Crafts Report</option>
				<option value='lowStockCrafts' <?php if ($report == 'lowStockCrafts') echo 'selected="selected"'; ?> >Low Stock Crafts Report</option>
				<option value='outStockCrafts' <?php if ($report == 'outStockCrafts') echo 'selected="selected"'; ?>>Out of Stock Crafts Report</option>

			</select><br><br>
			<input type ='submit' value='Generate' class='blueButton'>
			</form><br><br>


			<?php if(!empty($crafts))
			{ ?>
				<table>
					<th>Craft ID</th><th>Name</th><th>Current Price</th><th>Quantity</th>
						<?php foreach($crafts AS $craft)
						{  ?>
						<tr>
							
							<td><?php echo $craft['craft_id']?></td>
							<td><?php echo $craft['name']?></td>
							<td><?php echo number_format($craft['current_price'],2)?></td>
							<td><?php echo $craft['calculated_qoh']?></td>


						</tr>
			
					<?php } ?>
				</table>
			<?php }

			else { ?>
			<p>No results found</p>

			<?php } ?>




				
  </div>
  
  
  <div id="tabs-3">
	<h3>Returns Inventory</h3>
			<form action="?controller=reports&action=generateInventoryReport" method='post'>
			<select name = 'reportType'>
				<option value='genReturns'>General Returns Report</option>
				<option value='lowStockReturns' <?php if ($report == 'lowStockReturns') echo 'selected="selected"'; ?> >Low Stock Returns Report</option>
				<option value='outStockReturns' <?php if ($report == 'outStockReturns') echo 'selected="selected"'; ?>>Out of Stock Returns Report</option>

			</select><br><br>
			<input type ='submit' value='Generate' class='blueButton'>
			</form><br><br>


			
					<?php 
					if(!empty($returns))
					{ ?>
						<table>
							<th>Item ID</th><th>Item Name</th><th>Order ID</th><th>Quantity</th><th>Current Price</th>
						<?php foreach($returns AS $return)
							{  ?>
							<tr>
								
							<td><?php echo $return['item_id']?></td>
							<td><?php echo $return['name']?></td>
							<td><?php echo $return['order_id']?></td>
							<td><?php echo $return['calculated_qoh']?></td>
							<td><?php echo number_format($return['current_price'],2)?></td>
							</tr>
						
							<?php } 
					?> </table> <?php
					}
					else
					{?>
					<p>No results found</p>
					<?php } ?>
			
				

  </div>
  
</div>



