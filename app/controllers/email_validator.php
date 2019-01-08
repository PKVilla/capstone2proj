<?php
require_once 'connect.php';

	$email = $_POST["email"];
	// $data="";
	$sql = "SELECT * from tbl_users where email='$email'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$data = "email already exist";
	}
	}else{
	$data = "email is available";
	}

	echo $data;	
?>