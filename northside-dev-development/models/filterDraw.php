<?php
require_once('connection.php');

class filterDraw{
	public static function dropDownGiftOrder(){

		echo 		"<form name = 'filterForm'
						action='?controller=order&action=filter'
						method = 'POST'>
						<select name = 'filterOption'>";
		echo "<option value='gift_order.gift_id'>Gift ID</option>";
		echo "<option value='order.order_id'>Order ID</option>";
		echo "<option value='customer.last_name'>Customer Last Name</option>";
		echo "<option value='gift_order.rec_last_name'>Recipient Last Name</option>";
		echo "</select>";
		echo "<input type='text' name='filterText'>";
		echo "<input type='submit' name='filter' class='button blueButton' value='Filter'>";

		echo "<input type='hidden' name='context' value='gift'>";
		echo "</form>";
		echo "<form action=?controller=order&action=manageorders method='POST'>";
		echo "<input type='submit' name='noFilter' class='button blueButton' value='Refresh'>";
		echo "</form>";

	}
		public static function dropDownCustomOrder(){

		echo 		"<form name = 'filterForm'
						action='?controller=order&action=filter'
						method = 'POST'>
						<select name = 'filterOption'>";
		echo "<option value='custom_order.custom_order_id'>Custom Order ID</option>";
		echo "<option value='custom_order.order_id'>Order ID</option>";
		echo "</select>";
		echo "<input type='text' name='filterText'>";
		echo "<input type='submit' name='filter' class='button blueButton' value='Filter'>";
		echo "<input type='hidden' name='context' value='custom'>";
		echo "</form>";
		echo "<form action=?controller=order&action=manageorders method='POST'>";
		echo "<input type='submit' name='noFilter' class='button blueButton' value='Refresh'>";
		echo "<input type='hidden' name='context' value='custom'>";
		echo "</form>";
		

	}
}



?>