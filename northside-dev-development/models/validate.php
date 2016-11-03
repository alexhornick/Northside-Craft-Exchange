<?php
class validate{
	private $regex = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";
	public $errorMessage = array();
	public static function phoneNumber($phoneNumber){
		if (preg_match($this->regex, $phoneNumber)){
			return 1;
		}
		else {
			return 0;
		}

	}
	public static function thisString($string){
		if (filter_input(INPUT_POST, $string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH)){
			return 1;
		}
		else {
			return 0;
		}
	}
	public static function thisInt($int){
		if (filter_input(INPUT_POST, $int, FILTER_VALIDATE_INT)){
			return 1;
		}
		else {
			return 0;
		}
	}
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


}

?>