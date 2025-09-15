<?php
require "../models/sendMailMdl.php";

 class MailController
 {
     public function sendMail($arrDatos)
     {
         $response = SendMailMdl::sendMail($arrDatos);
         echo json_encode($response);
     }

 }
 
$request = json_decode(file_get_contents('php://input'), true);
// var_dump($request);
if(isset($request["sendMail"])){
    $a = new MailController ();
    $a -> sendMail($request["sendMail"]);
} else {
    echo "No se encontro la peticion solicitada";
}