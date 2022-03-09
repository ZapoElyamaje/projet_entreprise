<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Repository\Article\UserRepository;
use App\Http\Service\Mailer\ServiceMailer;
use App\Http\Service\Mailer\SendEmailservice;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    private $userRepository;
    private $serviceMailer;
    private $sendEmailservice;
    
    public function __construct(
    UserRepository $userRepository, 
    ServiceMailer $serviceMailer,
    SendEmailservice $sendEmailservice
    )
    {
        $this->userRepository = $userRepository;
        $this->serviceMailer = $serviceMailer;
        $this->sendEmailservice = $sendEmailservice;
    }

    public function reset_pass()
    {
        return view('auth.passwords.reset');
    }


    public function sendEmail(Request $request)
    {
       // ckeck email (récupérer l'email de user et verifier si existe)
        $user_email = $this->userRepository->getEmail();
        if(!$user_email)
        {
          return redirect()->route('auth.passwords.reset')->with('error','cette adresse e-mail n\'est pas identifié !');
        }
     }

     public function sendEmail1(Request $request)
     {

     }
}
