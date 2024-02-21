<?php

namespace frameData\utils;

use PHPMailer\PHPMailer\PHPmailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer as PHPMailerPHPMailer;

class Messagerie{

    public static function sendMail($destinataire,$objet,$contenu){
        require './env.php';
        $mail = new PHPMailer(true);
        try{
            $mail->setLanguage('fr');

            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = $serveur_mesagerie;
            $mail->SMTPAuth = true;
            $mail->Username = $login_messagerie;
            $mail->Password = $password_messagerie;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = $port_messagerie;

            //reciptients
            $mail->setFrom($login_messagerie,'Mailer');
            $mail->addAddress($destinataire);

            // content
            $mail->isHTML();
            $mail->Subject = $objet;
            $mail->Body = $contenu;

            return $mail->send();
        }catch(\Exception $e){
            die ("le message n'a pas pu être envoyé : {$mail->ErrorInfo}");
        }

    }
}

?>