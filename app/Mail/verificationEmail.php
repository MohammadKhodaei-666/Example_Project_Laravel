<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class verificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user=new User();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.verification')->with([
            'url'=>$this->generateUrl(),
            'name'=>$this->user->name,
        ]);
    }

    public function generateUrl(){
        return URL::temporarySignedRoute('email.verify',now()->addMinute(24*60),['email'=>$this->user->email]);
    }
}
