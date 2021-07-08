<?php


$strOrders = file_get_contents("json/orders.json");
$strCustomers = file_get_contents("json/customer.json");
$strItems = file_get_contents("json/items.json");


// Decode json data and convert it
// into an associative array
$arrOrders = json_decode($strOrders, true);
$arrCustomers = json_decode($strCustomers, true);
$arrItems = json_decode($strItems, true);



foreach ($arrOrders as $keyy => &$valuee) { // & to update changes as its address
	foreach ($arrItems as $key2 => $value2) {
		if ($valuee['id'] == $value2['orderId']) { // checking if match id of parent with images
			$valuee['orderItemID'] = $value2['id'];
			$valuee['orderItemName'] = $value2['name'];
			$valuee['orderItemQuantity'] = $value2['quantity'];
			$valuee['orderItemPrice'] = $value2['basePrice'];
		}
	}
}

foreach ($arrOrders as $key => &$value) { // & to update changes as its address
	foreach ($arrCustomers as $key1 => $value1) {
		if ($value['customerId'] == $value1['id']) { // checking if match id of parent with images
			$value['customerFirstName'] = $value1['firstName'];
			$value['customerLastName' ] = $value1['lastName'];
			$value['customerAddress'] = $value1['addresses']['1']['address'];
			$value['customerCity'] = $value1['addresses']['1']['city'];
			$value['customerZipCode'] = $value1['addresses']['1']['zip'];
			$value['email'] = $value1['email'];
		}
	}
}
/*
			[id]
            [customerId]
            [createdAt]
            [notes]
            [orderItemID]
            [orderItemName]
            [orderItemQuantity]
            [orderItemPrice]
            [customerFirstName]
            [customerLastName]
            [customerAddress]
            [customerCity]
            [customerZipCode]
            [email]
*/

$b = array('id', 'createdAt', 'orderItemID', 'orderItemName', 'orderItemQuantity', 'orderItemPrice', 'customerFirstName', 'customerLastName', 'customerAddress', 'customerCity', 'customerZipCode', 'email');
$c = array();


for ($i = 0; $i < count($arrOrders); $i++)
{
	foreach ($b as $index) {
		$c[$i][$index] = $arrOrders[$i][$index];
	}
}

$csv = 'orders.csv';

// File pointer in writable mode
$file_pointer = fopen($csv, 'w');

foreach ($c as $a) {

	// Write the data to the CSV file
	fputcsv($file_pointer, $a);
}

fclose($file_pointer);
?>