<?php
$k = isset($_GET['k']) ? $_GET['k'] : '';



?>

<!DOCTYPE html>
<html>

<head>
	<title>Search Order ID & Customer Name</title>
</head>
<body><br>
<form action="" method="$_GET">
	<input type="text" name="orderID" placeholder="Order ID">
	<input type="submit" name="searchID" value="Search">
	<br><br>
	<input type="text" name="CustomerName" placeholder="Customer Name">
	<input type="submit" name="searchName" value="Search">
</form>
</body>


</html>