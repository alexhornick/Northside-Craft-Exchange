<?php
  class FormsController 
  {
			public static $AddressForm = array(
					['element'=>'input','name'=>'streetNumber','value'=> 'street_number','label' =>'Street Number','type' => 'text'],
					['element' => 'input','name'=> 'streetName','value'=> 'street_name', 'label' => 'Street Name', 'type' => 'text'],
					['element' => 'input','name'=> 'streetType','value'=> 'street_type', 'label' => 'Street Type', 'type' => 'text'],	
					['element' => 'select','name' => 'addressType','value'=> 'House', 'options' => ['House', 'Apartment']],					
					['element' => 'input','name'=> 'city','value'=> 'major_municipality', 'label' => 'City', 'type' => 'text'],  
					['element' => 'input','name'=> 'state', 'value'=> 'governing_district','label' => 'State', 'type' => 'text'],
					['element' => 'input','name'=> 'zip', 'value'=> 'zip','label' => 'Zip', 'type' => 'text'],
					['element' => 'input','name'=> 'country','value'=> 'iso_country_code', 'label' => 'Country', 'type' => 'text']);
					//['element' => 'input','name'=> 'pobox','value'=> 'pobox', 'label' => 'P.O. Box', 'type' => 'text']);	
					
			public static $EmployeeForm = array(
					['element' => 'input','name'=> 'accessLevel', 'label' => 'Administrator', 'type' => 'radio'],
					['element' => 'input','name'=> 'accessLevel', 'label' => 'Sales Employee', 'type' => 'radio'],
					['element' => 'input','name'=> 'firstName', 'label' => 'First Name', 'type' => 'text'],  
					['element' => 'input','name'=> 'lastName', 'label' => 'Last Name', 'type' => 'text'],
					['element' => 'input','name'=> 'hireDate', 'label' => 'Hire Date', 'type' => 'text'],
					['element' => 'input','name'=> 'phone', 'label' => 'Phone Number', 'type' => 'text'],
					['element' => 'input','name'=> 'password', 'label' => 'Password', 'type' => 'text'],
					);		
					
			public static $ReturnItemForm = array(
					['element' => 'input','name'=> 'order_id', 'label' => 'Order ID', 'type' => 'text', 'value' => ''],
					['element' => 'input','name'=> 'item_id', 'label' => 'Item ID', 'type' => 'text','value' => ''],
					['element' => 'input','name'=> 'qty', 'label' => 'Quantity Returned', 'type' => 'text','value' => ''],
					['element' => 'input','name'=> 'damaged', 'label' => 'Damaged', 'type' => 'radio','value' => 'yes'],
					['element' => 'input','name'=> 'damaged', 'label' => 'Not Damaged', 'type' => 'radio', 'value' => 'no'],  
					['element' => 'input','name'=> 'refundable', 'label' => 'Refundable', 'type' => 'radio','value' => 'yes'],
					['element' => 'input','name'=> 'refundable', 'label' => 'Non-refundable', 'type' => 'radio','value' => 'no']
					);		
		
  }