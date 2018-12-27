<?php
	require_once 'connect.php';

	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$address = $_POST['address'];

	$sql = "INSERT tbl_users (lastname, firstname, email, password, address)
		VALUES('$lastname', '$firstname', '$email', '$password', '$address')";

	$result = mysqli_query($conn,$sql);


	if ($result) {
		header("location: ../views/login.php");
	}
	else{
		echo mysqli_error($conn);
	}
?>