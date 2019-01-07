<?php
	session_start();
	require_once 'connect.php';
	require_once '../../vendor/autoload.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;
	use PayPal\Rest\ApiContext;
	use PayPal\Auth\OAuthTokenCredential;
	use PayPal\Api\Payer;
	use PayPal\Api\Item;
	use PayPal\Api\ItemList;
	use PayPal\Api\Details;
	use PayPal\Api\Amount;
	use PayPal\Api\Transaction;
	use PayPal\Api\RedirectUrls;
	use PayPal\Api\Payment;


	$userid = $_SESSION['userid'];
	$paymentMode = $_POST['payment_mode'];
	$shippingAddress = $_POST['shipping_address'];
	$_SESSION['cart'];

	// $paymentId = $_GET['paymentId']; 
	


	$transaction_code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),0,18);
	// echo $transaction_code;
	// $date = date(DATE_RFC2822);
	$time = date_default_timezone_set('Asia/Manila');
	$date = date('Fj, Y, H:i'); 


	if ($paymentMode == 2) {
	
	
	$sql = "INSERT INTO tbl_orders(users_id, transaction_code, purchase_date, shippingAddress, status_id,payment_mode_id)
		VALUES('$userid', '$transaction_code', '$date','$shippingAddress', '1', '$paymentMode')";

	$result = mysqli_query($conn,$sql);

	$_SESSION['transaction_code'] = $transaction_code;
	$_SESSION['purchase_date'] = $date;
	$_SESSION['payment_mode'] = $paymentMode;


	// phpmailer code to send an email
	$mail = new PHPMailer(true);
	$staff_email = "pol.kharlo.villa@gmail.com"; //where the email is coming from
	$users_email = $_SESSION['email'];//email destination

	$email_subject = "Order Confirmation";
	$email_body = "<h1>Thank you for shopping!</h1><br>".$transaction_code ;

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

	

	

$apiContext = new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OAuthTokenCredential(
		'AeUBPZnXaJN89iZEwO_RihJQrdQADGkewBmyD5FhUVq40RFCkjlAv-xS4j51krbH1KSHjmv-dmjjjl6i',
		'EAOlTH9wPtqTFEw4SLT4LaI3MTjzjOMV8E7DmcH8JQ6uuIGHUmXrnKPNfONZons1J72wOfU46ndnMreo'
	)
);
$payer = new Payer();
$payer->setPaymentMethod('paypal');

//Create array to contain indiviadual items
$items = []; //on loop: $items += [];
$grand_total = 0;
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
	                     $grand_total += $subTotal;
$indiv_item = new Item();
$indiv_item ->setName($name)
			->setCurrency("PHP")
			->setQuantity($quantity)
			->setPrice($price); //per item
$items[] = $indiv_item;
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

	                   unset($_SESSION['cart'], $_SESSION['item_count']);

$item_list  = new ItemList();
$item_list  ->setItems($items);

$amount = new Amount();
$amount ->setCurrency("PHP")
		->setTotal($grand_total); //grand total

//Create transaction
$transaction = new Transaction();
$transaction ->setAmount($amount)
			 ->setItemList($item_list)
			 ->setDescription("Transaction from your shop")
			 ->setInvoiceNumber(uniqid("demoStoreNew-"));

//where to go after\
$redirectUrls = new RedirectUrls();
$redirectUrls
	//Create successful file
	->setReturnUrl('https://localhost/night6/capstone2proj/app/views/confirmation.php')
	//Create unsuccessful file
	->setCancelUrl('https://localhost/pol/app/controllers/failed.php');

$payment = new Payment();
$payment ->setIntent("sale")
		 ->setPayer($payer)
		 ->setRedirectUrls($redirectUrls)
		 ->setTransactions([$transaction]);

try{
	$payment->create($apiContext);
}catch(Exception $e){
	die($e->getData());
}

$approvalUrl = $payment->getApprovalLink();
header('location: '.$approvalUrl); 
	               }
			}
// this is for the paypal payment id
// 			$paymentId = $_GET['paymentId']; 

// 	$sql = "INSERT INTO tbl_orders (paypal_trac_code) Values ('$paymentId') FROM tbl_orders WHERE id = $userid";
// 	$result = mysqli_query($conn,$sql);
}

elseif ($paymentMode == 1) {
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

	// phpmailer code to send an email
	$mail = new PHPMailer(true);
	$staff_email = "pol.kharlo.villa@gmail.com"; //where the email is coming from
	$users_email = $_SESSION['email'];//email destination

	$email_subject = "Order Confirmation";
	$email_body = "<h1>Thank you for shopping!</h1><br>".$transaction_code ;

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

}		
?>