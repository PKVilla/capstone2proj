<?php
	session_start();
	require_once 'connect.php';
	require_once '../../vendor/autoload.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;


	$userid = $_SESSION['userid'];
	$paymentMode = $_POST['payment_mode'];
	$shippingAddress = $_POST['shipping_address'];
	$_SESSION['cart'];


	$transaction_code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),0,18);
	// echo $transaction_code;
	$date = date(DATE_RFC2822);

	// phpmailer code to send an email
	$mail = new PHPMailer(true);
	$staff_email = "pol.kharlo.villa@gmail.com"; //where the email is coming from
	$users_email = $_SESSION['email'];//email destination

	$email_subject = "Order Confirmation";
	$email_body = "<h1>Thank you for shoping!</h1><br>".$transaction_code ;

	try{
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth =  true;
		$mail->Username = $staff_email;
		$mail->Password = "Sucker20";
		$mail->SMTPSecure = "tls";
		$mail->Port = 587;
		$mail->setFrom($staff_email, "EatSleepRace");
		$mail->addAddress($users_email);
		$mail->isHTML(true);
		$mail->Subject = $email_subject;
		$mail->Body = $email_body;
		$mail->send();
		echo "Message has been sent";
	} catch(Exception $e){
		echo "massage sending failed". $mail->ErrorInfo;
	}
	
	$sql = "INSERT INTO tbl_orders(users_id, transaction_code, purchase_date, shippingAddress, status_id,payment_mode_id)
		VALUES('$userid', '$transaction_code', '$date','$shippingAddress', '1', '$paymentMode')";

	$result = mysqli_query($conn,$sql);

	$_SESSION['transaction_code'] = $transaction_code;
	$_SESSION['purchase_date'] = $date;

	

	if ($result) {
		header("location: ../views/confirmation.php");
	}
	else{
		echo mysqli_error($conn);
	}

	$lastId = mysqli_insert_id($conn);

	foreach($_SESSION['cart'] as $id=> $quantity) {
	   $sql1 = "SELECT * FROM items where id = '$id' ";
	             $result1 = mysqli_query($conn, $sql1);
	               if(mysqli_num_rows($result1) > 0){
	                   while($row = mysqli_fetch_assoc($result1)){
	                   	 $id = $row["id"];
	                     $name = $row["name"];
	                     $description = $row["description"];
	                     $price = $row["price"];
	                     $subTotal = $quantity * $price;

	                     // echo $id;
	                     // echo $quantity;
	                     // echo $subTotal;
	                     // echo "<br>";

	                     $sql2 = "INSERT INTO tbl_order_items(orders_id, items_id, quantity, price)

						VALUES('$lastId','$id','$quantity','$subTotal')";

						mysqli_query($conn,$sql2);
						$_SESSION['quantity'] = $quantity;
						$_SESSION['price'] = $price;
	                   
	                   }
	               }
			}
			
?>