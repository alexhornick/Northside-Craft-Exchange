
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Sales</a></li>
    <li><a href="#tabs-2">Custom Orders</a></li>
	<li><a href="#tabs-3">Gift Orders</a></li>
  </ul>
  
  <div id="tabs-1">
		<h3>Sale Orders</h3>
			<form action="?controller=reports&action=generateOrderReports" method='post'>
			<select name = 'reportType'>
				<option value='GeneralSales' <?php if ($report == 'GeneralSales') echo 'selected="selected"'; ?>>General Report</option>
				<option value='DailySales' <?php if ($report == 'DailySales') echo 'selected="selected"'; ?>>Daily</option>
				<option value='WeeklySales' <?php if ($report == 'WeeklySales') echo 'selected="selected"'; ?> >Weekly</option>
				<option value='MonthlySales' <?php if ($report == 'MonthlySales') echo 'selected="selected"'; ?>>Monthly</option>
				<option value='AnnualSales' <?php if ($report == 'AnnualSales') echo 'selected="selected"'; ?>>Annual</option>
				<option value='SalesByEmployee' <?php if ($report == 'SalesByEmployee') echo 'selected="selected"'; ?>>Sales By Employee</option>

			</select><br><br>
			<input type ='submit' value='Generate' class='blueButton'>
			</form><br><br>


			<?php if(!empty($sales) && empty($weeklySales) && empty($dailySales) && empty($monthlySales) && empty($annualSales) && empty($employeeSales))
			{ ?>

				<table>
					<th>Order ID</th><th>Employee ID</th><th>Order Date</th><th>Subtotal</th><th>Tax Amount</th><th>Total Cost</th>
						<?php foreach($sales AS $sale)
						{  ?>
						<tr>
							
						<td>
							<form action="?controller=reports&action=viewSale" method="post">
								<input type = 'hidden' name='order_id' value='<?php echo $sale['order_id'];?>'>
								<input type='submit' class='button' value='View <?php echo $sale['order_id']?>'>
							</form>
						</td>
						<td><?php echo $sale['employee_id']?></td>
						<td><?php echo $sale['order_date']?></td>

						<td><?php echo number_format($sale['subtotal'],2)?></td>
						<td><?php echo number_format($sale['tax_amount'],2)?></td>
						<td><?php echo number_format($sale['total_price'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php }

			else if($report == 'DailySales')
			{ ?>
				<table>
					<th>Day</th><th>Number of Sales</th><th>Total Amount Earned</th>
						<?php foreach($dailySales AS $sale)
						{  ?>
						<tr>
							
						<td><?php echo $sale['day']?></td>
						<td><?php echo $sale['NumberOfOrders']?></td>

						<td><?php echo number_format($sale['TotalAmt'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php } 

			else if($report == 'WeeklySales')
			{ ?>
				<table>
					<th>Week Number</th><th>Number of Sales</th><th>Total Amount Earned</th>
						<?php foreach($weeklySales AS $sale)
						{  ?>
						<tr>
							
						<td><?php echo $sale['week']?></td>
						<td><?php echo $sale['NumberOfOrders']?></td>

						<td><?php echo number_format($sale['TotalAmt'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php } 

			else if($report == 'MonthlySales')
			{ ?>
				<table>
					<th>Month</th><th>Number of Sales</th><th>Total Amount Earned</th>
						<?php foreach($monthlySales AS $sale)
						{  ?>
						<tr>
							
						<td><?php echo $sale['month']?></td>
						<td><?php echo $sale['NumberOfOrders']?></td>

						<td><?php echo number_format($sale['TotalAmt'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php } 

			else if($report == 'AnnualSales')
			{ ?>
				<table>
					<th>Year</th><th>Number of Sales</th><th>Total Amount Earned</th>
						<?php foreach($annualSales AS $sale)
						{  ?>
						<tr>
							
						<td><?php echo $sale['year']?></td>
						<td><?php echo $sale['NumberOfOrders']?></td>

						<td><?php echo number_format($sale['TotalAmt'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php } 

			else if($report == 'SalesByEmployee')
			{ 

				?>
				<p>Sales by Employees for the month of <?php echo date('F'); ?>:</p>
				<table>
					<th>Employee ID</th><th>Employee Name</th><th>Number of Sales</th><th>Total Amount Earned</th>
						<?php foreach($employeeSales AS $sale)
						{  ?>
						<tr>
						<td><?php echo $sale['employee_id']?></td>
						<td><?php echo $sale['first_name'] . " " . $sale['last_name'];?></td>
						<td><?php echo $sale['NumberOfOrders']?></td>

						<td><?php echo number_format($sale['TotalAmt'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php } 

			else { ?>
				<p>No results found</p>
			<?php } ?>				

  </div>
  <div id="tabs-2">
	<h3>Custom Orders</h3>
		<form action="?controller=reports&action=generateOrderReports" method='post'>
			<select name = 'reportType'>
				<option value='GeneralCustoms' <?php if ($report == 'GeneralCustoms') echo 'selected="selected"'; ?>>General Report</option>
				<option value='DailyCustoms' <?php if ($report == 'DailyCustoms') echo 'selected="selected"'; ?>>Daily</option>
				<option value='WeeklyCustoms' <?php if ($report == 'WeeklyCustoms') echo 'selected="selected"'; ?> >Weekly</option>
				<option value='MonthlyCustoms' <?php if ($report == 'MonthlyCustoms') echo 'selected="selected"'; ?>>Monthly</option>
				<option value='AnnualCustoms' <?php if ($report == 'AnnualCustoms') echo 'selected="selected"'; ?>>Annual</option>

			</select><br><br>
			<input type ='submit' value='Generate' class='blueButton'>
			</form><br><br>


			<?php if(!empty($customs) && ($report != 'WeeklyCustoms' && $report != 'DailyCustoms' && $report != 'MonthlyCustoms' && $report != 'AnnualCustoms'))
			{ ?>
				<table>
					<th>Custom Order ID</th><th>Order ID</th><th>Employee Name</th><th>Order Date</th><th>Estimated Price</th><th>Total Price</th>
						<?php foreach($customs AS $custom)
						{  ?>
						<tr>
							
							<td>
								<form action="?controller=reports&action=viewCustom" method="post">
									<input type = 'hidden' name='custom_order_id' value='<?php echo $custom['custom_order_id'];?>'>
									<input type='submit' class= 'button' value='View <?php echo $custom['custom_order_id']?>'>
								</form>
							</td>
							<td><?php echo $custom['order_id']?></td>
							<td><?php echo $custom['first_name'] . ' ' . $custom['last_name'];?></td>
							<td><?php echo $custom['order_date']?></td>

							<td><?php echo number_format($custom['price_estimation'],2)?></td>
							<td><?php echo number_format($custom['total_price'],2)?></td>



						</tr>
			
					<?php } ?>
				</table>
			<?php }

			else if($report == 'DailyCustoms')
			{ ?>
				<table>
					<th>Day</th><th>Number of Sales</th><th>Total Amount Earned</th>
						<?php foreach($customs AS $sale)
						{  ?>
						<tr>
							
						<td><?php echo $sale['day']?></td>
						<td><?php echo $sale['NumberOfOrders']?></td>

						<td><?php echo number_format($sale['TotalAmt'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php } 

			else if($report == 'WeeklyCustoms')
			{ ?>
				<table>
					<th>Week Number</th><th>Number of Sales</th><th>Total Amount Earned</th>
						<?php foreach($customs AS $sale)
						{  ?>
						<tr>
							
						<td><?php echo $sale['week']?></td>
						<td><?php echo $sale['NumberOfOrders']?></td>

						<td><?php echo number_format($sale['TotalAmt'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php } 

			else if($report == 'MonthlyCustoms')
			{ ?>
				<table>
					<th>Month</th><th>Number of Sales</th><th>Total Amount Earned</th>
						<?php foreach($customs AS $sale)
						{  ?>
						<tr>
							
						<td><?php echo $sale['month']?></td>
						<td><?php echo $sale['NumberOfOrders']?></td>

						<td><?php echo number_format($sale['TotalAmt'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php } 

			else if($report == 'AnnualCustoms')
			{ ?>
				<table>
					<th>Year</th><th>Number of Sales</th><th>Total Amount Earned</th>
						<?php foreach($customs AS $sale)
						{  ?>
						<tr>
							
						<td><?php echo $sale['year']?></td>
						<td><?php echo $sale['NumberOfOrders']?></td>

						<td><?php echo number_format($sale['TotalAmt'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php } 


			else { ?>
			<p>No results found</p>

			<?php } ?>




				
  </div>
  
  
  <div id="tabs-3">
	<h3>Gift Orders</h3>
		<form action="?controller=reports&action=generateOrderReports" method='post'>
			<select name = 'reportType'>
				<option value='GeneralGifts' <?php if ($report == 'GeneralGifts') echo 'selected="selected"'; ?>>General Report</option>
				<option value='DailyGifts' <?php if ($report == 'DailyGifts') echo 'selected="selected"'; ?>>Daily</option>
				<option value='WeeklyGifts' <?php if ($report == 'WeeklyGifts') echo 'selected="selected"'; ?> >Weekly</option>
				<option value='MonthlyGifts' <?php if ($report == 'MonthlyGifts') echo 'selected="selected"'; ?>>Monthly</option>
				<option value='AnnualGifts' <?php if ($report == 'AnnualGifts') echo 'selected="selected"'; ?>>Annual</option>
				<option value='GiftShipping' <?php if ($report == 'GiftShipping') echo 'selected="selected"'; ?>>Gift Shipping</option>

			</select><br><br>
			<input type ='submit' value='Generate' class='blueButton'>
			</form><br><br>


			<?php if(!empty($gifts) && ($report != 'WeeklyGifts' && $report != 'DailyGifts' && $report != 'MonthlyGifts' && $report != 'AnnualGifts' && $report != 'GiftShipping'))
			{ ?>
				<table>
					<th>Gift ID</th><th>Order ID</th><th>Customer Name</th><th>Recipient Name</th><th>Order Date</th><th>Total Price</th>
						<?php foreach($gifts AS $gift)
						{  ?>
						<tr>
							
							<td>
								<form action="?controller=reports&action=viewGift" method="post">
									<input type = 'hidden' name='gift_id' value='<?php echo $gift['gift_id'];?>'>
									<input type='submit' class= 'button' value='View <?php echo $gift['gift_id']?>'>
								</form>
							</td>
							<td><?php echo $gift['order_id']?></td>
							<td><?php echo $gift['first_name'] . ' ' . $gift['last_name'];?></td>
							<td><?php echo $gift['rec_first_name'] . ' ' . $gift['rec_last_name'];?></td>
							<td><?php echo $gift['order_date']?></td>

							<td><?php echo number_format($gift['total_price'],2)?></td>



						</tr>
			
					<?php } ?>
				</table>
			<?php }

			else if($report == 'DailyGifts')
			{ ?>
				<table>
					<th>Day</th><th>Number of Sales</th><th>Total Amount Earned</th>
						<?php foreach($gifts AS $gift)
						{  ?>
						<tr>
							
						<td><?php echo $gift['day']?></td>
						<td><?php echo $gift['NumberOfOrders']?></td>

						<td><?php echo number_format($gift['TotalAmt'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php } 


			else if($report == 'WeeklyGifts')
			{ ?>
				<table>
					<th>Week Number</th><th>Number of Sales</th><th>Total Amount Earned</th>
						<?php foreach($gifts AS $gift)
						{  ?>
						<tr>
							
						<td><?php echo $gift['week']?></td>
						<td><?php echo $gift['NumberOfOrders']?></td>

						<td><?php echo number_format($gift['TotalAmt'],2)?></td>


					</tr>
					
				<?php } ?>
				</table>
			<?php } 

			else if($report == 'MonthlyGifts')
			{ ?>
				<table>
					<th>Month</th><th>Number of Sales</th><th>Total Amount Earned</th>
						<?php foreach($gifts AS $gift)
						{  ?>
						<tr>
							
						<td><?php echo $gift['month']?></td>
						<td><?php echo $gift['NumberOfOrders']?></td>

						<td><?php echo number_format($gift['TotalAmt'],2)?></td>

					</tr>					
				<?php } ?>
				</table>
			<?php } 

			else if($report == 'AnnualGifts')
			{ ?>
				<table>
					<th>Month</th><th>Number of Sales</th><th>Total Amount Earned</th>
						<?php foreach($gifts AS $gift)
						{  ?>
						<tr>
							
						<td><?php echo $gift['year']?></td>
						<td><?php echo $gift['NumberOfOrders']?></td>

						<td><?php echo number_format($gift['TotalAmt'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php } 

			else if($report == 'GiftShipping')
			{ ?>
				<table>
					<th>Gift ID</th><th>Recipient Address</th><th>Customer Charged</th><th>Shipping Cost</th>
						<?php foreach($gifts AS $gift)
						{  ?>
						<tr>
							
						<td><?php echo $gift['gift_id']?></td>
						<td><?php echo $gift['street_number']. ' ' . $gift['street_name'] . ' ' . $gift['street_type'].' '.$gift['major_municipality'].' '.$gift['governing_district'].' '.$gift['zip'];?></td>
						<td><?php echo $gift['first_name'].' '.$gift['last_name']?></td>

						<td><?php echo number_format($gift['shipping_cost'],2)?></td>

					</tr>
					
				<?php } ?>
				</table>
			<?php } 


			else { ?>
			<p>No results found</p>

			<?php } ?>



			
				

  </div>
  
</div>



