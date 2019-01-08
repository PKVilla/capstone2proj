<?php

	require_once '../controllers/connect.php';

	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$image = $_POST['image'];
	$category = $_POST['category_id'];
	
	
	$sql = "UPDATE items SET name = '$name', price = '$price', description = '$description', img_path = '$image' WHERE id = '$id'";

	$result = mysqli_query($conn, $sql);

	if($result){
		echo "UPDATED item!";
		header("location: admin_items.php");
	} 


?>	