<?php
	$stageDBO = DatabaseObjectFactory::build('order');
	$arr = ['gift_id', 'order_id'];
	//$stageDBO->join();
	//this is the general join format
	//["[><]gift_order" => "order_id", "[><]custom_order" => "order_id", "[><]address" => "address_id"]
	$records = $stageDBO->getRecords($arr);
	$stageDBO->drawTable();


	$stageDBO = DatabaseObjectFactory::build('supplier');
	$arr = ['company_name'];
	//$stageDBO->UnicornMagic('gift_order', 'customer');
	$records = $stageDBO->getRecords($arr);
	$stageDBO->drawTable();
?>

