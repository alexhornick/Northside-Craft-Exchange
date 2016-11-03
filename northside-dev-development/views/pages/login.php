<!--
CSCI 4750
Group 3 Codist Technologies
Team: Matthew Doerr, Alexander Hornick, Mikayla Webber, Tiasha Gray-Ramey 
Includes: The login page for Northside Craft Exchange
-->
<div class="loginPage">
	<header>
		<h2> Northside Login </h2>
	</header>
	<?php session_unset (); ?>
	<form id="userform" name="userform" method="post" action="?controller=pages&action=verify">
		<input placeholder="Username" type="text" name="employee_id" id="employee_id"></input>
		<input placeholder="Password" type="password" name="password_hash" id="password_hash"></input>
		<?php if 
				 (!empty($error) && 
						 $error == "error") 
				{ echo "The username or password is incorrect.";} ?>

		<section class="links">
			<button class="button" type="submit"><span>LOGIN</span></button>
			<br><br>
		</section>
	</form>
</div>

<br><br><br><br>