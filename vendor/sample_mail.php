<?php
require "autoload.php";
// use PHPMailer\PHPMailer;
// use PHPMailer\Exception;

require "phpmailer/phpmailer/src/PHPMailer.php";
require "phpmailer/phpmailer/src/Exception.php";

$mail = new PHPMailer\PHPMailer\PHPMailer(true);
$staff_email = "pol.kharlo.villa@gmail.com"; //where the email is coming from
$users_email = "pol.kharlo.villa@gmail.com";//email destination
$smtp_debug='true';
$email_subject = "CSP2 order confirmation";
$email_body = "<h1>Reference number: 3132154564987</h1>";

try{
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth =  true;
	$mail->Username = $staff_email;
	$mail->Password = "Sucker20";
	$mail->SMTPSecure = "tls";
	$mail->Port = 587;
	$mail->setFrom($staff_email, "abcd");
	$mail->addAddress($users_email);
	$mail->isHTML(true);
	$mail->Subject = $email_subject;
	$mail->Body = $email_body;
	$mail->send();

	echo "Message has been sent";
} catch(Exception $e){
	echo "massage sending failed". $mail->ErrorInfo;
}
?>

