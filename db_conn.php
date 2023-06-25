<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "test_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
//$conn = mysqli_connect($order_date, $company, $owner,$item,$quantity,$weight,$request_ship,$t_id,$ship_size,$box_co,$specifi,$check_quan, $db_name);

if (!$conn) {
	echo "Connection failed!";
}