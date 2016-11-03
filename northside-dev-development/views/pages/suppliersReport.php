
<div class='content'>

		<h3>Suppliers Inventory</h3>
			<form action="?controller=reports&action=generateSupplierReport" method='post'>
			<select name = 'reportType'>
				<option value='genSuppliers'>General Suppliers Report</option>
				<option value='recentSupplierOrders' <?php if ($report == 'recentSupplierOrders') echo 'selected="selected"'; ?> >Recent Orders to Suppliers</option>
				<option value='discountedOrders' <?php if ($report == 'discountedOrders') echo 'selected="selected"'; ?>>Orders with Discounts</option>

			</select><br><br>
			<input type ='submit' value='Generate' class='blueButton'>

			</form>

			<?php if(!empty($suppliers) && $report != 'recentSupplierOrders' && $report != 'discountedOrders')
			{ ?>

				<table>
					<th>Supplier ID</th><th>Supplier Company Name</th><th>Contact Name</th><th>Materials Supplied</th>
						<?php foreach($suppliers AS $supplier)
						{  ?>
						<tr>
							
						<td><?php echo $supplier['supplier_id']?></td>
						<td><?php echo $supplier['company_name']?></td>
						<td><?php echo $supplier['contact_name']?></td>
						<td><?php echo $supplier['COUNT']?></td>
					</tr>
					
				<?php } ?>
				</table>
			<?php }
				

			else if($report == 'recentSupplierOrders')
			{ ?>

				<table>
					<th>Supply Order ID</th><th>Supplier ID</th><th>Employee Name</th><th>Order Date</th><th>Total Price</th>
						<?php foreach($suppliers AS $supplier)
						{  ?>
						<tr>
							
						<td>
							<form action='?controller=reports&action=viewSupplyOrder' method = 'post'>
								<input type='hidden' name='supplier_order_id' value='<?php echo$supplier['supplier_order_id'];?>'>
								<input class='button' type ='submit' value = 'View <?php echo $supplier['supplier_order_id']?>'>
							</form>
						</td>
						<td><?php echo $supplier['supplier_id']?></td>
						<td><?php echo $supplier['first_name'] . ' ' . $supplier['last_name'];?></td>
						<td><?php echo $supplier['order_date']?></td>

						<td><?php echo number_format($supplier['total_price'],2)?></td>


					</tr>
					
				<?php } ?>
				</table>
			<?php }

			else if($report == 'discountedOrders')
			{ ?>

				<table>
					<th>Supplier Order ID</th><th>Material ID</th><th>Quantity of Material Ordered</th><th>Discounted Amount</th>
						<?php foreach($suppliers AS $supplier)
						{ 
						
						 ?>
						<tr>
						<td><?php echo $supplier['supplier_order_id']?></td>
						<td><?php echo $supplier['material_id'];?></td>
						<td><?php echo $supplier['qty']?></td>

						<td><?php echo number_format($supplier['discount_amount'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php }


			else { ?>
				<p>No results found</p>

			<?php } ?>	
</div>

