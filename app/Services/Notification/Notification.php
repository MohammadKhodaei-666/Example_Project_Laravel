<?php


namespace App\Services\Notification;


use App\User;
use GuzzleHttp\Client;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use App\Services\Notification\Provider\Contracts;

/**
 * @method sendSms(User $user, string $text)
 * @method sendEmail(User $user, Mailable $mailable)
 */
class Notification
{
    public function __call($method, $arguments)
    {
        $providerName=__NAMESPACE__."Provider".substr($method,4)."Provider";
        if (!class_exists($providerName)){
            throw new \Exception('class not exists');
        }
        $providerInstance=new $providerName(...$arguments);
        if (!is_subclass_of($providerInstance,Provider\Contracts\Provider::class)){
            throw new \Exception("class not is a App\Services\Notification\Provider\Contracts\Provider");
        }
        $providerInstance->send();

    }

}
