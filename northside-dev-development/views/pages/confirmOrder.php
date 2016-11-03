<div class='content'>
<a href='?controller=menus&action=makeMenu'><input type='button' class = 'blueButton' value='Main Menu'/></a>
<!-- This is the confirm order screen, used for all 3 types of orders.-->
<table>
<th>Items</th><th>Item Price</th><th>Quantity</th>
<?php
	
	$index = 0;
	$stageDBO = DatabaseConnection::getInstance();
	$stageDBO->select("item", "name",['item_id' => $item]);
	if(self::$orderType != 'custom') //The gift and sale orders by have their items in result sets.
	{
		foreach(self::$OrderDetailsColumns['item_id'] as $item)    //Relates each quantity to that particular item.
		{
			$db_Item_Name = $stageDBO->select("item", "name",['item_id' => $item]);
			echo '<tr><td>'.$db_Item_Name[0].'</td><td>'.number_format(self::$OrderDetailsColumns['item_price'][$index],2).'</td><td>'.self::$OrderDetailsColumns['qty'][$index].'</td></tr><br>';
			$index++;
		}
		
		echo '</table><br>Subtotal: $' . number_format(self::$orderColumns['subtotal'],2);
		if(self::$orderType == 'gift')
			{
				echo '<br>Shipping Cost: $' . number_format(self::$ShipCost['ship_cost'],2);
			}
		echo '<br>Tax Amount: $' . number_format(self::$orderColumns['tax_amount'],2);
		echo '<br>Total: $' . number_format(self::$orderColumns['total'],2);
		
		//self::confirm($);
	}
	
	else
	{
		echo '<tr><td>'.self::$CustomItem['name'].'</td><td>'.self::$OrderDetailsColumns['item_price'].'</td><td>'.self::$OrderDetailsColumns['qoh'].'<br>';
		echo '</table><br>Subtotal: $' . number_format(self::$orderColumns['subtotal'],2);
		echo '<br>Tax Amount: $' . number_format(self::$orderColumns['tax_amount'],2);
		echo '<br>Total: $' . number_format(self::$orderColumns['total'],2);
		echo '</table>';
		//TO BE CONTINUED...
	}

?>
<form action="?controller=order&action=confirm" method="post">
<a href="?controller=order&action=enterorder"><input  class = 'button redButton' type='button' value='Cancel'/></a>
<input class='button blueButton' type='submit' value='Confirm'/>

</form>
</div>
