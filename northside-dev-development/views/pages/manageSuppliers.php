
<div class='content'>


<h3>Manage Suppliers</h3>
			<form action = "?controller=suppliers&action=addSupplier" method="post">
				<input style="width:160px;"class="button blueButton" type="submit" value="Add Supplier">
			</form>

			<table>
				<th>Edit</th><th>Supplier ID</th><th>Company Name</th>
					<?php foreach($suppliers AS $supplier)
					{  ?>
					<tr>
						<td>
						<form action="?controller=suppliers&action=editSupplier" method="post"><input type="submit" value="Edit" class="button">
							<input name = "supplier_id" type="hidden" value='<?php echo $supplier['supplier_id'] ?>'>
						</form>
					</td>
					<td><?php echo $supplier['supplier_id']?></td>
					<td><?php echo $supplier['company_name']?></td>
				</tr>
				
			<?php } ?>

			</table>
</div>

