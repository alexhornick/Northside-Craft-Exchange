<?php
	class PagesController 
	{
		//private $employee_id;
//This will insert sessionstart into necessary pages
	public static function redirect($url)
	{
    	if (!headers_sent())
   	    {    
        	header('Location: '.$url);
        exit;
        }
    	else
        {  
        	echo '<script type="text/javascript">';
        	echo 'window.location.href="'.$url.'";';
        	echo '</script>';
        	echo '<noscript>';
        	echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        	echo '</noscript>'; exit;
    	}
	}
		public function session($set)
		{
			switch($set)
			{
				case 'start':
					echo 'session_start();';
					break;

				case 'unset':
					echo 'session_unset();<br>';
					break;
			}
		}
		public static function logout(){
			session_unset();
			PagesController::login();
		}
		public static function verify()
		{
			$_SESSION["user"] = 0;
			require_once('models/authentication.php');
			$dataset = [];
			if (!empty($_POST["userform"]))
			{
				$employee_id   = $_POST["employee_id"];
				$password = $_POST["password_hash"];	
			}
			else{
				$employee_id   = $_POST["employee_id"];
				$password = $_POST["password_hash"];
			}
			$dataset = Authentication::verification($employee_id, $password);
			$hashed = $dataset[0]["password_hash"];
			$userLevel = $dataset[0]["accessLevel"];
			$_SESSION['employee'] = $dataset[0]['employee_id'];
			if (password_verify($password, $hashed)){
				$_SESSION["employee_id"] = $dataset[0]["employee_id"];
					$_SESSION['user'] = $userLevel;
					PagesController::redirect('?controller=menus&action=makeMenu');
			}
			else{
				$error = "error";
				//echo 'noVerify';
				PagesController::login($error);
			}
		}
		
		public static function login($error = "")
		{
			$_SESSION["user"] = 0;
			require_once('views/pages/login.php');
		}
		public function errors()
		{
			include('views/pages/error.php');
		}
		public function stage()
		{
			require('models/database.php');
			require('views/pages/stage.php');

		}
		

	
	}
