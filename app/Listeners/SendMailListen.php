<?php

namespace App\Listeners;

use App\Events\SendMailEvent;
use App\Jobs\SendEmail;
use App\Mail\Sendmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailListen
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendMailEvent $event): void
    {
        // dispatch(new SendEmail($event));
        // Mail::send('')
        // dd($event);
        // Mail::to($event['email'])->send($event);
        // dd($event);
        $mail = $event->email;
        // dd($mail);
        Mail::to($mail['email'])->send(new Sendmail($mail));
    }
}
