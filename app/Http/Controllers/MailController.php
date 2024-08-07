<?php

namespace App\Http\Controllers;

use App\Mail\Sendmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        $mailData=['title'=>'24*7Cart','body'=>'Welcome to our Community!!!'];
        Mail::to('shreyanshshah2912@gmail.com')->send(new Sendmail ($mailData));
    }
}
