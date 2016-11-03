
<div class='content'>

<a href='?controller=reports&action=orders'><input type='button' class = 'blueButton' value='Back'/></a>
<h3>Details for Order ID <?php echo $sales[0]['order_id'];?></h3>

<p>Employee ID, Name:  <?php echo $sales[0]['employee_id'] . ', ' . $sales[0]['first_name']. ' '. $sales[0]['last_name'];?>  </p>
<p>Total Cost: <?php echo number_format($sales[0]['total_price'],2);?> </p>

<h4>Items Sold</h4>
	<table>
	<th>Item ID</th><th>Item Name</th><th>Item Price</th><th>Quantity Purhcased</th>
	<?php foreach($items AS $item)
	{ ?>
		<tr>
			<td><?php echo $item['item_id'] ?> </td>
			<td><?php echo $item['name'] ?> </td>
			<td><?php echo $item['item_price'] ?> </td>
			<td><?php echo $item['qty'] ?> </td>
		</tr>


<?php	} ?>
</div>

