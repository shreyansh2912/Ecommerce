<?php

namespace App\Http\Controllers;

use App\Events\SendMailEvent;
use App\Jobs\SendEmail;
use App\Mail\Sendmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        $mailData=['email'=>'shreyanshshah2912@gmail.com','title'=>'24*7Cart','body'=>'Welcome to our Community!!!'];
        // Mail::to('shreyanshshah2912@gmail.com')->send(new Sendmail ($mailData));
        // dispatch(new SendEmail($mailData));
        Event::dispatch(new SendMailEvent($mailData));
        return redirect('/home');
    }
}
