<?php
	require_once 'connect.php';

	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$password = sha1($_POST['password']);
	$address = $_POST['address'];

	// if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
 // 		echo "Invalid email address";
 // 	}
 	// if($lastname == "" || $firstname == "" || $email == "" || $password == "" || $address == ""){
 	// 	$data = "<p style='color:red'>All fields are required </p> <br>";
 	// 	echo $data;
 	// }
 	

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