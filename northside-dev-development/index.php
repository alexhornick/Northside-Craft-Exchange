<?php 
//Here we start the session for the user.
//Here is our DB include
//header('Cache-Control: no cache'); //no cache
//session_cache_limiter('private_no_expire'); // works
	require_once('connection.php');
//Here we check for our controller and action variables
	if(isset($_GET['controller']) && isset($_GET['action'])) 
	{
		$controller = $_GET['controller'];
		$action = $_GET['action'];
	}
	else if(isset($_POST['controller']) && isset($_POST['action'])) 
	{
		$controller = $_POST['controller'];
		$action = $_POST['action'];
	}
	else 
	{
		$controller = 'pages';
		$action = 'home';
	}


	error_reporting(E_ALL & ~E_NOTICE);


	require_once('views/layout.php');
?>