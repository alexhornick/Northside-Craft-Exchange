<div class='content'>
<h3>Success!</h3>
<p><?php 
foreach ($successMessage as $separateMessage){
	echo $separateMessage; 
}
?></p><br>
<a href='?controller=order&action=enterorder' class='blueButton'>New Order</a>
<?php if(!empty($back)) { ?>
	<a href = <?php echo $back; ?>><input type='button' class='button' value='Back'></a>
<?php } ?>
</div>