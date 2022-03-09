<?php
namespace App\Http\Service\Mailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ServiceMailer
{
   public function SendMail(string $to, string $from, string $subject, string $adresse, string $message)
   {
       //Load Composer's autoloader
       require 'vendor/autoload.php';
       //instant de mailer 
       $mail = new PHPMailer(true);
    
     try {
          //Server settings
           $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
           $mail->isSMTP();                                            //Send using SMTP
           $mail->Host       = 'prodev.elyamaje.com';                     //Set the SMTP server to send through
           $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
           $mail->Username   = 'proerp@prodev.elyamaje.com';                     //SMTP username
           $mail->Password   = 'elyamaje_2021E';                               //SMTP password
           $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
           $mail->Port       = 465;   
           //encode Utf 8
           $mail->CharSet = 'UTF-8';                               
           //Recipients
           $from = "ne-reply@prodevelyamaje.com";
           $mail->setFrom($from);
           $mail->addAddress($to);   
           $mail->addAddress($adresse);        
           //Content
           // Email body content  
           $mailContent = '  
           <h2>Demande de creation d\'un nouveau mot de pass !</h2>  
           <p>Veuillez cliquer sur le lien ci dessous pour reinitialiser votre mot de pass !</p>  
           <p><a href="">Réinitilaliser</a>.</p>';  
           $subject = 'Reinitialisation du mot de pass !';
           $mail->isHTML(true);                                  
           $mail->Subject = $subject;
           $mail->Body    = $mailContent;
           $mail->AltBody = $message;
        
           // send Mail
           $mail = $mail->send();
           if($mail)
           {
              return redirect()->route('auth.passwords.reset')->with('succes_email','un e-mail à été envoyé à cette adresse mail !');
           }
           else
           {
              dd('echec d\'envoi');
           }
       }    catch (Exception $e) {
          echo "eror: {$mail->ErrorInfo}";
    }
     
   }

}



