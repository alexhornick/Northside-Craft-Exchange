<?php
	session_start();	
	$_SESSION['date'] = date('Y-m-d');

	 $_SESSION['vardump'] = 0;
	 if ($_SESSION['vardump'] == 1){
	 	echo "<pre>";
	 	print_r($_SESSION);
	 	print_r($_POST);
	 	echo "</pre>";
	 }
	// 	echo "===SESSION ==========================================================";
	// }
	/*
	function ErrorHandler($errno, $errstr, $errline, $errfile, $customMessage) {
  		$writeMessage = "<br><b>Error: Line: $errfile in $errline</b> [$errno] $errstr<br>";
  		echo $writeMessage;
  	//	echo $customMessage."<br>";
  		//error_log("Error: ".$customMessage."<br>", 3, "error/error.log");
  		die();

	}
	set_error_handler("ErrorHandler");
	*/

?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Northside Craft Exchange</title>
			<link rel="shortcut icon" type='image/x-icon' href="favicon.ico">
			<script src="lib/jquery.js"></script>
			<meta charset="utf-8">
			<link href="css/main.css" rel="stylesheet" type="text/css">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="Northside Craft Exchange Inventory Report">
			<!--<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.2/flatly/bootstrap.min.css" rel="stylesheet">-->


			<!--These two jquery-ui scripts are used for the tabs widget-->
			<link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">
			<script type='text/javascript' src='jquery-ui/jquery-ui.min.js'></script>
			<script type='text/javascript' src='css/addItem.js'></script>
			<script type='text/javascript' src='lib/jquery.validate.js'></script>

			<!-- links to the style sheet -->

	

		</head>
		<body>
		<!--EXTREME TEST-->
		<script>
		  $(function() {
    		$( "#draggable" ).draggable();
 		 });
 		 </script>
		<!--EXTREME TEST-->
		<?php
			if($controller != 'login' && $controller != 'pages' && $action != 'verify')
			{ ?>
			<a href='?controller=pages&action=logout'><input type='button' class = 'blueButton' value='Logout'/></a><br><br>
			<?php } ?>

			
			<div class='wrapper'>
			<?php 
			if (isset($_GET['controller'])) 
			{
				$controller = $_GET['controller'];
			}
			else {
				$controller = 'login';
			}

			if($controller != 'menus' && $controller != 'login' && $controller != 'pages' && $action != 'verify')
			{ ?>
			<a href='?controller=menus&action=makeMenu'><input type='button' class = 'blueButton' accessKey='m' value='Main Menu'/></a><br><br>
			<?php } ?>


				<?php require_once('routes.php'); ?>
			</div>

		</body>
			<script src="lib/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
			<link rel="stylesheet" type="text/css" href="lib/datetimepicker/jquery.datetimepicker.css"/ >
	</html>
