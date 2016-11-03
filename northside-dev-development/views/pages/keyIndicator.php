
<div class='content'>
			<form id="form" action="?controller=reports&action=generateKeyIndicator" method='post'>

			<label for="inventory" class="col-xs-offset-2 col-xs-2 control-label">Key Indicator</label>
			<div class='form-group'>
			
			
			<select name = 'reportType' class="form-control">
				<option value='Daily' <?php if ($report == 'Daily') echo 'selected="selected"'; ?>>Daily</option>
				<option value='Weekly' <?php if ($report == 'Weekly') echo 'selected="selected"'; ?> >Weekly</option>
				<option value='Monthly' <?php if ($report == 'Monthly') echo 'selected="selected"'; ?>>Monthly</option>
				<option value='Annual' <?php if ($report == 'Annual') echo 'selected="selected"'; ?>>Annual</option>

			</select><br><br>

			<input type ='submit' value='Generate' class='button'>


			</div>

		

			
			</form>

			
			<?php if(!empty($daily) && empty($weekly) && empty($monthly) && empty($annual))
			{ ?>

			
				<table class="reportTable">
					<tr class='row header'>
					<th class='cell'>Day</th><th class='cell'>Number of Orders</th><th class='cell'>Items Sold</th><th class='cell'>Total Sales</th>
				

						<?php foreach($daily AS $order)
						{  ?>
						<tr class='row'>
							
						<td class='cell'><?php echo $order['day']?></td>
						<td class='cell'><?php echo $order['NumberOfOrders']?></td>

						<td class='cell'><?php echo number_format($order['TotalAmt'],0)?></td>

						<td class='cell'><?php echo $order['items']?></td>
					</tr>
					
				<?php } ?>
				</table></div>
			<?php } 
				
		
			
			else if($report == 'Weekly')
			{ ?>
				<table>
					<th>Week of Year, Month</th><th>Number of Orders</th><th>Items Sold</th><th>Total Sales</th>
						<?php foreach($weekly AS $order)
						{  ?>
						<tr>
							
						<td><?php echo $order['week']?></td>
						<td><?php echo $order['NumberOfOrders']?></td>

						<td><?php echo number_format($order['TotalAmt'],0)?></td>

						<td><?php echo $order['items']?></td>
					</tr>
					
				<?php } ?>
				</table>
			<?php } 

			else if($report == 'Monthly')
			{ ?>
				<table>
					<th>Month</th><th>Number of Orders</th><th>Items Sold</th><th>Total Sales</th>
						<?php foreach($monthly AS $order)
						{  ?>
						<tr>
							
						<td><?php echo $order['month']?></td>
						<td><?php echo $order['NumberOfOrders']?></td>

						<td><?php echo number_format($order['TotalAmt'], 0)?></td>

						<td><?php echo $order['items']?></td>
					</tr>
					
				<?php } ?>
				</table>
			<?php } 

			else if($report == 'Annual')
			{ ?>
				<table>
					<th>Year</th><th>Number of Orders</th><th>Items Sold</th><th>Total Sales</th>
						<?php foreach($annual AS $order)
						{  ?>
						<tr>
							
						<td><?php echo $order['year']?></td>
						<td><?php echo $order['NumberOfOrders']?></td>

						<td><?php echo number_format($order['TotalAmt'],0)?></td>

						<td><?php echo $order['items']?></td>
					</tr>
					
				<?php } ?>
				</table>
			<?php } 

			

			else { ?>
				<p>No results found</p>
			<?php } ?>				


</div>

