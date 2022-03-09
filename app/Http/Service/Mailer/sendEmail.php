<?php
use App\Http\Service\Mailer;
use Illuminate\Http\Request;

use Mail;

class sendEmail
{
     public function sendforgotten($sql,string $email,$token)
     {
        Mail::send('email.resetpassword', ['token' => $token], function($message) use($sql){
            $message->to($email);
            $message->subject('Reinitiliser votre mot de pass !');
        });
     }


}










