<?php

	require_once '../controllers/connect.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM items WHERE id = $id";

	$result = mysqli_query($conn, $sql);

	if ($result) {
		header("location: admin_items.php");
	}

?>