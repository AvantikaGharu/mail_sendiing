<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;


use Redirect,Response,DB,Config;

use Mail;

use App\Mail\SendEmail;

class EmailController extends Controller
{
    public function sendEmail()
    {
      $user = auth()->user();
      Mail::to($user)->send(new SendEmail($user));
 
      if (Mail::failures()) {
           return ('Sorry! Please try again latter');
      }else{
           return ('Great! Successfully send in your mail');
         }
    }
}