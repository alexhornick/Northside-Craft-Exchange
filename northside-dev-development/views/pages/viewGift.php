
<div class='content'>

<a href='?controller=reports&action=orders'><input type='button' class = 'blueButton' value='Back'/></a>
<h3>Details for Order ID <?php echo $gifts[0]['order_id'];?> and Gift ID <?php echo $gifts[0]['gift_id'];?></h3>

<p>Customer Name: <?php echo $gifts[0]['first_name'] . ' ' . $gifts[0]['last_name'];?></p>
<p>Recipient Name: <?php echo $gifts[0]['rec_first_name'] . ' ' . $gifts[0]['rec_last_name'];?></p>
<p>Recipient Address: <?php echo $gifts[0]['street_number'] . ' ' . $gifts[0]['street_name'] . ' ' . $gifts[0]['street_type'] . ' ' . $gifts[0]['major_municipality'] . ', ' .  $gifts[0]['governing_district'] . ' ' . $gifts[0]['zip']; ?></p>
<p>Shipping Cost: $<?php echo number_format($gifts[0]['shipping_cost'],2); ?></p>
<p>Total Price: $<?php echo number_format($gifts[0]['total_price'],2); ?></p>

<!-- <p>Employee ID, Name:  <?php echo $sales[0]['employee_id'] . ', ' . $sales[0]['first_name']. ' '. $sales[0]['last_name'];?>  </p>
<p>Total Cost: <?php echo number_format($sales[0]['total_price'],2);?> </p> -->

<h4>Items Gifted</h4>
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

