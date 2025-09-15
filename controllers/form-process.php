<?php

require '../vendor/autoload.php';
require "../include/constants.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$errorMSG = "";

// FNAME
if (empty($_POST["fname"])) {
	$errorMSG = "First Name is required. ";
} else {
	$fname = $_POST["fname"];
}
if (!isset($_POST['g-recaptcha-response'])) {
	$errorMSG = "Valide el captcha. ";
}
// LNAME
if (empty($_POST["lname"])) {
	$errorMSG = "Last Name is required. ";
} else {
	$lname = $_POST["lname"];
}

// PHONE
if (empty($_POST["phone"])) {
	$errorMSG .= "Phone is required. ";
} else {
	$phone = $_POST["phone"];
}

// EMAIL
if (empty($_POST["email"])) {
	$errorMSG .= "Email is required. ";
} else {
	$email = $_POST["email"];
}




// MESSAGE
if (empty($_POST["message"])) {
	$errorMSG .= "Message is required. ";
} else {
	$message = $_POST["message"];
}




// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $fname . " " . $lname;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $phone;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";
$mail = new PHPMailer(true);
try {
	// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();

	$mail->Host = 'smtp.titan.email';
	$mail->SMTPAuth = true;

	$mail->Username = USER_EMAIL;
	$mail->Password = EMAIL_PASSWORD;

	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;


	$mail->setFrom(USER_EMAIL, 'Coventant Software Web');
	$mail->addAddress(USER_EMAIL_SEND, 'Covenant Software');

	$mail->isHTML(true);
	$mail->Subject = 'Mensaje del sitio web Covenant Software';
	$mail->Body = $Body;

	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	$mail->send();
	echo "success";
} catch (Exception $e) {
	echo "Something went wrong :(";
	// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
