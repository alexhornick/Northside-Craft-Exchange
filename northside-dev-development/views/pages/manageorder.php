
<div id="tabs" class="content">
  <ul>
    <li><a href="#tabs-1">Gift Orders</a></li>
    <li><a href="#tabs-2">Custom Orders</a></li>
  </ul>
  <div id="tabs-1">
    <p><h3>Manage Orders - Gift Orders</h3>

<h4>Filter Options</h4>
<!--
<form action="?controller=order&action=filterOrders" method = "post">
	<label>Gift ID <input type = "text" name="giftID"></label><br>
	<label> Item ID <input type = "text" name="itemID"></label><br>
	<label> Customer Last Name <input type = "text" name="customerLName"></label><br>
	<label> Recipient Last Name <input type = "text" name="recLName"></label>
	<br>
	<label>Order Date <input type = "text" name="orderDate"></label>
	<label> Employee ID <input type = "text" name="employeeID"></label>
	<label> Order ID <input type = "text" name="orderID"></label><br>
	<input type="submit" class="button blueButton" value="Generate">
	
</form>
-->
<?php filterDraw::dropDownGiftOrder();?><br>


<table>
<th>Edit</th><th>Gift Order ID</th><th>Order ID</th><th>Recipient Name</th>
<th>Customer Name</th><th>Order Date</th><th>Total Cost</th>


<?php 
if (is_array($gifts)){
foreach($gifts as $gift)
{  
?>
	<tr>
		<td>
			<form action="?controller=order&action=editGift" method="post">
				<input name="gift_id" type="hidden" value="<?php echo $gift['gift_id'];?>">
				<input type="submit" value="Edit" class="button">
			</form>
		</td>
		<td><?php echo $gift['gift_id']?></td>
		<td><?php echo $gift['order_id']?></td>
		<td><?php echo $gift['rec_first_name'] . " " . $gift['rec_last_name'];?></td>
		<td><?php echo $gift['first_name'] . " " . $gift['last_name'];?></td>
		<td><?php echo $gift['order_date'];?></td>
		<td><?php echo number_format($gift['total_price'],2);?></td>
	</tr>
	
<?php } }?>
</table></p>
  </div>
  <div id="tabs-2">
    <p><h3>Manage Orders - Custom Orders</h3>

<h4>Filter Options</h4>
<?php filterDraw::dropDownCustomOrder();?>
<!--
<form action="?controller=order&action=filterOrders" method = "post">
	<label> Order ID <input type = "text" name="orderID"></label><br>
	<label>Custom OrderID <input type = "text" name="customID"></label><br>
	<label> Customer Last Name <input type = "text" name="customerLName"></label><br>
	<label>Order Date <input type = "text" name="orderDate"></label>
	<label> Employee ID <input type = "text" name="employeeID"></label>
	
	<input type="submit" class="button blueButton" value="Generate">
	
</form>
-->
<table>
<th>Edit</th><th>Custom Order ID</th><th>Order ID</th><th>Comment</th><th>Price Estimation</th>
<?php 
if (is_array($customs)){
foreach($customs AS $custom)
{  ?>
	<tr>
		<td>
			<form action="?controller=order&action=editCustom" method="post">
				<input name="custom_id" type="hidden" value="<?php echo $custom['custom_order_id'];?>">
				<input type="submit" value="Edit" class="button">
			</form>
		</td>
		<td><?php echo $custom['custom_order_id']?></td>
		<td><?php echo $custom['order_id']?></td>
		<td><?php echo $custom['comment'];?></td>
		<td><?php echo number_format($custom['price_estimation'],2);?></td>
		
	</tr>
	
<?php }} ?>
</table></p>
  </div>
  
</div>




