
<div class='content'>

<a href='?controller=reports&action=orders'><input type='button' class = 'blueButton' value='Back'/></a>
<h3>Details for Custom Order <?php echo $customs[0]['custom_order_id'];?></h3>

<p>Employee ID: <?php echo $customs[0]['employee_id'];?>  </p>
<p>Total Cost: <?php echo number_format($customs[0]['total_price'],2);?> </p>
<p>Custom Craft Name: <?php echo $customs[0]['name'];?>  </p>
<p>Custom Craft Comment: <?php echo $customs[0]['comment'];?>  </p>
<p>Custom Craft Estimated Price: <?php echo $customs[0]['price_estimation'];?>  </p>
<p>Craft Qty Ordered: <?php echo $customs[0]['qty'];?>  </p>
<p>Customer Name: <?php echo $customs[0]['first_name']. ' ' . $customs[0]['last_name'];?>  </p>
<p>Customer Phone: <?php echo $customs[0]['phone_number'];?>  </p>

<h4>Materials Used</h4>
<table>
<th>Material ID</th><th>Material Unit Price</th>
<p><?php foreach($materials AS $material)
{ ?>
	<tr>
	<td><?php echo $material['material_id'];?></td>
	<td><?php echo $material['unit_price'];?></td>
	</tr>
<?php }  ?>

</div>

