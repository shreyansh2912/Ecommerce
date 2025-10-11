<?php

namespace App\Jobs;

use App\Mail\Sendmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

// use Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $mail = $this->data->email;
        // $email = new Sendmail($mail);
        // dd($email);
        Mail::to($mail['email'])->send(new Sendmail($mail));
        // $mailData=['email'=>'shreyanshshah2912@gmail.com','title'=>'24*7Cart','body'=>'Welcome to our Community!!!'];
        // dd($mailData);
        // Mail::to('shreyanshshah2912@gmail.com')->send(new Sendmail ($mailData));
    }
}
