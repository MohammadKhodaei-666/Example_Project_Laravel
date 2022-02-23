<?php


namespace App\Services\Notification\Provider;


use App\Services\Notification\Provider\Contracts\Provider;
use App\User;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class EmailProvider implements Provider
{
    private $user;
    private $mailable;

    public function __construct(User $user, Mailable $mailable)
    {
        $this->user=$user;
        $this->mailable=$mailable;
    }

    public function send(){
        return Mail::to($this->user)->send($this->mailable);
    }

}
