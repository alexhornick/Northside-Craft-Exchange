<div class='content'>
<h3>Order Materials</h3>

<h4>Select a Supplier</h4>
<form action = "?controller=inventory&action=getMaterials" method="post">
	<select name = "supplierID">
		<?php foreach($suppliers as $supplier) { ?>
			<option value="<?php echo $supplier['supplier_id'];?>"><?php echo $supplier['company_name']; ?></option>
		<?php } ?>
	</select><br><br>

	<a href="?controller=menus&action=mainMenu&subMenu=Order"><input type = "button" value="Cancel" class = "button redButton"></a><input type = "submit" value="Next" class = "button blueButton"><br>

</form>
</div>

				
		