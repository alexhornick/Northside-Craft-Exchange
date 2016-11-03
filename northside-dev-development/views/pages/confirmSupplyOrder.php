<a href='?controller=inventory&action=ordermaterials'><input type='button' class = 'blueButton' value='Back'/></a>
<!-- This is the confirm order screen for the Order Materials section -->
<h3>Order for Supplier ID <?php echo $_SESSION['supplier_id']; ?></h3>
<th>Material ID </th><th> Cost </th><th> Quantity</th>
<table>
<?php
	
	$index = 0;
		
		for($i = 0; $i < count($_SESSION['material']); $i++)
			{
			echo "<tr><td>".$_SESSION['material'][$i] ."</td><td>".$_SESSION['supplier_id']."<td>".$_SESSION['quantity'][$i]."</td></tr>";
			}
			
		echo '</table><br>';	
?>
<form action="?controller=inventory&action=InsertOrder" method="post">
	<a href="?controller=inventory&action=ordermaterials"><input  class = 'button redButton' type='button' value='Cancel'/></a>
	<input class='button blueButton' type='submit' value='Confirm'/>
</form>