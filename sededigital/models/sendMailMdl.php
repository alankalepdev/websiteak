<?php
require "constants.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
class SendMailMdl 
{
    public static function sendMail($arrDatos)
    {
        $mail = new PHPMailer(true);
         try {

            $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
            $mail->isSMTP();
       
            $mail->Host = 'smtp.titan.email';
           //  $mail->Host = 'tls://smtp.gmail.com';
            $mail->SMTPAuth = true;
       
            $mail->Username = USER_EMAIL;
            $mail->Password = EMAIL_PASSWORD;
        
            $mail->SMTPSecure = 'ssl';   
            $mail->Port = 465;
        
            ## MENSAJE A ENVIAR
        
            $mail->setFrom(USER_EMAIL, 'Mailer');
            $mail->addAddress(USER_EMAIL_SEND);
        
            $mail->isHTML(true);
            $mail->Subject = 'Mensaje del sitio web';
            $mail->Body = 'Nombre: '.$arrDatos['name'].' Email: '.$arrDatos['email'].'<BR>'.
            'Telefono: '.$arrDatos['phone'].' Mensaje: '.$arrDatos['message'];

            $mail->SMTPOptions = array(
               'ssl' => array(
               'verify_peer' => false,
               'verify_peer_name' => false,
               'allow_self_signed' => true
               ));
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            return "success";
        
            // if($mail->send()){
            //     return "success";
            // } else {

            //     throw new Exception("Error al enviar Mensaje");
                
            // }
        } catch (Exception $th) {
            return $th->getMessage();
        }

        //  $mail = new PHPMailer(true);

     
        
    }
    
}
