<?php
	require_once '../controllers/connect.php';

	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);

	$sql = "INSERT tbl_admin_users (lastname, firstname, admin_email, password)
		VALUES('$lastname', '$firstname', '$email', '$password')";

	$result = mysqli_query($conn,$sql);

	$_SESSION['admin_email'] = $email;
	
	if ($result) {
		header("location: admin_login.php");
	}
	else{
		echo mysqli_error($conn);
	}
?>