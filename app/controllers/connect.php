<?php

$host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "demoStoreNew";

$conn = mysqli_connect($host, $db_username, $db_password, $db_name);

if (!$conn) {
	die("connection failed!:". mysqli_error($conn));
}

?>

