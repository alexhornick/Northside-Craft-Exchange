
<div class='content'>
<h3>Select an Employee to Edit</h3>

<h4>Administrators</h4>

<table>
<th>Edit</th><th>Employee ID</th><th>Name</th><th>Hire Date</th><th>Phone Number</th>
<?php foreach($admins AS $admin) { ?>
<tr>
	<td>
		<form action = '?controller=employees&action=getEmployee' method='post'>
			<input type="hidden"  name = "employee_id" value= "<?php echo $admin['employee_id'];?>">
			<input type="submit" value="Edit" class="button">
		</form>
	</td>
	<td><?php echo $admin['employee_id'];?></td>
	<td><?php echo $admin['first_name']. " " . $admin['last_name'];?></td>
	<td><?php echo $admin['hire_date'];?></td>
	<td><?php echo $admin['phone_number'];?></td>
</tr>

<?php } ?>

</table>




<h4>Sales Employees</h4>

<table>
<th>Edit</th><th>Employee ID</th><th>Name</th><th>Hire Date</th><th>Phone Number</th>
<?php foreach($employees AS $employee) { ?>
<tr>
	<td>
		<form action = '?controller=employees&action=getEmployee' method='post'>
			<input type="hidden"  name = "employee_id" value= "<?php echo $employee['employee_id'];?>">
			<input type="submit" value="Edit" class="button">
		</form>
	</td>
	<td><?php echo $employee['employee_id'];?></td>
	<td><?php echo $employee['first_name']. " " . $employee['last_name'];?></td>
	<td><?php echo $employee['hire_date'];?></td>
	<td><?php echo $employee['phone_number'];?></td>
</tr>

<?php } ?>

</table>
</div>
