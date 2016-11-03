
<div class='content'>
<a href='?controller=suppliers&action=managediscounts'><input type='button' class = 'blueButton' value='Back'/></a>

<h3>Add Discount</h3>

<h4>Select a Supplier</h4>
<form action = "?controller=suppliers&action=getMaterials" method="post">
	<select name = "supplier_id">
		<?php foreach($suppliers as $supplier) { ?>
			<option value="<?php echo $supplier['supplier_id'];?>"><?php echo $supplier['company_name']; ?></option>
		<?php } ?>
	</select><br><br>
	<a href="?controller=suppliers&action=managediscounts"><input type = "button" value="Cancel" class = "button redButton"></a><input type = "submit" value="Next" class = "button blueButton">
</form>

</div>

				
		