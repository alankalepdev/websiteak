<?php

require '../vendor/autoload.php';
require "/var/www/akprojs/config/constants.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$errorMSG = "";

// CAPTCHA — validar primero antes de procesar
if (empty($_POST['g-recaptcha-response'])) {
	echo "Valide el captcha.";
	exit;
}

// FNAME
if (empty($_POST["fname"])) {
	$errorMSG = "First Name is required. ";
} else {
	$fname = $_POST["fname"];
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
$Body = "
<html>
<body style='font-family: Arial, sans-serif; color: #333; max-width: 600px;'>
    <h2 style='color: #1e3a5f; border-bottom: 2px solid #64b5f6; padding-bottom: 8px;'>
        Nuevo mensaje desde alankalepdev.com
    </h2>
    <table style='width:100%; border-collapse: collapse;'>
        <tr><td style='padding: 8px; font-weight:bold; width:120px;'>Nombre:</td><td style='padding: 8px;'>{$fname} {$lname}</td></tr>
        <tr style='background:#f5f5f5;'><td style='padding: 8px; font-weight:bold;'>Email:</td><td style='padding: 8px;'><a href='mailto:{$email}'>{$email}</a></td></tr>
        <tr><td style='padding: 8px; font-weight:bold;'>Teléfono:</td><td style='padding: 8px;'>{$phone}</td></tr>
        <tr style='background:#f5f5f5;'><td style='padding: 8px; font-weight:bold; vertical-align:top;'>Mensaje:</td><td style='padding: 8px;'>" . nl2br(htmlspecialchars($message)) . "</td></tr>
    </table>
    <p style='margin-top: 20px; font-size: 12px; color: #999;'>Enviado desde el formulario de contacto de alankalepdev.com</p>
</body>
</html>";

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


	$mail->setFrom(USER_EMAIL, 'AlanKalepDev');
	$mail->addAddress(USER_EMAIL_SEND, 'Alan Gutiérrez');

	$mail->isHTML(true);
	$mail->Subject = 'Nuevo mensaje desde alankalepdev.com';
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
