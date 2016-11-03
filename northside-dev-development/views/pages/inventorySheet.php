
<div class='content'>

<table>
<th>Item ID</th><th>Item Name</th><th>Quantity on Hand</th><th>Calculated Quantity On Hand</th>

<?php foreach($items as $item)
{ ?>
	<tr>
		<td><?php echo $item['item_id'] ?></td>
		<td><?php echo $item['name'] ?></td>
		<td><?php echo $item['qoh'] ?></td>
		<td><?php echo $item['calculated_qoh'] ?></td>
	</tr>
<?php } ?>


</table>
</div>

