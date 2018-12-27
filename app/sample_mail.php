<?php
require "../vendor/autoload.php";
use PHPMailer\PHPMailer;
use PHPMailer\Exception;

$mail = new PHPMailer(true);
$staff_email = "csp2#gmail.com"; //where the email is coming from
$users_email = "flippinskip@gmail.com";//email destination

$email_subject = "CSP2 order confirmation";
$email_body = "<h3>Reference number: 3132154564987</h3>";

try{
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth =  true;
	$mail->Username = $staff_email;
	$mail->Password = "test_1234";
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