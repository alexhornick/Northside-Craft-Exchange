<?php
class Authentication
{
	//private $employee_id;
	//private $password
	public static function verification($employee_id = "", $password) {

		//$dbpassword_hash = false;
		$table           = 'user';
		$columns         = ['password_hash', 'accessLevel', 'employee_id'];
		$database        = databaseConnection::getInstance();
		$dataset         = $database->select($table, $columns, [
																"employee_id" => $employee_id
																]);

		//var_dump($dataset);
		if ($dataset[0]['employee_id'] == $employee_id){
			return $dataset;
		}
	}
}