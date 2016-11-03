<?php 
	if(isset($_POST['supplier']))
	{
		$supplierID = $_POST['supplier'];
	}
?>

<div class='content' id="tabs">

  <ul>
    <li><a href="#tabs-1">Record Inventory Shipments</a></li>
    <li><a href="#tabs-2">Update Inventory</a></li>
  </ul>
  <div id="tabs-1">
  	<h3>Select the shipment's supplier</h3>

  	<form action="?controller=inventory&action=recordinventory" method="post">
  	<label>Supplier Name </label><select name='supplier'>
  		<?php 
  			foreach($suppliers as $supplier)
  			{
  				$selected = '';
  				if($supplierID == $supplier['supplier_id'])
  				{
  					$selected='selected = "selected"';
  				}

  			  	?>

  				 <option <?php echo $selected ?> value="<?php echo $supplier['supplier_id']; ?>"><?php echo $supplier['company_name']; ?></option>
  			<?php } ?>
  		</select>

  		<input type="submit" value="Next" class="blueButton">

  	</form>

  	<?php if(!empty($supplierID))
  	{  		
  			if(!empty($materials)) {?>
  				<form action='?controller=inventory&action=updateItemInventory' method='post'>
  				<label>Material ID/Name </label><select name='material'>
  				<?php foreach($materials AS $material) { 
  					if($material['supplier_id'] == $supplierID)
  					{ 
  						$option = true; ?>
  						<option value='<?php echo $material['material_id']?>'><?php echo $material['material_id'] . ': ' . $material['name']; ?></option>
  					<?php }?>
				<?php	}?>	

  			<?php	}?>
  	

  		 
  		</select><br>
  		<label>Shipment Quantity </label><input type = 'text' required name='quantity'>
  		<input type="hidden" name = 'supplier_id' value="<?php echo $supplierID?>"><br>
  		<input type="submit" class="button blueButton" value="Submit">
  		</form>

  	<?php } ?>

  </div>
  <div id="tabs-2">
   <table>
<th>Edit Item</th><th>Item Name</th><th>Quantity on Hand</th><th>Calculated Quantity On Hand</th>

<?php foreach($items as $item)
{ ?>
	<tr>
		<td>
      <form action='?controller=inventory&action=editQoh' method='post'>
        <input type='hidden' name='item_id' value='<?php echo $item['item_id'];?>'>
        <input class = 'button' type='submit' value='Edit Item <?php echo $item['item_id'] ?>'>
      </form>
    </td>
		<td><?php echo $item['name'] ?></td>
		<td><?php echo $item['qoh'] ?></td>
		<td><?php echo $item['calculated_qoh'] ?></td>
	</tr>
<?php } ?>

</table>
  </div>
  
</div>